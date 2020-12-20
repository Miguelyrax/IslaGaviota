<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $guarded = ['id'];
    use HasFactory;
    public function commentable(){
        return $this->morphTo();//le indicamoms que debe trabajar con una relacion polimorfica
    }
    //Relacion uno a muchos polimorfica
    public  function comments(){
        return $this->morphMany('App\Models\Comment', 'commenteable');
    }
    public  function reactions(){
        return $this->morphMany('App\Models\Reaction', 'reactionable');
    }
    //Relacion uno a muchcos inversa
    public function user(){
        return $this->belongsTo('App\Models\User');
    }
} 
