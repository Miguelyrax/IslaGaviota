<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    const NORMAL = 2;
    const ADMINISTRADOR = 1;
    const ACTIVO = 1;
    const INACTIVO = 2;

    protected $guarded = ['id'];
    use HasFactory;
    //relacion uno a uno inversa
    public function user(){
        return $this->belongsTo('App\Models\Users');
    }
}
