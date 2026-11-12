<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="theme-color" content="#090711">
    <title>Panel administrativo | MEDIAPRO</title>
    <link rel="icon" type="image/png" href="{{ asset('favicon.png') }}">
    <link rel="stylesheet" href="{{ asset('css/mediapro-portal.css') }}">
    <link rel="stylesheet" href="{{ asset('css/mediapro-admin.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>
<body class="mp-body mp-admin-body">
@include('layouts.admin-navigation')

<main class="mp-main mp-admin-main">
    <section class="mp-welcome mp-admin-welcome">
        <div class="mp-welcome-copy">
            <p class="mp-eyebrow"><span></span> CENTRO DE CONTROL · MEDIAPRO</p>
            <h1>Bienvenida,<br>{{ auth()->user()->name }}.<br><em>Todo empieza aquí.</em></h1>
            <p>Administra los recursos, clientes y proyectos de producción audiovisual desde un solo espacio.</p>
            <a class="mp-primary-link" href="#modulos">Explorar módulos <span>↘</span></a>
        </div>
        <div class="mp-welcome-art" aria-hidden="true">
            <div class="mp-orbit mp-orbit-one"></div>
            <div class="mp-orbit mp-orbit-two"></div>
            <div class="mp-art-center">MP<span>✳</span></div>
            <span class="mp-art-caption">IMAGINAR · CREAR · CONTAR</span>
        </div>
        <div class="mp-welcome-index">MEDIAPRO / ADMINISTRACIÓN / {{ date('Y') }}</div>
    </section>

    <section class="mp-section mp-admin-modules" id="modulos">
        <div class="mp-section-heading">
            <div>
                <p class="mp-eyebrow">01 — GESTIÓN</p>
                <h2>Módulos del <em>sistema.</em></h2>
            </div>
            <span class="mp-count">7 ÁREAS DE ADMINISTRACIÓN</span>
        </div>

        <div class="mp-project-grid mp-admin-grid">
            <a class="mp-project-card mp-admin-module" href="{{ route('clientes.index') }}">
                <div class="mp-project-top"><span class="mp-project-icon"><i class="bi bi-people"></i></span><span class="mp-project-number">01 / CLIENTES</span></div>
                <h3>Clientes</h3><p class="mp-project-description">Administra los clientes, sus datos de contacto y sus relaciones con las producciones.</p>
                <span class="mp-admin-card-link">Abrir módulo <b>↗</b></span>
            </a>
            <a class="mp-project-card mp-admin-module" href="{{ route('producciones.index') }}">
                <div class="mp-project-top"><span class="mp-project-icon"><i class="bi bi-film"></i></span><span class="mp-project-number">02 / PROYECTOS</span></div>
                <h3>Producciones</h3><p class="mp-project-description">Organiza los proyectos audiovisuales, sus etapas, estados y clientes asociados.</p>
                <span class="mp-admin-card-link">Abrir módulo <b>↗</b></span>
            </a>
            <a class="mp-project-card mp-admin-module" href="{{ route('personales.index') }}">
                <div class="mp-project-top"><span class="mp-project-icon"><i class="bi bi-person-badge"></i></span><span class="mp-project-number">03 / TALENTO</span></div>
                <h3>Personal</h3><p class="mp-project-description">Gestiona el equipo humano, sus perfiles y la información de trabajo.</p>
                <span class="mp-admin-card-link">Abrir módulo <b>↗</b></span>
            </a>
            <a class="mp-project-card mp-admin-module" href="{{ route('equipos_tecnicos.index') }}">
                <div class="mp-project-top"><span class="mp-project-icon"><i class="bi bi-camera-reels"></i></span><span class="mp-project-number">04 / RECURSOS</span></div>
                <h3>Equipos técnicos</h3><p class="mp-project-description">Controla los equipos audiovisuales, su disponibilidad y estado.</p>
                <span class="mp-admin-card-link">Abrir módulo <b>↗</b></span>
            </a>
            <a class="mp-project-card mp-admin-module" href="{{ route('localizaciones.index') }}">
                <div class="mp-project-top"><span class="mp-project-icon"><i class="bi bi-geo-alt"></i></span><span class="mp-project-number">05 / ESPACIOS</span></div>
                <h3>Localizaciones</h3><p class="mp-project-description">Consulta y administra los lugares previstos para las grabaciones.</p>
                <span class="mp-admin-card-link">Abrir módulo <b>↗</b></span>
            </a>
            <a class="mp-project-card mp-admin-module" href="{{ route('planes_rodaje.index') }}">
                <div class="mp-project-top"><span class="mp-project-icon"><i class="bi bi-calendar-event"></i></span><span class="mp-project-number">06 / PLANIFICACIÓN</span></div>
                <h3>Planes de rodaje</h3><p class="mp-project-description">Coordina fechas, horarios y organización de las jornadas de rodaje.</p>
                <span class="mp-admin-card-link">Abrir módulo <b>↗</b></span>
            </a>
            <a class="mp-project-card mp-admin-module" href="{{ route('escenas.index') }}">
                <div class="mp-project-top"><span class="mp-project-icon"><i class="bi bi-camera-reels-fill"></i></span><span class="mp-project-number">07 / CONTENIDO</span></div>
                <h3>Escenas</h3><p class="mp-project-description">Gestiona las escenas, sus descripciones y necesidades de producción.</p>
                <span class="mp-admin-card-link">Abrir módulo <b>↗</b></span>
            </a>
        </div>
    </section>

    <section class="mp-profile-banner mp-admin-profile-banner">
        <div><p class="mp-eyebrow">02 — TU CUENTA</p><h2>Administra tu perfil.</h2><p>Actualiza tus datos personales y tu fotografía de perfil.</p></div>
        <a class="mp-outline-link" href="{{ route('profile.edit') }}">Ir a mi perfil <span>↗</span></a>
    </section>
</main>

@include('layouts.admin-footer')
</body>
</html>