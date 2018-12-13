<?php

namespace App\Policies;

use App\User;
use App\Crane;
use Illuminate\Auth\Access\HandlesAuthorization;

class CranePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the crane.
     *
     * @param  \App\User  $user
     * @param  \App\Crane  $crane
     * @return mixed
     */

     public function before($user){

         if ($user->hasRole('Admin'))
         {

             return true;
         }

     }


    public function view(User $user, Crane $crane)
    {
        return $user->hasPermissionTo('Ver Grua');
    }

    /**
     * Determine whether the user can create cranes.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->hasPermissionTo('Crear Grua');
    }

    /**
     * Determine whether the user can update the crane.
     *
     * @param  \App\User  $user
     * @param  \App\Crane  $crane
     * @return mixed
     */
    public function update(User $user, Crane $crane)
    {
        return $user->hasPermissionTo('Editar Grua');
    }

    /**
     * Determine whether the user can delete the crane.
     *
     * @param  \App\User  $user
     * @param  \App\Crane  $crane
     * @return mixed
     */
    public function delete(User $user, Crane $crane)
    {
        return $user->hasPermissionTo('Eliminar Grua');
    }
}
