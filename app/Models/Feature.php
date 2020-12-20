<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Feature extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    //Relacion uno a muchos inversa
    public function specie(){
        return $this->belongsTo('App\Models\Specie');
    }
}
