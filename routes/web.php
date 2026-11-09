<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\ProduccionController;
use App\Http\Controllers\PersonalController;
use App\Http\Controllers\EquipoTecnicoController;
use App\Http\Controllers\LocalizacionController;
use App\Http\Controllers\PlanRodajeController;
use App\Http\Controllers\EscenaController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ContactController;


// Página principal - Landing Page
Route::view('/', 'landing')->name('landing');

// Política de tratamiento de datos personales
Route::view('/politica-de-privacidad', 'legal.politica-privacidad')
    ->name('privacy.policy');

Route::post('/contacto', [ContactController::class, 'store'])
    ->middleware('throttle:5,1')
    ->name('contact.store');

// Rutas protegidas: requieren iniciar sesión
Route::middleware('auth')->group(function () {

    // Dashboard
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    // Módulos CRUD
    Route::resource('clientes', ClienteController::class);
    Route::resource('producciones', ProduccionController::class);
    Route::resource('personales', PersonalController::class);
    Route::resource('equipos_tecnicos', EquipoTecnicoController::class);
    Route::resource('localizaciones', LocalizacionController::class);
    Route::resource('planes_rodaje', PlanRodajeController::class);
    Route::resource('escenas', EscenaController::class);

    // Perfil de usuario
    Route::get('/profile', [ProfileController::class, 'edit'])
        ->name('profile.edit');

    Route::patch('/profile', [ProfileController::class, 'update'])
        ->name('profile.update');

    Route::delete('/profile', [ProfileController::class, 'destroy'])
        ->name('profile.destroy');
});

// Autenticación Breeze
require __DIR__.'/auth.php';
