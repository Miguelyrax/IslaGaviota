<?php

namespace App\Policies;

use App\Models\Blog;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class BlogPolicy
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
    
    public function published(?User $user, Blog $blog){ 
        if($blog->status == 3){
            return true;
        }else{
            return false;
        }

    }
    public function eliminar(?User $user){ 
        if($user->can('Eliminar blogs')){
            return true;
        }else{
            return false;
        }

    }
    
}
