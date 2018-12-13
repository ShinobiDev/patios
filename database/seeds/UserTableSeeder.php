<?php

use Illuminate\Database\Seeder;
use App\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $adminRole = Role::create(['name' => 'Admin']);
        $Roleusuario =  Role::create(['name' => 'Usuario']);
        
        $viewUserpermission   = Permission::create(['name' => 'Ver Usuarios']);
        $createUserpermission = Permission::create(['name' => 'Crear Usuarios']);
        $updateUserpermission = Permission::create(['name' => 'Editar Usuarios']);
        $deleteUserpermission = Permission::create(['name' => 'Eliminar Usuarios']);

        $viewRolepermission   = Permission::create(['name' => 'Ver Roles']);
        $createRolepermission = Permission::create(['name' => 'Crear Roles']);
        $updateRolepermission = Permission::create(['name' => 'Editar Roles']);
        $deleteRolepermission = Permission::create(['name' => 'Eliminar Roles']);






        $viewPermissionspermission   = Permission::create(['name' => 'Ver Permisos',
                                                           'display_name' =>'Ver permisos']);
        $updatePermissionspermission = Permission::create(['name' => 'Editar Permisos',
                                                           'display_name' => 'Editar Permisos']);


        $admin = new User;
        $admin->name = 'Heriberto Valencia';
        $admin->cargo = 'superAdmin';
        $admin->email = 'hvhvalencia3@gmail.com';
        $admin->password = 'heriheri';
        $admin->save();

        $usuario = new User;
        $usuario->name = 'Bruno Valenica';
        $usuario->cargo  = 'operario';
        $usuario->email = 'bruno@gmail.com';
        $usuario->password = 'heriheri';
        $usuario->save();

        $admin->assignRole($adminRole);
        $usuario->assignRole($Roleusuario);




    }


}
