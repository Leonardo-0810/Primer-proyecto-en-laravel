 <!-- Required meta tags -->
 <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

<div class="container">
    <h1>Edit Commune</h1>
    <form method="POST" action="{{ route('comunas.update', ['comuna' => $comuna->comu_codi]) }}">
        @csrf
        @method('put')

        <div class="mb-3">
            <label for="codigo" class="form-label">Id</label>
            <input type="text" class="form-control" id="id" aria-describedby="codigoHelp" 
                disabled value="{{ $comuna->comu_codi }}">
            <div id="codigoHelp" class="form-text">Commune Id.</div>
        </div>

        <div class="mb-3">
            <label for="name" class="form-label">Commune</label>
            <input type="text" required class="form-control" id="name" placeholder="Commune name" 
                name="name" value="{{ $comuna->comu_nomb }}">
        </div>

        <label for="municipality">Municipality:</label>
        <select class="form-select" id="municipality" name="code" required>
            <option selected disabled value="">Choose one...</option>
            @foreach ($municipios as $municipio)
                @if ($municipio->muni_codi == $comuna->muni_codi)
                    <option selected value="{{ $municipio->muni_codi }}">{{ $municipio->muni_nomb }}</option>
                @else
                    <option value="{{ $municipio->muni_codi }}">{{ $municipio->muni_nomb }}</option>
                @endif
            @endforeach
        </select>

        <div class="mt-3">
            <button type="submit" class="btn btn-primary">Update</button>
            <a href="{{ route('comunas.index') }}" class="btn btn-warning">Cancel</a>
        </div>
    </form>
</div>
