
<!doctype html>
<html lang="es" data-bs-theme="light">

<head>
    <title>Nuevo Cliente — Mediapro</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css"
        rel="stylesheet"
        integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB"
        crossorigin="anonymous"
    >

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

        <h1 class="mb-4">
            <i class="bi bi-person-plus me-2"></i>Nuevo Cliente
        </h1>

        <form action="{{ route('clientes.store') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label for="Nombre" class="form-label">Nombre *</label>

                <input
                    type="text"
                    id="Nombre"
                    name="Nombre"
                    class="form-control @error('Nombre') is-invalid @enderror"
                    value="{{ old('Nombre') }}"
                    maxlength="100"
                    required
                >

                @error('Nombre')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="row">

                <div class="col-md-6 mb-3">
                    <label for="Tipo" class="form-label">Tipo</label>

                    <select
                        id="Tipo"
                        name="Tipo"
                        class="form-select @error('Tipo') is-invalid @enderror"
                    >
                        <option value="">Seleccionar</option>

                        <option value="Empresa" {{ old('Tipo') == 'Empresa' ? 'selected' : '' }}>
                            Empresa
                        </option>

                        <option value="Independiente" {{ old('Tipo') == 'Independiente' ? 'selected' : '' }}>
                            Independiente
                        </option>

                        <option value="Institución" {{ old('Tipo') == 'Institución' ? 'selected' : '' }}>
                            Institución
                        </option>
                    </select>

                    @error('Tipo')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-6 mb-3">
                    <label for="Contacto" class="form-label">Contacto</label>

                    <input
                        type="text"
                        id="Contacto"
                        name="Contacto"
                        class="form-control @error('Contacto') is-invalid @enderror"
                        value="{{ old('Contacto') }}"
                        maxlength="100"
                    >

                    @error('Contacto')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

            </div>

            <div class="mt-4">
                <a href="{{ route('clientes.index') }}" class="btn btn-outline-secondary">
                    <i class="bi bi-arrow-left me-1"></i>Cancelar
                </a>

                <button type="submit" class="btn btn-primary">
                    <i class="bi bi-save me-1"></i>Guardar
                </button>
            </div>

        </form>
    </div>
</main>

@include('layouts.admin-footer')

<script
    src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI"
    crossorigin="anonymous">
</script>

</body>
</html>
