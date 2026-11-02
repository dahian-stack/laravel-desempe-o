<?php

namespace App\Http\Controllers;

use App\Models\Escena;
use App\Models\Produccion;
use Illuminate\Http\Request;

class EscenaController extends Controller
{
    public function index()
    {
        $escenas = Escena::with('produccion')
            ->orderBy('ID_escena', 'desc')
            ->get();

        return view('escenas.index', compact('escenas'));
    }

    public function create()
    {
        $producciones = Produccion::orderBy('Titulo')->get();

        return view('escenas.create', compact('producciones'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'ID_produccion'        => 'required|exists:produccion,ID_produccion',
            'Descripcion'          => 'required|string',
            'Tiempo_estimado'      => 'nullable|string|max:100',
            'Complejidad'          => 'nullable|string|max:50',
            'Necesidades_especiales' => 'nullable|string',
            'Estado'               => 'nullable|string|max:50',
        ]);

        Escena::create($validated);

        return redirect()
            ->route('escenas.index')
            ->with('success', 'Escena registrada correctamente.');
    }

    public function show($id)
    {
        $escena = Escena::with('produccion')->findOrFail($id);

        return view('escenas.show', compact('escena'));
    }

    public function edit($id)
    {
        $escena = Escena::findOrFail($id);
        $producciones = Produccion::orderBy('Titulo')->get();

        return view('escenas.edit', compact('escena', 'producciones'));
    }

    public function update(Request $request, $id)
    {
        $escena = Escena::findOrFail($id);

        $validated = $request->validate([
            'ID_produccion'        => 'required|exists:produccion,ID_produccion',
            'Descripcion'          => 'required|string',
            'Tiempo_estimado'      => 'nullable|string|max:100',
            'Complejidad'          => 'nullable|string|max:50',
            'Necesidades_especiales' => 'nullable|string',
            'Estado'               => 'nullable|string|max:50',
        ]);

        $escena->update($validated);

        return redirect()
            ->route('escenas.index')
            ->with('success', 'Escena actualizada correctamente.');
    }

    public function destroy($id)
    {
        $escena = Escena::findOrFail($id);
        $escena->delete();

        return redirect()
            ->route('escenas.index')
            ->with('success', 'Escena eliminada correctamente.');
    }
}
