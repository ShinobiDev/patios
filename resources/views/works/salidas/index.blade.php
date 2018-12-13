@extends('layouts.master')
@section('head')
  {{-- <link rel="stylesheet" href="{{asset('admin-lte/plugins/datatables/dataTables.bootstrap4.css')}}"> --}}
@endsection
@section('header')
    <h1>
        Salida del  Parqueadero
    </h1>
    <small>Listado</small>

    <ol class="breadcrumb">
      <li><a href="{{route('home')}}"><i class="fa fa-dashboard">  Inicio</i></a></li>
      <li class="active">Salida  del Parqueadero</li>
    </0l>

@endsection

@section('content')

  <div class="box box-primary">
    <div class="box-header">
        <h3 class="box-title">Listados De Salida  del Parqueadero</h3>

            <a href="{{route('salidas.create')}}" class="btn btn-primary pull-right btn-lg"  >
                <i class="fa fa-plus"> Crear Salida </i>
            </a>

    </div>
    <div class="box-body">
        <table id="salidas-table"class="table table-bordered table-striped">
          <thead>
            <tr>
              <th>N. Salida</th>
              <th>Placa</th>
              <th>Retirado Por:</th>
              <th>Fecha</th>
              <th>Documento Verificados</th>
              <th>PDF</th>
              <th style="width:100px;">Opciones</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($salidas as $salida)
                <tr>
                  <td>{{ $salida->id }}</td>
                  <td>{{ $salida->placa }}</td>
                  <td>{{ $salida->nombre}}--{{$salida->documento}}</td>
                  <td>{{ $salida->created_at }}</td>
                  <td>{{ $salida->verificar }}</td>
                  <td> <a href="{{ $salida->pdf }}" target="_blank"><i class="fa fa-file-pdf-o text-red"> Descargar</i></a></td>
                  {{-- <td>{{'$  '.number_format($salida->valor,2,',','.')}}</td> --}}
                  <td>

                      <a href="{{route('salidas.edit', $salida)}}" class="btn btn-primary"><i class="fa fa-edit"></i></a>
                      <form method="POST" action="{{route('rates.destroy', $salida)}}" style="display: inline">
                        {{csrf_field()}} {{method_field('DELETE')}}
                        <button class="btn btn-danger" name="button" onclick="return confirm('¿Esta seguro de querer Eliminar  este servicio?')">
                            <i class="fa fa-trash"></i>
                        </button>
                      </form>

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
      $('#salidas-table').DataTable( {
          dom: 'Bfrtip',
          buttons: ['copy', 'csv', 'excel', 'pdf',


            {
                text: 'HTML',
                action: function ( e, dt, node, config ) {
                    txt = document.getElementById("salidas-table");

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
