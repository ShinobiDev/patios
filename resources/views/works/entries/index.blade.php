@extends('layouts.master')
@section('head')
  {{-- <link rel="stylesheet" href="{{asset('admin-lte/plugins/datatables/dataTables.bootstrap4.min.css')}}"> --}}
  {{-- <link rel="stylesheet" href="{{asset('admin-lte/plugins/datatables/buttons.bootstrap4.min.css')}}"> --}}

@endsection
@section('header')
    <h1>
        Vehiculos Ingresados
    </h1>
    <small>Listado</small>

    <ol class="breadcrumb">
      <li><a href="{{route('home')}}"><i class="fa fa-dashboard">  Inicio</i></a></li>
      <li class="active">Ingresos</li>
    </0l>

@endsection

@section('content')

  <div class="box box-primary">
    <div class="box-header">
        <h3 class="box-title">Listados De vehículos Ingresados</h3>

            <a href="{{route('entries.create')}}" class="btn btn-primary pull-right btn-lg" >
                <i class="fa fa-car"> Crear Ingreso</i>
            </a>

    </div>
    <div class="box-body" id="table">
        <table id="entries-table"class="table table-bordered table-striped">
          <thead>
            <tr>
              <th>NUI</th>
              <th>Placa</th>
              <th>Tipo Vehículo</th>
              <th>Fecha ingreso</th>
              <th>Días sanción</th>
              <th>Acciones</th>
            </tr>
          </thead>
          <tbody>

            @foreach ($entries as $entry)
                <tr>
                  <td>{{ $entry->id }}</td>
                  <td>{{ $entry->placa }}</td>
                  <td>{{ $entry->tipo }}</td>
                  <td>{{ $entry->created_at }}</td>
                  <td>
                      @php

                        $dias = $actuales->diffInDays($entry->created_at);
                        $dia = $entry->grado;
                        $resul = $dia - $dias;
                        // echo $resul;
                        if ($resul<=0) {
                          echo 0;
                        }else {
                          echo $resul;
                        }

                      @endphp
                  </td>

                  <td>
                    {{-- @can ('create', new \App\Entry) --}}
                        <a href="{{route('entries.show', $entry)}}" class="btn btn-xs btn-primary"><i class="fa fa-eye"></i></a>

                      @role('Admin')
                        <a href="{{route('entries.edit', $entry)}}" class="btn btn-xs btn-info"><i class="fa fa-pencil"></i></a>
                      @endrole
                        @php
                          $compa = $entry->comparendo;
                          $chas = $entry->chasis;
                          $moto = $entry->motor;
                          $causa = $entry->causal;

                        @endphp

                          @if ($causa == 'Accidente')
                            @if ($chas == '' || $moto == '')

                              <a href="{{route('entries.EditPendientes', $entry)}}" class="btn btn-xs btn-warning"><i class="fa fa-pencil"></i>Pendiente</a>

                            @endif

                          @elseif ($causa == 'Comparendo')
                              @if ($compa == '' || $chas == '' || $moto == '')

                                <a href="{{route('entries.EditPendientes', $entry)}}" class="btn btn-xs btn-warning"><i class="fa fa-pencil"></i>Pendiente</a>
                              @endif
                          @endif


                        @php
                          $estado = App\Invoce::where('entries_id', $entry->id)->get();
                          foreach ($estado as $estados) {
                            $esta = $estados->estado;
                          }



                        @endphp

                        @if ($resul <=0)
                          @if ($estado->count()=='0' || $esta == 'Anulado')
                            @if ($entry->tipo != 'null' || $entry->direccion != 'null')
                              <a href="{{route('mostrarfacturas.show', $entry)}}" class="btn btn-xs btn-success"><i class="fa fa-sticky-note-o"></i>liquidar</a>
                            @endif
                          @else

                          @endif

                        @else

                        @endif
                    @role('Admin')
                      <form method="POST" action="{{route('entries.destroy', $entry)}}" style="display: inline">
                        {{csrf_field()}} {{method_field('DELETE')}}
                        <button class="btn btn-xs btn-danger" name="button" onclick="return confirm('¿Está seguro de querer Eliminar  este usuario?')">
                            <i class="fa fa-times"></i>
                        </button>
                      </form>
                    @endrole
                    {{-- @endcan --}}
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
              $('#entries-table').DataTable( {
                  dom: 'Bfrtip',
                  buttons: ['copy', 'csv', 'excel', 'pdf',

                  {
                      text: 'HTML',
                      action: function ( e, dt, node, config ) {
                          txt = document.getElementById("entries-table");

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
