@extends('layouts.master')

@section('header')
  <h1>
      Actualizar Servicios de Parqueadero
  </h1>

  <ol class="breadcrumb">
    <li><a href="{{route('home')}}"><i class="fa fa-dashboard">  Inicio</i></a></li>
    <li class="active"><a href="{{route('cranes.index')}}">Reubicar </a></li>
    <li class="active">Reubicar</li>
  </0l>
@endsection
@section('content')


    <div class="row">

        <div class="col-md-6">


            <div class="box box-primary">

              <div class="box-header with-border">
                <h3><i class="fa fa-pencil"></i>  Reubicar</h3>
          </div>

              <div class="box-body">

                <form method="POST" action="{{route('asignars.update', $asignars)}}">
                  {{csrf_field()}}
                  {{method_field('PUT')}}
                        <div class="form-group dynamic">
                          <label for="">Selecione Patio </label>
                            <select class="form-control" name="nombre" id="yards" require>
                                <option value="" disable='true' selected='true'>===Seleccione Patio====</option>
                                @foreach ($yards as $key => $value)
                                    <option value="{{$value->id}}">{{$value->nombre}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                          <label for="">Selecione Sección </label>

                            <select class="form-control" name="seccion" id="seccion" require>
                                <option value="" disable='true' selected='true'>===Seleccione Sección====</option>
                            </select>

                        </div>

                        <div class="form-group">
                          <label for="">Selecione Numero </label>

                            <select class="form-control" name="rango" id="rango" require>
                                <option value="" disable='true' selected='true'>===Seleccione Numero====</option>
                            </select>

                        </div>
                          @php
                            $asignar =App\Asignar::where('id',$asignars)->get();
                            foreach ($asignar as $asignarss) {
                            $valor  = $asignarss->entries_id;
                            }
                          @endphp
                        <input type="hidden" name="entries_id" value="{{$valor}}">

                        <button class="btn btn-primary btn-block"><i class="fa fa-plus"></i> Asignar</button>

                 </form>

              </div>

          </div>
        </div>
     </div>

@endsection

@section('scripts')


<script type="text/javascript">
// scrip par select dinamico de seccion
  $('#yards').on('change', function(e) {
      console.log(e);
      var yard_id =e.target.value;
      $.get('/patios/json-seccion?yard_id='+yard_id, function(data){
        $('#seccion').empty();
        $('#seccion').append('<option value="0" disable="true" selected="true">===Seleccione Sección====</option>');
        $('#rango').empty();
        $('#rango').append('<option value="0" disable="true" selected="true">===Seleccione Numero====</option>');

        $.each(data, function(index, seccionObj){
          $('#seccion').append('<option value="'+seccionObj.id+'">'+seccionObj.seccion+'</option>')
        });

      });
  });


// scrip par select dinamico de Rango
  $('#seccion').on('change', function(e) {
      console.log(e);
      var seccion_id =e.target.value;
      $.get('/patios/json-rango?seccion_id='+seccion_id, function(data){
        $('#rango').empty();
        $('#rango').append('<option value="0" disable="true" selected="true">===Seleccione Numero====</option>');

        $.each(data, function(index, rangoObj){
          $('#rango').append('<option value="'+rangoObj.id+'">'+rangoObj.rango+'</option>')
        });

      });
  });





</script>


@endsection
