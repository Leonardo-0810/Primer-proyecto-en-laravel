<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar País</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1>Editar País</h1>
        <form action="{{ route('paises.update', $pais->pais_codi) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="pais_codi" class="form-label">Código</label>
                <input type="text" class="form-control" id="pais_codi" name="pais_codi" value="{{ $pais->pais_codi }}" disabled>
            </div>
            <div class="mb-3">
                <label for="pais_nomb" class="form-label">Nombre</label>
                <input type="text" class="form-control" id="pais_nomb" name="pais_nomb" value="{{ $pais->pais_nomb }}" required maxlength="52">
            </div>
            <div class="mb-3">
                <label for="pais_capi" class="form-label">Capital</label>
                <input type="number" class="form-control" id="pais_capi" name="pais_capi" value="{{ $pais->pais_capi }}" required>
            </div>
            <button type="submit" class="btn btn-primary">Actualizar</button>
            <a href="{{ route('paises.index') }}" class="btn btn-secondary">Cancelar</a>
        </form>
    </div>
</body>
</html>
