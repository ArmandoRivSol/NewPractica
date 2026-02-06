<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AlumnoController;
use App\Http\Controllers\CarreraController;
use App\Http\Controllers\TurnoController;
use App\Http\Controllers\GradoController;
use App\Http\Controllers\GrupoController;

/*
|--------------------------------------------------------------------------
| RUTA PRINCIPAL
|--------------------------------------------------------------------------
*/
Route::get('/', function () {
    return view('welcome');
});

/*
|--------------------------------------------------------------------------
| ALUMNOS
|--------------------------------------------------------------------------
*/
Route::resource('alumnos', AlumnoController::class);

Route::put('alumnos/{id}/activar', [AlumnoController::class, 'activar'])
    ->name('alumnos.activar');

Route::put('alumnos/{id}/desactivar', [AlumnoController::class, 'desactivar'])
    ->name('alumnos.desactivar');

/*
|--------------------------------------------------------------------------
| CATALOGOS
|--------------------------------------------------------------------------
*/
Route::resource('carreras', CarreraController::class)
    ->except(['show']);

Route::resource('turnos', TurnoController::class)
    ->except(['show']);

Route::resource('grados', GradoController::class)
    ->except(['show']);
// Activar / Desactivar grados
Route::put('grados/{id}/activar', [GradoController::class, 'activar'])
    ->name('grados.activar');

Route::put('grados/{id}/desactivar', [GradoController::class, 'desactivar'])
    ->name('grados.desactivar');
/*
|--------------------------------------------------------------------------
| GRUPOS (SOLO CONSULTA)
|--------------------------------------------------------------------------
*/
Route::resource('grupos', GrupoController::class)
    ->only(['index', 'show']);


