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


Route::middleware('auth')->get('/b2-test', function () {
    try {
        $disco = \Illuminate\Support\Facades\Storage::disk('b2');

        $ruta = 'pruebas/mediapro-conexion.txt';

        $contenido = 'MEDIAPRO - Prueba de almacenamiento externo en Backblaze B2.';

        $disco->put($ruta, $contenido);

        if (!$disco->exists($ruta)) {
            throw new \Exception('No se encontró el archivo en Backblaze.');
        }

        $recuperado = $disco->get($ruta);

        if ($recuperado !== $contenido) {
            throw new \Exception('El contenido recuperado no coincide.');
        }

        return response()->json([
            'estado' => 'EXITOSO',
            'subida' => true,
            'existencia' => true,
            'recuperacion' => true,
            'contenido_correcto' => true,
            'archivo' => $ruta,
            'mensaje' => 'MEDIAPRO se conectó correctamente con Backblaze B2.'
        ]);

    } catch (\Throwable $e) {

        \Illuminate\Support\Facades\Log::error(
            'ERROR EN LA PRUEBA DE BACKBLAZE B2',
            [
                'exception' => $e->getMessage(),
                'class' => get_class($e),
                'previous' => $e->getPrevious()?->getMessage(),
            ]
        );

        return response()->json([
            'estado' => 'ERROR',
            'tipo' => get_class($e),
            'mensaje' => $e->getMessage(),
            'causa' => $e->getPrevious()?->getMessage(),
        ], 500);
    }
});
