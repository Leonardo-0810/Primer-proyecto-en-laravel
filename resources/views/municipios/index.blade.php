<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Departamentos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1>Listado de Departamentos</h1>
        <a href="{{ route('departamentos.create') }}" class="btn btn-success mb-3">Agregar Departamento</a>
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($departamentos as $departamento)
                <tr>
                    <td>{{ $departamento->depa_codi }}</td>
                    <td>{{ $departamento->depa_nomb }}</td>
                    <td>
                        <a href="{{ route('departamentos.edit', $departamento->depa_codi) }}" class="btn btn-info">Editar</a>
                        <form action="{{ route('departamentos.destroy', $departamento->depa_codi) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Eliminar</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>
