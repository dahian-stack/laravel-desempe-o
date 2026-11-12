<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="theme-color" content="#090711">
    <title>Mi portal | MEDIAPRO</title>
    <link rel="icon" type="image/png" href="{{ asset('favicon.png') }}">
    <link rel="stylesheet" href="{{ asset('css/mediapro-portal.css') }}">
</head>
<body class="mp-body">
<header class="mp-topbar">
    <a class="mp-brand" href="{{ route('portal.cliente') }}">MEDIA<span>PRO</span><small>IMAGENESCREATIVAS</small></a>
    <nav class="mp-nav">
        <a class="active" href="{{ route('portal.cliente') }}">Mi espacio</a>
        <a href="#producciones">Mis producciones</a>
        <a href="{{ route('profile.edit') }}">Mi perfil</a>
    </nav>
    <div class="mp-user-menu">
        <a class="mp-avatar mp-avatar-small" href="{{ route('profile.edit') }}" aria-label="Editar perfil">
            @if(auth()->user()->profile_photo_path)
                <img src="{{ route('profile.photo') }}" alt="Foto de perfil">
            @else
                {{ mb_strtoupper(mb_substr(auth()->user()->name, 0, 1)) }}
            @endif
        </a>
        <span class="mp-user-name">{{ auth()->user()->name }}</span>
        <form method="POST" action="{{ route('logout') }}">@csrf
            <button class="mp-logout" type="submit">Salir <span>↗</span></button>
        </form>
    </div>
</header>

<main class="mp-main">
    <section class="mp-welcome">
        <div class="mp-welcome-copy">
            <p class="mp-eyebrow"><span></span> PORTAL PRIVADO DE CLIENTES</p>
            <h1>Hola, {{ auth()->user()->name }}.<br>Tu historia sigue <em>en marcha.</em></h1>
            <p>Este es tu espacio para consultar el avance de tus proyectos audiovisuales y seguir cada etapa de su desarrollo.</p>
            <a class="mp-primary-link" href="#producciones">Explorar mis producciones <span>↘</span></a>
        </div>
        <div class="mp-welcome-art" aria-hidden="true">
            <div class="mp-orbit mp-orbit-one"></div><div class="mp-orbit mp-orbit-two"></div>
            <div class="mp-art-center">MP<span>✳</span></div>
            <span class="mp-art-caption">IMAGINAR · CREAR · CONTAR</span>
        </div>
        <div class="mp-welcome-index">MEDIAPRO / CLIENTES / 2026</div>
    </section>

    <section class="mp-section" id="producciones">
        <div class="mp-section-heading">
            <div>
                <p class="mp-eyebrow">01 — SEGUIMIENTO</p>
                <h2>Mis <em>producciones.</em></h2>
            </div>
            <span class="mp-count">{{ $cliente ? $cliente->producciones->count() : 0 }} PROYECTO(S)</span>
        </div>

        @if($cliente && $cliente->producciones->isNotEmpty())
            <div class="mp-project-grid">
                @foreach($cliente->producciones as $produccion)
                    <article class="mp-project-card">
                        <div class="mp-project-top">
                            <span class="mp-project-icon">✳</span>
                            <span class="mp-project-number">PROYECTO / {{ str_pad($loop->iteration, 2, '0', STR_PAD_LEFT) }}</span>
                        </div>
                        <h3>{{ $produccion->Titulo }}</h3>
                        <p class="mp-project-description">{{ $produccion->Descripcion ?: 'Tu proyecto audiovisual en desarrollo con MEDIAPRO.' }}</p>
                        <div class="mp-project-meta">
                            <div><span>ESTADO</span><strong>{{ $produccion->Estado ?: 'En seguimiento' }}</strong></div>
                            <div><span>ETAPA</span><strong>{{ $produccion->Etapa ?: 'Por definir' }}</strong></div>
                        </div>
                        <div class="mp-project-stats">
                            <span><b>{{ $produccion->escenas->count() }}</b> escenas</span>
                            <span><b>{{ $produccion->planesRodaje->count() }}</b> planes de rodaje</span>
                        </div>
                    </article>
                @endforeach
            </div>
        @else
            <div class="mp-empty">
                <span class="mp-empty-icon">✧</span>
                <p class="mp-eyebrow">TU PRÓXIMO PROYECTO COMIENZA AQUÍ</p>
                <h3>Aún no tienes producciones asignadas.</h3>
                <p>Cuando MEDIAPRO vincule una producción a tu cuenta, podrás consultar aquí su estado, sus escenas y sus planes de rodaje.</p>
            </div>
        @endif
    </section>

    <section class="mp-profile-banner">
        <div><p class="mp-eyebrow">02 — TU CUENTA</p><h2>¿Quieres actualizar<br>tus datos?</h2><p>Administra tu información personal y tu fotografía de perfil.</p></div>
        <a class="mp-outline-link" href="{{ route('profile.edit') }}">Administrar mi perfil <span>↗</span></a>
    </section>
</main>

<footer class="mp-footer">
    <a class="mp-brand" href="{{ route('portal.cliente') }}">MEDIA<span>PRO</span><small>IMAGENESCREATIVAS</small></a>
    <span>© {{ date('Y') }} MEDIAPRO · PORTAL DE CLIENTES</span>
    <a href="{{ route('privacy.policy') }}">Política de privacidad</a>
</footer>
</body>
</html>
