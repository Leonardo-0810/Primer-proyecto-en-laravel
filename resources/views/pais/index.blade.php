<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Países</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1>Listado de Países</h1>
        <a href="{{ route('paises.create') }}" class="btn btn-success mb-3">Agregar País</a>
        <table class="table">
            <thead>
                <tr>
                    <th>Código</th>
                    <th>Nombre</th>
                    <th>Capital</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($paises as $pais)
                <tr>
                    <td>{{ $pais->pais_codi }}</td>
                    <td>{{ $pais->pais_nomb }}</td>
                    <td>{{ $pais->pais_capi }}</td>
                    <td>
                        <a href="{{ route('paises.edit', $pais->pais_codi) }}" class="btn btn-info">Editar</a>
                        <form action="{{ route('paises.destroy', $pais->pais_codi) }}" method="POST" style="display:inline-block;">
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
