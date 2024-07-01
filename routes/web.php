<?php

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
Auth::routes();

Route::get('/home', 'App\Http\Controllers\HomeController@index')->name('home');

Route::group(['middleware' => 'auth'], function () {
	Route::resource('user', 'App\Http\Controllers\UserController', ['except' => ['show']]);
	Route::get('profile', ['as' => 'profile.edit', 'uses' => 'App\Http\Controllers\ProfileController@edit']);
	Route::put('profile', ['as' => 'profile.update', 'uses' => 'App\Http\Controllers\ProfileController@update']);
	Route::get('upgrade', function () {return view('pages.upgrade');})->name('upgrade'); 
	Route::get('map', function () {return view('pages.maps');})->name('map');
	Route::get('icons', function () {return view('pages.icons');})->name('icons'); 
	Route::get('table-list', function () {return view('pages.tables');})->name('table');
	Route::put('profile/password', ['as' => 'profile.password', 'uses' => 'App\Http\Controllers\ProfileController@password']);

	// MODELOS
	Route::prefix('modelos')->group(function () {
		Route::get('/', [App\Http\Controllers\ModeloController::class, 'index'])->name('modelos');
		Route::get('/obtener', [App\Http\Controllers\ModeloController::class, 'obtenerDatos'])->name('modelos_obtener');
		Route::get('/crear', [App\Http\Controllers\ModeloController::class, 'create'])->name('modelos_crear');
		Route::post('/registrar', [App\Http\Controllers\ModeloController::class, 'store'])->name('modelos_registrar');
		Route::get('/editar/{id}', [App\Http\Controllers\ModeloController::class, 'edit'])->name('modelos_editar');
		Route::post('/actualizar', [App\Http\Controllers\ModeloController::class, 'update'])->name('modelos_actualizar');
		Route::post('/eliminar', [App\Http\Controllers\ModeloController::class, 'delete'])->name('modelos_eliminar');
	});
	// MARCAS
	Route::prefix('marcas')->group(function () {
		Route::get('/', [App\Http\Controllers\MarcaController::class, 'index'])->name('marcas');
		Route::get('/obtener', [App\Http\Controllers\MarcaController::class, 'obtenerDatos'])->name('marcas_obtener');
		Route::get('/crear', [App\Http\Controllers\MarcaController::class, 'create'])->name('marcas_crear');
		Route::post('/registrar', [App\Http\Controllers\MarcaController::class, 'store'])->name('marcas_registrar');
		Route::get('/editar/{id}', [App\Http\Controllers\MarcaController::class, 'edit'])->name('marcas_editar');
		Route::post('/actualizar', [App\Http\Controllers\MarcaController::class, 'update'])->name('marcas_actualizar');
		Route::post('/eliminar', [App\Http\Controllers\MarcaController::class, 'delete'])->name('marcas_eliminar');
	});
	// CLASES
	Route::prefix('clases')->group(function () {
		Route::get('/', [App\Http\Controllers\ClaseController::class, 'index'])->name('clases');
		Route::get('/obtener', [App\Http\Controllers\ClaseController::class, 'obtenerDatos'])->name('clases_obtener');
		Route::get('/crear', [App\Http\Controllers\ClaseController::class, 'create'])->name('clases_crear');
		Route::post('/registrar', [App\Http\Controllers\ClaseController::class, 'store'])->name('clases_registrar');
		Route::get('/editar/{id}', [App\Http\Controllers\ClaseController::class, 'edit'])->name('clases_editar');
		Route::post('/actualizar', [App\Http\Controllers\ClaseController::class, 'update'])->name('clases_actualizar');
		Route::post('/eliminar', [App\Http\Controllers\ClaseController::class, 'delete'])->name('clases_eliminar');
	});
	// UBIGEOS
	Route::prefix('ubigeo')->group(function () {
		Route::get('/', [App\Http\Controllers\UbigeoController::class, 'index'])->name('ubigeo');
		Route::get('/obtener', [App\Http\Controllers\UbigeoController::class, 'obtenerDatos'])->name('ubigeo_obtener');
		Route::post('/importar', [App\Http\Controllers\UbigeoController::class, 'obtenerDatos'])->name('ubigeo_importar');
		Route::post('/cargar_provincias', [App\Http\Controllers\UbigeoController::class, 'cargarProvincias'])->name('ubigeo_cargar_provincias');
		Route::post('/cargar_distritos', [App\Http\Controllers\UbigeoController::class, 'cargarDistritos'])->name('ubigeo_cargar_distritos');
	});
	// LOCALES
	Route::prefix('locales')->group(function () {
		Route::get('/', [App\Http\Controllers\LocalController::class, 'index'])->name('locales');
		Route::get('/obtener', [App\Http\Controllers\LocalController::class, 'obtenerDatos'])->name('locales_obtener');
		Route::get('/crear', [App\Http\Controllers\LocalController::class, 'create'])->name('locales_crear');
		Route::post('/registrar', [App\Http\Controllers\LocalController::class, 'store'])->name('locales_registrar');
		Route::get('/editar/{id}', [App\Http\Controllers\LocalController::class, 'edit'])->name('locales_editar');
		Route::post('/actualizar', [App\Http\Controllers\LocalController::class, 'update'])->name('locales_actualizar');
		Route::post('/eliminar', [App\Http\Controllers\LocalController::class, 'delete'])->name('locales_eliminar');
	});
});

