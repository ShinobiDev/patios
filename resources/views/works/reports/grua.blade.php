@extends('layouts.master')
@section('head')
  {{-- <link rel="stylesheet" href="{{asset('admin-lte/plugins/datatables/dataTables.bootstrap4.css')}}"> --}}
@endsection
@section('header')
    <h1>
        Reporte de Grúa
    </h1>
    <small>Informe</small>

    <ol class="breadcrumb">
      <li><a href="{{route('home')}}"><i class="fa fa-dashboard">  Inicio</i></a></li>
      <li class="active">Reporte Grúa </li>
    </0l>

@endsection

@section('content')

  <div class="box box-primary">
    <div class="box-header">
        <h3 class="box-title">Reporte Grúa </h3>



    </div>
    <div class="box-body">
        <table id="grua-table" class="table table-bordered table-striped">
          <thead>
            <tr>
              <th>Fecha ingreso</th>
              <th>Placa Vehículo</th>
              <th>Placa Grúa</th>
              <th>Detalle</th>
              <th>Numero de inventario</th>
              <th>Causal</th>
              <th>N. Infracción</th>

            </tr>
          </thead>
          <tbody>
            @foreach ($vista as $vistas)
              <tr>
                <th>{{$vistas->created_at}}</th>
                <th>{{$vistas->placa}}</th>
                <th>{{$vistas->grua}}</th>
                <th>{{$vistas->servicio}}</th>
                <th>{{$vistas->fisico}}</th>
                @if ($vistas->causal == 'Comparendo')
                  <th> {{$vistas->comparendo}}</th>
                  <th>{{$vistas->codigo}}</th>
                @else
                  <th>{{$vistas->causal}}</th>
                  <th>No Aplica</th>
                @endif

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
      $('#grua-table').DataTable( {
          dom: 'Bfrtip',
          buttons: ['copy', 'csv', 'excel', 'pdf',

          {
                  text: 'HTML',
                  action: function ( e, dt, node, config ) {
                      txt = document.getElementById("grua-table");

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
