@extends('layouts.master')


@section('content')

    <div class="row">
        <div class="col-md-3">
          <div class="box-body box-profile">
            <img class="profile-user-img img-responsive img-circle" src="{{asset('img/logoAvatar.png')}}" alt="{{$user->name}}">

            <h3 class="profile-username text-center">{{$user->name}}</h3>

            <p class="text-muted text-center">{{$user->getRoleNames()->implode(', ')}}</p>

            <ul class="list-group list-group-unbordered">
              <li class="list-group-item">
                <b>Email</b> <a class="pull-right">{{$user->email}}</a>
              </li>
              <li class="list-group-item">
                <b>Codigo</b> <a class="pull-right">{{$user->id}}</a>
              </li>
              <li class="list-group-item">
                <b>Cargo</b> <a class="pull-right">{{$user->cargo}}</a>
              </li>
              <li class="list-group-item">
                <b>Codigo Caja</b> <a class="pull-right">{{$user->caja}}</a>
              </li>
            </ul>

            <a href="{{route('users.edit', $user)}}" class="btn btn-primary btn-block"><b>Editar</b></a>
          </div>
        </div>

        <div class="col-md-3">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Publicaciones</h3>
                </div>

            </div>
        </div>

        <div class="col-md-3">

          <div class="box box-primary">
              <div class="box-header with-border">
                  <h3 class="box-title">Roles</h3>
              </div>
              <div class="box-body">
                  @foreach ($user->roles as $role)
                      <strong>{{$role->name}}</strong>
                      @if ($role->Permissions->count())
                          <br>
                          <small class="text-muted">
                            Permisos: {{$role->permissions->pluck('name')->implode(', ')}}
                          </small>
                      @endif
                      @unless ($loop->last)
                        <hr>
                      @endunless
                  @endforeach
              </div>
          </div>

        </div>

        <div class="col-md-3">

          <div class="box box-primary">
              <div class="box-header with-border">
                  <h3 class="box-title">Permisos Extras</h3>
              </div>
              <div class="box-body">
                  @foreach ($user->permissions as $permission)
                      <strong>{{$permission->name}}</strong>
                      @if ($role->Permissions->count())

                      @endif

                      @unless ($loop->last)
                        <hr>
                      @endunless
                  @endforeach
              </div>
          </div>

        </div>

    </div>

@endsection
