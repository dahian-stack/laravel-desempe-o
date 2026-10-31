<?php

namespace App\Http\Controllers;

use App\Models\Escena;
use App\Models\Produccion;
use Illuminate\Http\Request;

class EscenaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $escenas = Escena::with('produccion')->orderBy('ID_escena', 'desc')->get();

        return view('escenas.index', compact('escenas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $producciones = Produccion::orderBy('Titulo')->get();
        return view('escenas.create', compact('producciones'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'ID_produccion'  => 'required|exists:Produccion,ID_produccion',
            'Numero_escena'  => 'nullable|string|max:50',
            'Descripcion'    => 'required|string',
            'Ubicacion'      => 'nullable|string|max:255',
            'Complejidad'    => 'nullable|string|max:50',
            'Estado'         => 'nullable|string|max:50',
            'Observaciones'  => 'nullable|string',
        ]);

        Escena::create($validated);

        return redirect()
            ->route('escenas.index')
            ->with('success', '✅ Escena registrada correctamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $escena = Escena::with('produccion')->findOrFail($id);
        return view('escenas.show', compact('escena'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $escena = Escena::findOrFail($id);
        $producciones = Produccion::orderBy('Titulo')->get();

        return view('escenas.edit', compact('escena', 'producciones'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $escena = Escena::findOrFail($id);

        $validated = $request->validate([
            'ID_produccion'  => 'required|exists:Produccion,ID_produccion',
            'Numero_escena'  => 'nullable|string|max:50',
            'Descripcion'    => 'required|string',
            'Ubicacion'      => 'nullable|string|max:255',
            'Complejidad'    => 'nullable|string|max:50',
            'Estado'         => 'nullable|string|max:50',
            'Observaciones'  => 'nullable|string',
        ]);

        $escena->update($validated);

        return redirect()
            ->route('escenas.index')
            ->with('success', '✅ Escena actualizada correctamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $escena = Escena::findOrFail($id);
        $escena->delete();

        return redirect()
            ->route('escenas.index')
            ->with('success', '✅ Escena eliminada correctamente.');
    }
}
