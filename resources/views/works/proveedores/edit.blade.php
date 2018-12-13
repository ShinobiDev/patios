@extends('layouts.master')

@section('header')
  <h1>
      Actualizar Servicios de Parqueadero
  </h1>

  <ol class="breadcrumb">
    <li><a href="{{route('home')}}"><i class="fa fa-dashboard">  Inicio</i></a></li>
    <li class="active"><a href="{{route('rates.index')}}">Proveedor de Grúa</a></li>
    <li class="active">Actulizar Proveedor de Grua</li>
  </0l>
@endsection
@section('content')


    <div class="row">

        <div class="col-md-6">


            <div class="box box-primary">

              <div class="box-header with-border">
                <h3><i class="fa fa-pencil"></i>  Editar Proveedor de Grúa</h3>
          </div>

              <div class="box-body">

                  <form method="POST" action="{{route('proveedores.update', $proveedores)}}">
                    {{ csrf_field() }}
                    {{ method_field('PUT') }}
                    <div class="form-group">
                        <label for="proveedor">Proveedor:</label>
                        <input type="text" name="proveedor" value="{{old('proveedor',$proveedores->proveedor)}}" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="placa">Placa Vehículo:</label>
                        <input type="text" name="placa" value="{{old('placa', $proveedores->placa)}}" maxlength="6"class="form-control" onkeyup="mayus(this);">
                    </div>
                    <div class="form-group">
                        <label for="descripcion">Descripción:</label>
                        <input type="text" name="descripcion" value="{{old('descripcion',$proveedores->descripcion)}}" class="form-control">
                    </div>

                          <button class="btn btn-primary btn-block"><i class="fa fa-refresh"></i> Actualizar</button>

                   </form>

              </div>

          </div>
        </div>
     </div>

@endsection
