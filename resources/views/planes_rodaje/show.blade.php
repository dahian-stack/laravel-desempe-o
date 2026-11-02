
<x-app-layout>
    <div class="container py-4" style="max-width: 700px;">
        <div class="card shadow-sm">

            <div class="card-header bg-primary text-white">
                <h3 class="mb-0">
                    Plan de Rodaje #{{ $plan->ID_plan }}
                </h3>
            </div>

            <div class="card-body">
                <ul class="list-group list-group-flush">

                    <li class="list-group-item">
                        <strong>Producción:</strong>
                        {{ $plan->produccion?->Titulo ?? '—' }}
                    </li>

                    <li class="list-group-item">
                        <strong>Localización:</strong>
                        {{ $plan->localizacion?->Nombre ?? '—' }}
                    </li>

                    <li class="list-group-item">
                        <strong>Personal asignado:</strong>
                        {{ $plan->personal?->Nombres ?? '—' }}
                        {{ $plan->personal?->Apellidos ?? '' }}
                    </li>

                    <li class="list-group-item">
                        <strong>Fecha:</strong>
                        {{ $plan->Fecha ?? '—' }}
                    </li>

                    <li class="list-group-item">
                        <strong>Hora de inicio:</strong>
                        {{ $plan->Hora_inicio ?? '—' }}
                    </li>

                    <li class="list-group-item">
                        <strong>Hora de finalización:</strong>
                        {{ $plan->Hora_fin ?? '—' }}
                    </li>

                    <li class="list-group-item">
                        <strong>Eficiencia:</strong>
                        {{ $plan->Eficiencia ?? '—' }}
                    </li>

                    <li class="list-group-item">
                        <strong>Requerimientos:</strong>
                        {{ $plan->Requerimientos ?? '—' }}
                    </li>

                    <li class="list-group-item">
                        <strong>Plan de contingencia:</strong>
                        {{ $plan->Plan_contingencia ?? '—' }}
                    </li>

                </ul>
            </div>

            <div class="card-footer text-end">
                <a href="{{ route('planes_rodaje.index') }}"
                   class="btn btn-secondary">
                    Volver
                </a>

                @auth
                    <a href="{{ route('planes_rodaje.edit', $plan->ID_plan) }}"
                       class="btn btn-warning">
                        Editar
                    </a>
                @endauth
            </div>

        </div>
    </div>
</x-app-layout>
