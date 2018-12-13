@extends('layouts.master')
@section('head')
  <link rel="stylesheet" href="{{asset('admin-lte/plugins/datatables/dataTables.bootstrap4.css')}}">
@endsection
@section('header')
    <h1>
        Recibos
    </h1>
    <small>Listado</small>

    <ol class="breadcrumb">
      <li><a href="{{route('home')}}"><i class="fa fa-dashboard">  Inicio</i></a></li>
      <li class="active">Recibos</li>
    </0l>

@endsection

@section('content')

  <div class="box box-primary">
    <div class="box-header">
        <h3 class="box-title">Listados De Recibos</h3>
        {{-- <a href="{{route('invoces.create')}}" class="btn btn-primary pull-right btn-lg" >
            <i class="fa fa-plus"> Crear Recibo</i>
        </a> --}}
    </div>
    <div class="box-body">
        <table id="invoces-table"class="table table-bordered table-striped">
          <thead>
            <tr>
              <th>N. Recibo</th>
              <th>Placa</th>
              <th>Fecha</th>
              <th>Valor Recibo</th>
              <th>Estado</th>
              <th>PDF</th>
              <th>Opciones</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($invoces as $invoce)
                <tr>
                  <td>{{ $invoce->id }}</td>
                  <td>{{ $invoce->placa }}</td>
                  <td>{{ $invoce->created_at }}</td>
                  <td>{{'$  '.number_format($invoce->valor_factura,2,',','.')}}</td>
                  <td>{{$invoce->estado}}</th>
                  <td> <a href="{{ $invoce->pdf }}" target="_blank"><i class="fa fa-file-pdf-o text-red"> Descargar</i></a></td>
                  <td>

                    @if ($invoce->estado == 'Anulado')
                        @else
                          <a href="{{route('invoces.edit', $invoce->id)}}" class="btn btn-primary"><i class="fa fa-edit"></i></a>
                    @endif


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
      $('#invoces-table').DataTable( {
          dom: 'Bfrtip',
          buttons: ['copy', 'csv', 'excel', 'pdf',

          {
                text: 'HTML',
                action: function ( e, dt, node, config ) {
                txt = document.getElementById("invoces-table");

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
