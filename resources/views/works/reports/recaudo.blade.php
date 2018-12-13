@extends('layouts.master')
@section('head')

@endsection
@section('header')
    <h1>
        Reporte de Recaudo
    </h1>
    <small>Informe</small>

    <ol class="breadcrumb">
      <li><a href="{{route('home')}}"><i class="fa fa-dashboard">  Inicio</i></a></li>
      <li class="active">Reporte Recaudo de Vehículo</li>
    </0l>

@endsection

@section('content')

  <div class="box box-primary">
    <div class="box-header">
        <h3 class="box-title">Reporte Recaudo de Vehículo</h3>



    </div>
    <div class="box-body">
        <table id="recaudos-table" class="table table-bordered table-striped">
          <thead>
            <tr>
              <th>N. Recibo</th>
              <th>Fecha Recibo</th>
              <th>Concepto</th>
              <th>Tipo Recibo</th>
              <th>Valor Total</th>
              <th>Valor STB</th>
              <th>Sistematización STB</th>
              <th>Valor ITTB</th>
              <th>Sistematición ITTB</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($vista as $vistas)
              <tr>
                <th>{{$vistas->id}}</th>
                <th>{{$vistas->created_at}}</th>
                <th>{{$vistas->estado}}</th>
                <th>{{$vistas->rate}} / {{$vistas->crane}} </th>
                <th>{{'$  '.number_format($vistas->valor_factura,0,',','.')}}</th>
                <th>{{'$  '.number_format($vistas->valor_stb,0,',','.') }}</th>
                <th>{{'$  '.number_format(13010,0,',','.')}}</th>
                <th>{{'$  '.number_format( $vistas->valor_ittb,0,',','.')}}</th>
                <th>{{'$  '.number_format(7,0,',','.')}}</th>

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
      $('#recaudos-table').DataTable( {
          dom: 'Bfrtip',
          buttons: ['copy', 'csv', 'excel', 'pdf',

          {
                  text: 'HTML',
                  action: function ( e, dt, node, config ) {
                      txt = document.getElementById("recaudos-table");

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
