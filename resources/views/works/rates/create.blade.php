@extends('layouts.master')

@section('header')
  <h1>
      Crear Servicios de Grúas
  </h1>

  <ol class="breadcrumb">
    <li><a href="{{route('home')}}"><i class="fa fa-dashboard">  Inicio</i></a></li>
    <li class="active"><a href="{{route('rates.index')}}">Servicios de Grúas</a></li>
    <li class="active">Crear Servicios de Grúas</li>
  </0l>
@endsection
@section('content')


    <div class="row">

        <div class="col-md-6">


            <div class="box box-primary">

              <div class="box-header with-border">
                <h3><i class="fa fa-pencil"></i>  Crear Servicios de Gruas</h3>
          </div>

              <div class="box-body">

                  <form method="POST" action="{{route('rates.store')}}">
                    {{csrf_field()}}

                        <div class="form-group">
                            <label for="servicio">Servicio:</label>
                            <input type="text" name="servicio" value="{{old('servicio')}}" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="anio">Año:</label>
                            <input type="text" name="anio" value="{{old('anio')}}" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="valor">Valor:</label>
                            <input type="text" name="valor" value="{{old('valor')}}" class="form-control">
                        </div>
                        <div class="form-group">
                          @foreach ($tipos as $tipo)
                              <input type="checkbox" name="tipo_vehiculo[]" value="{{$tipo->tipo}}"> {{$tipo->tipo}}<br>
                          @endforeach

                        </div>  
                          <button class="btn btn-primary btn-block"><i class="fa fa-plus"></i> Crear Servicio</button>

                   </form>

              </div>

          </div>
        </div>
     </div>

@endsection
