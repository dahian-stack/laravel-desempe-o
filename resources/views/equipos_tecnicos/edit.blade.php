
<!doctype html>
<html lang="es" data-bs-theme="light">

<head>
    <title>Editar Equipo Técnico — Mediapro</title>

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
                    <a class="nav-link" href="{{ route('producciones.index') }}">Producciones</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="{{ route('personales.index') }}">Personal</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link active" href="{{ route('equipos_tecnicos.index') }}">
                        Equipos Técnicos
                    </a>
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

        <h1 class="mb-4">✏️ Editar Equipo Técnico</h1>

        <form action="{{ route('equipos_tecnicos.update', $equipo->ID_equipo) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="row">

                <!-- Categoría -->
                <div class="col-md-6 mb-3">
                    <label for="Categoria" class="form-label">Categoría *</label>

                    <select
                        id="Categoria"
                        name="Categoria"
                        class="form-select @error('Categoria') is-invalid @enderror"
                        required
                    >
                        <option value="">Seleccionar</option>
                        <option value="Cámara" {{ old('Categoria', $equipo->Categoria) == 'Cámara' ? 'selected' : '' }}>Cámara</option>
                        <option value="Sonido" {{ old('Categoria', $equipo->Categoria) == 'Sonido' ? 'selected' : '' }}>Sonido</option>
                        <option value="Iluminación" {{ old('Categoria', $equipo->Categoria) == 'Iluminación' ? 'selected' : '' }}>Iluminación</option>
                        <option value="Montaje" {{ old('Categoria', $equipo->Categoria) == 'Montaje' ? 'selected' : '' }}>Montaje</option>
                        <option value="Accesorios" {{ old('Categoria', $equipo->Categoria) == 'Accesorios' ? 'selected' : '' }}>Accesorios</option>
                        <option value="Otro" {{ old('Categoria', $equipo->Categoria) == 'Otro' ? 'selected' : '' }}>Otro</option>
                    </select>

                    @error('Categoria')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Marca -->
                <div class="col-md-6 mb-3">
                    <label for="Marca" class="form-label">Marca *</label>

                    <input
                        type="text"
                        id="Marca"
                        name="Marca"
                        class="form-control @error('Marca') is-invalid @enderror"
                        value="{{ old('Marca', $equipo->Marca) }}"
                        required
                    >

                    @error('Marca')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

            </div>

            <div class="row">

                <!-- Modelo -->
                <div class="col-md-6 mb-3">
                    <label for="Modelo" class="form-label">Modelo</label>

                    <input
                        type="text"
                        id="Modelo"
                        name="Modelo"
                        class="form-control @error('Modelo') is-invalid @enderror"
                        value="{{ old('Modelo', $equipo->Modelo) }}"
                    >

                    @error('Modelo')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Estado -->
                <div class="col-md-6 mb-3">
                    <label for="Estado" class="form-label">Estado</label>

                    <select
                        id="Estado"
                        name="Estado"
                        class="form-select @error('Estado') is-invalid @enderror"
                    >
                        <option value="">Seleccionar</option>
                        <option value="Nuevo" {{ old('Estado', $equipo->Estado) == 'Nuevo' ? 'selected' : '' }}>Nuevo</option>
                        <option value="Bueno" {{ old('Estado', $equipo->Estado) == 'Bueno' ? 'selected' : '' }}>Bueno</option>
                        <option value="Regular" {{ old('Estado', $equipo->Estado) == 'Regular' ? 'selected' : '' }}>Regular</option>
                        <option value="En Mantenimiento" {{ old('Estado', $equipo->Estado) == 'En Mantenimiento' ? 'selected' : '' }}>En Mantenimiento</option>
                        <option value="Dañado" {{ old('Estado', $equipo->Estado) == 'Dañado' ? 'selected' : '' }}>Dañado</option>
                    </select>

                    @error('Estado')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

            </div>

            <!-- Disponibilidad -->
            <div class="mb-3">
                <label for="Disponibilidad" class="form-label">Disponibilidad</label>

                <select
                    id="Disponibilidad"
                    name="Disponibilidad"
                    class="form-select @error('Disponibilidad') is-invalid @enderror"
                >
                    <option value="">Seleccionar</option>
                    <option value="Disponible" {{ old('Disponibilidad', $equipo->Disponibilidad) == 'Disponible' ? 'selected' : '' }}>Disponible</option>
                    <option value="Asignado" {{ old('Disponibilidad', $equipo->Disponibilidad) == 'Asignado' ? 'selected' : '' }}>Asignado</option>
                    <option value="En reparación" {{ old('Disponibilidad', $equipo->Disponibilidad) == 'En reparación' ? 'selected' : '' }}>En Reparación</option>
                </select>

                @error('Disponibilidad')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <!-- Características -->
            <div class="mb-4">
                <label for="Caracteristicas" class="form-label">Características</label>

                <textarea
                    id="Caracteristicas"
                    name="Caracteristicas"
                    rows="3"
                    class="form-control @error('Caracteristicas') is-invalid @enderror"
                    placeholder="Describe las características del equipo..."
                >{{ old('Caracteristicas', $equipo->Caracteristicas) }}</textarea>

                @error('Caracteristicas')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <a href="{{ route('equipos_tecnicos.index') }}" class="btn btn-outline-secondary">
                Cancelar
            </a>

            <button type="submit" class="btn btn-primary">
                Actualizar Equipo
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
