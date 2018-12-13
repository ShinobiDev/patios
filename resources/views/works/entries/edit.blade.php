@extends('layouts.master')

@section('header')
@endsection
@section('content')


    <div class="row">

        <div class="col-md-6">


            <div class="box box-primary">

              <div class="box-header with-border">
                <h3><i class="fa fa-pencil"></i>  Editar Ingreso De Vehículo</h3>
              </div>

              <div class="box-body">

                  <form method="POST" action="{{route('entries.update',$entry)}}">
                    {{csrf_field()}} {{method_field('PUT')}}

                        <div class="form-group">
                            <label for="placa">Placa Vehículo:</label>
                            <input type="text" name="placa" value="{{old('placa', $entry->placa)}}" maxlength="6"class="form-control" onkeyup="mayus(this);" disabled >
                        </div>

                        <div class="form-group">
                            <label for="direccion">Dirección de Inmovilización:</label>
                            <input type="direccion" name="direccion" value="{{old('direccion')}}" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="email">Causal de Inmovilización:</label>
                            <select class="form-control " name='causal' id="causal">
                              <option value="">---Seleccione una Opción---</option>
                              <option value="Accidente">Accidente</option>
                              <option value="Comparendo">Comparendo</option>
                            </select>
                        </div>
                        <section class="hidden" id="causa">
                          <div class="form-group">
                              <label for="comparendo">Nº Comparendo:</label>
                              <input type="text" name="comparendo" value="{{old('comparendo')}}"  maxlength="20" class="form-control">
                          </div>
                          <div class="form-group">
                              <label for="email">Grado de prueba Alcoholemia:</label><br>
                              <select class="form-control select2" name='grado'>
                                <option value="">---Seleccione una Opción---</option>
                                <option value="1">Grado 0 - 1ra vez</option>
                                <option value="1">Grado 0 - 2da vez</option>
                                <option value="3">Grado 0 - 3ra vez</option>
                                <option value="3">Grado 1 - 1ra vez</option>
                                <option value="5">Grado 1 - 2da vez</option>
                                <option value="10">Grado 1 - 3ra vez</option>
                                <option value="6">Grado 2 - 1ra vez</option>
                                <option value="10">Grado 2 - 2da vez</option>
                                <option value="20">Grado 2 - 3ra vez</option>
                                <option value="10">Grado 3 - 1ra vez</option>
                                <option value="20">Grado 3 - 2da vez</option>
                                <option value="20">Grado 3 - 3ra vez</option>
                                <option value="20">Negarse</option>
                                <option value="0">No Aplica</option>
                              </select>
                          </div>

                          <div class="form-group">
                              <label for="nombre">Infracción</label><br>
                              <select class="form-control select2 hidden" name="infraccion_id" id="infracion">
                                  <option value="0" selected>--- Selecione Propi/Infractor ---</option>
                                  @foreach ($infraccions as $infraccion)
                                    <option value="{{$infraccion->id}}">{{$infraccion->codigo}}</option>
                                  @endforeach
                              </select>
                          </div>

                        </section>

                        <div class="form-group">
                            <label for="color">Color del Vehículo</label>
                            {{-- <select class="form-control select4" name="color" required>
                                <option value="">---Seleccione una Opción---</option>
                                @foreach ($colores as $colore)
                                  <option value="{{$colore->id}}">{{$colore->color}}</option>
                                @endforeach
                            </select> --}}
                            <input type="text" name="color" value="{{old('color')}}" class="form-control" onkeyup="mayus(this);" required>
                        </div>
                        <div class="form-group">
                            <label for="marca">Marca del Vehículo</label>
                            <select class="form-control select2" name="marca">
                                <option value="">---Seleccione una Opción---</option>
                                @foreach ($marcas as $marca)
                                    <option value="{{$marca->marca}}">{{$marca->marca}}</option>
                                @endforeach
                            </select>
                            {{-- <input type="text" name="marca" value="{{old('marca')}}" class="form-control" onkeyup="mayus(this);"> --}}
                        </div>
                        <div class="form-group">
                            <label for="servicio">Tipo de servicio</label>
                            <select class="form-control select2" name="servicio" >
                                  <option value="">---Seleccione Servicio---</option>
                                  <option value="Diplomado">Diplomado</option>
                                  <option value="Oficial">Oficial</option>
                                  <option value="Privado">Particular</option>
                                  <option value="Publico">Publico</option>
                                  <option value="extrangero">EspecialRNMA</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="email">Clase de vehículo:</label>
                            <select class="form-control select2" id="tipo" name="tipo">
                                  <option value="">---Seleccione una Opción---</option>
                                  @foreach ($tipos as $tipo)
                                    <option value="{{$tipo->tipo}}">{{$tipo->tipo}}</option>
                                  @endforeach
                            </select>
                        </div>

                        {{-- <div class="form-group">
                            <label for="traslado">Es trasladado por:</label>
                            <select class="form-control" name="traslado">
                                  <option value="">---Seleccione una Opción---</option>
                                  <option value="Conductor del vehículo">Conductor del vehículo</option>
                                  <option value="Por la grúa"> Grúa</option>
                            </select>
                        </div> --}}
                        <div class="form-group">
                            <label for="rate_id">Servicio Parqueadero</label>
                            <select class="form-control select2" name="rate_id" id="rates">
                                  <option value="">---Seleccione una Opción---</option>
                                  {{-- @foreach ($rates as $rate)
                                      <option value="{{$rate['id']}}">{{$rate['servicio']}}</option>
                                  @endforeach --}}
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="crane_id">Servicio Grúa</label>
                            <select class="form-control select2" name="crane_id" id="cranes">
                                  <option value="">---Seleccione una Opción---</option>
                                {{-- @foreach ($cranes as $crane)
                                  <option value="{{$crane['id']}}">{{$crane['servicio']}}</option>
                                @endforeach --}}
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="color">Número Motor</label>
                            <input type="text" name="motor" value="{{old('motor')}}" class="form-control" >
                        </div>

                        <div class="form-group">
                            <label for="color">Número Chasis</label>
                            <input type="text" name="chasis" value="{{old('chasis')}}" class="form-control" >
                        </div>


                        <div class="form-group">
                            <label for="color">Inventario Físico</label>
                            <input type="text" name="fisico" value="{{old('fisico')}}" class="form-control" >
                        </div>

                        <div class="form-group">
                            <label for="color">Placa Grúa</label>
                            <select class="form-control select2 container" name="grua">
                              <option value="">---Seleccione una Opción---</option>
                              @foreach ($proveedores as $proveedor)
                                  <option value="{{$proveedor->placa}}">{{$proveedor->placa}}</option>
                              @endforeach
                            </select>

                        </div>

                        <div class="form-group">
                             <input type="hidden" name="recibe" value="{{ Auth::user()->name }}" class="form-control">
                        </div>

                          <button class="btn btn-primary btn-block"><i class="fa fa-plus"></i> Crear Ingreso</button>

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

          $('#causal').on('change', function(){
              if ($('#causal').val() == 'Comparendo' ) {
                $('#causa').removeClass('hidden');
              }else if ($(this).val() == 'Accidente') {
                    $('#causa').addClass('hidden');
                    $('#infracion').val()= '0';
                    //$('#infracion').removeClass('hidden');
              }

          });

          $('#tipo').on('change', function(e) {
              console.log(e);
              var tipo =e.target.value;
              $.get('{{config("app.url")}}/json-rates?tipo='+tipo, function(data){
                $('#cranes').empty();
                $('#cranes').append('<option value="0" disable="true" selected="true">====Seleccione servicio Grúa====</option>');
                $('#rates').empty();
                $('#rates').append('<option value="0" disable="true" selected="true">====Seleccione servicio Parqueadero====</option>');

                console.log("Tengo mi lista de parquedaero");
                $.each(data, function(index, rateObj){
                    console.log(rateObj.servicio)
                    $('#rates').append('<option value="'+rateObj.id+'">'+rateObj.servicio+'</option>')
                });

                buscar_servicio_gruas(tipo);

              });
          });


          // scrip par select dinamico de Rango
          //
          /*$('#rates').on('change', function(e) {
              console.log(e);

              var tipos =document.getElementById('tipo').value;
              $.get('/patios/json-cranes?tipo='+tipos, function(data){
                // $('#rango').empty();
                // $('#cranes').append('<option value="0" disable="true" selected="true">===Seleccione numero====</option>');

                $.each(data, function(index, craneObj){
                    console.log(craneObj.servicio)
                    $('#cranes').append('<option value="'+craneObj.id+'">'+craneObj.servicio+'</option>')

                });

              });
          });*/
          function buscar_servicio_gruas(tipos){
            console.log("Tengo mi lista de gruas");
              $.get('{{config("app.url")}}/json-cranes?tipo='+tipos, function(data){
                    $.each(data, function(index, craneObj){
                    console.log(craneObj.servicio)
                    $('#cranes').append('<option value="'+craneObj.id+'">'+craneObj.servicio+'</option>')

                });

              });
          }
      </script>


@endsection
