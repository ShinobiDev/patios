@extends('layouts.master')

@section('header')
@endsection
@section('content')


    <div class="row">

      <div class="col-md-3">
           <div class="box box-primary">

               <div class="box-header with-border">
                   <h3 class="box-title text-blue"><b>Ingresar Placa</b> </h3>
                   <!-- Button trigger modal -->
                  @can ('create', new \App\Entry)
                    <button type="button" class="btn btn-primary pull-right" data-toggle="modal" data-target="#exampleModal">
                      Ingresar Placa
                    </button>
                  @endcan
                    <!-- Modal -->
                    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h4 class="modal-title" id="exampleModalLabel">Ingresar Placa</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <div class="modal-body">


                            <form method="POST" action="{{route('daringreso.store')}}">
                              {{csrf_field()}}

                                  <div class="form-group">
                                      <label for="placa">Placa Vehículo:</label>
                                      <input type="text"   name="placa" value="{{old('placa')}}" maxlength="6" class="form-control" onkeyup="mayus(this);" required>
                                      <input type="hidden" name="direccion" value="null">
                                      <input type="hidden" name="comparendo" value="">
                                      <input type="hidden" name="color" value="null">
                                      <input type="hidden" name="marca" value="null">
                                      <input type="hidden" name="tipo" value="null">
                                      <input type="hidden" name="causal" value="null">
                                      <input type="hidden" name="servicio" value="null">
                                      <input type="hidden" name="grado" value="0">
                                      <input type="hidden" name="infraccion_id" value="0">
                                      <input type="hidden" name="rate_id" value="0">
                                      <input type="hidden" name="crane_id" value="0">
                                      <input type="hidden" name="motor" value="null">
                                      <input type="hidden" name="chasis" value="null">
                                      <input type="hidden" name="fisico" value="null">
                                      <input type="hidden" name="grua" value="null">
                                      <input type="hidden" name="recibe" value="{{ Auth::user()->name }}">
                                  </div>
                                    <button class="btn btn-primary btn-block"><i class="fa fa-plus"></i> Ingresar</button>
                             </form>


                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Salir</button>

                          </div>
                        </div>
                      </div>
                    </div>
               </div>

               <div class="box-body">


                   <table id="table"class="table table-bordered table-striped">
                     <thead>
                       <tr>
                         <th>NUI</th>
                         <th>Placa</th>

                         <th>Opciones</th>

                       </tr>
                     </thead>
                     <tbody>
                    @foreach($entries as $entry)
                      <tr>
                        <td>{{ $entry->id }}</td>
                        <td>{{ $entry->placa }}</td>
                        {{--@role('Ingreso')
                          <td><a href="{{route('entries.create', 'p='.$entry->placa)}}" class="btn btn-xs btn-success pull-right">Legalizar Vehículo</a></td>
                        @endrole--}}

                          {{--<td><a href="{{route('entries.edit', $entry)}}" class="btn btn-xs btn-success pull-right">Legalizar Vehículo</a></td>--}}
                          {{--<td><a href="{{route('entries.create', 'p='.$entry->placa.'&i='.$entry->id)}}" class="btn btn-xs btn-success pull-right">Legalizar Vehículo</a></td>--}}
                           <td>
                              @can('view', new \App\Entry)
                                <a href="{{route('entries.edit', $entry)}}" class="btn btn-xs btn-success pull-right">Legalizar Vehículo</a>
                              @endcan
                            </td>






                      </tr>
                  @endforeach
                     </tbody>
                  </table>


              </div>
          </div>

      </div>

    </div>

@endsection
@section('scripts')
      <script>
      function mayus(e) {
          e.value = e.value.toUpperCase();
          }
      </script>


@endsection
