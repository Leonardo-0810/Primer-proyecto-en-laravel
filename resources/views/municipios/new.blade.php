<!doctype html>
<html lang="es">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Agregar Departamento</title>
  </head>

  <body>
    <div class="container">
        <h1>Agregar Departamento</h1>
        <form method="POST" action="{{ route('departamentos.store') }}">
            @csrf
            <div class="mb-3">
                <label for="id" class="form-label">Código</label>
                <input type="text" class="form-control" id="id" aria-describedby="idHelp" name="id" disabled="disabled">
                <div id="idHelp" class="form-text">Código del Departamento</div>
            </div>
            <div class="mb-3">
                <label for="name" class="form-label">Nombre del Departamento</label>
                <input type="text" required class="form-control" id="name" aria-describedby="nameHelp" name="name" placeholder="Nombre del Departamento">
            </div>
            <label for="pais">País:</label>
            <select class="form-select" id="pais" name="code" required>
                <option selected disabled value="">Seleccione uno...</option>
                @foreach ($paises as $pais)
                    <option value="{{ $pais->pais_codi }}">{{ $pais->pais_nomb }}</option>
                @endforeach
            </select>
            <div class="mt-3">
                <button type="submit" class="btn btn-primary">Guardar</button>
                <a href="{{ route('departamentos.index') }}" class="btn btn-warning">Cancelar</a>
            </div>
        </form>
    </div>
</body>
</html>
