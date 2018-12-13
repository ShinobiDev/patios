<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head><meta http-equiv="Content-Type" content="text/html; charset=gb18030">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'PatiosApp') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <style media="screen">
        body{
          background-image: url('http://consorciostb.com/wp-content/uploads/2018/04/Diapositiva2STB.jpg');
          background-repeat: no-repeat, repeat;
          background-size: cover;
        }
    </style>

<body>
    <div id="app">
        <nav class="navbar navbar-default navbar-static-top">
            <div class="container">
                <div class="navbar-header">

                    <!-- Collapsed Hamburger -->
                    {{-- <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse" aria-expanded="false">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button> --}}

                    <!-- Branding Image -->
                    <a class="navbar-brand" href="{{ url('/') }}">
                        {{ config('app.name', 'Laravel') }}
                    </a>
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">
                        &nbsp;
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        @guest
                            {{-- <li><a href="" data-toggle="modal" data-target="#exampleModal">Iniciar Sesión</a></li> --}}

                        @else
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu">
                                    <li>
                                        <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Salir
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>
        @include('partials.error')
        @include('partials.errores')
        @include('partials.success')

        <div class="col-md-8 col-md-offset-2" >
            <div class="row">

                <div class="col-md-6 col-md-offset-2">

                            <div class="panel-heading text-center text-black"><h1>CONSULTAR VALOR A PAGAR</h1></div>

                              <div class="panel-body ">
                                <form class="form-horizontal" method="POST" action="{{ route('buscar.store') }}">
                                    {{ csrf_field() }}

                                    <div class="form-group">
                                        <label for="buscar" class="col-md-4 control-label text-black">Número de Placa </label>

                                        <div class="col-md-6">
                                            <input id="buscar" type="text" maxlength="6" class="form-control" name="buscar" onkeyup="mayus(this);" required autofocus placeholder="Utilizar en MAYUSCULAS">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="col-md-6 col-md-offset-4">
                                            <button type="submit" class="btn btn-success btn-block">
                                                Buscar Placa
                                            </button>


                                        </div>
                                    </div>
                                </form>
                              </div>
                </div>

                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                    Iniciar sesión
                </button>
            </div>

<!-- Modal -->
              <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h1 class="modal-title text-center" id="exampleModalLabel">Iniciar Sesión </h1>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <div class="modal-body">
                            {{-- <div  class="  col-md-10 col-md-offset-3"> --}}




                            <div class="panel-body ">
                              <form class="form-horizontal" method="POST" action="{{ route('login') }}">
                                  {{ csrf_field() }}

                                  <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                      <label for="email" class="col-md-4 control-label">E-Mail </label>

                                      <div class="col-md-6">
                                          <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>

                                          @if ($errors->has('email'))
                                              <span class="help-block">
                                                  <strong>{{ $errors->first('email') }}</strong>
                                              </span>
                                          @endif
                                      </div>
                                  </div>

                                  <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                      <label for="password" class="col-md-4 control-label">Clave</label>

                                      <div class="col-md-6">
                                          <input id="password" type="password" class="form-control" name="password" required>

                                          @if ($errors->has('password'))
                                              <span class="help-block">
                                                  <strong>{{ $errors->first('password') }}</strong>
                                              </span>
                                          @endif
                                      </div>
                                  </div>

                                  <div class="form-group">
                                      <div class="col-md-6 col-md-offset-4">
                                          <div class="checkbox">
                                              <label>
                                                  <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Recordarme
                                              </label>
                                          </div>
                                      </div>
                                  </div>

                                  <div class="form-group">
                                      <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                      <div class="col-md-6 col-md-offset-4">
                                          <button type="submit" class="btn btn-primary btn-block">
                                              Iniciar
                                          </button>

                                          <a class="btn btn-link" href="{{ route('password.request') }}">
                                              Olvide Mi contraseña?
                                          </a>
                                      </div>
                                  </div>
                              </form>
                          </div>

                        {{-- </div> --}}
                      </div>
                      <div class="modal-footer">
                      </div>
                    </div>
                  </div>
                </div>
        </div>


    </div>



    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    <script>

    function mayus(e) {
        e.value = e.value.toUpperCase();
        }

    </script>

</body>
</html>
