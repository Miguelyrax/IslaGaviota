<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Habitat extends Model
{
    protected $guarded = ['id'];
    use HasFactory;
    //Relacion uno a muchos
    public function species(){
        return $this->hasMany('App\Models\Specie');
    }
}
