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

Route::get('/profesion', function () {
    return view('/profesion/index');
});

Route::resource('genero', 'GeneroController');
Route::resource('profesion', 'ProfesionController');
Route::resource('estadocivil', 'EstadoCivilController');
Route::resource('tipodocumento', 'TipoDocumentoController');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

/**           Rutas de pruebas de formulario y sweet alert                            */
Route::get('/casita','PruebaController@index');
//Route::get('/Prueba/Confirmacion','PruebaController@Confirmacion');
Route::delete('/Prueba/eliminar','PruebaController@Confirmacion')->name('confirmacion-prueba');

