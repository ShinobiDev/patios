@extends('layouts.master')

@section('header')
  <h1>
      Crear Proveedor de Grúas
  </h1>

  <ol class="breadcrumb">
    <li><a href="{{route('home')}}"><i class="fa fa-dashboard">  Inicio</i></a></li>
    <li class="active"><a href="{{route('proveedores.index')}}">Proveedor de Grúas</a></li>
    <li class="active">Crear Proveedor de Grúas</li>
  </0l>
@endsection
@section('content')


    <div class="row">

        <div class="col-md-6">


            <div class="box box-primary">

              <div class="box-header with-border">
                <h3><i class="fa fa-pencil"></i>  Crear Proveedor de Gruas</h3>
          </div>

              <div class="box-body">

                  <form method="POST" action="{{route('proveedores.store')}}">
                    {{csrf_field()}}

                        <div class="form-group">
                            <label for="proveedor">Proveedor:</label>
                            <input type="text" name="proveedor" value="{{old('proveedor')}}" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="placa">Placa Grua:</label>
                            <input type="text" name="placa" value="{{old('placa')}}" maxlength="6"class="form-control" onkeyup="mayus(this);">
                        </div>
                        <div class="form-group">
                            <label for="descripcion">Descripción:</label>
                            <input type="text" name="descripcion" value="{{old('descripcion')}}" class="form-control">
                        </div>

                          <button class="btn btn-primary btn-block"><i class="fa fa-plus"></i> Crear Proveedor</button>

                   </form>

              </div>

          </div>
        </div>
     </div>

@endsection
@section('scripts')

      <script>

      function mayus(e) {
          e.value = e.value.toUpperCase();
          }
      </script>


@endsection
