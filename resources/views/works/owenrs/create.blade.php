@extends('layouts.master')

@section('header')
  <h1>
      Crear Propietario o infractor
  </h1>

  <ol class="breadcrumb">
    <li><a href="{{route('home')}}"><i class="fa fa-dashboard">  Inicio</i></a></li>
    <li class="active"><a href="{{route('owenrs.index')}}">Crear Propietario o infractor</a></li>
    <li class="active">Crear Propietario o infractor</li>
  </0l>
@endsection
@section('content')


    <div class="row">

        <div class="col-md-6">


            <div class="box box-primary">

              <div class="box-header with-border">
                <h3><i class="fa fa-pencil"></i> Crear Propietario o infractor</h3>
          </div>

              <div class="box-body">

                <form method="POST" action="{{route('owenrs.store')}}">
                  {{csrf_field()}}
                    <div class="form-group">
                          <label for="nombre">Infractor / Propietario:</label>
                          <select class="form-control" name="tipo_propi">
                            <option value="">---Seleccione opcion</option>
                            <option value="Infractor">Infractor</option>
                            <option value="Propietario">Propietario</option>
                          </select>
                    </div>
                      <div class="form-group">
                          <label for="nombre">Nombre Propietario:</label>
                          <input type="text" name="nombre" value="{{old('nombre')}}" class="form-control">
                      </div>

                      <div class="form-group">
                          <label for="documento">Documento de Identidad:</label>
                          <input type="text" name="documento" value="{{old('documento')}}" class="form-control">
                      </div>

                      <div class="form-group">
                          <label for="telefono">Numero Celular:</label>
                          <input type="text" name="celular" value="{{old('celular')}}" class="form-control">
                      </div>
                      <div class="form-group">
                          <label for="mail">Correo Electronico</label>
                          <input type="mail" name="mail" value="{{old('mail')}}" class="form-control">
                      </div>

                      <div class="form-group">
                          <label for="direccion">Direccion Recidencia</label>
                          <input type="text" name="direccion" value="{{old('direccion')}}" class="form-control">
                      </div>

                      <div class="form-group">
                        <select class="form-control select2" name="entries_id">
                          <option value="">--- seleccion Placa</option>
                          @foreach ($entries as $entry)
                              <option value="{{$entry->id}}">{{$entry->placa}}</option>
                          @endforeach
                        </select>
                      </div>

                        <button class="btn btn-primary btn-block"><i class="fa fa-user-plus"></i> Crear Propietario/Infractor</button>

                 </form>

              </div>

          </div>
        </div>
     </div>

@endsection
