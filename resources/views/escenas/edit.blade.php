<!doctype html>
<html lang="es" data-bs-theme="light">

<head>
    <title>Editar Escena — Mediapro</title>

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
        <h1 class="mb-4">✏️ Editar Escena</h1>

        <form action="{{ route('escenas.update', $escena->ID_escena) }}" method="POST">
            @csrf
            @method('PUT')

            <!-- Producción -->
            <div class="mb-3">
                <label for="ID_produccion" class="form-label">Producción *</label>
                <select id="ID_produccion" name="ID_produccion" class="form-select @error('ID_produccion') is-invalid @enderror" required>
                    <option value="">Seleccionar producción</option>
                    @foreach ($producciones as $produccion)
                        <option value="{{ $produccion->ID_produccion }}"
                            {{ old('ID_produccion', $escena->ID_produccion) == $produccion->ID_produccion ? 'selected' : '' }}>
                            {{ $produccion->Titulo }}
                        </option>
                    @endforeach
                </select>
                @error('ID_produccion')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <!-- Número de Escena -->
            <div class="mb-3">
                <label for="Numero_escena" class="form-label">Número de Escena</label>
                <input type="text" id="Numero_escena" name="Numero_escena"
                       class="form-control @error('Numero_escena') is-invalid @enderror"
                       value="{{ old('Numero_escena', $escena->Numero_escena) }}" placeholder="Ej: ESC-001">
                @error('Numero_escena')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <!-- Descripción -->
            <div class="mb-3">
                <label for="Descripcion" class="form-label">Descripción *</label>
                <textarea id="Descripcion" name="Descripcion" rows="4"
                          class="form-control @error('Descripcion') is-invalid @enderror" required>{{ old('Descripcion', $escena->Descripcion) }}</textarea>
                @error('Descripcion')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <!-- Ubicación Descripción -->
            <div class="mb-3">
                <label for="Ubicacion_descripcion" class="form-label">Ubicación en la Escena</label>
                <input type="text" id="Ubicacion_descripcion" name="Ubicacion_descripcion"
                       class="form-control @error('Ubicacion_descripcion') is-invalid @enderror"
                       value="{{ old('Ubicacion_descripcion', $escena->Ubicacion_descripcion) }}" placeholder="Ej: Sala principal, Exterior fachada...">
                @error('Ubicacion_descripcion')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <!-- Personajes que intervienen -->
            <div class="mb-3">
                <label for="Personajes_intervienen" class="form-label">Personajes que Intervienen</label>
                <textarea id="Personajes_intervienen" name="Personajes_intervienen" rows="2"
                          class="form-control @error('Personajes_intervienen') is-invalid @enderror"
                          placeholder="Listar los personajes que aparecen en esta escena">{{ old('Personajes_intervienen', $escena->Personajes_intervienen) }}</textarea>
                @error('Personajes_intervienen')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="row">
                <!-- Complejidad -->
                <div class="col-md-6 mb-3">
                    <label for="Complejidad" class="form-label">Complejidad</label>
                    <select id="Complejidad" name="Complejidad" class="form-select @error('Complejidad') is-invalid @enderror">
                        <option value="">Seleccionar</option>
                        <option value="Baja" {{ old('Complejidad', $escena->Complejidad) == 'Baja' ? 'selected' : '' }}>Baja</option>
                        <option value="Media" {{ old('Complejidad', $escena->Complejidad) == 'Media' ? 'selected' : '' }}>Media</option>
                        <option value="Alta" {{ old('Complejidad', $escena->Complejidad) == 'Alta' ? 'selected' : '' }}>Alta</option>
                    </select>
                    @error('Complejidad')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Estado -->
                <div class="col-md-6 mb-3">
                    <label for="Estado" class="form-label">Estado</label>
                    <select id="Estado" name="Estado" class="form-select @error('Estado') is-invalid @enderror">
                        <option value="">Seleccionar</option>
                        <option value="Pendiente" {{ old('Estado', $escena->Estado) == 'Pendiente' ? 'selected' : '' }}>Pendiente</option>
                        <option value="En Rodaje" {{ old('Estado', $escena->Estado) == 'En Rodaje' ? 'selected' : '' }}>En Rodaje</option>
                        <option value="Grabada" {{ old('Estado', $escena->Estado) == 'Grabada' ? 'selected' : '' }}>Grabada</option>
                        <option value="Aprobada" {{ old('Estado', $escena->Estado) == 'Aprobada' ? 'selected' : '' }}>Aprobada</option>
                    </select>
                    @error('Estado')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <!-- Observaciones -->
            <div class="mb-4">
                <label for="Observaciones" class="form-label">Observaciones</label>
                <textarea id="Observaciones" name="Observaciones" rows="3"
                          class="form-control @error('Observaciones') is-invalid @enderror">{{ old('Observaciones', $escena->Observaciones) }}</textarea>
                @error('Observaciones')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <a href="{{ route('escenas.index') }}" class="btn btn-outline-secondary">Cancelar</a>
            <button type="submit" class="btn btn-primary">Actualizar Escena</button>
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
