<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Inventario</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

          <label for="tipo">Seleccionar inventario para:</label>
          <form method="POST" action="{{route('inventaries.editarinventario', $entry->id)}}">
            {{csrf_field()}}
              @if($entry->tipo=="MOTOCICLETA" || $entry->tipo=="MOTOCARRO" || $entry->tipo=="MOTOTRICICLO" || $entry->tipo=="CUATRIMOTO" || $entry->tipo=="CICLOMOTOR" || $entry->tipo=="TRICIMOTO" || $entry->tipo=="CUATRIMOTO" || $entry->tipo=="BICICLETA" )
                <div >
                  <h3 class="text-red">Motocicletas</h3>

                  <button type="button" class="btnmalos pull-right">Malo</button>
                  <button type="button" class="btnregulars pull-right">Regular</button>
                  <button type="button" class="btnbuenos pull-right">Bueno</button>
                  <br><hr>

                  
                    
                     @foreach($inventaries as $key => $inventary)
                      <div class="">
                      <label for='carenaje'>{{$key+1}}. {{$inventary->title}} &nbsp; &nbsp;</label>
                      <span style="float:right">
                          
                          @switch($inventary->opcion)
                              @case('Bueno')
                                    <input type="radio" name="{{$inventary->title}}" id="{{$inventary->title}}1" value="Bueno" class="buenosventana" checked> Bueno
                                    <input type="radio" name="{{$inventary->title}}" id="{{$inventary->title}}2" value="Regular" class="regularsventana" > Regular
                                    <input type="radio" name="{{$inventary->title}}" id="{{$inventary->title}}3" value="Malo" class="malosventana" > Malo
                                  @break

                              @case('Regular')
                                  <input type="radio" name="{{$inventary->title}}" id="{{$inventary->title}}1" value="Bueno" class="buenosventana" > Bueno
                                    <input type="radio" name="{{$inventary->title}}" id="{{$inventary->title}}2" value="Regular" class="regularsventana" checked> Regular
                                    <input type="radio" name="{{$inventary->title}}" id="{{$inventary->title}}3" value="Malo" class="malosventana" > Malo
                                  @break

                              @case('Malo')
                                   <input type="radio" name="{{$inventary->title}}" id="{{$inventary->title}}1" value="Bueno" class="buenosventana" > Bueno
                                    <input type="radio" name="{{$inventary->title}}" id="{{$inventary->title}}2" value="Regular" class="regularsventana"> Regular
                                  <input type="radio" name="{{$inventary->title}}" id="{{$inventary->title}}3" value="Malo" class="malosventana" checked> Malo
                                  @break
                              @default
                                  <span>Debes agregar el estado</span>  
                          @endswitch                                                                                      
                      </span>
                    </div>                              
                    @endforeach                                
                  
                </div>
                
              @else
                <div >
                  <h3 class="text-red">Carro</h3>
                  <button type="button" class="btnmaloventana pull-right">Malo</button>
                  <button type="button" class="btnregularventana pull-right">Regular</button>
                  <button type="button" class="btnbuenoventana pull-right">Bueno</button>
                  <br><hr>
                     @foreach($inventaries as $key => $inventary)
                      <div class="">
                      <label for='carenaje'>{{$key+1}}. {{$inventary->title}} &nbsp; &nbsp;</label>
                      <span style="float:right">
                          
                          @switch($inventary->opcion)
                              @case('Bueno')
                                    <input type="radio" name="{{$inventary->title}}" id="{{$inventary->title}}1" value="Bueno" class="buenosventana" checked> Bueno
                                    <input type="radio" name="{{$inventary->title}}" id="{{$inventary->title}}2" value="Regular" class="regularsventana" > Regular
                                    <input type="radio" name="{{$inventary->title}}" id="{{$inventary->title}}3" value="Malo" class="malosventana" > Malo
                                  @break

                              @case('Regular')
                                  <input type="radio" name="{{$inventary->title}}" id="{{$inventary->title}}1" value="Bueno" class="buenosventana" > Bueno
                                    <input type="radio" name="{{$inventary->title}}" id="{{$inventary->title}}2" value="Regular" class="regularsventana" checked> Regular
                                    <input type="radio" name="{{$inventary->title}}" id="{{$inventary->title}}3" value="Malo" class="malosventana" > Malo
                                  @break

                              @case('Malo')
                                   <input type="radio" name="{{$inventary->title}}" id="{{$inventary->title}}1" value="Bueno" class="buenosventana" > Bueno
                                    <input type="radio" name="{{$inventary->title}}" id="{{$inventary->title}}2" value="Regular" class="regularsventana"> Regular
                                  <input type="radio" name="{{$inventary->title}}" id="{{$inventary->title}}3" value="Malo" class="malosventana" checked> Malo
                                  @break
                              @default
                                  <span>Debes agregar el estado</span>  
                          @endswitch
                          
                          
                          
                      </span>
                    </div>                              
                    @endforeach  
                                           
                </div>
              @endif  
               <div class="modal-body">
                  <button id="btnActualizarInventario" type="submit" class="btn btn-primary">Guardar cambios</button>
               </div>
           </form>         
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        
      </div>
    </div>
  </div>
</div>
<script type="text/javascript">
    /*$('#btnActualizarInventario').on('click', function(e) {
      console.log(e);
      var seccion_id =e.target.value;
      $.post('{{config("app.url")}}'+'/json-rango?seccion_id='+seccion_id, function(data){
        $('#rango').empty();
        $('#rango').append('<option value="0" disable="true" selected="true">===Seleccione Número====</option>');

        $.each(data, function(index, rangoObj){
          $('#rango').append('<option value="'+rangoObj.id+'">'+rangoObj.rango+'</option>')
        });

      });
  });*/
</script>