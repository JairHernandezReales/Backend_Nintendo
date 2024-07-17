<?php

use App\Http\Controllers\JuegosController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    return view('index');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [JuegosController::class, 'dashboard'])-> name('juegos.dashboard');
    Route::get('/create', [JuegosController::class, 'create'])->name('juegos.create');
    Route::post('/store', [JuegosController::class, 'store'])->name('juegos.store');
    Route::put('juego/{juegos}', [JuegosController::class, 'update'])->name('juegos.update');
    Route::get('juego/{juegos}', [JuegosController::class, 'show'])->name('juegos.show');
    Route::get('juego/{juegos}/edit', [JuegosController::class, 'edit'])->name('juegos.edit');
    Route::delete('juego/{juegos}', [JuegosController::class, 'destroy'])->name('juegos.destroy');
});
Auth::routes();
