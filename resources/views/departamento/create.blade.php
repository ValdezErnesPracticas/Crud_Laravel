<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Crear Departamento</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <h1 class="mb-4">Crear Departamento</h1>

    {{-- Formulario para crear un nuevo departamento --}}
    <form action="{{ route('departamento.store') }}" method="POST" class="border p-4 shadow-sm rounded bg-light">
        @csrf

        <div class="mb-3">
            <label for="nombre" class="form-label">Nombre:</label>
            <input type="text" name="nombre" id="nombre" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="subcuenta" class="form-label">Subcuenta:</label>
            <input type="text" name="subcuenta" id="subcuenta" class="form-control" maxlength="3" required>
        </div>

        <div class="mb-3">
            <label for="descripcion" class="form-label">Descripción:</label>
            <textarea name="descripcion" id="descripcion" class="form-control" rows="3"></textarea>
        </div>

        <div class="d-flex justify-content-start gap-2">
            <button type="submit" class="btn btn-success">Guardar</button>
            <a href="{{ route('departamento.index') }}" class="btn btn-secondary">Cancelar</a>
        </div>
    </form>
</div>
</body>
</html>
