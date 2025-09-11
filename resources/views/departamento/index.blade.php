<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Departamentos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <a href="{{ url('/') }}" class="btn btn-primary mb-3">Home</a>
    <h1 class="mb-4">Departamentos</h1>

    {{-- Botón para crear nuevo departamento --}}
    <a href="{{ route('departamento.create') }}" class="btn btn-primary mb-3">Nuevo Departamento</a>
    <a href="{{ route('departamento.index') }}" class="btn btn-primary mb-3">Mostrar Todos</a>
    <form action="" method="GET" onsubmit="return redirigirPorId(event)">
        <div class="input-group mb-3">
            <input type="number" id="idInput" class="form-control" placeholder="Ingrese el ID" required>
            <button type="submit" class="btn btn-primary">Buscar por ID</button>
        </div>
    </form>


    {{-- Mensaje de éxito --}}
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    {{-- Mensaje de error --}}
    @if(session('error'))
        <div class="alert alert-warning">
            {{ session('error') }}
        </div>
    @endif

    {{-- Tabla de departamentos --}}
    <table class="table table-bordered table-hover">
        <thead class="table-light">
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Subcuenta</th>
                <th>Descripción</th>
                <th width="200px">Acciones</th>
            </tr>
        </thead>
        <tbody>
            @forelse($departamentos as $dep)
            <tr>
                <td>{{ $dep->id }}</td>
                <td>{{ $dep->nombre }}</td>
                <td>{{ $dep->subcuenta }}</td>
                <td>{{ $dep->descripcion }}</td>
                <td>
                    <a href="{{ route('departamento.edit', $dep->id) }}" class="btn btn-warning btn-sm">Editar</a>

                    <form action="{{ route('departamento.destroy', $dep->id) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm"
                            onclick="return confirm('¿Seguro que deseas eliminar este departamento?')">
                            Eliminar
                        </button>
                    </form>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="5" class="text-center">No hay departamentos registrados.</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>
</body>
</html>
<script>
    function redirigirPorId(event) {
        event.preventDefault(); // Evita que el formulario se envíe de forma tradicional
        const id = document.getElementById('idInput').value;
        if (id) {
            const url = `{{ url('departamento') }}/${id}`;
            window.location.href = url;
        }
    }
</script>