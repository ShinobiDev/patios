@extends('layouts.master')
@section('head')
  {{-- <link rel="stylesheet" href="{{asset('admin-lte/plugins/datatables/dataTables.bootstrap4.css')}}"> --}}
@endsection
@section('header')
    <h1>
        Servicios Parqueadero
    </h1>
    <small>Listado</small>

    <ol class="breadcrumb">
      <li><a href="{{route('home')}}"><i class="fa fa-dashboard">  Inicio</i></a></li>
      <li class="active">Servicios de Parqueadero</li>
    </0l>

@endsection

@section('content')

  <div class="box box-primary">
    <div class="box-header">
        <h3 class="box-title">Listados De Servicios de Parqueadero</h3>

            <a href="{{route('rates.create')}}" class="btn btn-primary pull-right" >
                <i class="fa fa-plus"> Crear Servicios</i>
            </a>

    </div>
    <div class="box-body">
        <table id="rates-table"class="table table-bordered table-striped">
          <thead>
            <tr>
              <th>Item</th>
              <th>Año</th>
              <th>Nombre del Servicio</th>
              <th>Valor</th>
              <th>Tipo vehículo</th>
              <th style="width:100px;">Opciones</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($rates as $rate)
                <tr>
                  <td>{{ $rate->id }}</td>
                  <td>{{ $rate->anio }}</td>
                  <td>{{ $rate->servicio }}</td>
                  <td>{{'$'.number_format($rate->valor,2,',','.')}}</td>
                  <td>
                    {{$rate->tipo_vehiculo}}
                  <td>
                    @can ('create', new \App\Rate)
                      <a href="{{route('rates.edit', $rate)}}" class="btn btn-primary"><i class="fa fa-edit"></i></a>
                      <form method="POST" action="{{route('rates.destroy', $rate)}}" style="display: inline">
                        {{csrf_field()}} {{method_field('DELETE')}}
                        <button class="btn btn-danger" name="button" onclick="return confirm('¿Está seguro de querer Eliminar  este servicio?')">
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
      $('#rates-table').DataTable( {
          dom: 'Bfrtip',
          buttons: ['copy', 'csv', 'excel', 'pdf',

          {
                  text: 'HTML',
                  action: function ( e, dt, node, config ) {
                      txt = document.getElementById("rates-table");

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
