
<!doctype html>
<html lang="es" data-bs-theme="light">

<head>
    <title>Producciones — Mediapro</title>

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
            <h1>🎬 Producciones</h1>
            <p class="lead">
                Gestiona las producciones audiovisuales del proyecto.
            </p>
        </div>

        <div class="text-end mb-3">
            <a href="{{ route('producciones.create') }}" class="btn btn-primary">
                + Nueva Producción
            </a>
        </div>

        <div class="table-responsive">
            <table class="table table-striped table-hover align-middle">

                <thead class="table-primary">
                <tr>
                    <th>#</th>
                    <th>Título</th>
                    <th>Cliente</th>
                    <th>Tipo</th>
                    <th>Estado</th>
                    <th class="text-end">Presupuesto inicial</th>
                    <th class="text-end">Acciones</th>
                </tr>
                </thead>

                <tbody>
                @forelse ($producciones as $produccion)
                    <tr>
                        <td>{{ $produccion->ID_produccion }}</td>

                        <td>
                            <strong>{{ $produccion->Titulo }}</strong>
                        </td>

                        <td>
                            {{ $produccion->cliente?->Nombre ?? '-' }}
                        </td>

                        <td>
                            {{ $produccion->Tipo ?? '-' }}
                        </td>

                        <td>
                            @php
                                $estados = [
                                    'Planificación' => 'bg-info',
                                    'En Producción' => 'bg-primary',
                                    'Postproducción' => 'bg-warning text-dark',
                                    'Finalizada' => 'bg-success',
                                ];

                                $clase = $estados[$produccion->Estado] ?? 'bg-secondary';
                            @endphp

                            <span class="badge {{ $clase }}">
                                    {{ $produccion->Estado ?? '-' }}
                                </span>
                        </td>

                        <td class="text-end">
                            @if ($produccion->Presupuesto_inicial !== null)
                                $ {{ number_format($produccion->Presupuesto_inicial, 0, ',', '.') }}
                            @else
                                -
                            @endif
                        </td>

                        <td class="text-end">
                            <a
                                href="{{ route('producciones.show', $produccion->ID_produccion) }}"
                                class="btn btn-sm btn-outline-secondary">
                                Ver
                            </a>

                            <a
                                href="{{ route('producciones.edit', $produccion->ID_produccion) }}"
                                class="btn btn-sm btn-outline-primary">
                                Editar
                            </a>

                            <form
                                action="{{ route('producciones.destroy', $produccion->ID_produccion) }}"
                                method="POST"
                                class="d-inline form-eliminar">

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
                            Todavía no hay producciones registradas.
                        </td>
                    </tr>
                @endforelse
                </tbody>

            </table>
        </div>
    </div>
</main>

@include('layouts.admin-footer')

<script
    src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI"
    crossorigin="anonymous">
</script>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    // Confirmación antes de eliminar
    document.querySelectorAll('.form-eliminar').forEach(function (form) {
        form.addEventListener('submit', function (event) {
            event.preventDefault();

            Swal.fire({
                title: '¿Eliminar producción?',
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
