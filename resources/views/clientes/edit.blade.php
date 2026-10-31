<!doctype html>
<html lang="es" data-bs-theme="light">

<head>
    <title>Editar Cliente — Mediapro</title>

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
                    <a class="nav-link active" href="{{ route('clientes.index') }}">
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
        <h1 class="mb-4">✏️ Editar Cliente</h1>

        <form action="{{ route('clientes.update', $cliente->ID_cliente) }}" method="POST">
            @csrf
            @method('PUT')

            <!-- Nombre -->
            <div class="mb-3">
                <label for="Nombre" class="form-label">Nombre *</label>
                <input type="text" id="Nombre" name="Nombre"
                       class="form-control @error('Nombre') is-invalid @enderror"
                       value="{{ old('Nombre', $cliente->Nombre) }}" required>
                @error('Nombre')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <!-- Tipo -->
            <div class="mb-3">
                <label for="Tipo" class="form-label">Tipo</label>
                <select id="Tipo" name="Tipo" class="form-select @error('Tipo') is-invalid @enderror">
                    <option value="">Seleccionar</option>
                    <option value="Empresa" {{ old('Tipo', $cliente->Tipo) == 'Empresa' ? 'selected' : '' }}>Empresa</option>
                    <option value="Persona" {{ old('Tipo', $cliente->Tipo) == 'Persona' ? 'selected' : '' }}>Persona</option>
                    <option value="Institución" {{ old('Tipo', $cliente->Tipo) == 'Institución' ? 'selected' : '' }}>Institución</option>
                </select>
                @error('Tipo')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <!-- Contacto -->
            <div class="mb-3">
                <label for="Contacto" class="form-label">Contacto</label>
                <input type="text" id="Contacto" name="Contacto"
                       class="form-control @error('Contacto') is-invalid @enderror"
                       value="{{ old('Contacto', $cliente->Contacto) }}">
                @error('Contacto')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="row">
                <!-- Teléfono -->
                <div class="col-md-6 mb-3">
                    <label for="Telefono" class="form-label">Teléfono</label>
                    <input type="text" id="Telefono" name="Telefono"
                           class="form-control @error('Telefono') is-invalid @enderror"
                           value="{{ old('Telefono', $cliente->Telefono) }}">
                    @error('Telefono')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Correo -->
                <div class="col-md-6 mb-3">
                    <label for="Correo" class="form-label">Correo</label>
                    <input type="email" id="Correo" name="Correo"
                           class="form-control @error('Correo') is-invalid @enderror"
                           value="{{ old('Correo', $cliente->Correo) }}">
                    @error('Correo')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <!-- Dirección -->
            <div class="mb-3">
                <label for="Direccion" class="form-label">Dirección</label>
                <input type="text" id="Direccion" name="Direccion"
                       class="form-control @error('Direccion') is-invalid @enderror"
                       value="{{ old('Direccion', $cliente->Direccion) }}">
                @error('Direccion')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <!-- Estado -->
            <div class="mb-4">
                <label for="Estado" class="form-label">Estado</label>
                <select id="Estado" name="Estado" class="form-select @error('Estado') is-invalid @enderror">
                    <option value="">Seleccionar</option>
                    <option value="Activo" {{ old('Estado', $cliente->Estado) == 'Activo' ? 'selected' : '' }}>Activo</option>
                    <option value="Inactivo" {{ old('Estado', $cliente->Estado) == 'Inactivo' ? 'selected' : '' }}>Inactivo</option>
                </select>
                @error('Estado')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <a href="{{ route('clientes.index') }}" class="btn btn-outline-secondary">Cancelar</a>
            <button type="submit" class="btn btn-primary">Actualizar Cliente</button>
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
