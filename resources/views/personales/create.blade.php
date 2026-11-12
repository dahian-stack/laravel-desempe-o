
<!doctype html>
<html lang="es" data-bs-theme="light">

<head>
    <title>Nuevo Personal — Mediapro</title>

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
        <h1 class="mb-4">👤 Nuevo Personal</h1>

        <form action="{{ route('personales.store') }}" method="POST">
            @csrf

            <div class="row">
                <!-- Nombres -->
                <div class="col-md-6 mb-3">
                    <label for="Nombres" class="form-label">Nombres *</label>
                    <input
                        type="text"
                        id="Nombres"
                        name="Nombres"
                        class="form-control @error('Nombres') is-invalid @enderror"
                        value="{{ old('Nombres') }}"
                        required
                    >
                    @error('Nombres')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Apellidos -->
                <div class="col-md-6 mb-3">
                    <label for="Apellidos" class="form-label">Apellidos *</label>
                    <input
                        type="text"
                        id="Apellidos"
                        name="Apellidos"
                        class="form-control @error('Apellidos') is-invalid @enderror"
                        value="{{ old('Apellidos') }}"
                        required
                    >
                    @error('Apellidos')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <!-- Especialidad -->
            <div class="mb-3">
                <label for="Especialidad" class="form-label">Especialidad</label>
                <input
                    type="text"
                    id="Especialidad"
                    name="Especialidad"
                    class="form-control @error('Especialidad') is-invalid @enderror"
                    value="{{ old('Especialidad') }}"
                    placeholder="Ej: Cámara, Sonido, Dirección..."
                >
                @error('Especialidad')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
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
                        <option value="Disponible" {{ old('Disponibilidad') == 'Disponible' ? 'selected' : '' }}>
                            Disponible
                        </option>
                        <option value="Ocupado" {{ old('Disponibilidad') == 'Ocupado' ? 'selected' : '' }}>
                            Ocupado
                        </option>
                        <option value="Indisponible" {{ old('Disponibilidad') == 'Indisponible' ? 'selected' : '' }}>
                            Indisponible
                        </option>
                    </select>
                    @error('Disponibilidad')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Tarifa -->
                <div class="col-md-6 mb-3">
                    <label for="Tarifa" class="form-label">Tarifa ($)</label>
                    <input
                        type="number"
                        id="Tarifa"
                        name="Tarifa"
                        step="0.01"
                        min="0"
                        class="form-control @error('Tarifa') is-invalid @enderror"
                        value="{{ old('Tarifa') }}"
                    >
                    @error('Tarifa')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <!-- Contacto -->
            <div class="mb-3">
                <label for="Contacto" class="form-label">Contacto</label>
                <input
                    type="text"
                    id="Contacto"
                    name="Contacto"
                    class="form-control @error('Contacto') is-invalid @enderror"
                    value="{{ old('Contacto') }}"
                    placeholder="Teléfono o correo"
                >
                @error('Contacto')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <!-- Experiencia -->
            <div class="mb-4">
                <label for="Experiencia" class="form-label">Experiencia</label>
                <textarea
                    id="Experiencia"
                    name="Experiencia"
                    rows="4"
                    class="form-control @error('Experiencia') is-invalid @enderror"
                >{{ old('Experiencia') }}</textarea>
                @error('Experiencia')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <a href="{{ route('personales.index') }}" class="btn btn-outline-secondary">
                Cancelar
            </a>

            <button type="submit" class="btn btn-primary">
                Guardar Personal
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
