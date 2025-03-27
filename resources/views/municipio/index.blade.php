<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Municipios</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1>Listado de Municipios</h1>
        <a href="{{ route('municipios.create') }}" class="btn btn-success mb-3">Agregar Municipio</a>
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Departamento</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($municipios as $municipio)
                <tr>
                    <td>{{ $municipio->muni_codi }}</td>
                    <td>{{ $municipio->muni_nomb }}</td>
                    <td>{{ $municipio->departamento->depa_nomb ?? 'Sin departamento' }}</td>
                    <td>
                        <a href="{{ route('municipios.edit', $municipio->muni_codi) }}" class="btn btn-info">Editar</a>
                        <form action="{{ route('municipios.destroy', $municipio->muni_codi) }}" method="POST" style="display:inline-block;">
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
