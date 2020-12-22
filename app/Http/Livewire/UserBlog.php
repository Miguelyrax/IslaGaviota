<?php

namespace App\Http\Livewire;

use App\Models\Blog;
use App\Models\Category;
use App\Models\Image;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\WithFileUploads;
use illuminate\Support\Str;
class UserBlog extends Component
{
    use WithFileUploads;
    use WithPagination; 
    public $subtitle,$category, $name,$urll, $blog_id,$otro,$category_id, $description,$idReserva, $images;
    public $updateMode = false;

    
    

    protected $validationAttributes = [
        'name'=>'Título',
        'subtitle' => 'descripcion',
        'description' => 'tipo',
        'category_id' => 'hábitat',
    ];
    protected $messages = [
        'name.required'=>'Ingrese el tipo',
        'description.required' => 'Ingrese la descripcción',
        'kind_id.required' => 'Seleccione una opcion valida',
        'habitat_id.required' => 'Seleccione una opcion valida',
    ];
    public function render()
    {
        $idUser = auth()->user()->id;

        $blogs = Blog::where('user_id', $idUser)
        ->latest('id')->paginate(10);
        $categories = Category::all();

        return view('livewire.user-blog', compact('blogs','categories'));
    }
    private function resetInputFields(){
        $this->name = '';
        $this->subtitle = '';
        $this->description ='';
        $this->category_id = '';
        $this->urll = '';
        $this->images = '';
        
        
    }

    public function store()
    {
        $validatedDate = $this->validate([
            'name' => 'required',
            'subtitle' =>'required',
            'description' => 'required',
            'category_id' => 'required|integer|not_in:0',
            
        ]);
          $comprobar = Blog::select('id')->where('title', $this->name)->get();
          if(count($comprobar)>=1){
            session()->flash('error', 'Titulo del blog ya existe.');
          } else{
         $este = Blog::create([
                'title' =>$this->name,
                'subtitle'=>$this->subtitle,
                'description'=>$this->description,
                'status'=>2,
                'slug' => Str::slug($this->name),
                'user_id'=>auth()->user()->id,
                'category_id'=>$this->category_id,
                
            ]);
            if(isset($this->images) && $this->images!=''){
                if($este){
                    $destination_path = 'blogs';
            
                $nombre =  $este->id . rand();
               $path = $this->images->storeAs($destination_path, $nombre);
               Image::create([
                'url'=>'blogs/'.$nombre,
                'imageable_id' => $este->id,
                'imageable_type' => 'App\Models\Blog'     

            ]);
                }
                
               }
           
    
            session()->flash('message', 'Blog creado creada.');
    
            $this->resetInputFields();
    
            $this->emit('userStore'); // Close model to using to jquery
          }
           
       

    }
   

    public function edit($id)
    {
        $this->updateMode = true;
        $blog = Blog::where('id',$id)->first();
        $this->blog_id = $id;
        $this->name = $blog->title;
        $this->subtitle = $blog->subtitle;
        $this->description = $blog->description;
        $this->category_id = $blog->category_id;

        if($blog->image){
            $this->urll = $blog->image->url;
        }else{

        }
        
    }

    public function cancel()
    {
        $this->updateMode = false;
        $this->resetInputFields();


    }

    public function update()
    {
        $validatedDate = $this->validate([
            'name' => 'required|unique:blogs,title,'.$this->blog_id,
            'subtitle' =>'required',
            'description' => 'required',
            'category_id' => 'required|integer|not_in:0',
            
        ]);
        
        if ($this->blog_id) {
            $blog = Blog::find($this->blog_id);
            $blog->update([

                'title' =>$this->name,
                'subtitle'=>$this->subtitle,
                'description'=>$this->description,
                
                'slug' => Str::slug($this->name),
                
                'category_id'=>$this->category_id,
               
            ]);
            if(isset($this->images) && $this->images!=''){
                if($blog->image){
                    Image::where('imageable_id', $this->blog_id)
                    ->where('imageable_type', 'App\Models\Blog')
                    ->delete(); 
                }
                $destination_path = 'blogs';
            
                $nombre =  $this->blog_id . rand();
               $path = $this->images->storeAs($destination_path, $nombre);
               Image::create([
                'url'=>'blogs/'.$nombre,
                'imageable_id' => $this->blog_id,
                'imageable_type' => 'App\Models\Blog'     

            ]);
               }
            
    
            $this->updateMode = false;
            session()->flash('message', 'Especie modificada.');
            $this->resetInputFields();
            
        }
    }
    public function updateBajar($id)
    {
        

        if ($id) {
            $blog = Blog::find($id);
            $blog->update([

                
                 'status' => 1,
                
               
            ]);
            
            $this->updateMode = false;
            session()->flash('message', 'Blog dado de baja.');
            $this->resetInputFields();

        }
    }
    public function updatePublicar($id)
    {
        
        
        if ($id) {
            $blog = Blog::find($id);
            $blog->update([

                
                 'status' => 3,
                
               
            ]);
            $this->updateMode = false;
            session()->flash('message', 'Blog publicada.'. $blog->id);
            $this->resetInputFields();

        }
    }

    public function delete($id)
    {
        if($id){
            Blog::where('id',$id)->delete();
            session()->flash('message', 'Blog eliminada.');
        }
    }
}
