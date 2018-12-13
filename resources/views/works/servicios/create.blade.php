@extends('layouts.master')

@section('header')
  <h1>
      Crear Tarifas
  </h1>

  <ol class="breadcrumb">
    <li><a href="{{route('home')}}"><i class="fa fa-dashboard">  Inicio</i></a></li>
    <li class="active"><a href="{{route('servicios.index')}}">Servicios de Grúas</a></li>
    <li class="active">Crear Servicios de Grúas</li>
  </0l>
@endsection
@section('content')


    <div class="row">

        <div class="col-md-6">


            <div class="box box-primary">

              <div class="box-header with-border">
                <h3><i class="fa fa-pencil"></i>  Crear Tarifas</h3>
          </div>

              <div class="box-body">

                  <form method="POST" action="{{route('servicios.store')}}">
                    {{csrf_field()}}

                        <div class="form-group">
                            <label for="anio">Ingrese Año:</label>
                              <input type="text" name="anio" value="{{old('anio')}}" class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="grua">Servicio De Grúa</label>
                            <select class="form-control" name="crane_id">
                                  <option value="">--Seleccione un Servicio</option>
                                  @foreach ($cranes as $crane)
                                      <option value="{{$crane['id']}}">{{$crane['id']}}-{{$crane['servicio']}}</option>
                                  @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="grua">Servicio De Parqueadero</label>
                            <select class="form-control" name="rate_id">
                                    <option value="">--Selecione un Servicio</option>
                                    @foreach ($rates as $rate)
                                      <option value="{{$rate['id']}}">{{$rate['id']}}-{{$rate['servicio']}}</option>
                                    @endforeach
                            </select>
                        </div>
                              <div class="form-group">
                                  <label for="val_grua">Valor Grúa :</label>
                                  <input type="text" name="val_grua" value="{{old('val_grua')}}" class="form-control">
                             </div>

                              <div class="form-group">
                                  <label for="parqueadero">Valor Parqueadero:</label>
                                  <input type="text" name="val_parqueadero" value="{{old('val_parqueadero')}}" class="form-control">
                              </div>

                        </div>

                          <button class="btn btn-primary btn-block"><i class="fa fa-plus"></i> Crear Tarifa</button>

                   </form>

              </div>

          </div>
        </div>
     </div>

@endsection
