
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

// Página principal
Route::get('/', function () {
    return redirect()->route('dashboard');
});

// Rutas protegidas (solo usuarios conectados)
Route::middleware('auth')->group(function () {

    // Dashboard
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    // Módulos del sistema
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

// Rutas de autenticación (Breeze)
require __DIR__.'/auth.php';

Route::get('/diagnostico-sesion', function (\Illuminate\Http\Request $request) {
    $request->session()->put('prueba_sesion', 'funciona');

    return response()->json([
        'session_id' => $request->session()->getId(),
        'session_value' => $request->session()->get('prueba_sesion'),
    ]);
});
