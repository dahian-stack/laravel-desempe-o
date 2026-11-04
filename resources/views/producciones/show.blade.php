
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Ficha de Producción
        </h2>
    </x-slot>

    <div class="py-8 bg-gray-50 min-h-screen">
        <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8">

            <div class="mb-6">
                <a href="{{ route('producciones.index') }}" class="text-gray-600 hover:text-gray-900 flex items-center gap-2">
                    ← Volver al listado
                </a>
            </div>

            <div class="bg-white rounded-xl shadow-md p-6">

                <h3 class="text-xl font-bold text-gray-800 mb-4">
                    {{ $produccion->Titulo }}
                </h3>

                <div class="space-y-3 text-gray-600">

                    <p>
                        <strong class="text-gray-800">ID:</strong>
                        {{ $produccion->ID_produccion }}
                    </p>

                    <p>
                        <strong class="text-gray-800">Cliente:</strong>
                        {{ $produccion->cliente?->Nombre ?? '—' }}
                    </p>

                    <p>
                        <strong class="text-gray-800">Tipo:</strong>
                        {{ $produccion->Tipo ?? '—' }}
                    </p>

                    <p>
                        <strong class="text-gray-800">Género:</strong>
                        {{ $produccion->Genero ?? '—' }}
                    </p>

                    <p>
                        <strong class="text-gray-800">Etapa:</strong>
                        {{ $produccion->Etapa ?? '—' }}
                    </p>

                    <p>
                        <strong class="text-gray-800">Estado:</strong>
                        {{ $produccion->Estado ?? '—' }}
                    </p>

                    <p>
                        <strong class="text-gray-800">Presupuesto inicial:</strong>
                        @if ($produccion->Presupuesto_inicial !== null)
                            ${{ number_format($produccion->Presupuesto_inicial, 2, ',', '.') }}
                        @else
                            —
                        @endif
                    </p>

                    <p>
                        <strong class="text-gray-800">Presupuesto gastado:</strong>
                        @if ($produccion->Presupuesto_gastado !== null)
                            ${{ number_format($produccion->Presupuesto_gastado, 2, ',', '.') }}
                        @else
                            —
                        @endif
                    </p>

                    <p>
                        <strong class="text-gray-800">Fecha de inicio:</strong>
                        {{ $produccion->Fecha_inicio ?? '—' }}
                    </p>

                    <p>
                        <strong class="text-gray-800">Fecha de finalización:</strong>
                        {{ $produccion->Fecha_fin ?? '—' }}
                    </p>

                    <p>
                        <strong class="text-gray-800">Descripción:</strong>
                    </p>

                    <p class="text-gray-600 bg-gray-50 p-3 rounded-lg">
                        {{ $produccion->Descripcion ?? 'Sin descripción registrada.' }}
                    </p>

                </div>

                {{-- ESCENAS ASOCIADAS --}}
                <div class="mt-8">
                    <h4 class="text-lg font-bold text-gray-800 mb-3">
                        Escenas ({{ $produccion->escenas->count() }})
                    </h4>

                    @if ($produccion->escenas->count())
                        <div class="space-y-3">
                            @foreach ($produccion->escenas as $escena)
                                <div class="bg-gray-50 rounded-lg p-4">
                                    <p class="font-semibold text-gray-800">
                                        Escena #{{ $escena->ID_escena }}
                                    </p>

                                    <p class="text-gray-600 mt-1">
                                        {{ \Illuminate\Support\Str::limit($escena->Descripcion ?? '', 100) }}
                                    </p>

                                    <p class="text-sm text-gray-500 mt-2">
                                        <strong>Estado:</strong>
                                        {{ $escena->Estado ?? '—' }}
                                    </p>
                                </div>
                            @endforeach
                        </div>
                    @else
                        <p class="text-gray-500 bg-gray-50 p-3 rounded-lg">
                            Esta producción todavía no tiene escenas registradas.
                        </p>
                    @endif
                </div>

                {{-- PLANES DE RODAJE ASOCIADOS --}}
                <div class="mt-8">
                    <h4 class="text-lg font-bold text-gray-800 mb-3">
                        Planes de rodaje ({{ $produccion->planesRodaje->count() }})
                    </h4>

                    @if ($produccion->planesRodaje->count())
                        <div class="space-y-3">
                            @foreach ($produccion->planesRodaje as $plan)
                                <div class="bg-gray-50 rounded-lg p-4">
                                    <p class="font-semibold text-gray-800">
                                        Plan #{{ $plan->ID_plan }}
                                    </p>

                                    <p class="text-gray-600 mt-1">
                                        <strong>Fecha:</strong>
                                        {{ $plan->Fecha ?? '—' }}
                                    </p>

                                    <p class="text-gray-600">
                                        <strong>Localización:</strong>
                                        {{ $plan->localizacion?->Nombre ?? '—' }}
                                    </p>

                                    <p class="text-gray-600">
                                        <strong>Horario:</strong>
                                        {{ $plan->Hora_inicio ?? '—' }}
                                        -
                                        {{ $plan->Hora_fin ?? '—' }}
                                    </p>
                                </div>
                            @endforeach
                        </div>
                    @else
                        <p class="text-gray-500 bg-gray-50 p-3 rounded-lg">
                            Esta producción todavía no tiene planes de rodaje registrados.
                        </p>
                    @endif
                </div>

                @auth
                    <div class="mt-6 flex gap-3">

                        <a href="{{ route('producciones.edit', $produccion->ID_produccion) }}" class="bg-amber-600 hover:bg-amber-700 text-white px-4 py-2 rounded-lg transition-colors">
                            Editar
                        </a>

                        <form action="{{ route('producciones.destroy', $produccion->ID_produccion) }}" method="POST" class="inline delete-form">
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
