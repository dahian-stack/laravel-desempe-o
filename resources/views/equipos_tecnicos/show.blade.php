
<x-app-layout>
    <div class="container py-4" style="max-width: 700px;">
        <div class="card">
            <div class="card-header bg-primary text-white">
                <h3 class="mb-0">
                    {{ $equipo->Categoria ?? 'Equipo' }} —
                    {{ $equipo->Marca }} {{ $equipo->Modelo }}
                </h3>
            </div>

            <div class="card-body">
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">
                        <strong>ID:</strong> {{ $equipo->ID_equipo }}
                    </li>

                    <li class="list-group-item">
                        <strong>Categoría:</strong> {{ $equipo->Categoria ?? '—' }}
                    </li>

                    <li class="list-group-item">
                        <strong>Marca:</strong> {{ $equipo->Marca ?? '—' }}
                    </li>

                    <li class="list-group-item">
                        <strong>Modelo:</strong> {{ $equipo->Modelo ?? '—' }}
                    </li>

                    <li class="list-group-item">
                        <strong>Características:</strong> {{ $equipo->Caracteristicas ?? '—' }}
                    </li>

                    <li class="list-group-item">
                        <strong>Estado:</strong> {{ $equipo->Estado ?? '—' }}
                    </li>

                    <li class="list-group-item">
                        <strong>Disponibilidad:</strong> {{ $equipo->Disponibilidad ?? '—' }}
                    </li>
                </ul>
            </div>

            <div class="card-footer text-end">
                <a href="{{ route('equipos_tecnicos.index') }}" class="btn btn-secondary">
                    Volver
                </a>

                @auth
                    <a href="{{ route('equipos_tecnicos.edit', $equipo) }}" class="btn btn-warning">
                        Editar
                    </a>
                @endauth
            </div>
        </div>
    </div>
</x-app-layout>
