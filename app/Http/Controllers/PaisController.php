<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pais;

class PaisController extends Controller
{
    public function index()
    {
        $paises = Pais::all();
        return view('pais.index', compact('paises'));
    }

    public function create()
    {
        return view('pais.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'pais_codi' => 'required|string|max:3|unique:tb_pais,pais_codi',
            'pais_nomb' => 'required|string|max:52',
            'pais_capi' => 'required|integer',
        ]);

        Pais::create($request->all());
        return redirect()->route('paises.index')->with('success', 'País creado correctamente.');
    }

    public function edit($id)
    {
        $pais = Pais::findOrFail($id);
        return view('pais.edit', compact('pais'));
    }

   
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

    
    public function destroy($id)
    {
        
    }
}
