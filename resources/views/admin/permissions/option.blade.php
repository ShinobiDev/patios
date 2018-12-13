<table class="table">
  <thead>
    <th>Modelo</th>
    <th>Ver</th>
    <th>Crate</th>
    <th>Editar</th>
    <th>Eliminar</th>
  </thead>
  <tbody>
      
      {{--@php
        $limite=4;
        $j=1;
        $fin=count($permissions);
        
      @endphp
      <tr>
      @foreach ($permissions as $id => $name)  
        
          @if($j < $limite)
              @if($j==1)
                @if(count(explode(" ",$name))==2)
                  <td> {{ explode(" ",$name)[1] }} </td>  
                  @if(auth()->user()->hasPermissionTo($name))
                      <td> <input type="checkbox" name="permissions[]" value='{{$name}}' checked> {{$name}}</td>  
                  @else
                      <td> <input type="checkbox" name="permissions[]" value='{{$name}}' > {{$name}} </td>  
                  @endif
                @else
                  <td> {{explode(" ",$name)[1] . explode(" ",$name)[2] }}</td>                      
                  @if(auth()->user()->hasPermissionTo($name))
                      <td> <input type="checkbox" name="permissions[]" value='{{$name}}' checked> {{$name}}</td>  
                  @else
                      <td> <input type="checkbox" name="permissions[]" value='{{$name}}' > {{$name}} </td>  
                  @endif
                @endif                
                
              @else

                @if(auth()->user()->hasPermissionTo($name))

                    <td> <input type="checkbox" name="permissions[]" value='{{$name}}' checked> {{$name}}</td>  
                @else
                    <td> <input type="checkbox" name="permissions[]" value='{{$name}}' > {{$name}} </td>  
                @endif

              @endif

              
              @php
                $j++
              @endphp
          @else
              @php
                $j=1
              @endphp
               @if(auth()->user()->hasPermissionTo($name))
                    <td> <input type="checkbox" name="permissions[]" value='{{$name}}' checked> {{$name}}</td>  
                @else
                    <td> <input type="checkbox" name="permissions[]" value='{{$name}}' >{{$name}}  </td>  
                @endif
              </tr>

              @if($id < $fin)
                <tr>
              @endif
              
          @endif
        
      @endforeach--}}

  </tbody>
</table>
{{--var_dump(count($permissions))--}}
@foreach ($permissions as $id => $name)

        <div class="checkbox">
            <label>
              <input type="checkbox" name="permissions[]" value="{{$name}}"
                {{$model->permissions->contains($id)
                  || collect( old( 'permissions' ))->contains($name) ?  'checked' : ''}}>
                {{$name}}
            </label>
        </div>

@endforeach


