@extends('layouts.master')

@section('header')
  <h1>
      Actualizar Servicios de Parqueadero
  </h1>

  <ol class="breadcrumb">
    <li><a href="{{route('home')}}"><i class="fa fa-dashboard">  Inicio</i></a></li>
    <li class="active"><a href="{{route('rates.index')}}">Servicios de Parqueadero</a></li>
    <li class="active">Actulizar Servicios de Parqueadero</li>
  </0l>
@endsection
@section('content')


    <div class="row">

        <div class="col-md-6">


            <div class="box box-primary">

              <div class="box-header with-border">
                <h3><i class="fa fa-pencil"></i>  Editar Servicios de Parqueadero</h3>
          </div>

              <div class="box-body">

                  <form method="POST" action="{{route('rates.update', $rate)}}">
                    {{ csrf_field() }}
                    {{ method_field('PUT') }}
                        <div class="form-group">
                            <label for="servicio">Servicio:</label>
                            <input type="text" name="servicio" value="{{old('servicio',$rate->servicio)}}" class="form-control">
                        </div>

                          <button class="btn btn-primary btn-block"><i class="fa fa-refresh"></i> Actulizar</button>

                   </form>

              </div>

          </div>
        </div>
     </div>

@endsection
