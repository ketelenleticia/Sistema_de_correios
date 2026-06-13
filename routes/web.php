<?php
use App\Http\Controllers\remetentesController;
use App\Http\Controllers\destinatariosController;
use App\Http\Controllers\funcionariosController;
use App\Http\Controllers\encomendasController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\dashboardController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('login');
});

Route::get('/dashboard', [dashboardController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
      
    Route::resource('remetentes', remetentesController::class);
    Route::resource('destinatarios', destinatariosController::class);
    Route::resource('funcionarios', funcionariosController::class);
    Route::resource('encomendas', encomendasController::class);

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';