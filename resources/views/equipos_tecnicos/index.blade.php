
<!doctype html>
<html lang="es" data-bs-theme="light">

<head>
    <title>Equipos Técnicos — Mediapro</title>

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
    <link rel="stylesheet" href="{{ asset('css/mediapro-portal.css') }}">
    <link rel="stylesheet" href="{{ asset('css/mediapro-admin.css') }}">
</head>

<body class="d-flex flex-column min-vh-100 mp-admin-body">

@include('layouts.admin-navigation')

<main class="flex-grow-1">
    <div class="container mt-5">

        <div class="text-center mb-5">
            <h1>🎥 Equipos Técnicos</h1>
            <p class="lead">
                Inventario de equipos y recursos técnicos.
            </p>
        </div>

        <!-- Botón para crear -->
        <div class="text-end mb-3">
            <a href="{{ route('equipos_tecnicos.create') }}" class="btn btn-primary">
                + Nuevo Equipo
            </a>
        </div>

        <!-- Listado -->
        <div class="table-responsive">
            <table class="table table-striped table-hover align-middle">

                <thead class="table-primary">
                <tr>
                    <th>#</th>
                    <th>Categoría</th>
                    <th>Marca / Modelo</th>
                    <th>Estado</th>
                    <th>Disponibilidad</th>
                    <th class="text-end">Acciones</th>
                </tr>
                </thead>

                <tbody>
                @forelse ($equipos as $equipo)
                    <tr>
                        <td>{{ $equipo->ID_equipo }}</td>

                        <td>
                            <strong>{{ $equipo->Categoria }}</strong>
                        </td>

                        <td>
                            {{ $equipo->Marca }} {{ $equipo->Modelo ?? '' }}
                        </td>

                        <td>
                            @php
                                $estado = $equipo->Estado;

                                $claseEstado = match(true) {
                                    $estado === 'Nuevo',
                                    $estado === 'Bueno' => 'bg-success',

                                    $estado === 'Regular' => 'bg-warning text-dark',

                                    $estado === 'En Mantenimiento' => 'bg-info',

                                    $estado === 'Dañado' => 'bg-danger',

                                    default => 'bg-secondary'
                                };
                            @endphp

                            <span class="badge {{ $claseEstado }}">
                                    {{ $estado ?? '-' }}
                                </span>
                        </td>

                        <td>
                            @php
                                $disp = $equipo->Disponibilidad;

                                $claseDisp = match(true) {
                                    $disp === 'Disponible' => 'bg-success',

                                    $disp === 'Asignado' => 'bg-primary',

                                    $disp === 'En reparación' => 'bg-warning text-dark',

                                    default => 'bg-secondary'
                                };
                            @endphp

                            <span class="badge {{ $claseDisp }}">
                                    {{ $disp ?? '-' }}
                                </span>
                        </td>

                        <td class="text-end">
                            <a
                                href="{{ route('equipos_tecnicos.show', $equipo->ID_equipo) }}"
                                class="btn btn-sm btn-outline-secondary"
                            >
                                Ver
                            </a>

                            <a
                                href="{{ route('equipos_tecnicos.edit', $equipo->ID_equipo) }}"
                                class="btn btn-sm btn-outline-primary"
                            >
                                Editar
                            </a>

                            <form
                                action="{{ route('equipos_tecnicos.destroy', $equipo->ID_equipo) }}"
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
                        <td colspan="6" class="text-center text-muted py-4">
                            Todavía no hay equipos registrados.
                        </td>
                    </tr>
                @endforelse
                </tbody>

            </table>
        </div>
    </div>
</main>

<!-- Footer -->
@include('layouts.admin-footer')

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
                title: '¿Eliminar equipo técnico?',
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
