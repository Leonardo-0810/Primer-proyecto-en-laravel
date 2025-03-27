<?php

namespace App\Http\Controllers;

use App\Models\Departamento; // Corrección: Importar el modelo correctamente
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DepartamentoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $departamentos = Departamento::all(); // Corrección: Usar el modelo correcto
        return view('departamento.index', compact('departamentos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $paises = DB::table('tb_pais')
            ->orderBy('pais_nomb')
            ->get();

        return view('departamento.new', ['paises' => $paises]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $departamento = new Departamento();
        $departamento->depa_nomb = $request->name;
        $departamento->pais_codi = $request->code;
        $departamento->save();

        return redirect()->route('departamentos.index');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $departamento = Departamento::findOrFail($id); // Corrección: Usar findOrFail para manejar errores
        $paises = DB::table('tb_pais')
            ->orderBy('pais_nomb')
            ->get();

        return view('departamento.edit', ['departamento' => $departamento, 'paises' => $paises]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $departamento = Departamento::findOrFail($id); // Corrección: Usar findOrFail
        $departamento->depa_nomb = $request->name;
        $departamento->pais_codi = $request->code;
        $departamento->save();

        return redirect()->route('departamentos.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $departamento = Departamento::findOrFail($id); // Corrección: Usar findOrFail
        $departamento->delete();

        return redirect()->route('departamentos.index');
    }
}
