<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Illuminate\Http\Request;
use Sentry\Laravel\Integration;
use App\Http\Middleware\EnsureUserHasRole;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware): void {

        // Configuración de proxies para Render
        $middleware->trustProxies(
            at: '*',
            headers: Request::HEADER_X_FORWARDED_FOR |
            Request::HEADER_X_FORWARDED_HOST |
            Request::HEADER_X_FORWARDED_PORT |
            Request::HEADER_X_FORWARDED_PROTO
        );

        // Excepción CSRF para los respaldos automáticos
        $middleware->validateCsrfTokens(
            except: [
                'backup/run',
            ]
        );

        // Middleware para controlar los roles
        $middleware->alias([
            'role' => EnsureUserHasRole::class,
        ]);

    })
    ->withExceptions(function (Exceptions $exceptions): void {

        // Integración de Sentry para capturar errores
        Integration::handles($exceptions);

    })
    ->create();
