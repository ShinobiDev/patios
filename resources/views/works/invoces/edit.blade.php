@extends('layouts.master')

@section('header')
  <h1>
      Cambiar Estado de Recibos
  </h1>

  <ol class="breadcrumb">
    <li><a href="{{route('home')}}"><i class="fa fa-dashboard">  Inicio</i></a></li>
    <li class="active"><a href="{{route('servicios.index')}}">Facturas</a></li>
    <li class="active">Cambiar Estado de Recibos</li>
  </0l>
@endsection
@section('content')


    <div class="row">

        <div class="col-md-6">


            <div class="box box-primary">

              <div class="box-header with-border">
                <h3><i class="fa fa-pencil"></i>  Cambiar Estado de Recibos</h3>
          </div>

              <div class="box-body">

                  <form method="POST" action="{{route('invoces.update',$invoce)}}">

                    {{csrf_field()}} {{method_field('PUT')}}

                        <div class="form-group">

                          <select class="form-control" name="estado" required>
                              <option value="">---Seleccione opcion---</option>
                              <option value="Generado">Generado</option>
                              <option value="Anulado">Anulado</option>
                          </select>
                        </div>



                          <button class="btn btn-primary btn-block"><i class="fa fa-plus"></i> Cambiar estado</button>

                   </form>

              </div>

          </div>
        </div>
     </div>

@endsection
