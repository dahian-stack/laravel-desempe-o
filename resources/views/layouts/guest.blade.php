<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Acceso | MEDIAPRO</title>
    <link rel="icon" type="image/png" href="{{ asset('favicon.png') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;600;700&family=Playfair+Display:ital,wght@0,500;0,600;1,500&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="stylesheet" href="{{ asset('css/mediapro-auth.css') }}">
</head>
<body class="mp-auth-body">
    <main class="mp-auth-shell">
        <a href="{{ url('/') }}" class="mp-auth-brand" aria-label="MEDIAPRO - Inicio">
            <span class="mp-auth-mark" aria-hidden="true">
                <svg viewBox="0 0 64 64" fill="none">
                    <rect x="8" y="18" width="48" height="38" rx="5" fill="#21172f" stroke="#b88be8"/>
                    <path d="M8 18 15 7h42l-7 11H8Z" fill="#9862d1"/>
                    <path d="m22 9 6 9M36 9l6 9M49 9l4 9" stroke="#fff" stroke-width="3"/>
                    <path d="m27 29 0 17 15-8.5L27 29Z" fill="#fff"/>
                </svg>
            </span>
            <span class="mp-auth-wordmark">MEDIA<span>PRO</span></span>
            <span class="mp-auth-tagline">IMÁGENES CREATIVAS · PRODUCCIÓN AUDIOVISUAL</span>
        </a>

        <section class="mp-auth-card">
            <div class="mp-auth-card-glow"></div>
            <div class="mp-auth-content">
                {{ $slot }}
            </div>
        </section>

        <footer class="mp-auth-footer">
            <span>© {{ date('Y') }} MEDIAPRO · IMÁGENES CREATIVAS</span>
            <a href="{{ url('/') }}">Volver al inicio</a>
        </footer>
    </main>
</body>
</html>
