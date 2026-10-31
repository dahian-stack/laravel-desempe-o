<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Ficha de Personal
        </h2>
    </x-slot>

    <div class="py-8 bg-gray-50 min-h-screen">
        <div class="max-w-2xl mx-auto px-4 sm:px-6 lg:px-8">

            <div class="mb-6">
                <a href="{{ route('personales.index') }}" class="text-gray-600 hover:text-gray-900 flex items-center gap-2">
                    ← Volver al listado
                </a>
            </div>

            <div class="bg-white rounded-xl shadow-md p-6">
                <h3 class="text-xl font-bold text-gray-800 mb-4">{{ $personal->Nombres }} {{ $personal->Apellidos }}</h3>

                <div class="space-y-3 text-gray-600">
                    <p><strong class="text-gray-800">ID:</strong> {{ $personal->ID_personal }}</p>
                    <p><strong class="text-gray-800">Especialidad:</strong> {{ $personal->Especialidad ?? '—' }}</p>
                    <p><strong class="text-gray-800">Disponibilidad:</strong>
                        <span class="bg-emerald-100 text-emerald-700 px-2.5 py-0.5 rounded-full text-xs font-medium">{{ $personal->Disponibilidad ?? '—' }}</span>
                    </p>
                    <p><strong class="text-gray-800">Tarifa:</strong> ${{ number_format($personal->Tarifa ?? 0, 0, ',', '.') }}</p>
                    <p><strong class="text-gray-800">Contacto:</strong> {{ $personal->Contacto ?? '—' }}</p>
                    <p><strong class="text-gray-800">Experiencia:</strong></p>
                    <p class="text-gray-600 bg-gray-50 p-3 rounded-lg">{{ $personal->Experiencia ?? 'Sin información' }}</p>
                </div>

                @auth
                    <div class="mt-6 flex gap-3">
                        <a href="{{ route('personales.edit', $personal->ID_personal) }}" class="bg-amber-600 hover:bg-amber-700 text-white px-4 py-2 rounded-lg transition-colors">
                            Editar
                        </a>
                        <form action="{{ route('personales.destroy', $personal->ID_personal) }}" method="POST" class="inline delete-form">
                            @csrf @method('DELETE')
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
