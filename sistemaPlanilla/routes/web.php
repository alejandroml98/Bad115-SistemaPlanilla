<?php

use App\Http\Controllers\GeneroController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return redirect('login');
});
//Solicita verificar correo despues del registro
Auth::routes(['verify' => true]);


//Grupo de rutas: El usuario tiene que estar verificado para acceder a ellas
Route::middleware(['verified','active'])->group(function () {
    Route::get('/casita3','PruebaController@indexProfile');    
    Route::get('/home', 'HomeController@index')->name('home');    
});
Route::resource('banco', 'BancoController');
Route::resource('catalogocomision', 'CatalogoComisionController');
Route::resource('centrocostos', 'CentroCostosController');
Route::resource('genero', 'GeneroController');
Route::resource('profesion', 'ProfesionController');
Route::resource('estadocivil', 'EstadoCivilController');
Route::resource('tipodescuento', 'TipoDescuentoController');
Route::resource('tipoingresos', 'TipoIngresoController');
Route::resource('tipodocumento', 'TipoDocumentoController');
Route::resource('subregion', 'SubRegionController');
Route::resource('tiporegion', 'TipoRegionController');
Route::resource('pais', 'PaisController');
Route::resource('region', 'RegionController');
Route::resource('renta', 'RentaController');
Route::resource('subregion', 'SubRegionController');
Route::resource('rangosalarial', 'RangoSalarialController');
Route::resource('puesto', 'PuestoController');

Route::resource('empresa', 'EmpresaController');
Route::resource('tipounidad', 'TipoUnidadController');
Route::resource('unidad', 'UnidadController');
Route::resource('empleado', 'EmpleadoController');
Route::get('empleado/create/{user}', 'EmpleadoController@create2')->name('empleado.create2');
Route::resource('ventasempleado', 'VentasEmpleadoController');
Route::get('ventasempleado/create/{empleado}', 'VentasEmpleadoController@obtenerEmpleados');
Route::resource('cuentabancaria', 'CuentaBancariaController');
Route::get('/cuentabancaria/create/{empleado}', 'CuentaBancariaController@create')->name('cuentabancaria.agregar');
Route::resource('tipodocumentoempleado', 'TipoDocumentoEmpleadoController');
Route::get('/tipodocumentoempleado/create/{empleado}', 'TipoDocumentoEmpleadoController@create')->name('tipodocumentoempleado.agregar');
Route::resource('tipodescuentoempleado', 'TipoDescuentoEmpleadoController');
Route::get('/tipodescuentoempleado/create/{empleado}', 'TipoDescuentoEmpleadoController@create')->name('tipodescuentoempleado.agregar');
Route::resource('tipoingresosempleado', 'TipoIngresosEmpleadoController');
Route::get('/tipoingresosempleado/create/{empleado}', 'TipoIngresosEmpleadoController@create')->name('tipoingresosempleado.agregar');
Route::resource('profesionempleado', 'ProfesionEmpleadoController');
Route::get('/profesionempleado/create/{empleado}', 'ProfesionEmpleadoController@create')->name('tipoingresosempleado.agregar');
Route::resource('unidadempleado', 'UnidadEmpleadoController');
Route::get('/unidadempleado/create/{empleado}', 'UnidadEmpleadoController@create')->name('unidadempleado.agregar');
Route::resource('unidadcentrocostos', 'UnidadCentroCostosController');
Route::get('/unidadcentrocostos/create/{centrocostos}', 'UnidadCentroCostosController@create')->name('unidadcentrocostos.agregar');
//Activar y desactivar cuentas de usuarios
//put
Route::get('/usuario/activar/{user}', 'EmpleadoController@activar')->name('empleado.activar');
Route::get('/usuario/desactivar/{user}', 'EmpleadoController@desactivar')->name('empleado.desactivar');
//post
Route::get('/usuario/proceso', 'EmpleadoController@pedirActivacion')->name('empleado.proceso_enviar');
//get
Route::get('/usuario/proceso/{user}', 'EmpleadoController@perfilInactivo')->name('empleado.proceso_perfil');
Route::get('inactivos', 'EmpleadoController@inactivos')->name('empleado.inactivos');
Route::get('inactivo', 'EmpleadoController@inactivo');

//Rutas de direccion
Route::resource('direccion', 'DireccionController');
Route::get('auth/role/create', 'UserController@rolcreate');
Route::get('pais/{pais}/region', 'PaisController@obtenerRegiones');
Route::post('auth/role/store', 'UserController@rolstore');
Route::get('region/{region}/subregion', 'RegionController@obtenerSubRegiones');

//ruta modificar usuario
Route::get('/user/{id}/edit', 'UserController@edit');
Route::post('/user/{id}', 'UserController@update2');



/**           Rutas de pruebas de formulario y sweet alert                            */
Route::get('/roles/index','UserController@rolindex');
Route::get('/roles/{id}/edit','UserController@roledit');
Route::put('/roles/{id}','UserController@roldestroy');
Route::patch('/roles/{id}','UserController@rolupdate');
Route::get('/user/index','UserController@index');
Route::get('/roles/create','PruebaController@create');

Route::get('/casita2','PruebaController@index2');

//Route::get('/Prueba/Confirmacion','PruebaController@Confirmacion');
Route::delete('/Prueba/eliminar','PruebaController@Confirmacion')->name('confirmacion-prueba');

//User Routes
Route::get('/profile', 'UserController@profile')->middleware('auth')->name('profile');  
Route::put('/profile/update', 'UserController@update')->middleware('auth')->name('profile.update');  
Route::put('/profile/update2', 'UserController@update2')->middleware('auth')->name('profile.update'); 
Route::put('/profile/changePassword', 'UserController@changePassword')->middleware('auth')->name('profile.changePassword');  
Route::get('/profile/subordinados/{idjefe}', 'UserController@obtenerSubordinados')->middleware('auth')->name('profile.obtenerSubordinados');  
Route::get('/user/unidad', 'UserController@obtenerUnidadEmpleado')->middleware('auth')->name('user.obtenerUnidad');
Route::get('/user/codigo', 'UserController@obtenerCodigoEmpleado')->middleware('auth')->name('user.codigoUnidad');
Route::get('/info/empresa', 'EmpresaController@obtenerInfoEmpresa')->middleware('auth')->name('user.empresa');

//Planilla Routes
Route::get('/planilla/unidades', 'PlanillaController@listaUnidadesPrincipales')->middleware('auth')->name('planilla.unidades');
Route::get('/planilla/{codigounidad}/generarplanilla', 'PlanillaController@generarPlanilla')->middleware('auth')->name('planilla.generarplanilla');
Route::get('/planilla/{codigoempleado}/boletapago', 'PlanillaController@boletaPago')->middleware('auth')->name('planilla.boletapago');
Route::get('/numempleados', 'EmpleadoController@obtenerCantidadEmpleados')->name('empresa.numeroempleados');
