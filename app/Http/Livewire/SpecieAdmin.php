<?php

namespace App\Http\Livewire;

use App\Models\Feature;
use App\Models\Habitat;
use App\Models\Image;
use App\Models\Kind;
use App\Models\Specie;
use Exception;
use Livewire\Component;
use Livewire\WithPagination;
use illuminate\Support\Str;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;

class SpecieAdmin extends Component
{
    use WithFileUploads;
    use WithPagination; 
    public $specie, $name, $specie_id, $kind_id,$urll, $habitat_id,$otro, $description, $kind_name,$idReserva,$feature_id, $habitat_name, $images;
    public $updateMode = false;

    
    

    protected $validationAttributes = [
        'name'=>'Título',
        'description' => 'descripcion',
        'kind_id' => 'tipo',
        'habitat_id' => 'hábitat',
    ];
    protected $messages = [
        'name.required'=>'Ingrese el tipo',
        'description.required' => 'Ingrese la descripcción',
        'kind_id.required' => 'Seleccione una opcion valida',
        'habitat_id.required' => 'Seleccione una opcion valida',
    ];
    public function render()
    {
        $species = Specie::latest('id')->paginate(10);

        $kinds = Kind::all();

        $habitats = Habitat::all();

        return view('livewire.specie-admin' ,compact('species', 'kinds' ,'habitats'));
    }
    private function resetInputFields(){
        $this->name = '';
        $this->description = '';
        $this->specie ='';
        $this->specie_id = '';
        $this->kind_id = '';
        $this->habitat_id ='';
        $this->otro = '';
        $this->kind_name = '';
        $this->idReserva ='';
        $this->feature_id = '';
        $this->habitat_name = '';
        $this->images='';
        $this->urll = '';
        
        
    }
    

    public function store()
    {
        $validatedDate = $this->validate([
            'name' => 'required',
            'description' =>'required',
            'kind_id' => 'required|integer|not_in:0',
            'habitat_id' => 'required|integer|not_in:0',
            
        ]);
          $comprobar = Specie::select('id')->where('name', $this->name)->get();
          if(count($comprobar)>=1){
            session()->flash('error', 'Especie ya existe.');
          } else{
           $este = Specie::create([
                'name' =>$this->name,
                'description'=>$this->description,
                'status'=>2,
                'slug' => Str::slug($this->name),
                'user_id'=>auth()->user()->id,
                'kind_id'=>$this->kind_id,
                'habitat_id'=>$this->habitat_id,
            ]);
            if(isset($this->images) && $this->images!=''){
                if($este){
                    $destination_path = 'species';
            
                $nombre =  $este->id . rand();
               $path = $this->images->storeAs($destination_path, $nombre);
               Image::create([
                'url'=>'species/'.$nombre,
                'imageable_id' => $este->id,
                'imageable_type' => 'App\Models\Specie'     

            ]);
                }
                
               }
    
            session()->flash('message', 'Especie creada.');
    
            $this->resetInputFields();
    
            $this->emit('userStore'); // Close model to using to jquery
          }
           
       

    }
    public function storeFeature()
    {
        $validatedDate = $this->validate([
            'name' => 'required',
        
            
        ]);
           
           
        Feature::create([
            'name' =>$this->name,
            'specie_id'=>$this->idReserva,
            
        ]);

        


        session()->flash('message', 'Característica agregada.');

        $this->resetInputFields();

        $this->emit('userStore'); 

    }
    

    public function edit($id)
    {
        $this->updateMode = true;
        $specie = Specie::where('id',$id)->first();
        $this->specie_id = $id;
        $this->name = $specie->name;
        $this->description = $specie->description;
        $this->kind_id = $specie->kind_id;
        $this->habitat_id = $specie->habitat_id;
        
        if($specie->image){
            $this->urll = $specie->image->url;
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
            'name' => 'required|unique:species,name,'.$this->specie_id,
            'description' =>'required',
            'kind_id' => 'required|integer|not_in:0',
            'habitat_id' => 'required|integer|not_in:0',
            
        ]);
        
        if ($this->specie_id) {
            $specie = Specie::find($this->specie_id);
            $specie->update([

                'name' =>$this->name,
                'description'=>$this->description,
               
                'slug' => Str::slug($this->name),
                
                'kind_id'=>$this->kind_id,
                'habitat_id'=>$this->habitat_id,
                
               
            ]);
            if(isset($this->images) && $this->images!=''){
                if($specie->image){
                    Image::where('imageable_id', $this->specie_id)
                    ->where('imageable_type', 'App\Models\Specie')
                    ->delete(); 
                }
                $destination_path = 'species';
            
                $nombre =  $this->specie_id . rand();
               $path = $this->images->storeAs($destination_path, $nombre);
               Image::create([
                'url'=>'species/'.$nombre,
                'imageable_id' => $this->specie_id,
                'imageable_type' => 'App\Models\Specie'     

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
            $specie = Specie::find($id);
            $specie->update([

                
                 'status' => 1,
                
               
            ]);
            $this->updateMode = false;
            session()->flash('message', 'Especie dada de baja.');
            $this->resetInputFields();

        }
    }
    public function updatePublicar($id)
    {
        
        
        if ($id) {
            $specie = Specie::find($id);
            $specie->update([

                
                 'status' => 3,
                
               
            ]);
            $this->updateMode = false;
            session()->flash('message', 'Especie publicada.');
            $this->resetInputFields();

        }
    }

    public function delete($id)
    {
        if($id){
            Specie::where('id',$id)->delete();
            session()->flash('message', 'Especie eliminada.');
        }
    }
}
