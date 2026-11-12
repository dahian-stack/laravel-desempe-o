
<!doctype html>
<html lang="es" data-bs-theme="light">

<head>
    <title>Editar Producción — Mediapro</title>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS v5.3.8 -->
    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css"
        rel="stylesheet"
        integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB"
        crossorigin="anonymous"
    >

    <!-- Bootstrap Icons -->
    <link
        rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css"
    >
    <link rel="stylesheet" href="{{ asset('css/mediapro-portal.css') }}">
    <link rel="stylesheet" href="{{ asset('css/mediapro-admin.css') }}">
</head>

<body class="d-flex flex-column min-vh-100 mp-admin-body">

@include('layouts.admin-navigation')

<main class="flex-grow-1">
    <div class="container mt-5" style="max-width: 720px;">

        <h1 class="mb-4">🎬 Editar Producción</h1>

        <form action="{{ route('producciones.update', $produccion->ID_produccion) }}" method="POST">
            @csrf
            @method('PUT')

            <!-- Cliente -->
            <div class="mb-3">
                <label for="ID_cliente" class="form-label">Cliente *</label>

                <select
                    id="ID_cliente"
                    name="ID_cliente"
                    class="form-select @error('ID_cliente') is-invalid @enderror"
                    required>

                    <option value="">Seleccionar cliente</option>

                    @foreach ($clientes as $cliente)
                        <option
                            value="{{ $cliente->ID_cliente }}"
                            {{ old('ID_cliente', $produccion->ID_cliente) == $cliente->ID_cliente ? 'selected' : '' }}>
                            {{ $cliente->Nombre }}
                        </option>
                    @endforeach
                </select>

                @error('ID_cliente')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <!-- Título -->
            <div class="mb-3">
                <label for="Titulo" class="form-label">Título *</label>

                <input
                    type="text"
                    id="Titulo"
                    name="Titulo"
                    class="form-control @error('Titulo') is-invalid @enderror"
                    value="{{ old('Titulo', $produccion->Titulo) }}"
                    required>

                @error('Titulo')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="row">

                <!-- Tipo -->
                <div class="col-md-6 mb-3">
                    <label for="Tipo" class="form-label">Tipo</label>

                    <select
                        id="Tipo"
                        name="Tipo"
                        class="form-select @error('Tipo') is-invalid @enderror">

                        <option value="">Seleccionar</option>
                        <option value="Cine" {{ old('Tipo', $produccion->Tipo) == 'Cine' ? 'selected' : '' }}>Cine</option>
                        <option value="Televisión" {{ old('Tipo', $produccion->Tipo) == 'Televisión' ? 'selected' : '' }}>Televisión</option>
                        <option value="Publicidad" {{ old('Tipo', $produccion->Tipo) == 'Publicidad' ? 'selected' : '' }}>Publicidad</option>
                        <option value="Documental" {{ old('Tipo', $produccion->Tipo) == 'Documental' ? 'selected' : '' }}>Documental</option>
                        <option value="Video Musical" {{ old('Tipo', $produccion->Tipo) == 'Video Musical' ? 'selected' : '' }}>Video Musical</option>
                    </select>

                    @error('Tipo')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Género -->
                <div class="col-md-6 mb-3">
                    <label for="Genero" class="form-label">Género</label>

                    <input
                        type="text"
                        id="Genero"
                        name="Genero"
                        class="form-control @error('Genero') is-invalid @enderror"
                        value="{{ old('Genero', $produccion->Genero) }}"
                        placeholder="Ej: Drama, Comedia...">

                    @error('Genero')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <!-- Etapa -->
            <div class="mb-3">
                <label for="Etapa" class="form-label">Etapa</label>

                <input
                    type="text"
                    id="Etapa"
                    name="Etapa"
                    class="form-control @error('Etapa') is-invalid @enderror"
                    value="{{ old('Etapa', $produccion->Etapa) }}">

                @error('Etapa')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <!-- Descripción -->
            <div class="mb-3">
                <label for="Descripcion" class="form-label">Descripción</label>

                <textarea
                    id="Descripcion"
                    name="Descripcion"
                    rows="4"
                    class="form-control @error('Descripcion') is-invalid @enderror">{{ old('Descripcion', $produccion->Descripcion) }}</textarea>

                @error('Descripcion')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <!-- Presupuesto inicial -->
            <div class="mb-3">
                <label for="Presupuesto_inicial" class="form-label">Presupuesto inicial ($)</label>

                <input
                    type="number"
                    id="Presupuesto_inicial"
                    name="Presupuesto_inicial"
                    step="0.01"
                    min="0"
                    class="form-control @error('Presupuesto_inicial') is-invalid @enderror"
                    value="{{ old('Presupuesto_inicial', $produccion->Presupuesto_inicial) }}">

                @error('Presupuesto_inicial')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <!-- Presupuesto gastado -->
            <div class="mb-3">
                <label for="Presupuesto_gastado" class="form-label">Presupuesto gastado ($)</label>

                <input
                    type="number"
                    id="Presupuesto_gastado"
                    name="Presupuesto_gastado"
                    step="0.01"
                    min="0"
                    class="form-control @error('Presupuesto_gastado') is-invalid @enderror"
                    value="{{ old('Presupuesto_gastado', $produccion->Presupuesto_gastado) }}">

                @error('Presupuesto_gastado')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="row">

                <!-- Fecha Inicio -->
                <div class="col-md-6 mb-3">
                    <label for="Fecha_inicio" class="form-label">Fecha de Inicio</label>

                    <input
                        type="date"
                        id="Fecha_inicio"
                        name="Fecha_inicio"
                        class="form-control @error('Fecha_inicio') is-invalid @enderror"
                        value="{{ old('Fecha_inicio', $produccion->Fecha_inicio) }}">

                    @error('Fecha_inicio')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Fecha Fin -->
                <div class="col-md-6 mb-3">
                    <label for="Fecha_fin" class="form-label">Fecha de Finalización</label>

                    <input
                        type="date"
                        id="Fecha_fin"
                        name="Fecha_fin"
                        class="form-control @error('Fecha_fin') is-invalid @enderror"
                        value="{{ old('Fecha_fin', $produccion->Fecha_fin) }}">

                    @error('Fecha_fin')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <!-- Estado -->
            <div class="mb-4">
                <label for="Estado" class="form-label">Estado</label>

                <select
                    id="Estado"
                    name="Estado"
                    class="form-select @error('Estado') is-invalid @enderror">

                    <option value="">Seleccionar</option>
                    <option value="Planificación" {{ old('Estado', $produccion->Estado) == 'Planificación' ? 'selected' : '' }}>Planificación</option>
                    <option value="En Producción" {{ old('Estado', $produccion->Estado) == 'En Producción' ? 'selected' : '' }}>En Producción</option>
                    <option value="Postproducción" {{ old('Estado', $produccion->Estado) == 'Postproducción' ? 'selected' : '' }}>Postproducción</option>
                    <option value="Finalizada" {{ old('Estado', $produccion->Estado) == 'Finalizada' ? 'selected' : '' }}>Finalizada</option>
                </select>

                @error('Estado')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <a href="{{ route('producciones.index') }}" class="btn btn-outline-secondary">
                Cancelar
            </a>

            <button type="submit" class="btn btn-primary">
                Actualizar Producción
            </button>

        </form>
    </div>
</main>

<!-- Footer -->
@include('layouts.admin-footer')

<script
    src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI"
    crossorigin="anonymous">
</script>

</body>
</html>
