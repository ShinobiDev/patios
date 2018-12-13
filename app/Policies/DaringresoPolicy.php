<?php

namespace App\Policies;

use App\User;
use App\Daringreso;
use Illuminate\Auth\Access\HandlesAuthorization;

class DaringresoPolicy
{
    use HandlesAuthorization;

    public function before($user){

        if ($user->hasRole('Admin'))
        {

            return true;
        }

    }

    /**
     * Determine whether the user can view the daringreso.
     *
     * @param  \App\User  $user
     * @param  \App\Daringreso  $daringreso
     * @return mixed
     */
    public function view(User $user, Daringreso $daringreso)
    {
        return $user->hasPermissionTo('Ver Dar Ingreso');
    }

    /**
     * Determine whether the user can create daringresos.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the daringreso.
     *
     * @param  \App\User  $user
     * @param  \App\Daringreso  $daringreso
     * @return mixed
     */
    public function update(User $user, Daringreso $daringreso)
    {
        //
    }

    /**
     * Determine whether the user can delete the daringreso.
     *
     * @param  \App\User  $user
     * @param  \App\Daringreso  $daringreso
     * @return mixed
     */
    public function delete(User $user, Daringreso $daringreso)
    {
        //
    }
}
