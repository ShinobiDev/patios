<?php

namespace App\Policies;

use App\User;
use App\Proveedores_gruas;
use Illuminate\Auth\Access\HandlesAuthorization;

class Proveedores_gruasPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the proveedoresGruas.
     *
     * @param  \App\User  $user
     * @param  \App\Proveedores_gruas  $proveedores_gruas
     * @return mixed
     */
    public function view(User $user, Proveedores_gruas $proveedores_ruas)
    {
      return $user->hasPermissionTo('Ver Proveedor');
    }

    /**
     * Determine whether the user can create proveedoresGruas.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->hasPermissionTo('Crear Proveedor');
    }

    /**
     * Determine whether the user can update the proveedoresGruas.
     *
     * @param  \App\User  $user
     * @param  \App\Proveedores_gruas  $proveedores_gruas
     * @return mixed
     */
    public function update(User $user, Proveedores_gruas $proveedores_gruas)
    {
        return $user->hasPermissionTo('Editar Proveedor');
    }

    /**
     * Determine whether the user can delete the proveedoresGruas.
     *
     * @param  \App\User  $user
     * @param  \App\Proveedores_gruas  $proveedores_gruas
     * @return mixed
     */
    public function delete(User $user, Proveedores_gruas $proveedores_gruas)
    {
        return $user->hasPermissionTo('Eliminar Proveedor');
    }
}
