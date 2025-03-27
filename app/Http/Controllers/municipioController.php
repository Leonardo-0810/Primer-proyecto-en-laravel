<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Municipio;
use App\Models\Departamento;

class MunicipioController extends Controller
{
    // Listar municipios
    public function index()
    {
        $municipios = Municipio::with('departamento')->get();
        return view('municipio.index', compact('municipios'));
    }

    // Mostrar formulario de creación
    public function create()
    {
        $departamentos = Departamento::all();
        return view('municipio.new', compact('departamentos')); // Cambiado de 'create' a 'new'
    }
    

    // Guardar nuevo municipio
    public function store(Request $request)
    {
        $request->validate([
            'muni_nomb' => 'required|string|max:30',
            'depa_codi' => 'required|exists:tb_departamento,depa_codi',
        ]);

        Municipio::create([
            'muni_nomb' => $request->muni_nomb,
            'depa_codi' => $request->depa_codi,
        ]);

        return redirect()->route('municipios.index')->with('success', 'Municipio creado correctamente.');
    }

    // Mostrar formulario de edición
    public function edit($id)
    {
        $municipio = Municipio::findOrFail($id);
        $departamentos = Departamento::all();
        return view('municipio.edit', compact('municipio', 'departamentos'));
    }

    // Actualizar municipio
    public function update(Request $request, $id)
    {
        $request->validate([
            'muni_nomb' => 'required|string|max:30',
            'depa_codi' => 'required|exists:tb_departamento,depa_codi',
        ]);

        $municipio = Municipio::findOrFail($id);
        $municipio->update([
            'muni_nomb' => $request->muni_nomb,
            'depa_codi' => $request->depa_codi,
        ]);

        return redirect()->route('municipios.index')->with('success', 'Municipio actualizado correctamente.');
    }

    // Eliminar municipio
    public function destroy($id)
    {
        Municipio::destroy($id);
        return redirect()->route('municipios.index')->with('success', 'Municipio eliminado correctamente.');
    }
}
