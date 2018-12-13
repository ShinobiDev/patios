<?php

namespace App\Http\Controllers\Admin;

use App\User;
use Illuminate\Http\Request;
use App\Events\UserWasCreated;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateUserRequest;
use Spatie\Permission\Models\Permission;
use Illuminate\Routing\Redirector;





class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $users = User::allowed()->get();

       return view('admin.user.index')->with('users', $users);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $user = new User;


        $this->authorize('create', $user);

        $roles = Role::with('permissions')->get();
        $permissions = Permission::pluck('name','id');
        return view('admin.user.create',compact('user', 'roles','permissions'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Validar usuario

        $this->authorize('create', new User);


        $data = $request->validate([
          'name' => 'required|string|max:255',
          'cargo' => 'required|string|max:255',
          'email' => 'required|string|email|max:255|unique:users',
          'caja' =>  'required',
        ]);
        //Generar contrarseña
        if ($data['caja'] == '') {

          $data['caja'] = 'N/A';
        }
        $data['password'] = str_random(8);
        //Crear usuario
        $data['caja'] = $request->caja;
        $user = User::create($data);
        //Asignar roles
        if ($request->filled('roles')) {

          $user->assignRole($request->roles);

        }

        //Asignar Permisos
        if ($request->filled('permissions')) {

            $user->givePermissionTo($request->permissions);

        }


       //Enviar Emial

        UserWasCreated::dispatch($user, $data['password']);

        //Regrar al usuario

        return redirect()->route('users.index')->with('success','Se ha creado el usuario correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {

          $this->authorize('view', $user);

        return view('admin.user.show')->with('user', $user);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {

        $this->authorize('update', $user);

        $roles = Role::with('permissions')->get();
        $permissions = Permission::pluck('name','id');
        return view('admin.user.edit',compact('user', 'roles','permissions'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUserRequest $request, User $user)
    {
        // dd($request);
        $this->authorize('Update', $user);
        // dd($request);
        $user->update($request->validated());

        return back()->with('success','Se a actualiado el usuario correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $this->authorize('delete',$user);
        $user->delete();

        return redirect()->route('users.index')->with('success', 'Usuario Eliminado correctamente');
    }

    public function cambio_pass(Request $request){
      
     User::where("email",$request['email'])->update(['password'=>bcrypt($request['password'])]);
     return redirect()->route('login',["id"=>$request['email']])->with('success', 'Se ha cambiado tu contraseña correctamente, debes ingresar con tu nueva contraseña');

    }
}
