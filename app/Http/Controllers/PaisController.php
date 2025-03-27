<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pais;

class PaisController extends Controller
{
    // Mostrar lista de países
    public function index()
    {
        $paises = Pais::all();
        return view('pais.index', compact('paises'));
    }

    // Mostrar formulario de creación
    public function create()
    {
        return view('pais.create'); // Corrección aquí
    }

    // Guardar un nuevo país
    public function store(Request $request)
    {
        $request->validate([
            'pais_codi' => 'required|string|max:3|unique:tb_pais,pais_codi',
            'pais_nomb' => 'required|string|max:52',
            'pais_capi' => 'required|integer',
        ]);

        Pais::create([
            'pais_codi' => $request->pais_codi,
            'pais_nomb' => $request->pais_nomb,
            'pais_capi' => $request->pais_capi,
        ]);

        return redirect()->route('paises.index')->with('success', 'País creado correctamente.'); // Corrección aquí
    }

    // Mostrar formulario de edición
    public function edit($id)
    {
        $pais = Pais::findOrFail($id);
        return view('pais.edit', compact('pais'));
    }

    // Actualizar país
    public function update(Request $request, $id)
    {
        $request->validate([
            'pais_nomb' => 'required|string|max:52',
            'pais_capi' => 'required|integer',
        ]);

        $pais = Pais::findOrFail($id);
        $pais->update($request->all());

        return redirect()->route('paises.index')->with('success', 'País actualizado correctamente.');
    }

    // Eliminar país
    public function destroy($id)
    {
        $pais = Pais::findOrFail($id);
        $pais->delete();

        return redirect()->route('paises.index')->with('success', 'País eliminado correctamente.');
    }
}
