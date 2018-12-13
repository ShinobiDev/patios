<?php

namespace App\Policies;

use App\User;
use App\Owenr;
use Illuminate\Auth\Access\HandlesAuthorization;

class OwenrPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the owenr.
     *
     * @param  \App\User  $user
     * @param  \App\Owenr  $owenr
     * @return mixed
     */

     public function before($user){

         if ($user->hasRole('Admin'))
         {

             return true;
         }

     }

    public function view(User $user, Owenr $owenr)
    {
        return $user->hasPermissionTo('Ver Propietario');
    }

    /**
     * Determine whether the user can create owenrs.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
         return $user->hasPermissionTo('Crear Propietario');
    }

    /**
     * Determine whether the user can update the owenr.
     *
     * @param  \App\User  $user
     * @param  \App\Owenr  $owenr
     * @return mixed
     */
    public function update(User $user, Owenr $owenr)
    {
        return $user->hasPermissionTo('Editar Propietario');
    }

    /**
     * Determine whether the user can delete the owenr.
     *
     * @param  \App\User  $user
     * @param  \App\Owenr  $owenr
     * @return mixed
     */
    public function delete(User $user, Owenr $owenr)
    {
        $user->hasPermissionTo('Eliminar Propietario');
        
    }
}
