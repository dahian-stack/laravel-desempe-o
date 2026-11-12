
<!doctype html>
<html lang="es" data-bs-theme="light">

<head>
    <title>Editar Escena — Mediapro</title>

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

        <h1 class="mb-4">✏️ Editar Escena</h1>

        <form action="{{ route('escenas.update', $escena->ID_escena) }}" method="POST">
            @csrf
            @method('PUT')

            <!-- Producción -->
            <div class="mb-3">
                <label for="ID_produccion" class="form-label">
                    Producción *
                </label>

                <select
                    id="ID_produccion"
                    name="ID_produccion"
                    class="form-select @error('ID_produccion') is-invalid @enderror"
                    required
                >
                    <option value="">Seleccionar producción</option>

                    @foreach ($producciones as $produccion)
                        <option
                            value="{{ $produccion->ID_produccion }}"
                            {{ old('ID_produccion', $escena->ID_produccion) == $produccion->ID_produccion ? 'selected' : '' }}
                        >
                            {{ $produccion->Titulo }}
                        </option>
                    @endforeach
                </select>

                @error('ID_produccion')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <!-- Descripción -->
            <div class="mb-3">
                <label for="Descripcion" class="form-label">
                    Descripción *
                </label>

                <textarea
                    id="Descripcion"
                    name="Descripcion"
                    rows="4"
                    class="form-control @error('Descripcion') is-invalid @enderror"
                    required
                >{{ old('Descripcion', $escena->Descripcion) }}</textarea>

                @error('Descripcion')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <!-- Tiempo estimado -->
            <div class="mb-3">
                <label for="Tiempo_estimado" class="form-label">
                    Tiempo estimado
                </label>

                <input
                    type="text"
                    id="Tiempo_estimado"
                    name="Tiempo_estimado"
                    class="form-control @error('Tiempo_estimado') is-invalid @enderror"
                    value="{{ old('Tiempo_estimado', $escena->Tiempo_estimado) }}"
                    placeholder="Ej: 2 horas"
                >

                @error('Tiempo_estimado')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <!-- Necesidades especiales -->
            <div class="mb-3">
                <label for="Necesidades_especiales" class="form-label">
                    Necesidades especiales
                </label>

                <textarea
                    id="Necesidades_especiales"
                    name="Necesidades_especiales"
                    rows="3"
                    class="form-control @error('Necesidades_especiales') is-invalid @enderror"
                    placeholder="Describe los recursos o necesidades especiales de la escena"
                >{{ old('Necesidades_especiales', $escena->Necesidades_especiales) }}</textarea>

                @error('Necesidades_especiales')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="row">

                <!-- Complejidad -->
                <div class="col-md-6 mb-3">
                    <label for="Complejidad" class="form-label">
                        Complejidad
                    </label>

                    <select
                        id="Complejidad"
                        name="Complejidad"
                        class="form-select @error('Complejidad') is-invalid @enderror"
                    >
                        <option value="">Seleccionar</option>

                        <option value="Baja" {{ old('Complejidad', $escena->Complejidad) == 'Baja' ? 'selected' : '' }}>
                            Baja
                        </option>

                        <option value="Media" {{ old('Complejidad', $escena->Complejidad) == 'Media' ? 'selected' : '' }}>
                            Media
                        </option>

                        <option value="Alta" {{ old('Complejidad', $escena->Complejidad) == 'Alta' ? 'selected' : '' }}>
                            Alta
                        </option>
                    </select>

                    @error('Complejidad')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Estado -->
                <div class="col-md-6 mb-3">
                    <label for="Estado" class="form-label">
                        Estado
                    </label>

                    <select
                        id="Estado"
                        name="Estado"
                        class="form-select @error('Estado') is-invalid @enderror"
                    >
                        <option value="">Seleccionar</option>

                        <option value="Pendiente" {{ old('Estado', $escena->Estado) == 'Pendiente' ? 'selected' : '' }}>
                            Pendiente
                        </option>

                        <option value="En Rodaje" {{ old('Estado', $escena->Estado) == 'En Rodaje' ? 'selected' : '' }}>
                            En Rodaje
                        </option>

                        <option value="Grabada" {{ old('Estado', $escena->Estado) == 'Grabada' ? 'selected' : '' }}>
                            Grabada
                        </option>

                        <option value="Aprobada" {{ old('Estado', $escena->Estado) == 'Aprobada' ? 'selected' : '' }}>
                            Aprobada
                        </option>
                    </select>

                    @error('Estado')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

            </div>

            <!-- Botones -->
            <a href="{{ route('escenas.index') }}" class="btn btn-outline-secondary">
                Cancelar
            </a>

            <button type="submit" class="btn btn-primary">
                Actualizar Escena
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
