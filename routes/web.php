<?php

use App\Http\Controllers\CandidatoController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\NotificacionController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Vacantes;
use App\Http\Controllers\VacantesController;
use Illuminate\Support\Facades\Route;

Route::get('/', HomeController::class)->name('home');

Route::get('/dashboard', [VacantesController::class, 'index'])->middleware(['auth', 'verified','rol.reclutador'])->name('vacantes.index');
Route::get('/vacantes/create', [VacantesController::class, 'create'])->middleware(['auth', 'verified'])->name('vacantes.create');
Route::get('/vacantes/{vacante}/edit', [VacantesController::class, 'edit'])->middleware(['auth', 'verified'])->name('vacantes.edit');
Route::get('/vacantes/{vacante}', [VacantesController::class, 'show'])->name('vacantes.show');

Route::get('/candidatos/{vacante}', [CandidatoController::class, 'index'])->name('candidatos.index');

//Notificaciones
Route::get('/notificaciones', NotificacionController::class)->middleware(['auth', 'verified','rol.reclutador'])->name('notificaciones');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
