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
    return view('welcome');
});
//Solicita verificar correo despues del registro
Auth::routes(['verify' => true]);


//Grupo de rutas: El usuario tiene que estar verificado para acceder a ellas
Route::middleware(['verified','active'])->group(function () {
    Route::get('/casita3','PruebaController@indexProfile');    
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
Route::put('/usuario/activar/{user}', 'EmpleadoController@activar')->name('empleado.activar');
Route::put('/usuario/desactivar/{user}', 'EmpleadoController@desactivar')->name('empleado.desactivar');
Route::get('/usuario/proceso', 'EmpleadoController@dpedirActivacion')->name('empleado.desactivar');
Route::get('inactivo', 'EmpleadoController@inactivo');

//Rutas de direccion
Route::resource('direccion', 'DireccionController');
Route::get('pais/{pais}/region', 'PaisController@obtenerRegiones');
Route::get('region/{region}/subregion', 'RegionController@obtenerSubRegiones');

Route::get('/home', 'HomeController@index')->name('home');

/**           Rutas de pruebas de formulario y sweet alert                            */
Route::get('/casita','PruebaController@index')->middleware('auth');
Route::get('/casita2','PruebaController@index2');
//Route::get('/Prueba/Confirmacion','PruebaController@Confirmacion');
Route::delete('/Prueba/eliminar','PruebaController@Confirmacion')->name('confirmacion-prueba');

//User Routes
Route::get('/profile', 'UserController@profile')->middleware('auth')->name('profile');  
Route::put('/profile/update', 'UserController@update')->middleware('auth')->name('profile.update');  
Route::put('/profile/changePassword', 'UserController@changePassword')->middleware('auth')->name('profile.changePassword');  
Route::get('/profile/subordinados/{idjefe}', 'UserController@obtenerSubordinados')->middleware('auth')->name('profile.obtenerSubordinados');  
