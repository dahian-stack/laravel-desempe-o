
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Ficha de Escena
        </h2>
    </x-slot>

    <div class="py-8 bg-gray-50 min-h-screen">
        <div class="max-w-2xl mx-auto px-4 sm:px-6 lg:px-8">

            <div class="mb-6">
                <a href="{{ route('escenas.index') }}" class="text-gray-600 hover:text-gray-900 flex items-center gap-2">
                    ← Volver al listado
                </a>
            </div>

            <div class="bg-white rounded-xl shadow-md p-6">

                <h3 class="text-xl font-bold text-gray-800 mb-4">
                    Escena #{{ $escena->ID_escena }}
                </h3>

                <div class="space-y-3 text-gray-600">

                    <p>
                        <strong class="text-gray-800">ID:</strong>
                        {{ $escena->ID_escena }}
                    </p>

                    <p>
                        <strong class="text-gray-800">Producción:</strong>
                        {{ $escena->produccion?->Titulo ?? '—' }}
                    </p>

                    <p>
                        <strong class="text-gray-800">Tiempo estimado:</strong>
                        {{ $escena->Tiempo_estimado ?? '—' }}
                        @if ($escena->Tiempo_estimado)
                            minutos
                        @endif
                    </p>

                    <p>
                        <strong class="text-gray-800">Complejidad:</strong>
                        {{ $escena->Complejidad ?? '—' }}
                    </p>

                    <p>
                        <strong class="text-gray-800">Estado:</strong>
                        {{ $escena->Estado ?? '—' }}
                    </p>

                    <p>
                        <strong class="text-gray-800">Descripción:</strong>
                    </p>

                    <p class="text-gray-600 bg-gray-50 p-3 rounded-lg">
                        {{ $escena->Descripcion ?? 'Sin información' }}
                    </p>

                    <p>
                        <strong class="text-gray-800">Necesidades especiales:</strong>
                    </p>

                    <p class="text-gray-600 bg-gray-50 p-3 rounded-lg">
                        {{ $escena->Necesidades_especiales ?? 'Sin información' }}
                    </p>

                </div>

                @auth
                    <div class="mt-6 flex gap-3">

                        <a href="{{ route('escenas.edit', $escena->ID_escena) }}" class="bg-amber-600 hover:bg-amber-700 text-white px-4 py-2 rounded-lg transition-colors">
                            Editar
                        </a>

                        <form action="{{ route('escenas.destroy', $escena->ID_escena) }}" method="POST" class="inline delete-form">
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
