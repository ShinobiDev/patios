@extends('layouts.master')


@section('content')

    <div class="row">

        <div class="col-md-5">

          <div class="box box-primary">
            {{-- <img class="profile-user-img img-responsive img-circle" src="{{asset('admin-lte/dist/img/user4-128x128.jpg')}}" alt="{{$user->name}}"> --}}
            <div class="box-header with-border">
              <h3 class="profile-username text-center"><b class="text-red">Información del ingreso a PATIOS del vehículo</b></h3>
            </div>

            <div class="box-body">
                <ul class="list-group list-group-unbordered" >
                      <li class="list-group-item">
                        <b>Placa</b> <a class="pull-right"><b><h4>{{$entry->placa}}</h4></b></a>
                      </li>
                      <li class="list-group-item">
                        <b>Inmovilizado en:</b> <a class="pull-right">{{$entry->direccion}}</a>
                      </li>
                      <li class="list-group-item">
                          <b>Causal de Inmovilización</b> <a class="pull-right">{{$entry->causal}}</a>
                      </li>
                      <li class="list-group-item">
                        <b>Comparendo Nº: </b> <a class="pull-right">{{$entry->comparendo}}</a>
                      </li>
                      <li class="list-group-item">
                        <b>Días de sanción </b> <a class="pull-right">{{$entry->grado}}</a>
                      </li>
                      <li class="list-group-item">
                        <b>Vehículo</b> <a class="pull-right">{{$entry->tipo}}</a>
                      </li>
                      <li class="list-group-item">
                        <b>No.servicio Grúa</b> <a class="pull-right">{{$entry->crane_id}}</a>
                      </li>
                      <li class="list-group-item">
                        <b>No.servicio parqueadero</b> <a class="pull-right">{{$entry->rate_id}}</a>
                      </li>

                      <li class="list-group-item">
                        <b>Tipo Servicio</b> <a class="pull-right">{{$entry->servicio}}</a>
                      </li>
                      <li class="list-group-item">
                        <b>Registrado por:</b> <a class="pull-right">{{$entry->recibe}}</a>
                      </li>
                      <li class="list-group-item">
                        <b> Número Motor</b> <a class="pull-right">{{ $entry->motor }}</a>
                      </li>
                      <li class="list-group-item">
                        <b> Número Chasis</b> <a class="pull-right">{{ $entry->chasis }}</a>
                      </li>
                      <li class="list-group-item">
                        <b> Inventario Fisico</b> <a class="pull-right">{{ $entry->fisico }}</a>
                      </li>
                      <li class="list-group-item">
                        <b> Fecha registro:</b> <a class="pull-right">{{ date_format($entry->created_at, 'g:ia \o\n l jS F Y') }}</a>
                      </li>
                </ul>

             <a href="{{route('entries.edit', $entry)}}" class="btn btn-primary btn-block"><b><i class="fa fa-pencil"></i> Editar</b></a>
          </div>
        </div>
        </div>

        <div class="col-md-3">
             <div class="box box-primary">

                 <div class="box-header with-border">
                     <h3 class="box-title text-blue"><b>Inventario</b> </h3>
                 </div>

                 <div class="box-body">


                    <table id="table"class="table table-bordered table-striped">
                       <thead>
                         <tr>
                           <th>Nombre</th>
                           <th>Estado</th>
                         </tr>
                       </thead>
                       <tbody>
                      @forelse($inventaries as $inventary)
                        <tr>
                          <td>{{ $inventary->title }}</td>
                          <td>{{ $inventary->opcion }}</td>
                        </tr>
                      @empty
                        <label for="tipo">Seleccionar inventario para:</label>
                        <br><br>

                          <b><i style="font-size:25px" class="fa fa-car text-blue"> </i>  </b> &nbsp; &nbsp; <input id="carro" type="radio" name="tipo" value="carro"> &nbsp; &nbsp;
                          <b><i style="font-size:25px;" class="fa fa-motorcycle text-blue"></i> </b>&nbsp; &nbsp; <input id="moto" type="radio" name="tipo" value="moto">

                        <div id="carros" >
                            @include('works.entries.carro')
                        </div>

                        <div id="motos">
                          @include('works.entries.moto')
                        </div>
                      @endforelse
                       </tbody>

                    </table>
                    @if(count($inventaries) > 0)
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                          Cambiar
                        </button>
                        <!--aqui va la ventana modal-->
                        @include('works.entries.ventana_modal_inventario')
                        <!--/aqui va la ventana modal-->
                    @endif

                </div>
            </div>

        </div>


       <div class="col-md-3">
            <div class="box box-primary">

                <div class="box-header with-border text-center">
                    <h3 class="box-title text-blue"><b>Asignar ubicación del parqueadero</b> </h3>
                </div>

                <div class="box-body">
                  <ul class="list-group list-group-unbordered">
                        <li class="list-group-item text-center">
                           <h3 class="text-green">
                               @forelse ($asignars as $asig)
                                      <i class="fa fa-map-o text-red"></i> => {{ $asig->nombre }} ->
                                        {{$asig->seccion}} ->
                                        {{$asig->rango}} <br>
                         </li>
                         <a href="{{route('asignars.edit',$asig->id)}}" class="btn btn-success btn-block ">  <i class="fa fa-edit"> Reubicar</i></a>
                                @empty
                                  <form method="POST" action="{{route('asignars.store')}}">
                                    {{csrf_field()}}
                                          <div class="form-group dynamic">
                                            <label for="">Seleccione Patio </label>
                                              <select class="form-control " name="nombre" id="yards" require>
                                                  <option value="" disable='true' selected='true'>===Seleccione Patio====</option>
                                                  @foreach ($yards as $key => $value)
                                                      <option value="{{$value->id}}">{{$value->nombre}}</option>
                                                  @endforeach
                                              </select>
                                          </div>

                                          <div class="form-group">
                                            <label for="">Seleccione Sección </label>

                                              <select class="form-control" name="seccion" id="seccion" require>
                                                  <option value="" disable='true' selected='true'>===Seleccione Sección====</option>
                                              </select>

                                          </div>

                                          <div class="form-group">
                                            <label for="">Seleccione Número </label>

                                              <select class="form-control" name="rango" id="rango" require>
                                                  <option value="" disable='true' selected='true'>===Seleccione Número====</option>
                                              </select>

                                          </div>

                                          <input type="hidden" name="entries_id" value="{{$entry->id}}">

                                          <button class="btn btn-primary btn-block"><i class="fa fa-plus"></i> Asignar</button>

                                   </form>
                         </li>
                                @endforelse
                            </h3>
                    </ul>
              </div>
          </div>
       </div>


      <div class="col-md-3">
           <div class="box box-primary">

               <div class="box-header with-border">
                   <h3 class="box-title text-blue"><b>Propietario 0 Infractor</b> </h3>
               </div>

               <div class="box-body">

               @forelse ($owenrs as $owenr)
                 <ul class="list-group list-group-unbordered">
                       <li class="list-group-item">
                         <b>Nombre:</b> <a class="pull-right"><b><h4>{{$owenr->nombre}}</h4></b></a>
                       </li>
                       <li class="list-group-item">
                         <b>Documento Ident:</b> <a class="pull-right">{{$owenr->documento}}</a>
                       </li>
                       <li class="list-group-item">
                         <b>Celular: </b> <a class="pull-right">{{$owenr->celular}}</a>
                       </li>
                       <li class="list-group-item">
                         <b>Correo:</b> <a class="pull-right">{{$owenr->mail}}</a>
                       </li>
                       <li class="list-group-item">
                         <b>Dirección:</b> <a class="pull-right">{{$owenr->direccion}}</a>
                       </li>

                 </ul>
               @empty
                <div class="form-group">
                          
                          <b></b>&nbsp; &nbsp; <input id="" type="radio" name="propietario" value="crear" checked>Crear                           
                          <b></b> &nbsp; &nbsp; <input id="" type="radio" name="propietario" value="buscar" >Buscar
                          &nbsp; &nbsp;
                </div>
                 <form method="POST" action="{{route('owenrs.store')}}" id="formCrear">
                   {{csrf_field()}}
                        
                        <div class="form-group">
                           <label for="nombre">Infractor / Propietario:</label>
                           <select class="form-control select2" name="tipo_propi">
                             <option value="">---Seleccione opción---</option>
                             <option value="Infractor">Infractor</option>
                             <option value="Propietario">Propietario</option>
                           </select>
                       </div>
                       <div class="form-group">
                           <label for="nombre">Nombre Propietario:</label>
                           <input type="text" name="nombre" value="{{old('nombre')}}" class="form-control">
                       </div>

                       <div class="form-group">
                           <label for="documento">Documento de Identidad:</label>
                           <input type="text" name="documento" value="{{old('documento')}}" class="form-control">
                       </div>

                       <div class="form-group">
                           <label for="telefono">Número Celular:</label>
                           <input type="text" name="celular" value="{{old('celular')}}" class="form-control">
                       </div>
                       <div class="form-group">
                           <label for="mail">Correo Electrónico:</label>
                           <input type="mail" name="mail" value="{{old('mail')}}" class="form-control">
                       </div>

                       <div class="form-group">
                           <label for="direccion">Dirección Residencia:</label>
                           <input type="text" name="direccion" value="{{old('direccion')}}" class="form-control">
                       </div>

                       <div class="form-group">
                            <input type="hidden" name="entries_id" value="{{ $entry->id }}" class="form-control">
                       </div>

                         <button class="btn btn-primary btn-block"><i class="fa fa-user-plus"></i> Crear Propietario/Infractor</button>

                </form>
                <form method="POST" action="{{route('owenrs.store')}}" id="formCrear1">
                   {{csrf_field()}}
                        
                        <div class="form-group">
                           <label for="nombre">Infractor / Propietario:</label>
                           <select class="form-control select2" name="tipo_propi">
                             <option value="">---Seleccione opción---</option>
                             <option value="Infractor">Infractor</option>
                             <option value="Propietario">Propietario</option>
                           </select>
                       </div>
                       

                       <div class="form-group">
                           <label for="documento">Documento de Identidad:</label>
                           <select id="selPropietario" class="form-control select2" name="documento">
                             <option value="">--Selecciona una opción--</option>
                             @foreach($list_own as $lo)
                                <option value="{{$lo->documento}}">{{$lo->documento }}</option>
                             @endforeach
                           </select>
                       </div>
                       <div class="form-group">
                           <label for="nombre">Nombre Propietario:</label>
                           <input type="text" id="txtnombrepropietario" name="nombre" value="{{old('nombre')}}" class="form-control">
                       </div>

                       <div class="form-group">
                           <label for="telefono">Número Celular:</label>
                           <input type="text" id="txtcelpropietario" name="celular" value="{{old('celular')}}" class="form-control">
                       </div>
                       <div class="form-group">
                           <label for="mail">Correo Electrónico:</label>
                           <input type="mail" id="txtmailpropietario" name="mail" value="{{old('mail')}}" class="form-control">
                       </div>

                       <div class="form-group">
                           <label for="direccion">Dirección Residencia:</label>
                           <input type="text" id="txtdirpropietario" name="direccion" value="{{old('direccion')}}" class="form-control">
                       </div>

                       <div class="form-group">
                            <input type="hidden" name="entries_id" value="{{ $entry->id }}" class="form-control">
                       </div>

                         <button class="btn btn-primary btn-block"><i class="fa fa-user-plus"></i> Crear Propietario/Infractor</button>

                  </form>
               @endforelse

              </div>
          </div>
      </div>
      </div>
@endsection

@section('scripts')


<script type="text/javascript">
// scrip par select dinamico de seccion
  $('#yards').on('change', function(e) {
      console.log(e);
      var yard_id =e.target.value;
      $.get('{{config("app.url")}}'+'/json-seccion?yard_id='+yard_id, function(data){
        $('#seccion').empty();
        $('#seccion').append('<option value="0" disable="true" selected="true">===Seleccione Sección====</option>');
        $('#rango').empty();
        $('#rango').append('<option value="0" disable="true" selected="true">===Seleccione Número====</option>');

        $.each(data, function(index, seccionObj){
          $('#seccion').append('<option value="'+seccionObj.id+'">'+seccionObj.seccion+'</option>')
        });

      });
  });


// scrip par select dinamico de Rango
  $('#seccion').on('change', function(e) {
      console.log(e);
      var seccion_id =e.target.value;
      $.get('{{config("app.url")}}'+'/json-rango?seccion_id='+seccion_id, function(data){
        $('#rango').empty();
        $('#rango').append('<option value="0" disable="true" selected="true">===Seleccione Número====</option>');

        $.each(data, function(index, rangoObj){
          $('#rango').append('<option value="'+rangoObj.id+'">'+rangoObj.rango+'</option>')
        });

      });
  });


$(document).ready(function() {

$('#carros').css("display", "none");
$('#motos').css("display", "none");
$('#formCrear1').css("display", "none");
  $("input[name=tipo]").change(function () {
      if($(this).val()=='carro'){
        $('#motos').css("display", "none");
        $('#carros').css("display", "block");
      }else{
        $('#motos').css("display", "block");
        $('#carros').css("display", "none");
      }
      

    });

$("input[name=propietario]").change(function () {
      if($(this).val()=='crear'){
          $('#formCrear1').css("display", "none");
          $('#formCrear').css("display", "block");
      }else if($(this).val()=='buscar'){
          $('#formCrear').css("display", "none");
          $('#formCrear1').css("display", "block");
      }
});
  
    

    $(".btnbueno").click(function(){
        $(".bueno").prop("checked", true);
        $(".btnbueno").addClass('btn-success')
        $(".btnregular").removeClass('btn-success')
        $(".btnmalo").removeClass('btn-success')
        $(".btnna").removeClass('btn-success')


    });
    $(".btnregular").click(function(){
        $(".regular").prop("checked", true);
        $(".btnregular").addClass('btn-success')
        $(".btnbueno").removeClass('btn-success')
        $(".btnmalo").removeClass('btn-success')
        $(".btnna").removeClass('btn-success')

    });
    $(".btnmalo").click(function(){
        $(".malo").prop("checked", true);
        $(".btnmalo").addClass('btn-success')
        $(".btnbueno").removeClass('btn-success')
        $(".btnregular").removeClass('btn-success')
        $(".btnna").removeClass('btn-success')
    });

    $(".btnbuenos").click(function(){
        $(".buenos").prop("checked", true);
        $(".btnbuenos").addClass('btn-success')
        $(".btnregulars").removeClass('btn-success')
        $(".btnmalos").removeClass('btn-success')
        $(".btnna").removeClass('btn-success')


    });
    $(".btnregulars").click(function(){
        $(".regulars").prop("checked", true);
        $(".btnregulars").addClass('btn-success')
        $(".btnbuenos").removeClass('btn-success')
        $(".btnmalos").removeClass('btn-success')
        $(".btnna").removeClass('btn-success')

    });
    $(".btnmalos").click(function(){
        $(".malos").prop("checked", true);
        $(".btnmalos").addClass('btn-success')
        $(".btnbuenos").removeClass('btn-success')
        $(".btnregulars").removeClass('btn-success')
        $(".btnna").removeClass('btn-success')
    });
    $(".btnna").click(function(){
        $(".noaplica").prop("checked", true);
        $(".btnna").addClass('btn-success')
        $(".btnbuenos").removeClass('btn-success')
        $(".btnregulars").removeClass('btn-success')
        $(".btnmalos").removeClass('btn-success')
    });

  

});
</script>
<script type="text/javascript">

  $(document).ready(function() {
      $(".btnbuenoventana").click(function(){
        $(".buenosventana").prop("checked", true);
        $(".btnbuenosventana").addClass('btn-success')
        $(".btnregularsventana").removeClass('btn-success')
        $(".btnmalosventana").removeClass('btn-success')
        $(".btnnoaplicaventana").removeClass('btn-success')
        

      });
      $(".btnregularventana").click(function(){
            $(".regularsventana").prop("checked", true);
            $(".btnregularsventana").addClass('btn-success')
            $(".btnbuenosventana").removeClass('btn-success')
            $(".btnmalosventana").removeClass('btn-success')
            $(".btnnoaplicaventana").removeClass('btn-success')

      });
      $(".btnmaloventana").click(function(){
            $(".malosventana").prop("checked", true);
            $(".btnmalosventana").addClass('btn-success')
            $(".btnbuenosventana").removeClass('btn-success')
            $(".btnregularsventana").removeClass('btn-success')
            $(".btnnoaplicaventana").removeClass('btn-success')
      });
      $(".btnnoaplicaventana").click(function(){
            $(".noaplica").prop("checked", true);
            $(".btnnoaplicaventana").addClass('btn-success')
            $(".btnbuenosventana").removeClass('btn-success')
            $(".btnregularsventana").removeClass('btn-success')
            $(".btnmalosventana").removeClass('btn-success')
      });


      $('#selPropietario').on('change', function(e) {
              console.log(e);
              var cc =e.target.value;
              $.get('{{config("app.url")}}/json-propietario?doc='+cc, function(data){
                console.log(data);
                $('#txtnombrepropietario').val(data.nombre);
                $('#txtcelpropietario').val(data.celular);
                $('#txtmailpropietario').val(data.mail);
                $('#txtdirpropietario').val(data.direccion);
                
              });
      });
      
  });

</script>

@endsection
