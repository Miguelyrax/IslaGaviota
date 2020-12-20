<?php

namespace App\Http\Livewire;

use App\Models\Blog;
use Livewire\Component;
use App\Models\Category;
use Livewire\WithPagination;
class BlogIndex extends Component
{
    use WithPagination;
    public $category_id;
    public $level_id;
    public function render()
    {
       
        
        $recientes = Blog::where('status',3)
        ->latest('id')
        ->take(5)
        ->get();
        
        
        $categories = Category::all();
        $blogs = Blog::where('status',3)
        ->category($this->category_id)
        ->paginate(8);
        return view('livewire.blog-index', compact('blogs', 'categories', 'recientes'));
    }
    public function resetFilters(){
        $this->reset('category_id');
    }
    public function limpiar_page(){
        $this->reset('page');
    } 
}
