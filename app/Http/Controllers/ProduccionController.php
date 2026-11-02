<?php

namespace App\Http\Controllers;

use App\Models\Produccion;
use App\Models\Cliente;
use Illuminate\Http\Request;

class ProduccionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $producciones = Produccion::with('cliente')
            ->orderBy('ID_produccion', 'desc')
            ->get();

        return view('producciones.index', compact('producciones'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $clientes = Cliente::orderBy('Nombre')->get();

        return view('producciones.create', compact('clientes'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'ID_cliente'          => 'required|exists:cliente,ID_cliente',
            'Titulo'              => 'required|string|max:255',
            'Tipo'                => 'nullable|string|max:50',
            'Genero'              => 'nullable|string|max:50',
            'Estado'              => 'nullable|string|max:50',
            'Etapa'               => 'nullable|string|max:50',
            'Presupuesto_inicial' => 'nullable|numeric|min:0',
            'Presupuesto_gastado' => 'nullable|numeric|min:0',
            'Fecha_inicio'        => 'nullable|date',
            'Fecha_fin'           => 'nullable|date|after_or_equal:Fecha_inicio',
            'Descripcion'         => 'nullable|string',
        ]);

        Produccion::create($validated);

        return redirect()
            ->route('producciones.index')
            ->with('success', 'Producción creada correctamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $produccion = Produccion::with('cliente')->findOrFail($id);

        return view('producciones.show', compact('produccion'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $produccion = Produccion::findOrFail($id);
        $clientes = Cliente::orderBy('Nombre')->get();

        return view('producciones.edit', compact('produccion', 'clientes'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $produccion = Produccion::findOrFail($id);

        $validated = $request->validate([
            'ID_cliente'          => 'required|exists:cliente,ID_cliente',
            'Titulo'              => 'required|string|max:255',
            'Tipo'                => 'nullable|string|max:50',
            'Genero'              => 'nullable|string|max:50',
            'Estado'              => 'nullable|string|max:50',
            'Etapa'               => 'nullable|string|max:50',
            'Presupuesto_inicial' => 'nullable|numeric|min:0',
            'Presupuesto_gastado' => 'nullable|numeric|min:0',
            'Fecha_inicio'        => 'nullable|date',
            'Fecha_fin'           => 'nullable|date|after_or_equal:Fecha_inicio',
            'Descripcion'         => 'nullable|string',
        ]);

        $produccion->update($validated);

        return redirect()
            ->route('producciones.index')
            ->with('success', 'Producción actualizada correctamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $produccion = Produccion::findOrFail($id);
        $produccion->delete();

        return redirect()
            ->route('producciones.index')
            ->with('success', 'Producción eliminada correctamente.');
    }
}
