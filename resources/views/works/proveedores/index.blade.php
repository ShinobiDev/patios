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

            <a href="{{route('proveedores.create')}}" class="btn btn-primary pull-right" >
                <i class="fa fa-plus"> Crear Servicios</i>
            </a>

    </div>
    <div class="box-body">
        <table id="proveedores-table"class="table table-bordered table-striped">
          <thead>
            <tr>
              <th>Item</th>
              <th>Proveedor</th>
              <th>Placa</th>
              <th>Decripción</th>
              <th style="width:100px;">Opciones</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($proveedores as $proveedor)
                <tr>
                  <td>{{ $proveedor->id }}</td>
                  <td>{{ $proveedor->proveedor }}</td>
                  <td>{{ $proveedor->placa }}</td>
                  <td>{{ $proveedor->descripcion}}</td>
                  <td>
                    @can ('create', new \App\Proveedores_gruas)
                      <a href="{{route('proveedores.edit', $proveedor)}}" class="btn btn-primary"><i class="fa fa-edit"></i></a>
                      <form method="POST" action="{{route('proveedores.destroy', $proveedor)}}" style="display: inline">
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
      $('#proveedores-table').DataTable( {
          dom: 'Bfrtip',
          buttons: ['copy', 'csv', 'excel', 'pdf',

          {
                  text: 'HTML',
                  action: function ( e, dt, node, config ) {
                      txt = document.getElementById("proveedores-table");

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
