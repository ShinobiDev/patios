<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>AppPatios  </title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <link rel="stylesheet" href="{{asset('css/app.css')}}">
  <link rel="stylesheet" href="{{asset('font-awesome/css/font-awesome.css')}}">
  <link rel="stylesheet" href="{{asset('admin-lte/plugins/datatables/jquery.dataTables.css')}}">
  <link rel="stylesheet" href="{{asset('admin-lte/plugins/datepicker/datepicker3.css')}}">
  <link rel="icon" type="image/png" href="img/logoAvatar.png" />
  <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->

  @yield('head')
</head>
<body class="hold-transition skin-blue sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">

  @if (session('status'))
      <div class="alert alert-success">
          {{ session('status') }}
      </div>
  @endif

  <header class="main-header">
    <!-- Logo -->
    <a href="{{route('home')}}" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>A</b>PP</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>App</b>Patios</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">

          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="{{asset('img/logoAvatar.png')}}" class="user-image" alt="User Image">
              <span class="hidden-xs">{{ Auth::user()->name }}</span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="{{asset('img/logoAvatar.png')}}" class="img-circle" alt="User Image">

                <p>
                    {{ Auth::user()->name }} -{{auth()->user()->getRoleDisplayNames()}}
                  <small>Desde {{auth()->user()->created_at->format('d/m/y') }}</small>
                </p>
              </li>
              <!-- Menu Body -->

              <!-- Menu Footer-->
              <li class="user-footer">

                <div class="">
                  <a class="btn btn-default btn-block" href="{{ route('logout') }}"
                      onclick="event.preventDefault();
                               document.getElementById('logout-form').submit();">
                      Cerrar Sesión
                  </a>
                  <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                      {{ csrf_field() }}
                  </form>
                </div>
              </li>
            </ul>
          </li>
          <!-- Control Sidebar Toggle Button -->
          {{-- <li>
            <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
          </li> --}}
        </ul>
      </div>
    </nav>
  </header>

  <!-- =============================================== -->

  <!-- Left side column. contains the sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="{{asset('img/logoAvatar.png')}}" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>{{ Auth::user()->name }} <span class="caret"></span></p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <!-- search form -->
      {{-- <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Buscar...">
          <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form> --}}
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      @include('partials.nav')
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- =============================================== -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">

      @yield('header')
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
       <div class="box">

         {{-- <div class="box-header with-border">
          <h3 class="box-title">Title</h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                    title="Collapse">
              <i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fa fa-times"></i></button>
          </div>
        </div> --}}
        <div class="box-body">
          {{-- Pace loading works automatically on page. You can still implement it with ajax requests by adding this js:
          <br/><code>$(document).ajaxStart(function() { Pace.restart(); });</code>
          <br/>
          <div class="row">
            <div class="col-xs-12 text-center">
              <button type="button" class="btn btn-default btn-lrg ajax" title="Ajax Request">
                <i class="fa fa-spin fa-refresh"></i>&nbsp; Get External Content
              </button>
            </div>
          </div>
          <div class="ajax-content">
          </div> --}}
          @include('partials.error')
          @include('partials.errores')
          @include('partials.success')

          @yield('content')
        </div>
        <!-- /.box-body -->
        <div class="box-footer text-center">
          <div class="pull-right hidden-xs">
            <b>Version</b> 1.0
          </div>
                  <center>
                      <a href="http://prismaweb.co/diseno-a-la-medida/" target="_blank" >Desarrollado por: </a>
                      <a href="http://prismaweb.co/diseno-a-la-medida/" target="_blank" ><img src="http://www.prismaweb.net/img/prismaweb-footer-webs-gris.png" alt="WWW.PRISMAWEB.CO - Skype: prismaweb22" /></a>
                  <center/>
        </div>
        <!-- /.box-footer-->
      </div>
      <!-- /.box -->


    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  {{-- <footer class="main-footer">

  </footer> --}}

  <!-- Control Sidebar -->

  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->
<script src="{{asset('js/app.js')}}"></script>

<script src="{{asset('admin-lte/plugins/datatables/jquery.dataTables.min.js')}}">  </script>
<script src="{{asset('admin-lte/plugins/datatables/dataTables.buttons.min.js')}}">  </script>
<script src="{{asset('admin-lte/plugins/datatables/buttons.flash.min.js')}}">  </script>
<script src="{{asset('admin-lte/plugins/datatables/jszip.min.js')}}">  </script>
<script src="{{asset('admin-lte/plugins/datatables/pdfmake.min.js')}}">  </script>
<script src="{{asset('admin-lte/plugins/datatables/vfs_fonts.js')}}">  </script>
<script src="{{asset('admin-lte/plugins/datatables/buttons.html5.min.js')}}">  </script>
<script src="{{asset('admin-lte/plugins/datatables/buttons.print.min.js')}}">  </script>
<script src="{{asset('admin-lte/plugins/datepicker/bootstrap-datepicker.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>


  <script>

      $(document).ready(function() {
        $('.select2').select2();
      });

  </script>


  @yield('scripts')

</body>
</html>
