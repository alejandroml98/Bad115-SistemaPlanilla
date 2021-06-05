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

Route::resource('genero', 'GeneroController');
Route::resource('profesion', 'ProfesionController');
Route::resource('estadocivil', 'EstadoCivilController');
Route::resource('tipodocumento', 'TipoDocumentoController');
Route::resource('subregion', 'SubRegionController');
Route::resource('tiporegion', 'TipoRegionController');
Route::resource('pais', 'PaisController');
Route::resource('region', 'RegionController');
Route::resource('subregion', 'SubRegionController');

Route::get('/home', 'HomeController@index')->name('home');

/**           Rutas de pruebas de formulario y sweet alert                            */
Route::get('/casita','PruebaController@index')->middleware('auth');
Route::get('/casita2','PruebaController@index2');
//Route::get('/Prueba/Confirmacion','PruebaController@Confirmacion');
Route::delete('/Prueba/eliminar','PruebaController@Confirmacion')->name('confirmacion-prueba');

