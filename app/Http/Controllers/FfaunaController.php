<?php

namespace App\Http\Controllers;

use App\Models\Specie;
use Illuminate\Http\Request;

class FfaunaController extends Controller
{
    //
    public function index(){

        return view('faunas.index');

    }
    public function show(Specie $specie){
        $this->authorize('published', $specie);

        $similares = Specie::where('kind_id', $specie->kind_id)
        ->where('habitat_id', $specie->habitat_id)
        ->where('id', '!=', $specie->id)
        ->where('status', 3)
        ->latest('id')
        ->take(5)
        ->get();

        return view('faunas.show', compact('specie', 'similares'));
    }
}
