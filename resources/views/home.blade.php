@extends('layouts.master')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-container">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{-- <iframe src="https://es.calcuworld.com/calendarios/calculadora-de-tiempo-entre-dos-fechas/?iframe=1" width="100%" height="400"></iframe> --}}

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
