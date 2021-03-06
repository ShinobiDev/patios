@extends('layouts.master')
@section('head')
  <link rel="stylesheet" href="{{asset('admin-lte/plugins/datatables/dataTables.bootstrap4.css')}}">
@endsection
@section('header')
    <h1>
        Usuarios
    </h1>
    <small>Listado</small>

    <ol class="breadcrumb">
      <li><a href="{{route('home')}}"><i class="fa fa-dashboard">  Inicio</i></a></li>
      <li class="active">Usuarios</li>
    </0l>

@endsection

@section('content')

  <div class="box box-primary">
    <div class="box-header">
        <h3 class="box-title">Listados De Usuarios</h3>
        @can ('create', $users->first())
            <a href="{{route('users.create')}}" class="btn btn-primary pull-right" >
                <i class="fa fa-user-plus"> Crear Usuario</i>
            </a>
        @endcan

    </div>
    <div class="box-body">
        <table id="users-table"class="table table-bordered table-striped">
          <thead>
            <tr>
              <th>ID</th>
              <th>Nombre</th>
              <th>Email</th>
              <th>Cargo</th>
              <th>Roles</th>
              <th>Acciones</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($users as $user)
                <tr>
                  <td>{{ $user->id }}</td>
                  <td>{{ $user->name }}</td>
                  <td>{{ $user->email }}</td>
                  <td>{{ $user->cargo }}</td>
                  <td>{{ $user->getRoleNames()->implode(', ')}}</td>
                  <td>
                    @can ('view', $user)
                        <a href="{{route('users.show', $user)}}" class="btn btn-xs btn-warning"><i class="fa fa-eye"></i></a>
                    @endcan
                    @can ('update', $user)
                        <a href="{{route('users.edit', $user)}}" class="btn btn-xs btn-info"><i class="fa fa-pencil"></i></a>
                    @endcan
                    @can ('delete', $user)
                      <form method="POST" action="{{route('users.destroy', $user)}}" style="display: inline">
                        {{csrf_field()}} {{method_field('DELETE')}}
                        <button class="btn btn-xs btn-danger" name="button" onclick="return confirm('¿Está seguro de querer Eliminar  este usuraio?')">
                            <i class="fa fa-times"></i>
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
      $('#users-table').DataTable( {
          dom: 'Bfrtip',
          buttons: ['copy', 'csv', 'excel', 'pdf',

          {
              text: 'HTML',
              action: function ( e, dt, node, config ) {
                  txt = document.getElementById("users-table");

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
