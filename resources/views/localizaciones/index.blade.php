
<!doctype html>
<html lang="es" data-bs-theme="light">

<head>
    <title>Localizaciones — Mediapro</title>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
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
                    <a class="nav-link" href="{{ route('equipos_tecnicos.index') }}">Equipos Técnicos</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="{{ route('localizaciones.index') }}">Localizaciones</a>
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
    <div class="container mt-5">

        <div class="text-center mb-5">
            <h1>📍 Localizaciones</h1>
            <p class="lead">
                Lugares disponibles para el rodaje de producciones.
            </p>
        </div>

        <!-- Botón para crear -->
        <div class="text-end mb-3">
            <a href="{{ route('localizaciones.create') }}" class="btn btn-primary">
                + Nueva Localización
            </a>
        </div>

        <!-- Listado -->
        <div class="table-responsive">
            <table class="table table-striped table-hover align-middle">
                <thead class="table-primary">
                <tr>
                    <th>#</th>
                    <th>Nombre</th>
                    <th>Dirección</th>
                    <th>Tipo</th>
                    <th>Estado</th>
                    <th class="text-end">Costo</th>
                    <th class="text-end">Acciones</th>
                </tr>
                </thead>

                <tbody>
                @forelse ($localizaciones as $localizacion)
                    <tr>
                        <td>{{ $localizacion->ID_localizacion }}</td>

                        <td>
                            <strong>{{ $localizacion->Nombre }}</strong>
                        </td>

                        <td>{{ $localizacion->Direccion }}</td>

                        <td>{{ $localizacion->Tipo ?? '-' }}</td>

                        <td>
                            @php
                                $estado = $localizacion->Estado;

                                $clase = match(true) {
                                    $estado === 'Disponible' => 'bg-success',
                                    $estado === 'Ocupada' => 'bg-danger',
                                    $estado === 'Restringida' => 'bg-warning text-dark',
                                    default => 'bg-secondary'
                                };
                            @endphp

                            <span class="badge {{ $clase }}">
                                    {{ $estado ?? '-' }}
                                </span>
                        </td>

                        <td class="text-end">
                            @if ($localizacion->Costo !== null)
                                $ {{ number_format($localizacion->Costo, 0, ',', '.') }}
                            @else
                                -
                            @endif
                        </td>

                        <td class="text-end">
                            <a
                                href="{{ route('localizaciones.show', $localizacion->ID_localizacion) }}"
                                class="btn btn-sm btn-outline-secondary"
                            >
                                Ver
                            </a>

                            <a
                                href="{{ route('localizaciones.edit', $localizacion->ID_localizacion) }}"
                                class="btn btn-sm btn-outline-primary"
                            >
                                Editar
                            </a>

                            <form
                                action="{{ route('localizaciones.destroy', $localizacion->ID_localizacion) }}"
                                method="POST"
                                class="d-inline form-eliminar"
                            >
                                @csrf
                                @method('DELETE')

                                <button type="submit" class="btn btn-sm btn-outline-danger">
                                    Eliminar
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7" class="text-center text-muted py-4">
                            Todavía no hay localizaciones registradas.
                        </td>
                    </tr>
                @endforelse
                </tbody>
            </table>
        </div>
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

<!-- Bootstrap JS -->
<script
    src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI"
    crossorigin="anonymous">
</script>

<!-- SweetAlert2 -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    // Confirmación antes de eliminar
    document.querySelectorAll('.form-eliminar').forEach(function (form) {
        form.addEventListener('submit', function (event) {
            event.preventDefault();

            Swal.fire({
                title: '¿Eliminar localización?',
                text: 'Esta acción no se puede deshacer.',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#dc3545',
                cancelButtonColor: '#6c757d',
                confirmButtonText: 'Sí, eliminar',
                cancelButtonText: 'Cancelar',
                reverseButtons: true
            }).then(function (result) {
                if (result.isConfirmed) {
                    form.submit();
                }
            });
        });
    });

    // Mensaje de éxito
    @if (session('success'))
    Swal.fire({
        icon: 'success',
        title: @json(session('success')),
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 3000,
        timerProgressBar: true
    });
    @endif
</script>

</body>
</html>
