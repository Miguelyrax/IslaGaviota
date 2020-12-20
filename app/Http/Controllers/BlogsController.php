<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;

use App\Models\Category;


class BlogsController extends Controller
{
    //
    public function index(){
        
        return view('blogs.index');
    }
    public function show(Blog $blog){
       
        $this->authorize('published', $blog);
        $similares = Blog::where('category_id', $blog->category_id)
        ->where('id', '!=', $blog->id)
        ->where('status', 3)
        ->latest('id')
        ->take(5)
        ->get();

      //  
        if(auth()->user() == true){
            $blog->vistas()->attach(auth()->user()->id);
        }else{
            $blog->vistas()->attach(1);
        }

        return view('blogs.show', compact('blog', 'similares'));
    }

    
}
