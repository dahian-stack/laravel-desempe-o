
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Ficha de Localización
        </h2>
    </x-slot>

    <div class="py-8 bg-gray-50 min-h-screen">
        <div class="max-w-2xl mx-auto px-4 sm:px-6 lg:px-8">

            <div class="mb-6">
                <a href="{{ route('localizaciones.index') }}" class="text-gray-600 hover:text-gray-900 flex items-center gap-2">
                    ← Volver al listado
                </a>
            </div>

            <div class="bg-white rounded-xl shadow-md p-6">

                <h3 class="text-xl font-bold text-gray-800 mb-4">
                    {{ $localizacion->Nombre }}
                </h3>

                <div class="space-y-3 text-gray-600">

                    <p>
                        <strong class="text-gray-800">ID:</strong>
                        {{ $localizacion->ID_localizacion }}
                    </p>

                    <p>
                        <strong class="text-gray-800">Dirección:</strong>
                        {{ $localizacion->Direccion ?? '—' }}
                    </p>

                    <p>
                        <strong class="text-gray-800">Coordenadas:</strong>
                        {{ $localizacion->Coordenadas ?? '—' }}
                    </p>

                    <p>
                        <strong class="text-gray-800">Tipo:</strong>
                        {{ $localizacion->Tipo ?? '—' }}
                    </p>

                    <p>
                        <strong class="text-gray-800">Propietario:</strong>
                        {{ $localizacion->Propietario ?? '—' }}
                    </p>

                    <p>
                        <strong class="text-gray-800">Estado:</strong>
                        {{ $localizacion->Estado ?? '—' }}
                    </p>

                    <p>
                        <strong class="text-gray-800">Costo:</strong>
                        @if ($localizacion->Costo !== null)
                            ${{ number_format($localizacion->Costo, 2, ',', '.') }}
                        @else
                            —
                        @endif
                    </p>

                    <p>
                        <strong class="text-gray-800">Características:</strong>
                    </p>

                    <p class="text-gray-600 bg-gray-50 p-3 rounded-lg">
                        {{ $localizacion->Caracteristicas ?? 'Sin información' }}
                    </p>

                    <p>
                        <strong class="text-gray-800">Permisos:</strong>
                    </p>

                    <p class="text-gray-600 bg-gray-50 p-3 rounded-lg">
                        {{ $localizacion->Permisos ?? 'Sin información' }}
                    </p>

                    <p>
                        <strong class="text-gray-800">Limitaciones:</strong>
                    </p>

                    <p class="text-gray-600 bg-gray-50 p-3 rounded-lg">
                        {{ $localizacion->Limitaciones ?? 'Sin información' }}
                    </p>

                    <p>
                        <strong class="text-gray-800">Facilidades:</strong>
                    </p>

                    <p class="text-gray-600 bg-gray-50 p-3 rounded-lg">
                        {{ $localizacion->Facilidades ?? 'Sin información' }}
                    </p>

                    <p>
                        <strong class="text-gray-800">Accesibilidad:</strong>
                    </p>

                    <p class="text-gray-600 bg-gray-50 p-3 rounded-lg">
                        {{ $localizacion->Accesibilidad ?? 'Sin información' }}
                    </p>

                </div>

                @auth
                    <div class="mt-6 flex gap-3">

                        <a href="{{ route('localizaciones.edit', $localizacion->ID_localizacion) }}" class="bg-amber-600 hover:bg-amber-700 text-white px-4 py-2 rounded-lg transition-colors">
                            Editar
                        </a>

                        <form action="{{ route('localizaciones.destroy', $localizacion->ID_localizacion) }}" method="POST" class="inline delete-form">
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
