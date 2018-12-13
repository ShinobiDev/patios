@extends('layouts.master')
@section('content')

    <div class="row">

      <div class="col-md-6">

          <div class="box box-primary">

              <div class="box-header with-border">
                    <h3><i class="fa fa-users"></i>  Datos Personales</h3>
              </div>

              <div class="box-body">

                  <form method="POST" action="{{route('users.update', $user)}}">

                    {{csrf_field()}} {{method_field('PUT')}}

                            <div class="form-group">
                                <label for="name">Nombre:</label>
                                <input type="text" name="name" value="{{old('name',$user->name)}}" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="name">Cargo:</label>
                                <input type="text" name="cargo" value="{{old('name',$user->cargo)}}" class="form-control" disabled>
                            </div>
                            <div class="form-group">
                                <label for="name">Código  Caja:</label>
                                <input type="text" name="caja" value="{{old('caja',$user->caja)}}" class="form-control" disabled>
                            </div>

                            <div class="form-group">
                                <label for="email">Email:</label>
                                <input type="email" name="email" value="{{old('email', $user->email)}}" class="form-control">
                            </div>

                            <div class="form-group">
                              <span class="help-block">Dejar en blanco si no

                                quiere cambiar la contraseña</span>
                                <label for="password">Contraseña</label>
                                <input type="password" name="password"  class="form-control" placeholder="Contraseña Nueva">

                            </div>

                            <div class="form-group">
                                <label for="password_confirmation">Confirmar la Contraseña</label>
                                <input type="password" name="password_confirmation"  class="form-control" placeholder="Confirmar contraña">
                            </div>

                            <button class="btn btn-primary btn-block"> <i class="fa fa-refresh"></i> Actulizar Usuario</button>

                  </form>
              </div>

          </div>
      </div>

      <div class="col-md-6">
        <div class="box box-primary">
            <div class="box-header with-border">
                  <div class="box-title ">
                      <h3> <i class="fa fa-lock"></i> Perfiles</h3>
                  </div>
            </div>
            <div class="box-body">

              @role('Admin')
              <form method="POST" action="{{route('users.roles.update', $user)}}">
                {{ csrf_field() }}
                {{ method_field('PUT') }}

                @include('admin.roles.option')

                <button  class="btn btn-primary btn-block"name="button"> <i class="fa fa-refresh"></i> Actualizar Perfil</button>
              </form>
            @else
              <ul class="list-group">
                  @forelse ($user->roles as $role)
                      <li class="list-group-item">{{$role->name}}</li>
                    @empty
                      <li class="list-group-item">No tiene Roles</li>
                  @endforelse
              </ul>
              @endrole
            </div>

          </div>

          <div class="box box-primary">
              <div class="box-header with-border">
                    <div class="box-title ">
                        <h3> <i class="fa fa-unlock-alt"></i> Permisos</h3>
                    </div>
              </div>
              <div class="box-body">

              @role('Admin')
                <form method="POST" action="{{route('users.permissions.update', $user)}}">
                  {{ csrf_field() }}
                  {{ method_field('PUT') }}

                @include('admin.permissions.option',['model' => $user])

                  <button  class="btn btn-primary btn-block"name="button"> <i class="fa fa-refresh"></i> Actualizar Permisos</button>
                </form>
              @else
                <ul class="list-group">
                    @forelse ($user->permissions as $permission)

                      <li class="list-group-item">{{$permission->name}}</li>

                    @empty
                      <li class="list-group-item">No tiene permisos</li>
                    @endforelse
                </ul>
                @endrole
              </div>

            </div>
      </div>
    </div>
@endsection
