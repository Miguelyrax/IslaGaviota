<?php

namespace App\Http\Livewire;

use App\Models\Feature;
use Livewire\Component;
use Livewire\WithPagination;

class FeatureAdmin extends Component
{
    use WithPagination; 
    public $feature, $name, $feature_id;
    public $updateMode = false;

    protected $validationAttributes = [
        'name'=>'característica'
    ];
    protected $messages = [
        'name.required'=>'Ingrese característica',

    ];
    public function render()
    {
        $features = Feature::latest('id')
        ->paginate(10);
        return view('livewire.feature-admin', compact('features'));
    }
    private function resetInputFields(){
        $this->name = '';
        $this->email = '';
    }

    public function store()
    {
        $validatedDate = $this->validate([
            'name' => 'required',
            
        ]);

        Feature::create($validatedDate);

        session()->flash('message', 'Característica creada.');

        $this->resetInputFields();

        $this->emit('userStore'); // Close model to using to jquery

    }

    public function edit($id)
    {
        $this->updateMode = true;
        $feature = Feature::where('id',$id)->first();
        $this->feature_id = $id;
        $this->name = $feature->name;
        
    }

    public function cancel()
    {
        $this->updateMode = false;
        $this->resetInputFields();


    }

    public function update()
    {
        $validatedDate = $this->validate([
            'name' => 'required',
            
        ]);

        if ($this->feature_id) {
            $feature = Feature::find($this->feature_id);
            $feature->update([
                'name' => $this->name,
               
            ]);
            $this->updateMode = false;
            session()->flash('message', 'Característica modificada.');
            $this->resetInputFields();

        }
    }

    public function delete($id)
    {
        if($id){
            Feature::where('id',$id)->delete();
            session()->flash('message', 'Característica eliminada.');
        }
    }
}
