@extends('layouts.master')

@section('header')
  <h1>
      Editar Patio
  </h1>

  <ol class="breadcrumb">
    <li><a href="{{route('home')}}"><i class="fa fa-dashboard">  Inicio</i></a></li>
    <li class="active"><a href="{{route('yards.index')}}">Patios</a></li>
    <li class="active">Editar Patios</li>
  </0l>
@endsection
@section('content')


    <div class="row">

        <div class="col-md-6">


            <div class="box box-primary">

              <div class="box-header with-border">
                <h3><i class="fa fa-pencil"></i>  Editar Seciones de patios</h3>
          </div>

              <div class="box-body">

                    <form method="POST" action="{{route('sections.update', $section)}}">
                    {{csrf_field()}}
                    {{ method_field('PUT') }}

                        <div class="form-group">
                            <label for="seccion">seccion:</label>
                            <input type="text" name="seccion" value="{{old('seccion',$section->seccion)}}" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="rango">Rango de la Sección:</label>
                            <input type="text" name="rango" value="{{old('direccion',$section->rango)}}" class="form-control">
                            <input type="hidden" name="yard_id" value="{{$section->yard_id}}">
                        </div>

                          <button class="btn btn-primary btn-block"><i class="fa fa-refresh"></i> Actualizar sección</button>

                   </form>

              </div>

          </div>
        </div>
     </div>

@endsection
