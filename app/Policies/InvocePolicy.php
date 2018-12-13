<?php

namespace App\Policies;

use App\User;
use App\Invoce;
use Illuminate\Auth\Access\HandlesAuthorization;

class InvocePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the invoce.
     *
     * @param  \App\User  $user
     * @param  \App\Invoce  $invoce
     * @return mixed
     **/
     public function before($user){

         if ($user->hasRole('Admin'))
         {

             return true;
         }

     }
    public function view(User $user, Invoce $invoce)
    {
        return $user->hasPermissionTo('Ver Recibo');
    }

    /**
     * Determine whether the user can create invoces.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->hasPermissionTo('Crear Recibo');
    }

    /**
     * Determine whether the user can update the invoce.
     *
     * @param  \App\User  $user
     * @param  \App\Invoce  $invoce
     * @return mixed
     */
    public function update(User $user, Invoce $invoce)
    {
        return $user->hasPermissionTo('Editar Recibo');
    }

    /**
     * Determine whether the user can delete the invoce.
     *
     * @param  \App\User  $user
     * @param  \App\Invoce  $invoce
     * @return mixed
     */
    public function delete(User $user, Invoce $invoce)
    {
        return $user->hasPermissionTo('Eliminar Recibo');
    }
}
