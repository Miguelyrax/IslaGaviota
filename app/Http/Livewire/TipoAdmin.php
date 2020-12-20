<?php

namespace App\Http\Livewire;

use App\Models\Kind;
use Livewire\Component;
use Livewire\WithPagination;

class TipoAdmin extends Component
{
    use WithPagination; 
    public $tipo, $name, $tipo_id;
    public $updateMode = false;

    protected $validationAttributes = [
        'name'=>'tipo'
    ];
    protected $messages = [
        'name.required'=>'Ingrese el tipo',

    ];
    public function render()
    {
        $tipos = Kind::latest('id')->paginate(10);
        return view('livewire.tipo-admin', compact('tipos'));
    }
    private function resetInputFields(){
        $this->name = '';
        
    }

    public function store()
    {
        $validatedDate = $this->validate([
            'name' => 'required',
            
        ]);
        $comprobar = Kind::select('id')->where('name', $this->name)->get();
        if(count($comprobar)>=1){
          session()->flash('error', 'Tipo ya existe.');
        } else{
        Kind::create($validatedDate);

        session()->flash('message', 'Tipo creado.');

        $this->resetInputFields();

        $this->emit('userStore'); // Close model to using to jquery

    }}

    public function edit($id)
    {
        $this->updateMode = true;
        $tipo = Kind::where('id',$id)->first();
        $this->tipo_id = $id;
        $this->name = $tipo->name;
        
    }

    public function cancel()
    {
        $this->updateMode = false;
        $this->resetInputFields();


    }

    public function update()
    {
        $validatedDate = $this->validate([
            'name' => 'required|unique:kinds,name,'.$this->tipo_id,
            
        ]);
        
        if ($this->tipo_id) {
            $tipo = Kind::find($this->tipo_id);
            $tipo->update($validatedDate);
            $this->updateMode = false;
            session()->flash('message', 'Tipo modificado.');
            $this->resetInputFields();

        }
    }

    public function delete($id)
    {
        if($id){
            Kind::where('id',$id)->delete();
            session()->flash('message', 'Tipo eliminado.');
        }
    }
}
