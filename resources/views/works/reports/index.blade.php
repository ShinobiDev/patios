@extends('layouts.master')

@section('header')
    <h1>
        Generador De Reportes
    </h1>
    <small>Informe</small>

    <ol class="breadcrumb">
      <li><a href="{{route('home')}}"><i class="fa fa-dashboard">  Inicio</i></a></li>
      <li class="active">Generador De Reportes</li>
    </0l>

@endsection

@section('content')


<div class="container">
  <h1>
    Generador De Reportes <hr>
  </h1>
  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
  Generar Reporte
  </button>


  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h3 class="modal-title" id="exampleModalLabel">Generación de Reportes</3>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <form method="post" action="{{route('reports.informe')}}">
    <div class="modal-body">

            {{csrf_field()}}
          <div class="form-row">
            <div class="form-group">
                <div class="col-md-6">
                  <label for="fechaini">Fecha Inicial</label>
                    <div class="input-group">
                        <div class="input-group-addon">
                            <i class="fa fa-calendar"></i>
                        </div>
                        <input type="text" name="fechaini" class="form-control" id="Date"/>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="col-md-6">
                  <label for="fechafin">Fecha Final</label>
                    <div class="input-group">
                        <div class="input-group-addon">
                            <i class="fa fa-calendar"></i>
                        </div>
                        <input name="fechafin" type="text" class="form-control" id="fecha"/>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label for="">Selecione Reporte</label>
                <select class="form-control" name="reporte" required>
                    <option value="ingreso">Ingreso Vehiculos</option>
                    <option value="salida">Salida Vehiculos</option>
                    <option value="permanencia">Permanencia Vehiculos</option>
                    <option value="obligatorio">Tiempo Obligatorio</option>
                    <option value="recaudo">Distribucion De recaudos</option>
                    <option value="grua">Gruas</option>
                </select>
            </div>


          </div>


    </div>

    <div class="modal-footer">
      <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
      <button type="submit" class="btn btn-primary">Generar Reporte</button>
    </div>
  </form>
  </div>
  </div>
  </div>
</div>


@endsection
@section('scripts')
    <script>
        $(document).ready(function() {
          $('#Date').datepicker({

              autoclose: true,
              todayHighlight: true
          });

        });
    </script>
    <script>
        $(document).ready(function() {
          $('#fecha').datepicker({

              autoclose: true,
              todayHighlight: true
          });
        });
    </script>
@endsection
