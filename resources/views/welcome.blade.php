<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

    <div class="container text-center mt-5">
        <h1>Tablas:</h1>

        <div class="d-flex justify-content-center gap-3 mt-4">
            <a href="{{ route('departamento.index') }}" class="btn btn-primary btn-lg">Gestión de Departamentos</a>
            <a href="{{ route('puesto.index') }}" class="btn btn-success btn-lg">Gestión de Puestos</a>
        </div>
    </div>

</body>
</html>