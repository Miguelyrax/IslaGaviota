<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kind extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    //Relacion uno a muchos
    public function species(){
        return $this->hasMany('App\Models\Specie');
    }
}
