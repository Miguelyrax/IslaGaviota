<?php

namespace App\Http\Livewire;

use App\Models\Blog;
use Livewire\Component;

class Search extends Component
{
    public $search;
    public function render()
    {
        return view('livewire.search');
    }
    public function getResultsProperty(){
        return Blog::where('title', 'LIKE', '%' . $this->search . '%')->where('status', 3)->take(8)->get();  // signo de porcentage para indicar que puede haber texto antes o despues
    }
}
