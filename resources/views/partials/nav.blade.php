<ul class="sidebar-menu" data-widget="tree">
  <li class="header">MENÚ DE NAVEGACION</li>

  <li class="{{setActiveRoute('home')}}">
    <a href="{{route('home')}}">
      <i class="fa fa-dashboard"></i> <span>Inicio</span>
    </a>
  </li>

@can ('view', new \App\User)
  <li class="treeview {{setActiveRoute(['users.index','users.create','historials.index'])}}">
    <a href="#">
      <i class="fa fa-users"></i>
      <span>Seguridad Y Usuarios</span>
      <span class="pull-right-container">
        <i class="fa fa-angle-left pull-right"></i>
      </span>
    </a>
    <ul class="treeview-menu ">
      <li class="{{setActiveRoute('users.index')}}"><a href="{{route('users.index')}}"><i class="fa fa-eye"></i>Lista De Usuarios</a></li>
      <li class="{{setActiveRoute('users.create')}}"><a href="{{route('users.create')}}"><i class="fa fa-user-plus"></i>Crear Usuario</a></li>
      <li class="{{setActiveRoute('historials.index')}}"><a href="{{route('historials.index')}}"><i class="fa fa-history"></i>Historico Reubicaciones</a></li>
      <li class="{{setActiveRoute('log-viewer')}}"><a href="/patios/log-viewer" target="_blank"><i class="fa fa-history"></i>Registros Log</a></li>
    </ul>
  </li>
@else
  <li class="{{setActiveRoute(['users.edit', 'users.show'])}}">
    <a href="{{route('users.show', auth()->user())}}">
      <i class="fa fa-user"></i>
      <span>Perfil</span>
    </a>
  </li>
@endcan

@can ('view', new \Spatie\Permission\Models\Role)
    <li class="{{setActiveRoute(['servicios.index','rates.index','cranes.index'])}}">
      <a href="{{route('roles.index')}}">
        <i class="fa fa-street-view"></i>
        <span>Perfiles</span>
      </a>
    </li>
@endcan

@can ('view', new \Spatie\Permission\Models\Permission)
    <li class="{{setActiveRoute(['permissions.index','permissions.create'])}}">
      <a href="{{route('permissions.index')}}">
        <i class="fa fa-address-book"></i>
        <span>Permisos</span>
      </a>
    </li>
@endcan



<li class="treeview {{setActiveRoute(['servicios.index','servicios.create','servicios.edit','cranes.index','cranes.create','cranes.edit','rates.index','rates.create','rates.edit'])}}">
  <a href="#">
    <i class="fa fa-users"></i>
    <span>Tarifas</span>
    <span class="pull-right-container">
      <i class="fa fa-angle-left pull-right"></i>
    </span>
  </a>
  <ul class="treeview-menu ">
  @can ('view', new \App\Rate)
    <li class="{{setActiveRoute(['rates.index','rates.create','rates.edit'])}}">
      <a href="{{route('rates.index')}}">
        <i class="fa fa-money"></i>
        <span>Servicios Parqueadero</span>
      </a>
    </li>
  @endcan
  @can ('view', new \App\Crane)
  <li class="{{setActiveRoute(['cranes.index','cranes.create','cranes.edit'])}}">
      <a href="{{route('cranes.index')}}">
        <i class="fa fa-ban"></i>
        <span>Servicios Grúas</span>
      </a>
    </li>
  @endcan
  @can ('view', new \App\Proveedores_gruas)
    <li class="{{setActiveRoute(['proveedores.index','proveedores.create','proveedores.edit'])}}">
      <a href="{{route('proveedores.index')}}">
        <i class="fa fa-area-chart"></i>
        <span>Proveedores Gruas</span>
      </a>
    </li>
  @endcan
  </ul>
</li>

@can ('view', new \App\Yard)
  <li class="{{setActiveRoute(['yards.index','yards.create','yards.edit'])}}">
    <a href="{{route('yards.index')}}">
      <i class="fa fa-area-chart"></i>
      <span>Patios</span>
    </a>
  </li>
@endcan
@can ('view', new \App\Section)
  <li class="{{setActiveRoute(['sections.index','sections.create','sections.edit'])}}">
    <a href="{{route('sections.index')}}">
      <i class="fa fa-puzzle-piece"></i>
      <span>Secciones</span>
    </a>
  </li>
@endcan
{{-- <li class="{{setActiveRoute(['entries.index','entries.create','entries.edit','entries.show'])}}">
  <a href="{{route('entries.index')}}">
    <i class="fa fa-car"></i>
    <span>Ingreso Vehículo</span>
  </a>
</li> --}}
{{-- @endrole --}}

<li class="treeview {{setActiveRoute(['entries.index','entries.create','entries.edit','entries.show','daringreso.index'])}}">
  <a href="#">
    <i class="fa fa-car"></i>
    <span>Ingresos</span>
    <span class="pull-right-container">
      <i class="fa fa-angle-left pull-right"></i>
    </span>
  </a>
  @can ('view', new \App\Entry)
  <ul class="treeview-menu">
{{-- @role('Ingreso') --}}

    <li class="{{setActiveRoute(['entries.index','entries.create','entries.edit','entries.show','daringreso.index'])}}">
      <a href="{{route('daringreso.index')}}">
        <i class="fa fa-car"></i>
        <span>Dar Ingreso</span>
      </a>
    </li>
{{-- @endrole --}}
{{-- @role('Admin') --}}
    <li class="{{setActiveRoute(['cranes.index','cranes.create','cranes.edit'])}}">
      <a href="{{route('entries.index')}}">
        <i class="fa fa-ban"></i>
        <span>Vehículos Ingresados</span>
      </a>
    </li>
  </ul>
  @endcan
</li>
  @can ('view', new \App\Salida)
  <li class="{{setActiveRoute(['salidas.index','salidas.create','salidas.edit'])}}">
    <a href="{{route('salidas.index')}}">
      <i class="fa  fa-bus"></i>
      <span>Salidas</span>
    </a>
  </li>
@endcan
  @can ('view', new \App\Owenr)
<li class="{{setActiveRoute(['owenrs.index','owenrs.create','owenrs.edit'])}}">
  <a href="{{route('owenrs.index')}}">
    <i class="fa fa-user"></i>
    <span>Propietario o Infractor</span>
  </a>
</li>
@endcan
  @can ('view', new \App\Invoce)
<li class="{{setActiveRoute(['invoces.index'])}}">
  <a href="{{route('invoces.index')}}">
    <i class="fa  fa-gg"></i>
    <span>Recibos</span>
  </a>
</li>
@endcan
  @can ('view', new \App\Report)
<li class="treeview {{setActiveRoute(['reports.index','estadisticos.index'])}}">
  <a href="#">
    <i class="fa fa-area-chart"></i>
    <span>Reportes</span>
    <span class="pull-right-container">
      <i class="fa fa-angle-left pull-right"></i>
    </span>
  </a>
  <ul class="treeview-menu ">
    <li class="{{setActiveRoute('reports.index')}}"><a href="{{route('reports.index')}}"><i class="fa fa-line-chart"></i>Generar Reporte</a></li>
   <li class="{{setActiveRoute('estadisticos.index')}}"><a href="{{route('estadisticos.index')}}"><i class="fa fa-pie-chart"></i>Reportes Estadisticos</a></li>
  </ul>
</li>
@endcan
</ul>
{{-- @endrole --}}
