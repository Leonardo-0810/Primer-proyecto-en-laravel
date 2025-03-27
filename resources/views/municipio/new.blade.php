<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar Municipio</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1>Agregar Municipio</h1>
        <form method="POST" action="{{ route('municipios.store') }}">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Nombre</label>
                <input type="text" required class="form-control" id="name" name="muni_nomb" placeholder="Nombre del municipio">
            </div>
            <div class="mb-3">
                <label for="depa_codi" class="form-label">Departamento</label>
                <select class="form-select" id="depa_codi" name="depa_codi" required>
                    <option selected disabled value="">Seleccione un departamento...</option>
                    @foreach ($departamentos as $departamento)
                        <option value="{{ $departamento->depa_codi }}">{{ $departamento->depa_nomb }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mt-3">
                <button type="submit" class="btn btn-primary">Guardar</button>
                <a href="{{ route('municipios.index') }}" class="btn btn-warning">Cancelar</a>
            </div>
        </form>
    </div>
</body>
</html>
