<x-app-layout>
    <div class="container py-4" style="max-width: 700px;">
        <div class="card">
            <div class="card-header bg-primary text-white">
                <h3 class="mb-0">Escena #{{ $escena->ID_escena }}</h3>
            </div>
            <div class="card-body">
                <ul class="list-group list-group-flush">
                    <li class="list-group-item"><strong>Producción:</strong> {{ $escena->produccion->Titulo ?? '—' }}</li>
                    <li class="list-group-item"><strong>Descripción:</strong> {{ $escena->Descripcion ?? '—' }}</li>
                    <li class="list-group-item"><strong>Tiempo Estimado:</strong> {{ $escena->Tiempo_estimado ?? '—' }} minutos</li>
                    <li class="list-group-item"><strong>Complejidad:</strong> {{ $escena->Complejidad ?? '—' }}</li>
                    <li class="list-group-item"><strong>Necesidades Especiales:</strong> {{ $escena->Necesidades_especiales ?? '—' }}</li>
                    <li class="list-group-item"><strong>Estado:</strong> {{ $escena->Estado ?? '—' }}</li>
                </ul>
            </div>
            <div class="card-footer text-end">
                <a href="{{ route('escenas.index') }}" class="btn btn-secondary">Volver</a>
                @auth <a href="{{ route('escenas.edit', $escena) }}" class="btn btn-warning">Editar</a> @endauth
            </div>
        </div>
    </div>
</x-app-layout>
