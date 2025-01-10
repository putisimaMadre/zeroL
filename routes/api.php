<?php

use App\Http\Controllers\AlumnoController;
use App\Http\Controllers\MateriaController;
use App\Http\Controllers\ProfesorController;
use App\Http\Controllers\ProfesorMateriaController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::resource('profesorMateria', ProfesorMateriaController::class);
Route::resource('profesor', ProfesorController::class);


Route::controller(MateriaController::class)->group(function(){
    Route::resource('materia', MateriaController::class);
    Route::post('busquedaGradoGrupoTurno', 'busquedaGradoGrupoTurno');
});

Route::resource('alumno', AlumnoController::class);

/*
Route::controller(AlumnoController::class)->group(function(){
    Route::resource('alumnos', AlumnoController::class);
    Route::post('busquedaGradoGrupoTurno', 'busquedaGradoGrupoTurno');
});
*/