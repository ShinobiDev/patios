@extends('layouts.master')
@section('head')
  {{-- <link rel="stylesheet" href="{{asset('admin-lte/plugins/datatables/dataTables.bootstrap4.css')}}"> --}}
@endsection
@section('header')
    <h1>
        Reporte de Permanencia
    </h1>
    <small>Informe</small>

    <ol class="breadcrumb">
      <li><a href="{{route('home')}}"><i class="fa fa-dashboard">  Inicio</i></a></li>
      <li class="active">Reporte Permanencia En patios</li>
    </0l>

@endsection

@section('content')

  <div class="box box-primary">
    <div class="box-header">
        <h3 class="box-title">Reporte Permanencia en patios</h3>



    </div>
    <div class="box-body">
      <table id="ingreso-table" class="table table-bordered table-striped">
        <thead>
          <tr>
            <th>Nombre Patio</th>
            <th>Valor</th>
          </tr>
        </thead>
        <tbody>
          @php
            $suma = 0;
          @endphp
          @foreach ($vista as $vistas)
            <tr>
              <th>{{$vistas->patio}}</th>
              <th style="font-family: arial;">${{number_format($vistas->valor,0,',','.')}}</th>
            </tr>
            @php
              $suma +=$vistas->valor
            @endphp
          @endforeach
          <tr style="font-family: arial; font-size:20px; color:red;">
            <th>TOTAL</th>
            <th>${{number_format($suma,0,',','.')}}</th>
          </tr>
        </tbody>
      </table>
    </div>
  </div>

@endsection

@section('scripts')
  <script>
      $(document).ready(function() {
      $('#salida-table').DataTable( {
          dom: 'Bfrtip',
          buttons: ['copy', 'csv', 'excel', 'pdf',

          {
                  text: 'HTML',
                  action: function ( e, dt, node, config ) {
                      txt = document.getElementById("salida-table");

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
