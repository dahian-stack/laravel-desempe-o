
<!doctype html>
<html lang="es" data-bs-theme="light">

<head>
    <title>Nuevo Equipo Técnico — Mediapro</title>

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

        <h1 class="mb-4">🎥 Nuevo Equipo Técnico</h1>

        <form action="{{ route('equipos_tecnicos.store') }}" method="POST">
            @csrf

            <div class="row">

                <!-- Categoría -->
                <div class="col-md-6 mb-3">
                    <label for="Categoria" class="form-label">Categoría *</label>

                    <select
                        id="Categoria"
                        name="Categoria"
                        class="form-select @error('Categoria') is-invalid @enderror"
                        required
                    >
                        <option value="">Seleccionar</option>
                        <option value="Cámara" {{ old('Categoria') == 'Cámara' ? 'selected' : '' }}>Cámara</option>
                        <option value="Sonido" {{ old('Categoria') == 'Sonido' ? 'selected' : '' }}>Sonido</option>
                        <option value="Iluminación" {{ old('Categoria') == 'Iluminación' ? 'selected' : '' }}>Iluminación</option>
                        <option value="Montaje" {{ old('Categoria') == 'Montaje' ? 'selected' : '' }}>Montaje</option>
                        <option value="Accesorios" {{ old('Categoria') == 'Accesorios' ? 'selected' : '' }}>Accesorios</option>
                        <option value="Otro" {{ old('Categoria') == 'Otro' ? 'selected' : '' }}>Otro</option>
                    </select>

                    @error('Categoria')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Marca -->
                <div class="col-md-6 mb-3">
                    <label for="Marca" class="form-label">Marca *</label>

                    <input
                        type="text"
                        id="Marca"
                        name="Marca"
                        class="form-control @error('Marca') is-invalid @enderror"
                        value="{{ old('Marca') }}"
                        required
                    >

                    @error('Marca')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

            </div>

            <div class="row">

                <!-- Modelo -->
                <div class="col-md-6 mb-3">
                    <label for="Modelo" class="form-label">Modelo</label>

                    <input
                        type="text"
                        id="Modelo"
                        name="Modelo"
                        class="form-control @error('Modelo') is-invalid @enderror"
                        value="{{ old('Modelo') }}"
                    >

                    @error('Modelo')
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
                        <option value="Nuevo" {{ old('Estado') == 'Nuevo' ? 'selected' : '' }}>Nuevo</option>
                        <option value="Bueno" {{ old('Estado') == 'Bueno' ? 'selected' : '' }}>Bueno</option>
                        <option value="Regular" {{ old('Estado') == 'Regular' ? 'selected' : '' }}>Regular</option>
                        <option value="En Mantenimiento" {{ old('Estado') == 'En Mantenimiento' ? 'selected' : '' }}>En Mantenimiento</option>
                        <option value="Dañado" {{ old('Estado') == 'Dañado' ? 'selected' : '' }}>Dañado</option>
                    </select>

                    @error('Estado')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

            </div>

            <div class="row">

                <!-- Disponibilidad -->
                <div class="col-md-6 mb-3">
                    <label for="Disponibilidad" class="form-label">Disponibilidad</label>

                    <select
                        id="Disponibilidad"
                        name="Disponibilidad"
                        class="form-select @error('Disponibilidad') is-invalid @enderror"
                    >
                        <option value="">Seleccionar</option>
                        <option value="Disponible" {{ old('Disponibilidad') == 'Disponible' ? 'selected' : '' }}>Disponible</option>
                        <option value="Asignado" {{ old('Disponibilidad') == 'Asignado' ? 'selected' : '' }}>Asignado</option>
                        <option value="En reparación" {{ old('Disponibilidad') == 'En reparación' ? 'selected' : '' }}>En Reparación</option>
                    </select>

                    @error('Disponibilidad')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

            </div>

            <!-- Características -->
            <div class="mb-4">
                <label for="Caracteristicas" class="form-label">Características</label>

                <textarea
                    id="Caracteristicas"
                    name="Caracteristicas"
                    rows="3"
                    class="form-control @error('Caracteristicas') is-invalid @enderror"
                    placeholder="Describe las características del equipo..."
                >{{ old('Caracteristicas') }}</textarea>

                @error('Caracteristicas')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <a href="{{ route('equipos_tecnicos.index') }}" class="btn btn-outline-secondary">
                Cancelar
            </a>

            <button type="submit" class="btn btn-primary">
                Guardar Equipo
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
