<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage;
use Throwable;

class ProbarBackblaze extends Command
{
    protected $signature = 'b2:probar';

    protected $description = 'Comprueba la conexión con Backblaze B2';

    public function handle(): int
    {
        try {
            $disco = Storage::disk('b2');

            $ruta = 'pruebas/mediapro-conexion.txt';

            $contenido = 'MEDIAPRO - Prueba de almacenamiento externo en Backblaze B2.';

            $this->info('1. Subiendo archivo a Backblaze...');

            $disco->put($ruta, $contenido);

            $this->info('2. Comprobando que el archivo existe...');

            if (!$disco->exists($ruta)) {
                $this->error('El archivo no aparece en Backblaze.');
                return self::FAILURE;
            }

            $this->info('3. Recuperando el archivo...');

            $recuperado = $disco->get($ruta);

            if ($recuperado !== $contenido) {
                $this->error('El contenido recuperado no coincide.');
                return self::FAILURE;
            }

            $this->newLine();
            $this->info('¡PRUEBA EXITOSA!');
            $this->info('Archivo subido correctamente.');
            $this->info('Archivo recuperado correctamente.');
            $this->info('Contenido verificado correctamente.');
            $this->line('Ruta: ' . $ruta);

            return self::SUCCESS;

        } catch (Throwable $e) {
            $this->error('Error al conectar con Backblaze B2:');
            $this->error($e->getMessage());

            return self::FAILURE;
        }
    }
}
