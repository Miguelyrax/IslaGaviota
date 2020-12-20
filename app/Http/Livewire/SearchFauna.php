<?php

namespace App\Http\Livewire;

use App\Models\Specie;
use Livewire\Component;

class SearchFauna extends Component
{
    public $searchh;
    public function render()
    {
        return view('livewire.search-fauna');
    }
    public function getResultsProperty(){
        return Specie::where('name', 'LIKE', '%' . $this->searchh . '%')->where('status', 3)->take(8)->get();  // signo de porcentage para indicar que puede haber texto antes o despues
    }
}
