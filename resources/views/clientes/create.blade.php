
<!doctype html>
<html lang="es" data-bs-theme="light">

<head>
    <title>Nuevo Cliente — Mediapro</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css"
        rel="stylesheet"
        integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB"
        crossorigin="anonymous"
    >

    <link
        rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css"
    >
</head>

<body class="d-flex flex-column min-vh-100">

<header>
    <nav class="navbar navbar-expand-sm bg-primary navbar-dark">
        <div class="container-fluid">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/dashboard') }}">Inicio</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="{{ route('clientes.index') }}">Clientes</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('producciones.index') }}">Producciones</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('personales.index') }}">Personal</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('equipos_tecnicos.index') }}">Equipos Técnicos</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('localizaciones.index') }}">Localizaciones</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('planes_rodaje.index') }}">Planes de Rodaje</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('escenas.index') }}">Escenas</a>
                </li>
            </ul>
        </div>
    </nav>
</header>

<main class="flex-grow-1">
    <div class="container mt-5" style="max-width: 720px;">

        <h1 class="mb-4">
            <i class="bi bi-person-plus me-2"></i>Nuevo Cliente
        </h1>

        <form action="{{ route('clientes.store') }}" method="POST">
            @csrf

            <!-- Nombre -->
            <div class="mb-3">
                <label for="Nombre" class="form-label">Nombre *</label>

                <input
                    type="text"
                    id="Nombre"
                    name="Nombre"
                    class="form-control @error('Nombre') is-invalid @enderror"
                    value="{{ old('nombre') }}"
                    maxlength="100"
                    required
                >

                @error('Nombre')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="row">

                <!-- Tipo -->
                <div class="col-md-6 mb-3">
                    <label for="tipo" class="form-label">Tipo</label>

                    <select
                        id="Tipo"
                        name="Tipo"
                        class="form-select @error('Tipo') is-invalid @enderror"
                    >
                        <option value="">Seleccionar</option>

                        <option value="Empresa" {{ old('tipo') == 'Empresa' ? 'selected' : '' }}>
                            Empresa
                        </option>

                        <option value="Independiente" {{ old('tipo') == 'Independiente' ? 'selected' : '' }}>
                            Independiente
                        </option>

                        <option value="Institución" {{ old('tipo') == 'Institución' ? 'selected' : '' }}>
                            Institución
                        </option>
                    </select>

                    @error('Tipo')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Contacto -->
                <div class="col-md-6 mb-3">
                    <label for="Contacto" class="form-label">Contacto</label>

                    <input
                        type="text"
                        id="Contacto"
                        name="Contacto"
                        class="form-control @error('Contacto') is-invalid @enderror"
                        value="{{ old('Contacto') }}"
                        maxlength="100"
                    >

                    @error('Contacto')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

            </div>

            <!-- Botones -->
            <div class="mt-4">
                <a href="{{ route('clientes.index') }}" class="btn btn-outline-secondary">
                    <i class="bi bi-arrow-left me-1"></i>Cancelar
                </a>

                <button type="submit" class="btn btn-primary">
                    <i class="bi bi-save me-1"></i>Guardar
                </button>
            </div>

        </form>
    </div>
</main>

<footer class="bg-dark text-white mt-5">
    <div class="container py-4">
        <div class="row gy-4">

            <div class="col-md-4">
                <h5 class="mb-2">🎬 Mediapro</h5>
                <p class="small mb-0">
                    Sistema de Gestión de Producciones Audiovisuales
                </p>
            </div>

            <div class="col-md-4">
                <h6 class="text-uppercase small mb-2">Navegación</h6>
                <ul class="list-unstyled small">
                    <li>
                        <a href="{{ route('clientes.index') }}" class="link-light text-decoration-none">
                            Clientes
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('producciones.index') }}" class="link-light text-decoration-none">
                            Producciones
                        </a>
                    </li>
                </ul>
            </div>

            <div class="col-md-4">
                <h6 class="text-uppercase small mb-2">Contacto</h6>
                <p class="small mb-1">
                    <i class="bi bi-geo-alt me-2"></i>Envigado, Colombia
                </p>
                <p class="small mb-0">
                    <i class="bi bi-envelope me-2"></i>info@mediapro.com
                </p>
            </div>

        </div>
    </div>

    <div class="border-top border-secondary py-2 text-center small">
        &copy; {{ date('Y') }} Mediapro. Todos los derechos reservados.
    </div>
</footer>

<script
    src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI"
    crossorigin="anonymous">
</script>

</body>
</html>
