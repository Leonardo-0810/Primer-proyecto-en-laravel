<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar País</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1>Agregar Nuevo País</h1>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('paises.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="pais_codi" class="form-label">Código</label>
                <input type="text" class="form-control" id="pais_codi" name="pais_codi" required maxlength="3">
            </div>
            <div class="mb-3">
                <label for="pais_nomb" class="form-label">Nombre</label>
                <input type="text" class="form-control" id="pais_nomb" name="pais_nomb" required maxlength="52">
            </div>
            <div class="mb-3">
                <label for="pais_capi" class="form-label">Capital</label>
                <input type="text" class="form-control" id="pais_capi" name="pais_capi" required maxlength="52">
            </div>
            <button type="submit" class="btn btn-success">Guardar</button>
            <a href="{{ route('paises.index') }}" class="btn btn-secondary">Cancelar</a>
        </form>
    </div>
</body>
</html>
