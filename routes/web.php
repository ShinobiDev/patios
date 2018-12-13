  <?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('email', function(){
//     return new App\Mail\CredencialesConsorcioTB(App\User::first(), 'abc123');
// });

Auth::routes();


Route::resource('buscar', 'BuscarController');
Route::get('/home', 'HomeController@index')->name('home');
Route::group([
    // 'prefix' => 'admin',
    'namespace' => 'Admin',
    'middleware' => 'auth',
], function(){
  Route::resource('users', 'UsersController');

  Route::resource('roles', 'RolesController');
  Route::resource('permissions', 'PermissionsController');

  Route::middleware('role:Admin')->put('users/{user}/roles', 'UserRolesController@update')->name('users.roles.update');
  Route::middleware('role:Admin')->put('users/{user}/permissions', 'UserPermissionsController@update')->name('users.permissions.update');

  Route::get('/', function () {
      return view('home');
  });

});
Route::post("cambio_clave","Admin\UsersController@cambio_pass")->name('cambio.clave');


Route::group([
    // 'prefix' => 'admin',
    'namespace' => 'Work',
    'middleware' => 'auth',
], function(){


    Route::resource('asignars', 'AsignarController');
    Route::resource('cranes', 'CraneController');
    Route::resource('entries', 'EntryController');
    Route::put('entries/pendientes/{entry}', 'EntryController@pendientes')->name('entries.pendientes');
    Route::get('entries/editpendientes/{entry}', 'EntryController@EditPendientes')->name('entries.EditPendientes');
    Route::resource('estadisticos', 'EstadisticoController');
    Route::post('estadisticos/estadistico', 'EstadisticoController@reporte')->name('estadisticos.informe');
    Route::resource('daringreso', 'darController');
    Route::resource('historials', 'HistorialController');
    Route::resource('inventaries', 'InventaryController');
    Route::resource('infraccions', 'InfraccionController');
    Route::resource('invoces', 'InvoceController');
    Route::get('invoces/valor/{valores}', 'InvoceController@valores')->name('invoces.valor');
    Route::resource('owenrs','OwenrController');
    Route::resource('proveedores','Proveedor_gruaController');
    Route::resource('rates', 'RateController');
    Route::resource('reports', 'ReportController');
    Route::post('reports/reporte', 'ReportController@reporte')->name('reports.informe');
    Route::resource('salidas', 'SalidaController');
    Route::resource('sections', 'SectionController');
    Route::resource('servicios', 'ServicioController');
    Route::resource('yards', 'YardController');
    Route::post('inventaries/inventa/{entry}', 'InventaryController@inventario')->name('inventaries.inventario');
    Route::post('inventaries/ediinventa/{entry}', 'InventaryController@editarinventario')->name('inventaries.editarinventario');
    Route::get('/json-seccion','YardController@seccion');
    Route::get('/json-rango','RangoController@rango');
    Route::get('/json-rates','Clase_vehiculoController@parqueadoro');
    Route::resource('mostrarfacturas','MostrarFacturaController');
    Route::get('/json-cranes','Clase_vehiculoController@gruas');
    Route::get('/json-salidas','SalidaController@salidas');
    Route::post('transacciones','TransationController@guardar')->name('transaccion.guardar');
});



  Route::get('/clearcache', function(){
      Artisan::call('cache:clear');
      Artisan::call('config:clear');
      Artisan::call('route:clear');
      Artisan::call('view:clear');
      // Artisan::call('key:generate');
      return '<h1>se ha borrado el cache</h1>';
  });
