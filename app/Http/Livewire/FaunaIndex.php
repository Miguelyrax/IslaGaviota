<?php

namespace App\Http\Livewire;

use App\Models\Kind;
use App\Models\Specie;
use Livewire\Component;
use Livewire\WithPagination;

class FaunaIndex extends Component
{
    use WithPagination;
    public $kind_id ;
    
    public function render()
    {
        $kinds = Kind::all();
        $species = Specie::where('status', 3)
        ->kind($this->kind_id)
        ->latest('id')
        ->paginate(8);
        return view('livewire.fauna-index', compact('kinds', 'species'));
    }
    public function resetFilters(){
        $this->reset('kind_id');
    }
   
    
    
}
