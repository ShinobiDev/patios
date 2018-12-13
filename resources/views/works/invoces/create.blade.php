@extends('layouts.master')

@section('header')
  <h1>
      Crear Recibo Manual
  </h1>

  <ol class="breadcrumb">
    <li><a href="{{route('home')}}"><i class="fa fa-dashboard">  Inicio</i></a></li>
    <li class="active"><a href="{{route('owenrs.index')}}">Crear Recibo Manual</a></li>
    <li class="active">Crear Recibo Manual</li>
  </0l>
@endsection
@section('content')


    <div class="row">

        <div class="col-md-6">


            <div class="box box-primary">

              <div class="box-header with-border">
                <h3><i class="fa fa-pencil"></i> Crear Recibo Manual</h3>

             </div>

              <div class="box-body">

                {{--<form method="POST" action="{{route('invoces.store')}}">--}}
                  <form method="POST" action="{{route('transaccion.guardar')}}">
                  {{csrf_field()}}
                    @foreach ($valores as $valor)


                      <div class="form-group">
                          {{-- <label for="nombre">Nombre Propietario:</label> --}}
                          <input type="hidden" name="nombre" value="{{$valor->nombre}}" class="form-control">
                      </div>

                      <div class="form-group">
                          {{-- <label for="documento">Documento de Identidad:</label> --}}
                          <input type="hidden" name="documento" value="{{$valor->documento}}" class="form-control">
                      </div>

                      <div class="form-group">
                          {{-- <label for="telefono">Número Celular:</label> --}}
                          <input type="hidden" name="celular" value="{{$valor->celular}}" class="form-control">
                      </div>
                      <div class="form-group">
                          {{-- <label for="mail">Correo Electrónico</label> --}}
                          <input type="hidden" name="mail" value="{{$valor->mail}}" class="form-control">
                      </div>

                      <div class="form-group">
                          {{-- <label for="direccion">Dirección Residencia</label> --}}
                          <input type="hidden" name="direccion" value="{{$valor->direccion}}" class="form-control">
                      </div>
                      <div class="form-group">
                          <label for="fecha">Fecha pago</label>
                          <input id="Date" type="text" name="fecha_transaccion" value="{{old('fecha_transaccion')}}" class="form-control" required>
                      </div>
                      {{--<div class="form-group">
                          <label for="concepto">Concepto</label>
                          <input type="text" name="concepto" value="{{old('concepto')}}" class="form-control">
                      </div>--}}
                      <div class="form-group">
                        <select class="form-control select2" name="forma_de_pago" required>
                          <option value="">--- seleccione tipo de pago ---</option>
                          <option value="Efectivo">Efectivo</option>
                          <option value="Consignacion Davivienda">Consignación Davivienda</option>
                          <option value="Consignacion Banco Colombia">Consignación Banco Colombia</option>
                          <option value="Pago ITTB">Pago ITTB</option>
                        </select>
                      </div>

                      <div class="form-group">
                          <label for="concepto"># de pago entidad</label>
                          <input type="text" name="id_transaccion" value="{{old('id_transaccion')}}" class="form-control">
                      </div>

                      <div class="form-group">
                          <label for="valor_factura">Valor servicio</label>
                          <input type="text" name="valor_factura" value="{{old('valor_factura')}}" class="form-control">
                      </div>

                      <div class="form-group">
                        <label for="">Placa Vehículo</label>
                        <input class="form-control" type="text" name="placa" value="{{$valor->placa}} " disabled>
                      </div>
                      <div class="form-group">
                        <select class="form-control select2" name="estado" required>
                          <option value="">--- seleccione estado Recibo ---</option>
                          <option value="Generado">Generado</option>
                          <option value="Transito">Tránsito</option>
                        </select>
                      </div>
                      <input type="hidden" name="pdf" value="null">
                      <input type="hidden" name="elaborado" value="{{ Auth::user()->name }}" >
                      <input type="hidden" name="entries_id" value="{{ $valor->id }}" >
                      <input type="hidden" name="valor_stb" value="0" >
                      <input type="hidden" name="valor_ittb" value="0" >

                      {{-- <input type="hidden" name="pdf" value="null">
                      <input type="hidden" name="pdf" value="null"> --}}
                    @endforeach
                        <button class="btn btn-primary btn-block"><i class="fa fa-user-plus"></i> Crear Recibo</button>

                 </form>

              </div>

          </div>
        </div>
     </div>

@endsection
@section('scripts')
    <script>
        $(document).ready(function() {
          $('#Date').datepicker({

              autoclose: true,
              todayHighlight: true
          });

        });
    </script>
@endsection
