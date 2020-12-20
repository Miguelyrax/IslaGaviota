<?php

namespace App\Http\Livewire;

use App\Models\Habitat;
use Livewire\Component;
use Livewire\WithPagination;

class HabitatAdmin extends Component
{
    use WithPagination; 
    public $habitat, $name, $habitat_id;
    public $updateMode = false;

    protected $validationAttributes = [
        'name'=>'hábitat'
    ];
    protected $messages = [
        'name.required'=>'Ingrese el hábitat',

    ];
    public function render()
    {
        $habitats = Habitat::latest('id')->paginate(10);

        return view('livewire.habitat-admin', compact('habitats'));
    }
    private function resetInputFields(){
        $this->name = '';
        
    }

    public function store()
    {
        $validatedDate = $this->validate([
            'name' => 'required',
            
        ]);
        $comprobar = Habitat::select('id')->where('name', $this->name)->get();
          if(count($comprobar)>=1){
            session()->flash('error', 'Hábitat ya existe.');
          } else{

        Habitat::create($validatedDate);

        session()->flash('message', 'Hábitat creado.');

        $this->resetInputFields();

        $this->emit('userStore'); // Close model to using to jquery

    }}

    public function edit($id)
    {
        $this->updateMode = true;
        $habitat = habitat::where('id',$id)->first();
        $this->habitat_id = $id;
        $this->name = $habitat->name;
        
    }

    public function cancel()
    {
        $this->updateMode = false;
        $this->resetInputFields();


    }

    public function update()
    {
        $validatedDate = $this->validate([
            'name' => 'required|unique:habitats,name,'.$this->habitat_id,
            
        ]);
        
        if ($this->habitat_id) {
            $habitat = habitat::find($this->habitat_id);
            $habitat->update($validatedDate);
            $this->updateMode = false;
            session()->flash('message', 'Hábitat modificado.');
            $this->resetInputFields();

        }
    }

    public function delete($id)
    {
        if($id){
            habitat::where('id',$id)->delete();
            session()->flash('message', 'hábitat eliminado.');
        }
    }
}
