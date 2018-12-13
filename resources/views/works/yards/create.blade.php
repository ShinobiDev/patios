@extends('layouts.master')

@section('header')
  <h1>
      Crear Patio
  </h1>

  <ol class="breadcrumb">
    <li><a href="{{route('home')}}"><i class="fa fa-dashboard">  Inicio</i></a></li>
    <li class="active"><a href="{{route('yards.index')}}">Patios</a></li>
    <li class="active">Crear Patios</li>
  </0l>
@endsection
@section('content')


    <div class="row">

        <div class="col-md-6">


            <div class="box box-primary">

              <div class="box-header with-border">
                <h3><i class="fa fa-pencil"></i>  Crear patios</h3>
          </div>

              <div class="box-body">

                  <form method="POST" action="{{route('yards.store')}}">
                    {{csrf_field()}}

                        <div class="form-group">
                            <label for="nombre">Nombre:</label>
                            <input type="text" name="nombre" value="{{old('nombre')}}" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="direccion">Dirección:</label>
                            <input type="text" name="direccion" value="{{old('direccion')}}" class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="telefono">Teléfono:</label>
                            <input type="text" name="telefono" value="{{old('telefono')}}" class="form-control">
                        </div>

                          <button class="btn btn-primary btn-block"><i class="fa fa-plus"></i> Crear Patio</button>

                   </form>

              </div>

          </div>
        </div>
     </div>

@endsection
