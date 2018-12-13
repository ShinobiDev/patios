<?php

namespace App\Policies;

use App\User;
use App\Yard;
use Illuminate\Auth\Access\HandlesAuthorization;

class YardPolicy
{
    use HandlesAuthorization;

    public function before($user){

        if ($user->hasRole('Admin'))
        {

            return true;
        }

    }


    /**
     * Determine whether the user can view the yard.
     *
     * @param  \App\User  $user
     * @param  \App\Yard  $yard
     * @return mixed
     */
    public function view(User $user, Yard $yard)
    {
          return $user->hasPermissionTo('Ver Patio');
    }

    /**
     * Determine whether the user can create yards.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
          return $user->hasPermissionTo('Crear Patio');
    }

    /**
     * Determine whether the user can update the yard.
     *
     * @param  \App\User  $user
     * @param  \App\Yard  $yard
     * @return mixed
     */
    public function update(User $user, Yard $yard)
    {
          return $user->hasPermissionTo('Editar Patio');
    }

    /**
     * Determine whether the user can delete the yard.
     *
     * @param  \App\User  $user
     * @param  \App\Yard  $yard
     * @return mixed
     */
    public function delete(User $user, Yard $yard)
    {
          return $user->hasPermissionTo('Eliminar Patio');
    }
}
