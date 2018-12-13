<?php

namespace App\Policies;

use App\User;
use App\Rate;
use Illuminate\Auth\Access\HandlesAuthorization;

class RatePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the rate.
     *
     * @param  \App\User  $user
     * @param  \App\Rate  $rate
     * @return mixed
     */

     public function before($user){

         if ($user->hasRole('Admin'))
         {

             return true;
         }

     }




    public function view(User $user, Rate $rate)
    {
        return $user->hasPermissionTo('Ver Parqueadero');
    }

    /**
     * Determine whether the user can create rates.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->hasPermissionTo('Crear Parqueadero');
    }

    /**
     * Determine whether the user can update the rate.
     *
     * @param  \App\User  $user
     * @param  \App\Rate  $rate
     * @return mixed
     */
    public function update(User $user, Rate $rate)
    {
        return $user->hasPermissionTo('Editar Parqueadero');
    }

    /**
     * Determine whether the user can delete the rate.
     *
     * @param  \App\User  $user
     * @param  \App\Rate  $rate
     * @return mixed
     */
    public function delete(User $user, Rate $rate)
    {
      return $user->hasPermissionTo('Eliminar Parqueadero');
    }
}
