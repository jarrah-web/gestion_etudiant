<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EtudiantController;
use App\Http\Controllers\EvaluationController;
use App\Http\Controllers\NoteController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/', fn() => redirect()->route('etudiants.index'));

Route::resource('etudiants', EtudiantController::class);
Route::resource('evaluations', EvaluationController::class);

Route::get('notes', [NoteController::class, 'index'])->name('notes.index');
Route::get('notes/create', [NoteController::class, 'create'])->name('notes.create');
Route::post('notes', [NoteController::class, 'store'])->name('notes.store');
Route::get('statistiques', [NoteController::class, 'statistiques'])->name('notes.stats');
