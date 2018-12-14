@extends('layouts.master')

@section('header')
  <h1>
      Crear salida de patios
  </h1>

  <ol class="breadcrumb">
    <li><a href="{{route('home')}}"><i class="fa fa-dashboard">  Inicio</i></a></li>
    <li class="active"><a href="{{route('salidas.index')}}">salida de Patios</a></li>
    <li class="active">Crear salida de patios</li>
  </0l>
@endsection
@section('content')


    <div class="row">

        <div class="col-md-6">


            <div class="box box-primary">

              <div class="box-header with-border">
                <h3><i class="fa fa-pencil"></i>  Crear salida de Patios</h3>
          </div>

              <div class="box-body">

                  <form method="POST" action="{{route('salidas.store')}}">
                    {{csrf_field()}}

                        <div class="form-group">
                            <label for="placa">Placa:</label>

                              <select class="form-control select2" name="entries_id" id="entries_id" required autofocus>
                                <option value="">--- Seleccione PLACA ---</option>
                                @foreach ($entries as $entry)
                                  <option value="{{$entry->id}}">{{$entry->placa}}</option>
                                @endforeach
                              </select>


                        </div>
                        <div class="form-group">
                            <label for="nombre">Propietario o Infractor</label>
                            <select class="form-control select2" name="owenrs_id" id="documento" required autofocus>
                                <option value="">--- Seleccione Propi/Infractor ---</option>

                              </select>
                            </select>
                        </div>


                          <div class="form-group">
                            <label for="">Documentos entregados para retirar el vehiculo</label><br>
                            <input type="checkbox" name="verificar[]" value="Inv_ok" > 1. Inventario del vehículo: Corresponde al documento realizado en el levantamiento del vehículo <br>
                            <input type="checkbox" name="verificar[]" value="Comparendo_ok"> 2. Copia del comparendo: Por medio del cual se inmoviliza el vehículo<br>
                            <input type="checkbox" name="verificar[]" value="cedula_ok"> 3. Fotocopia de cedula de la persona que retira: Identificacion del propietario o infractor<br>
                            <input type="checkbox" name="verificar[]" value="pago_ok"> 4. Pagos realizados: Correspondientes al servicio de parqueadero y grua (si amerita)<br>
                            <input type="checkbox" name="verificar[]" value="orden_ok"> 5. Orden de Entrega firmada por la autoridad competente: Donde se identifique la placa del vehiculo a retirar<br>
                          </div>
                        <div class="form-group">
                            <label for="observacion">Observacion</label>
                                <textarea name="observacion" class="form-control"> </textarea>

                        </div>
                          <input type="hidden" name="pdf" value="null">
                          <button class="btn btn-primary btn-block"><i class="fa fa-plus"></i> Crear salida</button>

                   </form>

              </div>

          </div>
        </div>
     </div>

@endsection
@section('scripts')
  <script type="text/javascript">
  
  $(document).ready(function() {
      $.get('{{config("app.url")}}/json-salidas?entries_id='+entries_id, function(data){
        $('#documento').empty();
        $('#documento').append('<option value="0" disable="true" selected="true">====Seleccione Placa====</option>');
      });   
      $('#entries_id').on('change', function(e) {
        console.log(e);
          var entries_id =e.target.value;
          $.get('{{config("app.url")}}/json-salidas?entries_id='+entries_id, function(data){
            $('#documento').empty();
            $('#documento').append('<option value="0" disable="true" selected="true">====Seleccione Placa====</option>');


            $.each(data, function(index, owenrsObj){
                console.log(owenrsObj.nombre)
                $('#documento').append('<option value="'+owenrsObj.id+'">'+owenrsObj.nombre+' --  CC. '+owenrsObj.documento+'</option>')
            });

          });
      });
   
   }); 


  </script>
@endsection
