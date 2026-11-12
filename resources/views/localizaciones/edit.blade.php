
<!doctype html>
<html lang="es" data-bs-theme="light">

<head>
    <title>Editar Localización — Mediapro</title>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
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

        <h1 class="mb-4">✏️ Editar Localización</h1>

        <form action="{{ route('localizaciones.update', $localizacion->ID_localizacion) }}" method="POST">
            @csrf
            @method('PUT')

            <!-- Nombre -->
            <div class="mb-3">
                <label for="Nombre" class="form-label">Nombre *</label>
                <input
                    type="text"
                    id="Nombre"
                    name="Nombre"
                    class="form-control @error('Nombre') is-invalid @enderror"
                    value="{{ old('Nombre', $localizacion->Nombre) }}"
                    required
                >
                @error('Nombre')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <!-- Dirección -->
            <div class="mb-3">
                <label for="Direccion" class="form-label">Dirección *</label>
                <input
                    type="text"
                    id="Direccion"
                    name="Direccion"
                    class="form-control @error('Direccion') is-invalid @enderror"
                    value="{{ old('Direccion', $localizacion->Direccion) }}"
                    required
                >
                @error('Direccion')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="row">

                <!-- Coordenadas -->
                <div class="col-md-6 mb-3">
                    <label for="Coordenadas" class="form-label">Coordenadas</label>
                    <input
                        type="text"
                        id="Coordenadas"
                        name="Coordenadas"
                        class="form-control @error('Coordenadas') is-invalid @enderror"
                        value="{{ old('Coordenadas', $localizacion->Coordenadas) }}"
                        placeholder="Ej: 6.234, -75.578"
                    >
                    @error('Coordenadas')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Tipo -->
                <div class="col-md-6 mb-3">
                    <label for="Tipo" class="form-label">Tipo</label>
                    <select
                        id="Tipo"
                        name="Tipo"
                        class="form-select @error('Tipo') is-invalid @enderror"
                    >
                        <option value="">Seleccionar</option>
                        <option value="Exterior" {{ old('Tipo', $localizacion->Tipo) == 'Exterior' ? 'selected' : '' }}>Exterior</option>
                        <option value="Interior" {{ old('Tipo', $localizacion->Tipo) == 'Interior' ? 'selected' : '' }}>Interior</option>
                        <option value="Mixto" {{ old('Tipo', $localizacion->Tipo) == 'Mixto' ? 'selected' : '' }}>Mixto</option>
                        <option value="Urbano" {{ old('Tipo', $localizacion->Tipo) == 'Urbano' ? 'selected' : '' }}>Urbano</option>
                        <option value="Rural" {{ old('Tipo', $localizacion->Tipo) == 'Rural' ? 'selected' : '' }}>Rural</option>
                    </select>
                    @error('Tipo')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

            </div>

            <!-- Propietario -->
            <div class="mb-3">
                <label for="Propietario" class="form-label">Propietario</label>
                <input
                    type="text"
                    id="Propietario"
                    name="Propietario"
                    class="form-control @error('Propietario') is-invalid @enderror"
                    value="{{ old('Propietario', $localizacion->Propietario) }}"
                >
                @error('Propietario')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <!-- Características -->
            <div class="mb-3">
                <label for="Caracteristicas" class="form-label">Características</label>
                <textarea
                    id="Caracteristicas"
                    name="Caracteristicas"
                    rows="3"
                    class="form-control @error('Caracteristicas') is-invalid @enderror"
                >{{ old('Caracteristicas', $localizacion->Caracteristicas) }}</textarea>
                @error('Caracteristicas')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="row">

                <!-- Permisos -->
                <div class="col-md-6 mb-3">
                    <label for="Permisos" class="form-label">Permisos Requeridos</label>
                    <select
                        id="Permisos"
                        name="Permisos"
                        class="form-select @error('Permisos') is-invalid @enderror"
                    >
                        <option value="">Seleccionar</option>
                        <option value="Si" {{ old('Permisos', $localizacion->Permisos) == 'Si' ? 'selected' : '' }}>Sí</option>
                        <option value="No" {{ old('Permisos', $localizacion->Permisos) == 'No' ? 'selected' : '' }}>No</option>
                    </select>
                    @error('Permisos')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Estado -->
                <div class="col-md-6 mb-3">
                    <label for="Estado" class="form-label">Estado</label>
                    <select
                        id="Estado"
                        name="Estado"
                        class="form-select @error('Estado') is-invalid @enderror"
                    >
                        <option value="">Seleccionar</option>
                        <option value="Disponible" {{ old('Estado', $localizacion->Estado) == 'Disponible' ? 'selected' : '' }}>Disponible</option>
                        <option value="Ocupada" {{ old('Estado', $localizacion->Estado) == 'Ocupada' ? 'selected' : '' }}>Ocupada</option>
                        <option value="Restringida" {{ old('Estado', $localizacion->Estado) == 'Restringida' ? 'selected' : '' }}>Restringida</option>
                    </select>
                    @error('Estado')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

            </div>

            <div class="row">

                <!-- Costo -->
                <div class="col-md-6 mb-3">
                    <label for="Costo" class="form-label">Costo ($)</label>
                    <input
                        type="number"
                        id="Costo"
                        name="Costo"
                        step="0.01"
                        min="0"
                        class="form-control @error('Costo') is-invalid @enderror"
                        value="{{ old('Costo', $localizacion->Costo) }}"
                    >
                    @error('Costo')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Accesibilidad -->
                <div class="col-md-6 mb-3">
                    <label for="Accesibilidad" class="form-label">Accesibilidad</label>
                    <select
                        id="Accesibilidad"
                        name="Accesibilidad"
                        class="form-select @error('Accesibilidad') is-invalid @enderror"
                    >
                        <option value="">Seleccionar</option>
                        <option value="Buena" {{ old('Accesibilidad', $localizacion->Accesibilidad) == 'Buena' ? 'selected' : '' }}>Buena</option>
                        <option value="Regular" {{ old('Accesibilidad', $localizacion->Accesibilidad) == 'Regular' ? 'selected' : '' }}>Regular</option>
                        <option value="Dificil" {{ old('Accesibilidad', $localizacion->Accesibilidad) == 'Dificil' ? 'selected' : '' }}>Difícil</option>
                    </select>
                    @error('Accesibilidad')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

            </div>

            <!-- Facilidades -->
            <div class="mb-3">
                <label for="Facilidades" class="form-label">Facilidades</label>
                <textarea
                    id="Facilidades"
                    name="Facilidades"
                    rows="2"
                    class="form-control @error('Facilidades') is-invalid @enderror"
                >{{ old('Facilidades', $localizacion->Facilidades) }}</textarea>
                @error('Facilidades')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <!-- Limitaciones -->
            <div class="mb-4">
                <label for="Limitaciones" class="form-label">Limitaciones</label>
                <textarea
                    id="Limitaciones"
                    name="Limitaciones"
                    rows="2"
                    class="form-control @error('Limitaciones') is-invalid @enderror"
                >{{ old('Limitaciones', $localizacion->Limitaciones) }}</textarea>
                @error('Limitaciones')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <a href="{{ route('localizaciones.index') }}" class="btn btn-outline-secondary">
                Cancelar
            </a>

            <button type="submit" class="btn btn-primary">
                Actualizar Localización
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
