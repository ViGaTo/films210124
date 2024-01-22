<?php

use App\Http\Controllers\ContactoController;
use App\Http\Controllers\FilmController;
use App\Http\Controllers\TagController;
use App\Models\Film;
use Illuminate\Support\Facades\Route;

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
    $films = Film::orderBy('id', 'desc')->paginate(5);
    return view('welcome', compact('films'));
})->name('home');

Route::resource('films', FilmController::class);
Route::resource('tags', TagController::class)->except('show');

Route::get('contacto', [ContactoController::class, 'pintarFormulario'])->name('contacto.formulario');
Route::post('contacto', [ContactoController::class, 'guardarFormulario'])->name('contacto.enviar');