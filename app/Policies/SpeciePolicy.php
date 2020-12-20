<?php

namespace App\Policies;

use App\Models\Specie;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class SpeciePolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }
    public function published(?User $user, Specie $specie){ //El signo de interrogacion es para evaluar si esta logueado o no, ya que sino, esto no devuelve nada
        if($specie->status == 3){
            return true;
        }else{
            return false;
        }

    }
}
