
<!doctype html>
<html lang="es" data-bs-theme="light">

<head>
    <title>Nueva Producción — Mediapro</title>

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
                    <a class="nav-link" href="{{ url('/dashboard') }}">Inicio</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('clientes.index') }}">Clientes</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="{{ route('producciones.index') }}">Producciones</a>
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

        <h1 class="mb-4">🎬 Nueva Producción</h1>

        <form action="{{ route('producciones.store') }}" method="POST">
            @csrf

            <!-- Cliente -->
            <div class="mb-3">
                <label for="ID_cliente" class="form-label">Cliente *</label>

                <select
                    id="ID_cliente"
                    name="ID_cliente"
                    class="form-select @error('ID_cliente') is-invalid @enderror"
                    required>

                    <option value="">Seleccionar cliente</option>

                    @foreach ($clientes as $cliente)
                        <option
                            value="{{ $cliente->ID_cliente }}"
                            {{ old('ID_cliente') == $cliente->ID_cliente ? 'selected' : '' }}>
                            {{ $cliente->Nombre }}
                        </option>
                    @endforeach
                </select>

                @error('ID_cliente')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <!-- Título -->
            <div class="mb-3">
                <label for="Titulo" class="form-label">Título *</label>

                <input
                    type="text"
                    id="Titulo"
                    name="Titulo"
                    class="form-control @error('Titulo') is-invalid @enderror"
                    value="{{ old('Titulo') }}"
                    required>

                @error('Titulo')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="row">

                <!-- Tipo -->
                <div class="col-md-6 mb-3">
                    <label for="Tipo" class="form-label">Tipo</label>

                    <select
                        id="Tipo"
                        name="Tipo"
                        class="form-select @error('Tipo') is-invalid @enderror">

                        <option value="">Seleccionar</option>
                        <option value="Cine" {{ old('Tipo') == 'Cine' ? 'selected' : '' }}>Cine</option>
                        <option value="Televisión" {{ old('Tipo') == 'Televisión' ? 'selected' : '' }}>Televisión</option>
                        <option value="Publicidad" {{ old('Tipo') == 'Publicidad' ? 'selected' : '' }}>Publicidad</option>
                        <option value="Documental" {{ old('Tipo') == 'Documental' ? 'selected' : '' }}>Documental</option>
                        <option value="Video Musical" {{ old('Tipo') == 'Video Musical' ? 'selected' : '' }}>Video Musical</option>
                    </select>

                    @error('Tipo')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Género -->
                <div class="col-md-6 mb-3">
                    <label for="Genero" class="form-label">Género</label>

                    <input
                        type="text"
                        id="Genero"
                        name="Genero"
                        class="form-control @error('Genero') is-invalid @enderror"
                        value="{{ old('Genero') }}"
                        placeholder="Ej: Drama, Comedia...">

                    @error('Genero')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <!-- Etapa -->
            <div class="mb-3">
                <label for="Etapa" class="form-label">Etapa</label>

                <input
                    type="text"
                    id="Etapa"
                    name="Etapa"
                    class="form-control @error('Etapa') is-invalid @enderror"
                    value="{{ old('Etapa') }}">

                @error('Etapa')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <!-- Descripción -->
            <div class="mb-3">
                <label for="Descripcion" class="form-label">Descripción</label>

                <textarea
                    id="Descripcion"
                    name="Descripcion"
                    rows="4"
                    class="form-control @error('Descripcion') is-invalid @enderror">{{ old('Descripcion') }}</textarea>

                @error('Descripcion')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <!-- Presupuesto inicial -->
            <div class="mb-3">
                <label for="Presupuesto_inicial" class="form-label">Presupuesto inicial ($)</label>

                <input
                    type="number"
                    id="Presupuesto_inicial"
                    name="Presupuesto_inicial"
                    step="0.01"
                    min="0"
                    class="form-control @error('Presupuesto_inicial') is-invalid @enderror"
                    value="{{ old('Presupuesto_inicial') }}">

                @error('Presupuesto_inicial')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <!-- Presupuesto gastado -->
            <div class="mb-3">
                <label for="Presupuesto_gastado" class="form-label">Presupuesto gastado ($)</label>

                <input
                    type="number"
                    id="Presupuesto_gastado"
                    name="Presupuesto_gastado"
                    step="0.01"
                    min="0"
                    class="form-control @error('Presupuesto_gastado') is-invalid @enderror"
                    value="{{ old('Presupuesto_gastado', 0) }}">

                @error('Presupuesto_gastado')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="row">

                <!-- Fecha Inicio -->
                <div class="col-md-6 mb-3">
                    <label for="Fecha_inicio" class="form-label">Fecha de Inicio</label>

                    <input
                        type="date"
                        id="Fecha_inicio"
                        name="Fecha_inicio"
                        class="form-control @error('Fecha_inicio') is-invalid @enderror"
                        value="{{ old('Fecha_inicio') }}">

                    @error('Fecha_inicio')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Fecha Fin -->
                <div class="col-md-6 mb-3">
                    <label for="Fecha_fin" class="form-label">Fecha de Finalización</label>

                    <input
                        type="date"
                        id="Fecha_fin"
                        name="Fecha_fin"
                        class="form-control @error('Fecha_fin') is-invalid @enderror"
                        value="{{ old('Fecha_fin') }}">

                    @error('Fecha_fin')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <!-- Estado -->
            <div class="mb-4">
                <label for="Estado" class="form-label">Estado</label>

                <select
                    id="Estado"
                    name="Estado"
                    class="form-select @error('Estado') is-invalid @enderror">

                    <option value="">Seleccionar</option>
                    <option value="Planificación" {{ old('Estado') == 'Planificación' ? 'selected' : '' }}>Planificación</option>
                    <option value="En Producción" {{ old('Estado') == 'En Producción' ? 'selected' : '' }}>En Producción</option>
                    <option value="Postproducción" {{ old('Estado') == 'Postproducción' ? 'selected' : '' }}>Postproducción</option>
                    <option value="Finalizada" {{ old('Estado') == 'Finalizada' ? 'selected' : '' }}>Finalizada</option>
                </select>

                @error('Estado')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <a href="{{ route('producciones.index') }}" class="btn btn-outline-secondary">
                Cancelar
            </a>

            <button type="submit" class="btn btn-primary">
                Guardar Producción
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
