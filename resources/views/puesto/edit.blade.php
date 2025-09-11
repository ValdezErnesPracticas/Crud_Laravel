<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Editar Puesto</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <h1 class="mb-4">Editar Puesto</h1>

    <form action="{{ route('puesto.update', $puesto->id) }}" method="POST" class="border p-4 shadow-sm rounded bg-light">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="nombre" class="form-label">Nombre:</label>
            <input type="text" name="nombre" id="nombre" value="{{ $puesto->nombre }}" class="form-control" required>
        </div>

        <div class="d-flex justify-content-start gap-2">
            <button type="submit" class="btn btn-success">Actualizar</button>
            <a href="{{ route('puesto.index') }}" class="btn btn-secondary">Cancelar</a>
        </div>
    </form>
</div>
</body>
</html>
