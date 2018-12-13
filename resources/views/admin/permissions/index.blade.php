@extends('layouts.master')
@section('head')
  <link rel="stylesheet" href="{{asset('admin-lte/plugins/datatables/dataTables.bootstrap4.css')}}">
@endsection
@section('header')
    <h1>Permisos</h1>

    <ol class="breadcrumb">
      <li><a href="{{route('home')}}"><i class="fa fa-dashboard">  Inicio</i></a></li>
      <li class="active">Permisos</li>
    </0l>

@endsection

@section('content')

  <div class="box box-primary">
    <div class="box-header">
        <h3 class="box-title">Listados De Permisos</h3>
    </div>
    <div class="box-body">
        <table id="permission-table"class="table table-bordered table-striped">
          <thead>
            <tr>
              <th>ID</th>
              <th>Identificador</th>
              <th>Nombre</th>
              <th>Acciones</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($permissions as $permission)
                <tr>
                  <td>{{ $permission->id }}</td>
                  <td>{{ $permission->name }}</td>
                  <td>{{ $permission->display_name }}</td>
                  <td>
                    @can('update',$permission)
                        <a href="{{route('permissions.edit', $permission)}}" class="btn btn btn-primary"><i class="fa fa-edit"></i></a>
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
  <script src="{{asset('admin-lte/plugins/datatables/jquery.dataTables.min.js')}}">  </script>
  <script src="{{asset('admin-lte/plugins/datatables/datatables.bootstrap4.js')}}">  </script>

  <script>
      $(document).ready(function() {
      $('#permission-table').DataTable( {
          dom: 'Bfrtip',
          buttons: ['copy', 'csv', 'excel', 'pdf',

          {
              text: 'HTML',
              action: function ( e, dt, node, config ) {
                  txt = document.getElementById("permission-table");

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
