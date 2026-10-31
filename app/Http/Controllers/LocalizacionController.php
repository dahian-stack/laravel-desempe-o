<?php

namespace App\Http\Controllers;

use App\Models\Localizacion;
use Illuminate\Http\Request;

class LocalizacionController extends Controller
{
    public function index()
    {
        $localizaciones = Localizacion::orderBy('ID_localizacion', 'desc')->get();

        // Si la vista necesita $planes, lo incluimos:
        // $planes = \App\Models\PlanRodaje::all();
        // return view('localizaciones.index', compact('localizaciones', 'planes'));

        // Si NO lo necesita, usa solo esto:
        return view('localizaciones.index', compact('localizaciones'));
    }

    public function create()
    {
        return view('localizaciones.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'Nombre'      => 'required|string|max:255',
            'Direccion'   => 'required|string|max:255',
            'Tipo'        => 'nullable|string|max:50',
            'Estado'      => 'nullable|string|max:50',
            'Costo'       => 'nullable|numeric|min:0',
            'Descripcion' => 'nullable|string',
        ]);

        Localizacion::create($validated);

        return redirect()
            ->route('localizaciones.index')
            ->with('success', '✅ Localización registrada correctamente.');
    }

    public function show($id)
    {
        $localizacion = Localizacion::findOrFail($id);
        return view('localizaciones.show', compact('localizacion'));
    }

    public function edit($id)
    {
        $localizacion = Localizacion::findOrFail($id);
        return view('localizaciones.edit', compact('localizacion'));
    }

    public function update(Request $request, $id)
    {
        $localizacion = Localizacion::findOrFail($id);

        $validated = $request->validate([
            'Nombre'      => 'required|string|max:255',
            'Direccion'   => 'required|string|max:255',
            'Tipo'        => 'nullable|string|max:50',
            'Estado'      => 'nullable|string|max:50',
            'Costo'       => 'nullable|numeric|min:0',
            'Descripcion' => 'nullable|string',
        ]);

        $localizacion->update($validated);

        return redirect()
            ->route('localizaciones.index')
            ->with('success', '✅ Localización actualizada correctamente.');
    }

    public function destroy($id)
    {
        $localizacion = Localizacion::findOrFail($id);
        $localizacion->delete();

        return redirect()
            ->route('localizaciones.index')
            ->with('success', '✅ Localización eliminada correctamente.');
    }
}
