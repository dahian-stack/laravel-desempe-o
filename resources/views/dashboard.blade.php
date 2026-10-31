<!doctype html>
<html lang="es" data-bs-theme="light">

<head>
    <title>Inicio — Mediapro</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">

    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <style>
        body {
            background-color: #f0f4f8;
        }

        .card-modulo {
            transition: all 0.3s ease;
            border: 1px solid #d9e2ec;
            border-left: 3px solid transparent;
            background-color: #ffffff;
        }
        .card-modulo:hover {
            transform: translateY(-3px);
            box-shadow: 0 0.25rem 0.75rem rgba(43, 108, 176, 0.12);
            border-left-color: #6ea8d9;
        }
        .icono-modulo {
            font-size: 1.8rem;
            color: #4a8fc7;
            opacity: 0.95;
        }
        .bienvenida {
            background: linear-gradient(135deg, #e6f0fa 0%, #d7e8f5 100%);
            color: #1e4d7b;
            border-radius: 0.75rem;
            border: 1px solid #bdd7ee;
        }
        .navbar {
            background-color: #2c7abe !important;
        }
        .navbar .navbar-brand,
        .navbar .nav-link {
            color: #ffffff !important;
        }
        .navbar .nav-link:hover,
        .navbar .nav-link.active {
            color: #d4e6f7 !important;
        }
        h5 {
            color: #1e4d7b;
        }
    </style>
</head>

<body class="d-flex flex-column min-vh-100">

<!-- Barra de Navegación -->
<header>
    <nav class="navbar navbar-expand-lg shadow-sm">
        <div class="container">
            <a class="navbar-brand fw-semibold" href="{{ url('/dashboard') }}">
                <i class="bi bi-film me-2"></i>Mediapro
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav me-auto">
                    <li class="nav-item">
                        <a class="nav-link active" href="{{ url('/dashboard') }}">
                            <i class="bi bi-house-fill me-1"></i> Inicio
                        </a>
                    </li>
                </ul>

                <ul class="navbar-nav">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">
                            <i class="bi bi-person-circle me-1"></i> {{ Auth::user()->name ?? 'Usuario' }}
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end">
                            <li>
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <button type="submit" class="dropdown-item">
                                        <i class="bi bi-box-arrow-right me-1"></i> Cerrar sesión
                                    </button>
                                </form>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</header>

<!-- Contenido Principal -->
<main class="flex-grow-1 py-5">
    <div class="container">

        <!-- Tarjeta de Bienvenida -->
        <div class="bienvenida p-5 mb-5">
            <h1 class="fw-semibold mb-2">¡Bienvenida, {{ Auth::user()->name ?? 'Karol' }}! 👋</h1>
            <p class="mb-0 opacity-80">Ya estás conectada y lista para gestionar todo el sistema de producción audiovisual.</p>
        </div>

        <!-- Título de Módulos -->
        <h2 class="h5 fw-semibold mb-4" style="color: #1e4d7b;">
            <i class="bi bi-grid-3x3-gap me-2" style="color: #4a8fc7;"></i> Módulos del Sistema
        </h2>

        <!-- Tarjetas de Módulos -->
        <div class="row g-4">

            <!-- Clientes -->
            <div class="col-md-6 col-lg-4">
                <a href="{{ route('clientes.index') }}" class="text-decoration-none">
                    <div class="card card-modulo h-100 p-4">
                        <div class="d-flex align-items-center">
                            <div class="me-3">
                                <i class="bi bi-people-fill icono-modulo"></i>
                            </div>
                            <div>
                                <h5 class="fw-medium mb-1">Clientes</h5>
                                <p class="text-muted small mb-0">Gestionar clientes y contactos</p>
                            </div>
                        </div>
                    </div>
                </a>
            </div>

            <!-- Producciones -->
            <div class="col-md-6 col-lg-4">
                <a href="{{ route('producciones.index') }}" class="text-decoration-none">
                    <div class="card card-modulo h-100 p-4">
                        <div class="d-flex align-items-center">
                            <div class="me-3">
                                <i class="bi bi-film icono-modulo"></i>
                            </div>
                            <div>
                                <h5 class="fw-medium mb-1">Producciones</h5>
                                <p class="text-muted small mb-0">Proyectos, presupuestos y estados</p>
                            </div>
                        </div>
                    </div>
                </a>
            </div>

            <!-- Personal -->
            <div class="col-md-6 col-lg-4">
                <a href="{{ route('personales.index') }}" class="text-decoration-none">
                    <div class="card card-modulo h-100 p-4">
                        <div class="d-flex align-items-center">
                            <div class="me-3">
                                <i class="bi bi-person-badge-fill icono-modulo"></i>
                            </div>
                            <div>
                                <h5 class="fw-medium mb-1">Personal</h5>
                                <p class="text-muted small mb-0">Equipo de trabajo y tarifas</p>
                            </div>
                        </div>
                    </div>
                </a>
            </div>

            <!-- Equipos Técnicos -->
            <div class="col-md-6 col-lg-4">
                <a href="{{ route('equipos_tecnicos.index') }}" class="text-decoration-none">
                    <div class="card card-modulo h-100 p-4">
                        <div class="d-flex align-items-center">
                            <div class="me-3">
                                <i class="bi bi-camera-reels-fill icono-modulo"></i>
                            </div>
                            <div>
                                <h5 class="fw-medium mb-1">Equipos Técnicos</h5>
                                <p class="text-muted small mb-0">Material, mantenimiento y estado</p>
                            </div>
                        </div>
                    </div>
                </a>
            </div>

            <!-- Localizaciones -->
            <div class="col-md-6 col-lg-4">
                <a href="{{ route('localizaciones.index') }}" class="text-decoration-none">
                    <div class="card card-modulo h-100 p-4">
                        <div class="d-flex align-items-center">
                            <div class="me-3">
                                <i class="bi bi-geo-alt-fill icono-modulo"></i>
                            </div>
                            <div>
                                <h5 class="fw-medium mb-1">Localizaciones</h5>
                                <p class="text-muted small mb-0">Lugares, costos y permisos</p>
                            </div>
                        </div>
                    </div>
                </a>
            </div>

            <!-- Planes de Rodaje -->
            <div class="col-md-6 col-lg-4">
                <a href="{{ route('planes_rodaje.index') }}" class="text-decoration-none">
                    <div class="card card-modulo h-100 p-4">
                        <div class="d-flex align-items-center">
                            <div class="me-3">
                                <i class="bi bi-calendar-event-fill icono-modulo"></i>
                            </div>
                            <div>
                                <h5 class="fw-medium mb-1">Planes de Rodaje</h5>
                                <p class="text-muted small mb-0">Horarios, fechas y lugares</p>
                            </div>
                        </div>
                    </div>
                </a>
            </div>

            <!-- Escenas -->
            <div class="col-md-6 col-lg-4">
                <a href="{{ route('escenas.index') }}" class="text-decoration-none">
                    <div class="card card-modulo h-100 p-4">
                        <div class="d-flex align-items-center">
                            <div class="me-3">
                                <i class="bi bi-clapperboard icono-modulo"></i>
                            </div>
                            <div>
                                <h5 class="fw-medium mb-1">Escenas</h5>
                                <p class="text-muted small mb-0">Descripciones y necesidades</p>
                            </div>
                        </div>
                    </div>
                </a>
            </div>

        </div>
    </div>
</main>

<!-- Pie de Página -->
<footer class="py-4 mt-auto border-top" style="background-color: #eaf1f8;">
    <div class="container text-center">
        <p class="mb-0 small" style="color: #4a8fc7;">&copy; {{ date('Y') }} Mediapro — Sistema de Gestión de Producción Audiovisual</p>
    </div>
</footer>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>

</body>
</html>
