<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Crear Puesto</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <h1 class="mb-4">Crear Puesto</h1>

    {{-- Formulario para crear nuevo puesto --}}
    <form action="{{ route('puesto.store') }}" method="POST" class="border p-4 shadow-sm rounded bg-light">
        @csrf

        <div class="mb-3">
            <label for="nombre" class="form-label">Nombre:</label>
            <input type="text" name="nombre" id="nombre" class="form-control" required>
        </div>

        <div class="d-flex justify-content-start gap-2">
            <button type="submit" class="btn btn-success">Guardar</button>
            <a href="{{ route('puesto.index') }}" class="btn btn-secondary">Cancelar</a>
        </div>
    </form>
</div>
</body>
</html>
