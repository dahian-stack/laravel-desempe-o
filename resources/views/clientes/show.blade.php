
<x-app-layout>
    <div class="container py-4" style="max-width: 700px;">

        <div class="card">

            <div class="card-header bg-primary text-white">
                <h3 class="mb-0">{{ $cliente->Nombre }}</h3>
            </div>

            <div class="card-body">

                <ul class="list-group list-group-flush">

                    <li class="list-group-item">
                        <strong>ID:</strong>
                        {{ $cliente->ID_cliente }}
                    </li>

                    <li class="list-group-item">
                        <strong>Nombre:</strong>
                        {{ $cliente->Nombre }}
                    </li>

                    <li class="list-group-item">
                        <strong>Tipo:</strong>
                        {{ $cliente->Tipo ?? '—' }}
                    </li>

                    <li class="list-group-item">
                        <strong>Contacto:</strong>
                        {{ $cliente->Contacto ?? '—' }}
                    </li>

                </ul>

                @if($cliente->producciones->count())

                    <h5 class="mt-4">Producciones asociadas:</h5>

                    <ul class="list-group">

                        @foreach($cliente->producciones as $p)
                            <li class="list-group-item">
                                <strong>{{ $p->Titulo }}</strong>
                                ({{ $p->Estado ?? 'Sin estado' }})
                            </li>
                        @endforeach

                    </ul>

                @else

                    <p class="text-muted mt-4 mb-0">
                        Este cliente todavía no tiene producciones asociadas.
                    </p>

                @endif

            </div>

            <div class="card-footer text-end">

                <a href="{{ route('clientes.index') }}" class="btn btn-secondary">
                    Volver
                </a>

                @auth
                    <a href="{{ route('clientes.edit', $cliente->ID_cliente) }}" class="btn btn-warning">
                        Editar
                    </a>
                @endauth

            </div>

        </div>

    </div>
</x-app-layout>
