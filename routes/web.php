
<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\ProduccionController;
use App\Http\Controllers\PersonalController;
use App\Http\Controllers\EquipoTecnicoController;
use App\Http\Controllers\LocalizacionController;
use App\Http\Controllers\PlanRodajeController;
use App\Http\Controllers\EscenaController;

// Página principal
Route::get('/', function () {
    return redirect()->route('dashboard');
});

<<<<<<< HEAD
// MODO TEMPORAL DE DEMOSTRACIÓN
// Acceso público para la evaluación.
=======
// Rutas protegidas: requieren iniciar sesión
Route::middleware('auth')->group(function () {
>>>>>>> 02c053a (actualizar web)

Route::get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

<<<<<<< HEAD
// Módulos CRUD
Route::resource('clientes', ClienteController::class);
Route::resource('producciones', ProduccionController::class);
Route::resource('personales', PersonalController::class);
Route::resource('equipos_tecnicos', EquipoTecnicoController::class);
Route::resource('localizaciones', LocalizacionController::class);
Route::resource('planes_rodaje', PlanRodajeController::class);
Route::resource('escenas', EscenaController::class);

=======
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

>>>>>>> 02c053a (actualizar web)
// Autenticación Breeze
require __DIR__.'/auth.php';
