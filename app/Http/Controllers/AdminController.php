<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


class AdminController extends Controller
{
    //
    public function index(){
        return view('admin.index');
        
    }

    public function feature(){
        return view('admin.feature');
    }

    public function habitat(){
        return view('admin.habitat');
    }

    public function tipo(){
        return view('admin.tipo');
    }
    public function category(){
        return view('admin.category');
    }

    public function specie(){
        return view('admin.specie');
    }

    public function blog(){
        return view('admin.blog');
    }
    public function userblog(){
        return view('admin.userblog'); 
    }
}
