<!doctype html>
<html lang="es" data-bs-theme="light">

<head>
    <title>Nuevo Plan de Rodaje — Mediapro</title>

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
                    <a class="nav-link" href="{{ route('localizaciones.index') }}">
                        Localizaciones
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="{{ route('planes_rodaje.index') }}">
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
        <h1 class="mb-4">📅 Nuevo Plan de Rodaje</h1>

        <form action="{{ route('planes_rodaje.store') }}" method="POST">
            @csrf

            <!-- Producción -->
            <div class="mb-3">
                <label for="ID_produccion" class="form-label">Producción *</label>
                <select id="ID_produccion" name="ID_produccion" class="form-select @error('ID_produccion') is-invalid @enderror" required>
                    <option value="">Seleccionar producción</option>
                    @foreach ($producciones as $produccion)
                        <option value="{{ $produccion->ID_produccion }}" {{ old('ID_produccion') == $produccion->ID_produccion ? 'selected' : '' }}>
                            {{ $produccion->Titulo }}
                        </option>
                    @endforeach
                </select>
                @error('ID_produccion')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <!-- Localización -->
            <div class="mb-3">
                <label for="ID_localizacion" class="form-label">Localización *</label>
                <select id="ID_localizacion" name="ID_localizacion" class="form-select @error('ID_localizacion') is-invalid @enderror" required>
                    <option value="">Seleccionar localización</option>
                    @foreach ($localizaciones as $localizacion)
                        <option value="{{ $localizacion->ID_localizacion }}" {{ old('ID_localizacion') == $localizacion->ID_localizacion ? 'selected' : '' }}>
                            {{ $localizacion->Nombre }} — {{ $localizacion->Direccion }}
                        </option>
                    @endforeach
                </select>
                @error('ID_localizacion')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <!-- Personal Asignado -->
            <div class="mb-3">
                <label for="ID_personal" class="form-label">Personal Responsable</label>
                <select id="ID_personal" name="ID_personal" class="form-select @error('ID_personal') is-invalid @enderror">
                    <option value="">Sin asignar</option>
                    @foreach ($personales as $personal)
                        <option value="{{ $personal->ID_personal }}" {{ old('ID_personal') == $personal->ID_personal ? 'selected' : '' }}>
                            {{ $personal->Nombres }} {{ $personal->Apellidos }} — {{ $personal->Especialidad }}
                        </option>
                    @endforeach
                </select>
                @error('ID_personal')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <!-- Fecha -->
            <div class="mb-3">
                <label for="Fecha" class="form-label">Fecha de Rodaje *</label>
                <input type="date" id="Fecha" name="Fecha"
                       class="form-control @error('Fecha') is-invalid @enderror"
                       value="{{ old('Fecha') }}" required>
                @error('Fecha')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="row">
                <!-- Hora Inicio -->
                <div class="col-md-6 mb-3">
                    <label for="Hora_inicio" class="form-label">Hora de Inicio *</label>
                    <input type="time" id="Hora_inicio" name="Hora_inicio"
                           class="form-control @error('Hora_inicio') is-invalid @enderror"
                           value="{{ old('Hora_inicio') }}" required>
                    @error('Hora_inicio')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Hora Fin -->
                <div class="col-md-6 mb-3">
                    <label for="Hora_fin" class="form-label">Hora de Finalización *</label>
                    <input type="time" id="Hora_fin" name="Hora_fin"
                           class="form-control @error('Hora_fin') is-invalid @enderror"
                           value="{{ old('Hora_fin') }}" required>
                    @error('Hora_fin')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <!-- Observaciones -->
            <div class="mb-4">
                <label for="Observaciones" class="form-label">Observaciones</label>
                <textarea id="Observaciones" name="Observaciones" rows="4"
                          class="form-control @error('Observaciones') is-invalid @enderror"
                          placeholder="Detalles importantes, equipo necesario, notas de producción...">{{ old('Observaciones') }}</textarea>
                @error('Observaciones')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <a href="{{ route('planes_rodaje.index') }}" class="btn btn-outline-secondary">Cancelar</a>
            <button type="submit" class="btn btn-primary">Guardar Plan</button>
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
