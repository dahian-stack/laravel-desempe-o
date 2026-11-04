
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Ficha de Cliente
        </h2>
    </x-slot>

    <div class="py-8 bg-gray-50 min-h-screen">
        <div class="max-w-2xl mx-auto px-4 sm:px-6 lg:px-8">

            <div class="mb-6">
                <a href="{{ route('clientes.index') }}"
                   class="text-gray-600 hover:text-gray-900 flex items-center gap-2">
                    ← Volver al listado
                </a>
            </div>

            <div class="bg-white rounded-xl shadow-md p-6">

                <h3 class="text-xl font-bold text-gray-800 mb-4">
                    {{ $cliente->Nombre }}
                </h3>

                <div class="space-y-3 text-gray-600">

                    <p>
                        <strong class="text-gray-800">ID:</strong>
                        {{ $cliente->ID_cliente }}
                    </p>

                    <p>
                        <strong class="text-gray-800">Nombre:</strong>
                        {{ $cliente->Nombre }}
                    </p>

                    <p>
                        <strong class="text-gray-800">Tipo:</strong>

                        @php
                            $colorTipo = match ($cliente->Tipo) {
                                'Empresa' => 'bg-blue-100 text-blue-700',
                                'Independiente' => 'bg-emerald-100 text-emerald-700',
                                'Institución' => 'bg-purple-100 text-purple-700',
                                default => 'bg-gray-100 text-gray-700',
                            };
                        @endphp

                        <span class="{{ $colorTipo }} px-2.5 py-0.5 rounded-full text-xs font-medium">
                            {{ $cliente->Tipo ?? '—' }}
                        </span>
                    </p>

                    <p>
                        <strong class="text-gray-800">Contacto:</strong>
                        {{ $cliente->Contacto ?? '—' }}
                    </p>

                </div>

                @if($cliente->producciones->count())

                    <div class="mt-6">
                        <h4 class="font-semibold text-gray-800 mb-3">
                            Producciones asociadas ({{ $cliente->producciones->count() }})
                        </h4>

                        <div class="space-y-3">
                            @foreach($cliente->producciones as $produccion)
                                <div class="bg-gray-50 rounded-lg p-4">
                                    <p class="font-medium text-gray-800">
                                        {{ $produccion->Titulo }}
                                    </p>

                                    <p class="text-sm text-gray-600 mt-1">
                                        Estado: {{ $produccion->Estado ?? 'Sin estado' }}
                                    </p>
                                </div>
                            @endforeach
                        </div>
                    </div>

                @else

                    <p class="text-gray-500 bg-gray-50 p-3 rounded-lg mt-5">
                        Este cliente todavía no tiene producciones asociadas.
                    </p>

                @endif

                @auth
                    <div class="mt-6 flex gap-3">

                        <a href="{{ route('clientes.edit', $cliente->ID_cliente) }}"
                           class="bg-amber-600 hover:bg-amber-700 text-white px-4 py-2 rounded-lg transition-colors">
                            Editar
                        </a>

                        <form action="{{ route('clientes.destroy', $cliente->ID_cliente) }}"
                              method="POST"
                              class="inline delete-form">

                            @csrf
                            @method('DELETE')

                            <button type="submit"
                                    class="bg-red-600 hover:bg-red-700 text-white px-4 py-2 rounded-lg transition-colors">
                                Eliminar
                            </button>

                        </form>
                    </div>
                @endauth

            </div>
        </div>
    </div>
</x-app-layout>
