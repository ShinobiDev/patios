@extends('layouts.master')


@section('content')

    <div class="row">
        <div class="col-md-3">
          <div class="box-body box-profile">

            <h3 class="profile-username text-center">Datos del Patio</h3>

            <ul class="list-group list-group-unbordered">
              <li class="list-group-item">
                <b>Patio</b> <a class="pull-right">{{$yard->nombre}}</a>
              </li>
              <li class="list-group-item">
                <b>Dirección</b><a class="pull-right">{{$yard->direccion}}</a>
              <li class="list-group-item">
                <b>Teléfono</b> <a class="pull-right">{{$yard->telefono}}</a>
              </li>
            </ul>

            <a href="#" class="btn btn-primary btn-block"><b>Editar</b></a>
          </div>
        </div>

        <div class="col-md-3">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Secciones De este patio </h3>
                </div>
                <div class="box-body">
                  <ul>
                  @foreach ($yard->sections as $section)
                      <li class="list-group-item"><strong>Seccion: {{$section->seccion}}</strong> Rango: {{$section->rango}}</li>
                   @endforeach
                  </ul>

                </div>


            </div>
        </div>

        <div class="col-md-3">

          <div class="box box-primary">
              <div class="box-header with-border">
                  <h3 class="box-title">Crear Seccion</h3>
              </div>
              <div class="box-body">
                <form method="POST" action="{{route('sections.store',$yard)}}">
                  {{csrf_field()}}

                      <div class="form-group">
                          <label for="seccion">Sección:</label>
                          <input type="text" name="seccion" value="{{old('seccion')}}" class="form-control">
                      </div>
                      <div class="form-group">
                          <label for="rango">Rango:</label>
                          <input type="text" name="rango" value="{{old('rango')}}" class="form-control">
                          <input type="hidden" name="yard_id" value="{{$yard->id}}">
                      </div>

                        <button class="btn btn-primary btn-block"><i class="fa fa-plus"></i> Crear Sección</button>

                 </form>
              </div>
          </div>

        </div>

        <div class="col-md-3">

          <div class="box box-primary">
              <div class="box-header with-border">
                  <h3 class="box-title">Permisos Extras</h3>
              </div>
              <div class="box-body">
                  {{-- @foreach ($user->permissions as $permission)
                      <strong>{{$permission->name}}</strong>
                      @if ($role->Permissions->count())

                      @endif

                      @unless ($loop->last)
                        <hr>
                      @endunless
                  @endforeach --}}
              </div>
          </div>

        </div>

    </div>

@endsection
