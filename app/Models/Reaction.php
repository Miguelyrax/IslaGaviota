<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reaction extends Model
{
    protected $guarded = ['id'];
    use HasFactory;
    const LIKE = 1; //Esto es una constante que llamaremos desde la migracion
    const DISLIKE = 2;
    public function reactionable(){
        return $this->morphTo();//le indicamoms que debe trabajar con una relacion polimorfica
    }
    //Relacion uno a muchcos inversa
    public function user(){
        return $this->belongsTo('App\Models\User');
    }
} 
