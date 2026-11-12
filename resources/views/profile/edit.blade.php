<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="theme-color" content="#090711">
    <title>Mi perfil | MEDIAPRO</title>
    <link rel="icon" type="image/png" href="{{ asset('favicon.png') }}">
    <link rel="stylesheet" href="{{ asset('css/mediapro-portal.css') }}">
</head>
<body class="mp-body">
<header class="mp-topbar">
    <a class="mp-brand" href="{{ auth()->user()->role === 'admin' ? route('dashboard') : route('portal.cliente') }}">MEDIA<span>PRO</span><small>IMAGENESCREATIVAS</small></a>
    <nav class="mp-nav">
        @if(auth()->user()->role === 'admin')
            <a href="{{ route('dashboard') }}">Panel</a>
        @else
            <a href="{{ route('portal.cliente') }}">Mi espacio</a>
        @endif
        <a class="active" href="{{ route('profile.edit') }}">Mi perfil</a>
    </nav>
    <form method="POST" action="{{ route('logout') }}">@csrf<button class="mp-logout" type="submit">Cerrar sesión ↗</button></form>
</header>

<main class="mp-main mp-profile-main">
    <div class="mp-profile-heading">
        <p class="mp-eyebrow"><span></span> MEDIAPRO / CONFIGURACIÓN DE CUENTA</p>
        <h1>Tu espacio,<br><em>tu identidad.</em></h1>
        <p>Actualiza tus datos y personaliza la información asociada a tu cuenta.</p>
    </div>

    @if(session('status'))
        @php
            $statusMessage = match (session('status')) {
                'profile-updated' => 'Tus datos personales se actualizaron correctamente.',
                'photo-updated' => 'Tu fotografía de perfil se guardó correctamente.',
                'photo-deleted' => 'Tu fotografía de perfil fue eliminada.',
                default => 'La operación se completó correctamente.',
            };
        @endphp
        <div class="mp-alert mp-alert-success">{{ $statusMessage }}</div>
    @endif
    @if($errors->any())
        <div class="mp-alert mp-alert-error">
            <strong>Revisa la información:</strong>
            <ul>@foreach($errors->all() as $error)<li>{{ $error }}</li>@endforeach</ul>
        </div>
    @endif

    <div class="mp-settings-grid">
        <section class="mp-settings-card mp-photo-card">
            <p class="mp-eyebrow">01 — FOTOGRAFÍA</p>
            <h2>Tu foto de perfil</h2>
            <p class="mp-muted">Añade una imagen para personalizar tu cuenta. Formatos JPG, PNG o WEBP, máximo 4 MB.</p>
            <div class="mp-avatar-preview">
                @if(auth()->user()->profile_photo_path)
                    <img src="{{ route('profile.photo') }}" alt="Foto de perfil actual">
                @else
                    <span>{{ mb_strtoupper(mb_substr(auth()->user()->name, 0, 1)) }}</span>
                @endif
            </div>
            <form method="POST" action="{{ route('profile.photo.update') }}" enctype="multipart/form-data" class="mp-form">
                @csrf
                <label class="mp-file-label" for="photo">Seleccionar fotografía</label>
                <input id="photo" type="file" name="photo" accept="image/jpeg,image/png,image/webp" required>
                <button class="mp-button" type="submit">Subir fotografía <span>↗</span></button>
            </form>
            @if(auth()->user()->profile_photo_path)
                <form method="POST" action="{{ route('profile.photo.destroy') }}" onsubmit="return confirm('¿Quieres eliminar tu fotografía de perfil?')">
                    @csrf @method('DELETE')
                    <button class="mp-text-danger" type="submit">Eliminar fotografía</button>
                </form>
            @endif
        </section>

        <section class="mp-settings-card">
            <p class="mp-eyebrow">02 — INFORMACIÓN PERSONAL</p>
            <h2>Datos de tu cuenta</h2>
            <p class="mp-muted">Mantén actualizados tu nombre y correo electrónico.</p>
            <form method="POST" action="{{ route('profile.update') }}" class="mp-form">
                @csrf
                @method('PATCH')
                <label>Nombre completo
                    <input type="text" name="name" value="{{ old('name', auth()->user()->name) }}" maxlength="100" autocomplete="name" required>
                </label>
                <label>Correo electrónico
                    <input type="email" name="email" value="{{ old('email', auth()->user()->email) }}" maxlength="100" autocomplete="email" required>
                </label>
                <button class="mp-button" type="submit">Guardar cambios <span>↗</span></button>
            </form>
        </section>

        <section class="mp-settings-card">
            <p class="mp-eyebrow">03 — SEGURIDAD</p>
            <h2>Eliminar cuenta</h2>
            <p class="mp-muted">Si decides eliminar tu cuenta, dejarás de poder iniciar sesión. El registro de cliente y su historial de producciones se conservarán en MEDIAPRO, desvinculados de tu usuario.</p>
            <form method="POST" action="{{ route('profile.destroy') }}" class="mp-form" onsubmit="return confirm('Esta acción eliminará tu cuenta de acceso. ¿Deseas continuar?')">
                @csrf
                @method('DELETE')
                <label>Confirma tu contraseña
                    <input type="password" name="password" autocomplete="current-password" required>
                </label>
                <button class="mp-button mp-button-danger" type="submit">Eliminar mi cuenta</button>
            </form>
        </section>
    </div>
    <a class="mp-back-link" href="{{ auth()->user()->role === 'admin' ? route('dashboard') : route('portal.cliente') }}">← Volver a mi espacio</a>
</main>

<footer class="mp-footer">
    <a class="mp-brand" href="{{ route('landing') }}">MEDIA<span>PRO</span><small>IMAGENESCREATIVAS</small></a>
    <span>© {{ date('Y') }} MEDIAPRO</span>
    <a href="{{ route('privacy.policy') }}">Política de privacidad</a>
</footer>
</body>
</html>
