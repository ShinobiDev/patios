@extends('layouts.master')
@section('head')
  {{-- <link rel="stylesheet" href="{{asset('admin-lte/plugins/datatables/dataTables.bootstrap4.css')}}"> --}}
@endsection
@section('header')
    <h1>
        Propietario o Infractor
    </h1>
    <small>Listado</small>

    <ol class="breadcrumb">
      <li><a href="{{route('home')}}"><i class="fa fa-dashboard">  Inicio</i></a></li>
      <li class="active">Propietario</li>
    </0l>

@endsection

@section('content')

  <div class="box box-primary">
    <div class="box-header">
        <h3 class="box-title">Listados de Propietario o Infractor</h3>

            <a href="{{route('owenrs.create')}}" class="btn btn-primary pull-right btn-lg" >
                <i class="fa fa-plus"> Crear Prop/Infra</i>
            </a>

    </div>
    <div class="box-body">
        <table id="owenrs-table"class="table table-bordered table-striped">
          <thead>
            <tr>

              <th>Propietario o Infractor</th>
              <th>Identificación</th>
              <th>celular</th>
              <th>Dirección</th>
              <th>Email</th>
              <th style="width:150px;">Opciones</th>
            </tr>
          </thead>
          <tbody>
             @foreach ($owenrs as $owenr)
                <tr>
                  <td>{{$owenr->nombre}}</td>
                  <td>{{$owenr->documento}}</td>
                  <td>{{$owenr->celular}}</td>
                  <td>{{$owenr->direccion}}</td>
                  <td>{{$owenr->mail}}</td>

                  <td>

                      <a href="{{route('owenrs.edit', $owenr)}}" class="btn btn-primary"><i class="fa fa-edit"></i></a>

                      <form method="POST" action="{{route('owenrs.destroy', $owenr)}}" style="display: inline">
                        {{csrf_field()}} {{method_field('DELETE')}}
                        <button class="btn btn-danger" name="button" onclick="return confirm('¿Está seguro de quierer Eliminar  este Patio?')">
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
  {{-- <script src="{{asset('admin-lte/plugins/datatables/jquery.dataTables.min.js')}}">  </script>
  <script src="{{asset('admin-lte/plugins/datatables/datatables.bootstrap4.js')}}">  </script> --}}

  <script>
      $(document).ready(function() {
      $('#owenrs-table').DataTable( {
          dom: 'Bfrtip',
          buttons: ['copy', 'csv', 'excel', 'pdf',

          {
              text: 'HTML',
              action: function ( e, dt, node, config ) {
                  txt = document.getElementById("owenrs-table");

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
