<?php

namespace App\Policies;

use App\User;
use App\Salida;
use Illuminate\Auth\Access\HandlesAuthorization;

class SalidaPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the salida.
     *
     * @param  \App\User  $user
     * @param  \App\Salida  $salida
     * @return mixed
     */
     public function before($user){

         if ($user->hasRole('Admin'))
         {

             return true;
         }

     }

    public function view(User $user, Salida $salida)
    {
        return $user->hasPermissionTo('Ver Salida');
    }

    /**
     * Determine whether the user can create salidas.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->hasPermissionTo('Crear Salida');
    }

    /**
     * Determine whether the user can update the salida.
     *
     * @param  \App\User  $user
     * @param  \App\Salida  $salida
     * @return mixed
     */
    public function update(User $user, Salida $salida)
    {
        return $user->hasPermissionTo('Editar Salida');
    }

    /**
     * Determine whether the user can delete the salida.
     *
     * @param  \App\User  $user
     * @param  \App\Salida  $salida
     * @return mixed
     */
    public function delete(User $user, Salida $salida)
    {
        return $user->hasPermissionTo('Eliminar Salida');
    }
}
