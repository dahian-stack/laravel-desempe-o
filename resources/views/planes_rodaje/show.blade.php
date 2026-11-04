
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Ficha de Plan de Rodaje
        </h2>
    </x-slot>

    <div class="py-8 bg-gray-50 min-h-screen">
        <div class="max-w-2xl mx-auto px-4 sm:px-6 lg:px-8">

            <div class="mb-6">
                <a href="{{ route('planes_rodaje.index') }}" class="text-gray-600 hover:text-gray-900 flex items-center gap-2">
                    ← Volver al listado
                </a>
            </div>

            <div class="bg-white rounded-xl shadow-md p-6">

                <h3 class="text-xl font-bold text-gray-800 mb-4">
                    Plan de Rodaje #{{ $plan->ID_plan }}
                </h3>

                <div class="space-y-3 text-gray-600">

                    <p>
                        <strong class="text-gray-800">ID:</strong>
                        {{ $plan->ID_plan }}
                    </p>

                    <p>
                        <strong class="text-gray-800">Producción:</strong>
                        {{ $plan->produccion?->Titulo ?? '—' }}
                    </p>

                    <p>
                        <strong class="text-gray-800">Localización:</strong>
                        {{ $plan->localizacion?->Nombre ?? '—' }}
                    </p>

                    <p>
                        <strong class="text-gray-800">Personal asignado:</strong>
                        {{ $plan->personal?->Nombres ?? '—' }}
                        {{ $plan->personal?->Apellidos ?? '' }}
                    </p>

                    <p>
                        <strong class="text-gray-800">Fecha:</strong>
                        {{ $plan->Fecha ?? '—' }}
                    </p>

                    <p>
                        <strong class="text-gray-800">Hora de inicio:</strong>
                        {{ $plan->Hora_inicio ?? '—' }}
                    </p>

                    <p>
                        <strong class="text-gray-800">Hora de finalización:</strong>
                        {{ $plan->Hora_fin ?? '—' }}
                    </p>

                    <p>
                        <strong class="text-gray-800">Eficiencia:</strong>
                        {{ $plan->Eficiencia ?? '—' }}
                    </p>

                    <p>
                        <strong class="text-gray-800">Requerimientos:</strong>
                    </p>

                    <p class="text-gray-600 bg-gray-50 p-3 rounded-lg">
                        {{ $plan->Requerimientos ?? 'Sin información' }}
                    </p>

                    <p>
                        <strong class="text-gray-800">Plan de contingencia:</strong>
                    </p>

                    <p class="text-gray-600 bg-gray-50 p-3 rounded-lg">
                        {{ $plan->Plan_contingencia ?? 'Sin información' }}
                    </p>

                </div>

                @auth
                    <div class="mt-6 flex gap-3">

                        <a href="{{ route('planes_rodaje.edit', $plan->ID_plan) }}" class="bg-amber-600 hover:bg-amber-700 text-white px-4 py-2 rounded-lg transition-colors">
                            Editar
                        </a>

                        <form action="{{ route('planes_rodaje.destroy', $plan->ID_plan) }}" method="POST" class="inline delete-form">
                            @csrf
                            @method('DELETE')

                            <button type="submit" class="bg-red-600 hover:bg-red-700 text-white px-4 py-2 rounded-lg transition-colors">
                                Eliminar
                            </button>
                        </form>

                    </div>
                @endauth

            </div>
        </div>
    </div>
</x-app-layout>
