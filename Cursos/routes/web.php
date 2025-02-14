<?php

use Illuminate\Support\Facades\Route;
use App\Livewire\Estudiantes;
use App\Livewire\Curso;
use App\Livewire\EstudianteCursos;
use App\Livewire\Profesores;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get('/estudiantes', Estudiantes::class)->name('estudiantes');
Route::get('/profesores', Profesores::class)->name('profesores');
Route::get('/cursos', Curso::class)->name('cursos');
Route::get('/estudiantes/{estudiante}/cursos', EstudianteCursos::class)->name('estudiantes.cursos');
