
<x-app-layout>
    <div class="container py-4" style="max-width: 700px;">
        <div class="card">
            <div class="card-header bg-primary text-white">
                <h3 class="mb-0">{{ $localizacion->Nombre }}</h3>
            </div>

            <div class="card-body">
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">
                        <strong>ID:</strong> {{ $localizacion->ID_localizacion }}
                    </li>
                    <li class="list-group-item">
                        <strong>Dirección:</strong> {{ $localizacion->Direccion ?? '—' }}
                    </li>
                    <li class="list-group-item">
                        <strong>Coordenadas:</strong> {{ $localizacion->Coordenadas ?? '—' }}
                    </li>
                    <li class="list-group-item">
                        <strong>Tipo:</strong> {{ $localizacion->Tipo ?? '—' }}
                    </li>
                    <li class="list-group-item">
                        <strong>Propietario:</strong> {{ $localizacion->Propietario ?? '—' }}
                    </li>
                    <li class="list-group-item">
                        <strong>Características:</strong> {{ $localizacion->Caracteristicas ?? '—' }}
                    </li>
                    <li class="list-group-item">
                        <strong>Permisos:</strong> {{ $localizacion->Permisos ?? '—' }}
                    </li>
                    <li class="list-group-item">
                        <strong>Estado:</strong> {{ $localizacion->Estado ?? '—' }}
                    </li>
                    <li class="list-group-item">
                        <strong>Costo:</strong>
                        ${{ number_format($localizacion->Costo ?? 0, 2) }}
                    </li>
                    <li class="list-group-item">
                        <strong>Limitaciones:</strong> {{ $localizacion->Limitaciones ?? '—' }}
                    </li>
                    <li class="list-group-item">
                        <strong>Facilidades:</strong> {{ $localizacion->Facilidades ?? '—' }}
                    </li>
                    <li class="list-group-item">
                        <strong>Accesibilidad:</strong> {{ $localizacion->Accesibilidad ?? '—' }}
                    </li>
                </ul>
            </div>

            <div class="card-footer text-end">
                <a href="{{ route('localizaciones.index') }}" class="btn btn-secondary">
                    Volver
                </a>

                @auth
                    <a href="{{ route('localizaciones.edit', $localizacion) }}" class="btn btn-warning">
                        Editar
                    </a>
                @endauth
            </div>
        </div>
    </div>
</x-app-layout>
