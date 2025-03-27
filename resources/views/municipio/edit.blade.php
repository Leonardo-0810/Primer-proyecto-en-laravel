<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Municipio</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1>Editar Municipio</h1>
        <form method="POST" action="{{ route('municipios.update', $municipio->muni_codi) }}">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="muni_codi" class="form-label">Código</label>
                <input type="text" class="form-control" id="muni_codi" value="{{ $municipio->muni_codi }}" disabled>
            </div>
            <div class="mb-3">
                <label for="muni_nomb" class="form-label">Nombre</label>
                <input type="text" required class="form-control" id="muni_nomb" name="muni_nomb" value="{{ $municipio->muni_nomb }}">
            </div>
            <div class="mb-3">
                <label for="depa_codi" class="form-label">Departamento</label>
                <select class="form-select" id="depa_codi" name="depa_codi" required>
                    @foreach ($departamentos as $departamento)
                        <option value="{{ $departamento->depa_codi }}" {{ $departamento->depa_codi == $municipio->depa_codi ? 'selected' : '' }}>
                            {{ $departamento->depa_nomb }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="mt-3">
                <button type="submit" class="btn btn-primary">Actualizar</button>
                <a href="{{ route('municipios.index') }}" class="btn btn-warning">Cancelar</a>
            </div>
        </form>
    </div>
</body>
</html>
