<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    const NORMAL = 2;
    const ADMINISTRADOR = 1;
    const ACTIVO = 1;
    const INACTIVO = 2;
    
    use HasRoles;
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use Notifiable;
    use TwoFactorAuthenticatable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = [
        'profile_photo_url',
    ];
    //relacion uno a uno
    public function profile(){
        return $this->hasone('App\Models\Profile');
    }
    //relacion uno a muchos
    public function blogs_created(){
        return $this->hasMany('App\Models\Blog');
    }
    public function reviews(){
        return $this->hasMany('App\Models\Review');
    }
    public function comment(){
        return $this->hasMany('App\Models\Comment');
    }
    public function reactions(){
        return $this->hasMany('App\Models\Reaction');
    }
    public function species_created(){
        return $this->hasMany('App\Models\Specie');
    }
    
    //Relacion muchos a muchos
    public function blogs_enrolled(){
        return $this->belongsToMany('App\Models\Blog');
    }
    
    public function species_enrolled(){
        return $this->belongsToMany('App\Models\Specie');
    }
} 
