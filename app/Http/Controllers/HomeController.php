<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Specie;
use Illuminate\Http\Request;


class HomeController extends Controller
{
    //
    public function __invoke(){ 
        
        $blogs = Blog::where('status','3')->latest('id')->get()->take(12); 

        $animales = Specie::where('status', 3)->latest('id')->get()->take(4);
       
        return view('welcome', compact('blogs', 'animales'));
    }
}
