@extends('layouts.master')
@section('head')
  <link rel="stylesheet" href="{{asset('admin-lte/plugins/datatables/dataTables.bootstrap4.css')}}">
@endsection
@section('header')
    <h1>
        Servicios Parqueadero
    </h1>
    <small>Listado</small>

    <ol class="breadcrumb">
      <li><a href="{{route('home')}}"><i class="fa fa-dashboard">  Inicio</i></a></li>
      <li class="active">Historico de Reubicados</li>
    </0l>

@endsection

@section('content')

  <div class="box box-primary">
    <div class="box-header">
        <h3 class="box-title">Historico de Reubicados</h3>

    </div>
    <div class="box-body">
        <table id="historials-table"class="table table-bordered table-striped">
          <thead>
            <tr>
              <th>Placa</th>
              <th>Patio</th>
              <th>seccion</th>
              <th>Numero</th>
              <th>Reubicado por</th>
              <th>Fecha Del Cambio</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($historials as $historial)
                <tr>
                  <td>{{ $historial->placa }}</td>
                  <td>{{ $historial->nombre }}</td>
                  <td>{{ $historial->seccion }}</td>
                  <td>{{ $historial->rango }}</td>
                  <td>{{ $historial->elaborado }}</td>
                  <td>{{ $historial->created_at }}</td>

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
      $('#historials-table').DataTable( {
          dom: 'Bfrtip',
          buttons: ['copy', 'csv', 'excel', 'pdf',

          {
                  text: 'HTML',
                  action: function ( e, dt, node, config ) {
                      txt = document.getElementById("historials-table");

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
