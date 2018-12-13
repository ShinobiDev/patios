@extends('layouts.master')

@section('header')
  <h1>
      Editar Patio
  </h1>

  <ol class="breadcrumb">
    <li><a href="{{route('home')}}"><i class="fa fa-dashboard">  Inicio</i></a></li>
    <li class="active"><a href="{{route('owenrs.index')}}">Patios</a></li>
    <li class="active">Editar Patios</li>
  </0l>
@endsection
@section('content')


    <div class="row">

        <div class="col-md-6">


            <div class="box box-primary">

              <div class="box-header with-border">
                <h3><i class="fa fa-pencil"></i>  Editar patios</h3>
          </div>

              <div class="box-body">

                    <form method="POST" action="{{route('owenrs.update', $owenr)}}">
                    {{csrf_field()}}
                    {{ method_field('PUT') }}

                        <div class="form-group">
                            <label for="nombre">Nombre:</label>
                            <input type="text" name="nombre" value="{{old('nombre',$owenr->nombre)}}" class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="documento">Documento de Identidad:</label>
                            <input type="text" name="documento" value="{{old('documento',$owenr->documento)}}" class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="mail">Correo Electrónico</label>
                            <input type="mail" name="mail" value="{{old('mail',$owenr->mail)}}" class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="telefono">Celular:</label>
                            <input type="text" name="celular" value="{{old('celular',$owenr->celular)}}" class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="direccion">Dirección:</label>
                            <input type="text" name="direccion" value="{{old('direccion',$owenr->direccion)}}" class="form-control">
                        </div>

                        <div class="form-group">
                             <input type="hidden" name="entries_id" value="{{old('direccion',$owenr->entry_id)}}" class="form-control">
                        </div>

                          <button class="btn btn-primary btn-block"><i class="fa fa-refresh"></i> Actualizar Propietario</button>

                   </form>

              </div>

          </div>
        </div>
     </div>

@endsection
