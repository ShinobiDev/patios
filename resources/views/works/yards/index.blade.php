@extends('layouts.master')
@section('head')
  {{-- <link rel="stylesheet" href="{{asset('admin-lte/plugins/datatables/dataTables.bootstrap4.css')}}"> --}}
@endsection
@section('header')
    <h1>
        Patios
    </h1>
    <small>Listado</small>

    <ol class="breadcrumb">
      <li><a href="{{route('home')}}"><i class="fa fa-dashboard">  Inicio</i></a></li>
      <li class="active">Patios</li>
    </0l>

@endsection

@section('content')

  <div class="box box-primary">
    <div class="box-header">
        <h3 class="box-title">Listados de Patios</h3>

            <a href="{{route('yards.create')}}" class="btn btn-primary pull-right" >
                <i class="fa fa-plus"> Crear patio</i>
            </a>

    </div>
    <div class="box-body">
        <table id="yards-table"class="table table-bordered table-striped">
          <thead>
            <tr>
              <th>Item</th>
              <th>patio</th>
              <th>Dirección</th>
              <th>Teléfono</th>
              <th style="width:150px;">Opciones</th>
            </tr>
          </thead>
          <tbody>
             @foreach ($yards as $yard)
                <tr>
                  <td>{{$yard->id}}</td>
                  <td>{{$yard->nombre}}</td>
                  <td>{{$yard->direccion}}</td>
                  <td>{{$yard->telefono}}</td>

                  <td>
                    @can ('create', new \App\Yard)
                      <a href="{{route('yards.edit', $yard)}}" class="btn btn-primary"><i class="fa fa-edit"></i></a>
                      <a href="{{route('yards.show', $yard)}}" class="btn btn-warning"><i class="fa fa-eye"></i></a>
                    @role('Sub Admin')
                      <form method="POST" action="{{route('yards.destroy', $yard)}}" style="display: inline">
                        {{csrf_field()}} {{method_field('DELETE')}}
                        <button class="btn btn-danger" name="button" onclick="return confirm('¿Está seguro de quierer Eliminar  este Patio?')">
                            <i class="fa fa-trash"></i>
                        </button>
                      </form>
                    @endrole
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
      $('#yards-table').DataTable( {
          dom: 'Bfrtip',
          buttons: ['copy', 'csv', 'excel', 'pdf',


          {
              text: 'HTML',
              action: function ( e, dt, node, config ) {
                  txt = document.getElementById("yards-table");

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
