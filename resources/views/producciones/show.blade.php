
<x-app-layout>
    <div class="container py-4" style="max-width: 800px;">
        <div class="card">
            <div class="card-header bg-primary text-white">
                <h3 class="mb-0">{{ $produccion->Titulo }}</h3>
            </div>

            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">
                                <strong>ID:</strong>
                                {{ $produccion->ID_produccion }}
                            </li>

                            <li class="list-group-item">
                                <strong>Tipo:</strong>
                                {{ $produccion->Tipo ?? '—' }}
                            </li>

                            <li class="list-group-item">
                                <strong>Género:</strong>
                                {{ $produccion->Genero ?? '—' }}
                            </li>

                            <li class="list-group-item">
                                <strong>Cliente:</strong>
                                {{ $produccion->cliente?->Nombre ?? '—' }}
                            </li>

                            <li class="list-group-item">
                                <strong>Etapa:</strong>
                                {{ $produccion->Etapa ?? '—' }}
                            </li>

                            <li class="list-group-item">
                                <strong>Estado:</strong>
                                {{ $produccion->Estado ?? '—' }}
                            </li>
                        </ul>
                    </div>

                    <div class="col-md-6">
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">
                                <strong>Presupuesto Inicial:</strong>
                                ${{ number_format($produccion->Presupuesto_inicial ?? 0, 2) }}
                            </li>

                            <li class="list-group-item">
                                <strong>Presupuesto Gastado:</strong>
                                ${{ number_format($produccion->Presupuesto_gastado ?? 0, 2) }}
                            </li>

                            <li class="list-group-item">
                                <strong>Fecha Inicio:</strong>
                                {{ $produccion->Fecha_inicio ?? '—' }}
                            </li>

                            <li class="list-group-item">
                                <strong>Fecha Fin:</strong>
                                {{ $produccion->Fecha_fin ?? '—' }}
                            </li>
                        </ul>
                    </div>
                </div>

                <div class="mt-3">
                    <strong>Descripción:</strong>
                    <p class="mb-0">
                        {{ $produccion->Descripcion ?? 'Sin descripción registrada.' }}
                    </p>
                </div>

                @if($produccion->escenas->count())
                    <h5 class="mt-4">
                        Escenas ({{ $produccion->escenas->count() }}):
                    </h5>

                    <ul class="list-group">
                        @foreach($produccion->escenas as $e)
                            <li class="list-group-item">
                                Escena #{{ $e->ID_escena }} —
                                {{ \Illuminate\Support\Str::limit($e->Descripcion ?? '', 60) }}
                                ({{ $e->Estado ?? '—' }})
                            </li>
                        @endforeach
                    </ul>
                @endif

                @if($produccion->planesRodaje->count())
                    <h5 class="mt-4">
                        Planes de Rodaje ({{ $produccion->planesRodaje->count() }}):
                    </h5>

                    <ul class="list-group">
                        @foreach($produccion->planesRodaje as $pl)
                            <li class="list-group-item">
                                Plan #{{ $pl->ID_plan }} —
                                {{ $pl->Fecha ?? 'Sin fecha' }}
                                en {{ $pl->localizacion?->Nombre ?? '—' }}
                            </li>
                        @endforeach
                    </ul>
                @endif
            </div>

            <div class="card-footer text-end">
                <a href="{{ route('producciones.index') }}" class="btn btn-secondary">
                    Volver
                </a>

                @auth
                    <a href="{{ route('producciones.edit', $produccion->ID_produccion) }}"
                       class="btn btn-warning">
                        Editar
                    </a>
                @endauth
            </div>
        </div>
    </div>
</x-app-layout>
