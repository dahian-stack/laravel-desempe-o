<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;
use Throwable;

class BackupController extends Controller
{
    /**
     * Ejecutar respaldo desde cron-job.org.
     */
    public function runScheduled(Request $request): JsonResponse
    {
        $expectedToken = (string) config('services.backup.token');
        $providedToken = (string) $request->header('X-Backup-Token', '');

        if (
            $expectedToken === '' ||
            !hash_equals($expectedToken, $providedToken)
        ) {
            return response()->json([
                'estado' => 'ERROR',
                'mensaje' => 'Acceso no autorizado.'
            ], 403);
        }

        return $this->createBackup();
    }

    /**
     * Ejecutar una prueba manual desde MEDIAPRO.
     */
    public function test(): JsonResponse
    {
        return $this->createBackup();
    }

    /**
     * Crear y subir el respaldo a Backblaze B2.
     */
    private function createBackup(): JsonResponse
    {
        try {
            $backupId = now('America/Bogota')->format('Y-m-d_H-i-s')
                . '_' . Str::lower(Str::random(5));

            $basePath = 'backups/' . $backupId;

            $b2 = Storage::disk('b2');

            // 1. Respaldar la base de datos MySQL.
            $connection = DB::connection();

            if ($connection->getDriverName() !== 'mysql') {
                throw new \RuntimeException(
                    'El respaldo está configurado para MySQL.'
                );
            }

            $tables = $connection->select('SHOW TABLES');

            $databaseData = [];

            foreach ($tables as $tableRow) {
                $table = array_values((array) $tableRow)[0];

                $quotedTable = '`' . str_replace('`', '``', $table) . '`';

                $structure = $connection->select(
                    "SHOW CREATE TABLE {$quotedTable}"
                );

                $structureData = array_values((array) $structure[0]);

                $rows = $connection->table($table)
                    ->get()
                    ->map(fn ($row) => (array) $row)
                    ->all();

                $databaseData[$table] = [
                    'estructura' => $structureData[1],
                    'registros' => $rows,
                ];
            }

            $databaseBackup = json_encode([
                'proyecto' => 'MEDIAPRO',
                'fecha' => now('America/Bogota')->toDateTimeString(),
                'motor' => 'MySQL',
                'tablas' => $databaseData,
            ], JSON_PRETTY_PRINT |
                JSON_UNESCAPED_UNICODE |
                JSON_UNESCAPED_SLASHES |
                JSON_THROW_ON_ERROR);

            $databasePath = $basePath . '/base_datos.json';

            $b2->put($databasePath, $databaseBackup, [
                'visibility' => 'private',
            ]);

            // 2. Respaldar archivos locales y públicos.
            $fileCount = 0;

            foreach (['public', 'local'] as $diskName) {
                $source = Storage::disk($diskName);

                foreach ($source->allFiles() as $file) {
                    $stream = $source->readStream($file);

                    if (!is_resource($stream)) {
                        throw new \RuntimeException(
                            "No fue posible leer el archivo: {$file}"
                        );
                    }

                    try {
                        $destination = $basePath
                            . '/archivos/'
                            . $diskName
                            . '/'
                            . $file;

                        $b2->put($destination, $stream, [
                            'visibility' => 'private',
                        ]);
                    } finally {
                        fclose($stream);
                    }

                    $fileCount++;
                }
            }

            // 3. Crear manifiesto de la copia.
            $manifest = [
                'proyecto' => 'MEDIAPRO',
                'estado' => 'EXITOSO',
                'fecha' => now('America/Bogota')->toDateTimeString(),
                'zona_horaria' => 'America/Bogota',
                'identificador' => $backupId,
                'base_datos' => $databasePath,
                'tablas_respaldadas' => count($databaseData),
                'archivos_respaldados' => $fileCount,
                'almacenamiento' => 'Backblaze B2',
            ];

            $manifestPath = $basePath . '/manifest.json';

            $b2->put(
                $manifestPath,
                json_encode($manifest, JSON_PRETTY_PRINT |
                    JSON_UNESCAPED_UNICODE |
                    JSON_UNESCAPED_SLASHES |
                    JSON_THROW_ON_ERROR),
                ['visibility' => 'private']
            );

            // 4. Verificar que los respaldos estén en B2.
            if (
                !$b2->exists($databasePath) ||
                !$b2->exists($manifestPath)
            ) {
                throw new \RuntimeException(
                    'No se encontraron los respaldos en Backblaze.'
                );
            }

            Log::info('Respaldo MEDIAPRO completado.', $manifest);

            return response()->json([
                'estado' => 'EXITOSO',
                'mensaje' => 'Respaldo de MEDIAPRO completado correctamente.',
                'almacenamiento' => 'Backblaze B2',
                'identificador' => $backupId,
                'tablas_respaldadas' => count($databaseData),
                'archivos_respaldados' => $fileCount,
                'ruta' => $basePath,
                'verificacion' => true,
            ]);

        } catch (Throwable $e) {
            Log::error('Error al realizar el respaldo de MEDIAPRO.', [
                'mensaje' => $e->getMessage(),
                'tipo' => get_class($e),
            ]);

            return response()->json([
                'estado' => 'ERROR',
                'mensaje' => 'No fue posible completar el respaldo.',
                'detalle' => $e->getMessage(),
            ], 500);
        }
    }
}
