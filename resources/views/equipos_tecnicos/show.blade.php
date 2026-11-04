
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Ficha de Equipo Técnico
        </h2>
    </x-slot>

    <div class="py-8 bg-gray-50 min-h-screen">
        <div class="max-w-2xl mx-auto px-4 sm:px-6 lg:px-8">

            <div class="mb-6">
                <a href="{{ route('equipos_tecnicos.index') }}" class="text-gray-600 hover:text-gray-900 flex items-center gap-2">
                    ← Volver al listado
                </a>
            </div>

            <div class="bg-white rounded-xl shadow-md p-6">

                <h3 class="text-xl font-bold text-gray-800 mb-4">
                    {{ $equipo->Categoria ?? 'Equipo' }}
                    — {{ $equipo->Marca ?? '' }} {{ $equipo->Modelo ?? '' }}
                </h3>

                <div class="space-y-3 text-gray-600">

                    <p>
                        <strong class="text-gray-800">ID:</strong>
                        {{ $equipo->ID_equipo }}
                    </p>

                    <p>
                        <strong class="text-gray-800">Categoría:</strong>
                        {{ $equipo->Categoria ?? '—' }}
                    </p>

                    <p>
                        <strong class="text-gray-800">Marca:</strong>
                        {{ $equipo->Marca ?? '—' }}
                    </p>

                    <p>
                        <strong class="text-gray-800">Modelo:</strong>
                        {{ $equipo->Modelo ?? '—' }}
                    </p>

                    <p>
                        <strong class="text-gray-800">Estado:</strong>
                        {{ $equipo->Estado ?? '—' }}
                    </p>

                    <p>
                        <strong class="text-gray-800">Disponibilidad:</strong>

                        @php
                            $colorDisponibilidad = match ($equipo->Disponibilidad) {
                                'Disponible' => 'bg-emerald-100 text-emerald-700',
                                'Ocupado' => 'bg-amber-100 text-amber-700',
                                'Indisponible' => 'bg-red-100 text-red-700',
                                default => 'bg-gray-100 text-gray-700',
                            };
                        @endphp

                        <span class="{{ $colorDisponibilidad }} px-2.5 py-0.5 rounded-full text-xs font-medium">
                            {{ $equipo->Disponibilidad ?? '—' }}
                        </span>
                    </p>

                    <p>
                        <strong class="text-gray-800">Características:</strong>
                    </p>

                    <p class="text-gray-600 bg-gray-50 p-3 rounded-lg">
                        {{ $equipo->Caracteristicas ?? 'Sin información' }}
                    </p>

                </div>

                @auth
                    <div class="mt-6 flex gap-3">

                        <a href="{{ route('equipos_tecnicos.edit', $equipo->ID_equipo) }}" class="bg-amber-600 hover:bg-amber-700 text-white px-4 py-2 rounded-lg transition-colors">
                            Editar
                        </a>

                        <form action="{{ route('equipos_tecnicos.destroy', $equipo->ID_equipo) }}" method="POST" class="inline delete-form">
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
