<?php

namespace App\Policies;

use App\User;
use App\Section;
use Illuminate\Auth\Access\HandlesAuthorization;

class SectionPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the section.
     *
     * @param  \App\User  $user
     * @param  \App\Section  $section
     * @return mixed
     */
    public function view(User $user, Section $section)
    {
        return $user->hasPermissionTo('Ver Seccion');
    }

    /**
     * Determine whether the user can create sections.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->hasPermissionTo('Crear Seccion');
    }

    /**
     * Determine whether the user can update the section.
     *
     * @param  \App\User  $user
     * @param  \App\Section  $section
     * @return mixed
     */
    public function update(User $user, Section $section)
    {
        return $user->hasPermissionTo('Editar Seccion');
    }

    /**
     * Determine whether the user can delete the section.
     *
     * @param  \App\User  $user
     * @param  \App\Section  $section
     * @return mixed
     */
    public function delete(User $user, Section $section)
    {
        return $user->hasPermissionTo('Eliminar Seccion');
    }
}
