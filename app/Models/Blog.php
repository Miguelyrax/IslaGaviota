<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    protected $withCount = ['vistas', 'reviews'];
    
    use HasFactory;
    const BORRADOR = 1;
    const REVISION = 2;
    const PUBLICADO = 3;

    //Scops
    public function scopeCategory($query, $category_id){
        if($category_id){
            return $query->where('category_id', $category_id);
        }
    }
   
    
    

    public function getRatingAttribute(){

        if($this->reviews_count){
            return round($this->reviews->avg('rating'), 1); 
        }else{
            return 5; 
        }

        
    }
    public function getRouteKeyName()
    {
        return "slug";
    }

    //relacion uno a muchos inversa
    public function creator(){
        return $this->belongsTo('App\Models\User', 'user_id'); 
    }
    
    
    public function category(){
        return $this->belongsTo('App\Models\Category');
    }


    //Relacion muchos a muchos
    public function vistas(){
        return $this->belongsToMany('App\Models\User');
    }
    //Relacion uno a muchos
    public function reviews(){
        return $this->hasMany('App\Models\Review');
    } 
    
    //Relacion uno a uno polimorfica
    public function image(){
        return $this->morphOne('App\Models\Image', 'imageable');
    }

    
}
