<!doctype html>
<html lang="es" data-bs-theme="light">

<head>
    <title>Nueva Localización — Mediapro</title>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS v5.3.8 -->
    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css"
        rel="stylesheet"
        integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB"
        crossorigin="anonymous"
    >

    <!-- Bootstrap Icons -->
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
                    <a class="nav-link" href="{{ url('/dashboard') }}">
                        Inicio
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('clientes.index') }}">
                        Clientes
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('producciones.index') }}">
                        Producciones
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('personales.index') }}">
                        Personal
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('equipos_tecnicos.index') }}">
                        Equipos Técnicos
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="{{ route('localizaciones.index') }}">
                        Localizaciones
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('planes_rodaje.index') }}">
                        Planes de Rodaje
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('escenas.index') }}">
                        Escenas
                    </a>
                </li>
            </ul>
        </div>
    </nav>
</header>

<main class="flex-grow-1">
    <div class="container mt-5" style="max-width: 720px;">
        <h1 class="mb-4">📍 Nueva Localización</h1>

        <form action="{{ route('localizaciones.store') }}" method="POST">
            @csrf

            <!-- Nombre -->
            <div class="mb-3">
                <label for="Nombre" class="form-label">Nombre *</label>
                <input type="text" id="Nombre" name="Nombre"
                       class="form-control @error('Nombre') is-invalid @enderror"
                       value="{{ old('Nombre') }}" required>
                @error('Nombre')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <!-- Dirección -->
            <div class="mb-3">
                <label for="Direccion" class="form-label">Dirección *</label>
                <input type="text" id="Direccion" name="Direccion"
                       class="form-control @error('Direccion') is-invalid @enderror"
                       value="{{ old('Direccion') }}" required>
                @error('Direccion')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="row">
                <!-- Coordenadas -->
                <div class="col-md-6 mb-3">
                    <label for="Coordenadas" class="form-label">Coordenadas</label>
                    <input type="text" id="Coordenadas" name="Coordenadas"
                           class="form-control @error('Coordenadas') is-invalid @enderror"
                           value="{{ old('Coordenadas') }}" placeholder="Ej: 6.234, -75.578">
                    @error('Coordenadas')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Tipo -->
                <div class="col-md-6 mb-3">
                    <label for="Tipo" class="form-label">Tipo</label>
                    <select id="Tipo" name="Tipo" class="form-select @error('Tipo') is-invalid @enderror">
                        <option value="">Seleccionar</option>
                        <option value="Exterior" {{ old('Tipo') == 'Exterior' ? 'selected' : '' }}>Exterior</option>
                        <option value="Interior" {{ old('Tipo') == 'Interior' ? 'selected' : '' }}>Interior</option>
                        <option value="Mixto" {{ old('Tipo') == 'Mixto' ? 'selected' : '' }}>Mixto</option>
                        <option value="Urbano" {{ old('Tipo') == 'Urbano' ? 'selected' : '' }}>Urbano</option>
                        <option value="Rural" {{ old('Tipo') == 'Rural' ? 'selected' : '' }}>Rural</option>
                    </select>
                    @error('Tipo')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <!-- Propietario -->
            <div class="mb-3">
                <label for="Propietario" class="form-label">Propietario</label>
                <input type="text" id="Propietario" name="Propietario"
                       class="form-control @error('Propietario') is-invalid @enderror"
                       value="{{ old('Propietario') }}">
                @error('Propietario')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <!-- Características -->
            <div class="mb-3">
                <label for="Caracteristicas" class="form-label">Características</label>
                <textarea id="Caracteristicas" name="Caracteristicas" rows="3"
                          class="form-control @error('Caracteristicas') is-invalid @enderror">{{ old('Caracteristicas') }}</textarea>
                @error('Caracteristicas')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="row">
                <!-- Permisos -->
                <div class="col-md-6 mb-3">
                    <label for="Permisos" class="form-label">Permisos Requeridos</label>
                    <select id="Permisos" name="Permisos" class="form-select @error('Permisos') is-invalid @enderror">
                        <option value="">Seleccionar</option>
                        <option value="Si" {{ old('Permisos') == 'Si' ? 'selected' : '' }}>Sí</option>
                        <option value="No" {{ old('Permisos') == 'No' ? 'selected' : '' }}>No</option>
                    </select>
                    @error('Permisos')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Estado -->
                <div class="col-md-6 mb-3">
                    <label for="Estado" class="form-label">Estado</label>
                    <select id="Estado" name="Estado" class="form-select @error('Estado') is-invalid @enderror">
                        <option value="">Seleccionar</option>
                        <option value="Disponible" {{ old('Estado') == 'Disponible' ? 'selected' : '' }}>Disponible</option>
                        <option value="Ocupada" {{ old('Estado') == 'Ocupada' ? 'selected' : '' }}>Ocupada</option>
                        <option value="Restringida" {{ old('Estado') == 'Restringida' ? 'selected' : '' }}>Restringida</option>
                    </select>
                    @error('Estado')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="row">
                <!-- Costo -->
                <div class="col-md-6 mb-3">
                    <label for="Costo" class="form-label">Costo ($)</label>
                    <input type="number" id="Costo" name="Costo" step="0.01" min="0"
                           class="form-control @error('Costo') is-invalid @enderror"
                           value="{{ old('Costo') }}">
                    @error('Costo')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Accesibilidad -->
                <div class="col-md-6 mb-3">
                    <label for="Accesibilidad" class="form-label">Accesibilidad</label>
                    <select id="Accesibilidad" name="Accesibilidad" class="form-select @error('Accesibilidad') is-invalid @enderror">
                        <option value="">Seleccionar</option>
                        <option value="Buena" {{ old('Accesibilidad') == 'Buena' ? 'selected' : '' }}>Buena</option>
                        <option value="Regular" {{ old('Accesibilidad') == 'Regular' ? 'selected' : '' }}>Regular</option>
                        <option value="Dificil" {{ old('Accesibilidad') == 'Dificil' ? 'selected' : '' }}>Difícil</option>
                    </select>
                    @error('Accesibilidad')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <!-- Facilidades -->
            <div class="mb-3">
                <label for="Facilidades" class="form-label">Facilidades</label>
                <textarea id="Facilidades" name="Facilidades" rows="2"
                          class="form-control @error('Facilidades') is-invalid @enderror">{{ old('Facilidades') }}</textarea>
                @error('Facilidades')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <!-- Limitaciones -->
            <div class="mb-4">
                <label for="Limitaciones" class="form-label">Limitaciones</label>
                <textarea id="Limitaciones" name="Limitaciones" rows="2"
                          class="form-control @error('Limitaciones') is-invalid @enderror">{{ old('Limitaciones') }}</textarea>
                @error('Limitaciones')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <a href="{{ route('localizaciones.index') }}" class="btn btn-outline-secondary">Cancelar</a>
            <button type="submit" class="btn btn-primary">Guardar Localización</button>
        </form>
    </div>
</main>

<!-- Footer -->
<footer class="bg-primary text-white mt-5">
    <div class="container py-5">
        <div class="row gy-4">
            <div class="col-md-4">
                <h5 class="mb-3">Mediapro</h5>
                <p class="mb-0 small">
                    Gestión integral de producciones audiovisuales.
                </p>
            </div>
            <div class="col-md-4">
                <h6 class="text-uppercase mb-3">Navegación</h6>
                <ul class="list-unstyled small">
                    <li class="mb-2">
                        <a href="{{ url('/dashboard') }}" class="link-light text-decoration-none">Inicio</a>
                    </li>
                    <li class="mb-2">
                        <a href="{{ route('clientes.index') }}" class="link-light text-decoration-none">Clientes</a>
                    </li>
                    <li class="mb-2">
                        <a href="{{ route('producciones.index') }}" class="link-light text-decoration-none">Producciones</a>
                    </li>
                    <li class="mb-2">
                        <a href="{{ route('personales.index') }}" class="link-light text-decoration-none">Personal</a>
                    </li>
                </ul>
            </div>
            <div class="col-md-4">
                <h6 class="text-uppercase mb-3">Contacto</h6>
                <ul class="list-unstyled small">
                    <li class="mb-2">
                        <i class="bi bi-geo-alt-fill me-2"></i>
                        Envigado, Antioquia — Colombia
                    </li>
                    <li class="mb-2">
                        <i class="bi bi-envelope-fill me-2"></i>
                        contacto@mediapro.com
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div class="border-top border-light border-opacity-25">
        <div class="container py-3 text-center small">
            &copy; {{ date('Y') }} Mediapro. Todos los derechos reservados.
        </div>
    </div>
</footer>

<script
    src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI"
    crossorigin="anonymous">
</script>

</body>
</html>
