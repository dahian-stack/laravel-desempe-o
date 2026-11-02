
<!doctype html>
<html lang="es" data-bs-theme="light">

<head>
    <title>Nueva Escena — Mediapro</title>

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
                    <a class="nav-link" href="{{ route('planes_rodaje.index') }}">
                        Planes de Rodaje
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="{{ route('escenas.index') }}">
                        Escenas
                    </a>
                </li>
            </ul>
        </div>
    </nav>
</header>

<main class="flex-grow-1">
    <div class="container mt-5" style="max-width: 720px;">

        <h1 class="mb-4">🎬 Nueva Escena</h1>

        <form action="{{ route('escenas.store') }}" method="POST">
            @csrf

            <!-- Producción -->
            <div class="mb-3">
                <label for="ID_produccion" class="form-label">
                    Producción *
                </label>

                <select
                    id="ID_produccion"
                    name="ID_produccion"
                    class="form-select @error('ID_produccion') is-invalid @enderror"
                    required
                >
                    <option value="">Seleccionar producción</option>

                    @foreach ($producciones as $produccion)
                        <option
                            value="{{ $produccion->ID_produccion }}"
                            {{ old('ID_produccion') == $produccion->ID_produccion ? 'selected' : '' }}
                        >
                            {{ $produccion->Titulo }}
                        </option>
                    @endforeach
                </select>

                @error('ID_produccion')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <!-- Descripción -->
            <div class="mb-3">
                <label for="Descripcion" class="form-label">
                    Descripción *
                </label>

                <textarea
                    id="Descripcion"
                    name="Descripcion"
                    rows="4"
                    class="form-control @error('Descripcion') is-invalid @enderror"
                    required
                >{{ old('Descripcion') }}</textarea>

                @error('Descripcion')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <!-- Tiempo estimado -->
            <div class="mb-3">
                <label for="Tiempo_estimado" class="form-label">
                    Tiempo estimado
                </label>

                <input
                    type="text"
                    id="Tiempo_estimado"
                    name="Tiempo_estimado"
                    class="form-control @error('Tiempo_estimado') is-invalid @enderror"
                    value="{{ old('Tiempo_estimado') }}"
                    placeholder="Ej: 2 horas"
                >

                @error('Tiempo_estimado')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <!-- Necesidades especiales -->
            <div class="mb-3">
                <label for="Necesidades_especiales" class="form-label">
                    Necesidades especiales
                </label>

                <textarea
                    id="Necesidades_especiales"
                    name="Necesidades_especiales"
                    rows="3"
                    class="form-control @error('Necesidades_especiales') is-invalid @enderror"
                    placeholder="Describe los recursos o necesidades especiales de la escena"
                >{{ old('Necesidades_especiales') }}</textarea>

                @error('Necesidades_especiales')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="row">

                <!-- Complejidad -->
                <div class="col-md-6 mb-3">
                    <label for="Complejidad" class="form-label">
                        Complejidad
                    </label>

                    <select
                        id="Complejidad"
                        name="Complejidad"
                        class="form-select @error('Complejidad') is-invalid @enderror"
                    >
                        <option value="">Seleccionar</option>

                        <option value="Baja" {{ old('Complejidad') == 'Baja' ? 'selected' : '' }}>
                            Baja
                        </option>

                        <option value="Media" {{ old('Complejidad') == 'Media' ? 'selected' : '' }}>
                            Media
                        </option>

                        <option value="Alta" {{ old('Complejidad') == 'Alta' ? 'selected' : '' }}>
                            Alta
                        </option>
                    </select>

                    @error('Complejidad')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Estado -->
                <div class="col-md-6 mb-3">
                    <label for="Estado" class="form-label">
                        Estado
                    </label>

                    <select
                        id="Estado"
                        name="Estado"
                        class="form-select @error('Estado') is-invalid @enderror"
                    >
                        <option value="">Seleccionar</option>

                        <option value="Pendiente" {{ old('Estado') == 'Pendiente' ? 'selected' : '' }}>
                            Pendiente
                        </option>

                        <option value="En Rodaje" {{ old('Estado') == 'En Rodaje' ? 'selected' : '' }}>
                            En Rodaje
                        </option>

                        <option value="Grabada" {{ old('Estado') == 'Grabada' ? 'selected' : '' }}>
                            Grabada
                        </option>

                        <option value="Aprobada" {{ old('Estado') == 'Aprobada' ? 'selected' : '' }}>
                            Aprobada
                        </option>
                    </select>

                    @error('Estado')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

            </div>

            <!-- Botones -->
            <a href="{{ route('escenas.index') }}" class="btn btn-outline-secondary">
                Cancelar
            </a>

            <button type="submit" class="btn btn-primary">
                Guardar Escena
            </button>

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
                        <a href="{{ url('/dashboard') }}" class="link-light text-decoration-none">
                            Inicio
                        </a>
                    </li>

                    <li class="mb-2">
                        <a href="{{ route('clientes.index') }}" class="link-light text-decoration-none">
                            Clientes
                        </a>
                    </li>

                    <li class="mb-2">
                        <a href="{{ route('producciones.index') }}" class="link-light text-decoration-none">
                            Producciones
                        </a>
                    </li>

                    <li class="mb-2">
                        <a href="{{ route('personales.index') }}" class="link-light text-decoration-none">
                            Personal
                        </a>
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
