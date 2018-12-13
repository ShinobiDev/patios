@extends('layouts.master')

@section('header')
@endsection
@section('content')


    <div class="row">

        <div class="col-md-6">


            <div class="box box-primary">

              <div class="box-header with-border">
                <h3><i class="fa fa-pencil"></i>  Ingresar Pendientes</h3>
              </div>

              <div class="box-body">

                  <form method="POST" action="{{route('entries.pendientes',$entry)}}">
                    {{csrf_field()}} {{method_field('PUT')}}

                        <div class="form-group">
                            <label for="placa">Placa Vehículo:</label>
                            <input type="text" name="placa" value="{{old('placa', $entry->placa)}}" maxlength="6"class="form-control" onkeyup="mayus(this);" disabled >
                        </div>



                        @if ($entry->comparendo=='')
                          <div class="form-group">
                              <label for="comparendo">Nº Comparendo:</label>
                              <input type="text" name="comparendo" value="{{old('comparendo', $entry->comparendo)}}" id="compa" maxlength="20" minlength="20"class="form-control">
                          </div>



                        <div class="form-group">
                            <label for="motor">Número Motor</label>
                            <input type="text" name="motor" value="{{old('motor',$entry->motor)}}" class="form-control" >
                        </div>

                        <div class="form-group">
                            <label for="chasis">Número Chasis</label>
                            <input type="text" name="chasis" value="{{old('chasis', $entry->chasis)}}" class="form-control" >
                        </div>
                        @else


                        <div class="form-group">
                            <label for="motor">Número Motor</label>
                            <input type="text" name="motor" value="{{old('motor',$entry->motor)}}" class="form-control" >
                        </div>

                        <div class="form-group">
                            <label for="chasis">Número Chasis</label>
                            <input type="text" name="chasis" value="{{old('chasis', $entry->chasis)}}" class="form-control" >
                        </div>
                        @endif



                          <button class="btn btn-primary btn-block"><i class="fa fa-plus"></i> Actualizar Ingreso</button>

                   </form>

              </div>
          </div>
        </div>
     </div>

@endsection
@section('scripts')



@endsection
