<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'MEDIAPRO') }}</title>
    <link rel="icon" type="image/png" href="{{ asset('favicon.png') }}">
    <link rel="stylesheet" href="{{ asset('css/mediapro-portal.css') }}">
    <link rel="stylesheet" href="{{ asset('css/mediapro-admin.css') }}">
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body class="font-sans antialiased mp-admin-body">
<div class="min-h-screen mp-admin-shell">
    @include('layouts.admin-navigation')

    @isset($header)
        <header class="mp-admin-page-header">
            <div class="mp-admin-content">
                {{ $header }}
            </div>
        </header>
    @endisset

    <main class="mp-admin-content">
        {{ $slot }}
    </main>

    @include('layouts.admin-footer')
</div>

<script>
document.addEventListener('DOMContentLoaded', function () {
    document.querySelectorAll('.delete-form').forEach(form => {
        form.addEventListener('submit', function (e) {
            e.preventDefault();
            Swal.fire({
                title: '¿Estás seguro?',
                text: 'Esta acción no se puede deshacer.',
                icon: 'warning',
                background: '#171323',
                color: '#f5f0ff',
                showCancelButton: true,
                confirmButtonColor: '#9862d1',
                cancelButtonColor: '#51465f',
                confirmButtonText: 'Sí, eliminar',
                cancelButtonText: 'Cancelar'
            }).then(result => {
                if (result.isConfirmed) form.submit();
            });
        });
    });

    @if(session('success'))
    Swal.fire({
        icon: 'success',
        title: '¡Listo!',
        text: @json(session('success')),
        background: '#171323',
        color: '#f5f0ff',
        timer: 2600,
        showConfirmButton: false
    });
    @endif
});
</script>
</body>
</html>