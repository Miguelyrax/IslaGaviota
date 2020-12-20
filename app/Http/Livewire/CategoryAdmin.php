<?php

namespace App\Http\Livewire;

use App\Models\Category;
use Livewire\Component;
use Livewire\WithPagination;

class CategoryAdmin extends Component
{
    use WithPagination; 
    public $category, $name, $category_id;
    public $updateMode = false;

    protected $validationAttributes = [
        'name'=>'Categoria'
    ];
    protected $messages = [
        'name.required'=>'Ingrese la categoría',

    ];

    public function render()
    {
        $categories = Category::latest('id')->paginate(10);
        return view('livewire.category-admin', compact('categories'));
    }
    private function resetInputFields(){
        $this->name = '';
        
    }

    public function store()
    {
        $validatedDate = $this->validate([
            'name' => 'required',
            
        ]);
        $comprobar = Category::select('id')->where('name', $this->name)->get();
        if(count($comprobar)>=1){
          session()->flash('error', 'Especie ya existe.');
        } else{
        Category::create($validatedDate);

        session()->flash('message', 'Categoría creada.');

        $this->resetInputFields();

        $this->emit('userStore'); // Close model to using to jquery

    }}

    public function edit($id)
    {
        $this->updateMode = true;
        $category = Category::where('id',$id)->first();
        $this->category_id = $id;
        $this->name = $category->name;
        
    }

    public function cancel()
    {
        $this->updateMode = false;
        $this->resetInputFields();


    }

    public function update()
    {
        $validatedDate = $this->validate([
            
            'name' => 'required|unique:categories,name,'.$this->category_id,
            
        ]);
        
        
        
        if ($this->category_id) {
            $category = Category::find($this->category_id);
            $category->update($validatedDate);
            $this->updateMode = false;
            session()->flash('message', 'Categoría modificada.');
            $this->resetInputFields();

        
    }}

    public function delete($id)
    {
        if($id){
            Category::where('id',$id)->delete();
            session()->flash('message', 'Categoría eliminada.');
        }
    }
    
} 
