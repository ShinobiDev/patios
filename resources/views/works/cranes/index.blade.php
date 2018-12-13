@extends('layouts.master')
@section('head')
  {{-- <link rel="stylesheet" href="{{asset('admin-lte/plugins/datatables/dataTables.bootstrap4.css')}}"> --}}
@endsection
@section('header')
    <h1>
        Servicios Gruas
    </h1>
    <small>Listado</small>

    <ol class="breadcrumb">
      <li><a href="{{route('home')}}"><i class="fa fa-dashboard">  Inicio</i></a></li>
      <li class="active">Servicios de Grúas</li>
    </0l>

@endsection

@section('content')

  <div class="box box-primary">
    <div class="box-header">
        <h3 class="box-title">Listados De Servicios de Grúas</h3>

            <a href="{{route('cranes.create')}}" class="btn btn-primary pull-right" >
                <i class="fa fa-plus"> Crear Servicios</i>
            </a>

    </div>
    <div class="box-body">
        <table id="cranes-table"class="table table-bordered table-striped">
          <thead>
            <tr>
              <th>Item</th>
              <th>Año</th>
              <th>Nombre del Servicio</th>
              <th>Valor</th>
              <th>Tipo Vehículo</th>
              <th>Opciones</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($cranes as $crane)
                <tr>
                  <td>{{ $crane->id }}</td>
                  <td>{{ $crane->anio }}</td>
                  <td>{{ $crane->servicio }}</td>
                  <td>{{'$'.number_format($crane->valor,2,',','.')}}</td>
                  <td>{{ $crane->tipo_vehiculo}}</td>
                  <td>
                    @can ('create', new \App\Crane)
                      <a href="{{route('cranes.edit', $crane)}}" class="btn btn-primary"><i class="fa fa-edit"></i></a>
                      <form method="POST" action="{{route('cranes.destroy', $crane)}}" style="display: inline">
                        {{csrf_field()}} {{method_field('DELETE')}}
                        <button class="btn btn-danger" name="button" onclick="return confirm('¿Esta seguro de querer Eliminar  este servicio?')">
                            <i class="fa fa-trash"></i>
                        </button>
                      </form>
                    @endcan
                  </td>
                </tr>
            @endforeach
          </tbody>
        </table>
    </div>
  </div>

@endsection

@section('scripts')

  <script>
      $(document).ready(function() {
      $('#cranes-table').DataTable( {
          dom: 'Bfrtip',
          buttons: ['copy', 'csv', 'excel', 'pdf',

          {
              text: 'HTML',
              action: function ( e, dt, node, config ) {
                  txt = document.getElementById("cranes-table");

                  var saveData = (function () {
                  var a = document.createElement("a");
                  document.body.appendChild(a);
                  a.style = "display: none";
                  return function () {
                      var blob = new File([txt.innerHTML], "document.html");
                          url = window.URL.createObjectURL(blob);
                      a.href = url;
                      a.download = blob.name;
                      a.click();
                      window.URL.revokeObjectURL(url);
                  };
              }());

                saveData();
              }
          },

          'print'],
          language:
            {
              "sProcessing":     "Procesando...",
              "sLengthMenu":     "Mostrar _MENU_ registros",
              "sZeroRecords":    "No se encontraron resultados",
              "sEmptyTable":     "Ningún dato disponible en esta tabla",
              "sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
              "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0 registros",
              "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
              "sInfoPostFix":    "",
              "sSearch":         "Buscar:",
              "sUrl":            "",
              "sInfoThousands":  ",",
              "sLoadingRecords": "Cargando...",
              "oPaginate": {
                  "sFirst":    "Primero",
                  "sLast":     "Último",
                  "sNext":     "Siguiente",
                  "sPrevious": "Anterior"
              },
              "oAria": {
                  "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
                  "sSortDescending": ": Activar para ordenar la columna de manera descendente"
              }
          }
      } );

    });
  </script>
@endsection
