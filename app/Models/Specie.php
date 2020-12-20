<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Specie extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    const BORRADOR = 1;
    const REVISION = 2;
    const PUBLICADO = 3;

    public function getRouteKeyName()
    {
        return "slug";
    }
     //Scops
     public function scopeKind($query, $kind_id){
        if($kind_id){
            return $query->where('kind_id', $kind_id);
        }
    }

    //Relacion uno a muchos inversa
    public function creador(){
        return $this->belongsTo('App\Models\User', 'user_id');
    }
    public function kind(){
        return $this->belongsTo('App\Models\Kind');
    }
    public function habitat(){
        return $this->belongsTo('App\Models\Habitat');
    }

    //Relacion uno a muchos
    public function features(){
        return $this->hasMany('App\Models\Feature');
    }

    //Relacion muchos a muchos 
    public function creators(){
        return $this->belongsToMany('App\Models\User');
    }
    
    //Relacion uno a uno polimorfica
    public function image(){
        return $this->morphOne('App\Models\Image', 'imageable');
    }

    
}
