<?php

use Illuminate\Support\Facades\Route;
use App\Livewire\Estudiantes;
use App\Livewire\Curso;
use App\Livewire\EstudianteCursos;
use App\Livewire\Profesores;

/**
 * Aqui se definen las rutas de la aplicación.
 * Se definen las rutas y se asocian a un componente de Livewire.
 */

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get('/estudiantes', Estudiantes::class)->name('estudiantes');
Route::get('/profesores', Profesores::class)->name('profesores');
Route::get('/cursos', Curso::class)->name('cursos');
Route::get('/estudiantes/{estudiante}/cursos', EstudianteCursos::class)->name('estudiantes.cursos');
