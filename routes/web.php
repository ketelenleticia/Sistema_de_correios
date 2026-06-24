<?php
use App\Http\Controllers\RemetentesController;
use App\Http\Controllers\DestinatariosController;
use App\Http\Controllers\FuncionariosController;
use App\Http\Controllers\EncomendasController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('login');
});

Route::get('/dashboard', [DashboardController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
      
    Route::resource('remetentes', RemetentesController::class);
    Route::resource('destinatarios', DestinatariosController::class);
    Route::resource('funcionarios', FuncionariosController::class);
    Route::resource('encomendas', EncomendasController::class);

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';