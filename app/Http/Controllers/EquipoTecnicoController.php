<?php

namespace App\Http\Controllers;

use App\Models\EquipoTecnico;
use Illuminate\Http\Request;

class EquipoTecnicoController extends Controller
{
    public function index()
    {
        $equipos = EquipoTecnico::orderBy('ID_equipo', 'desc')->get();

        return view('equipos_tecnicos.index', compact('equipos'));
    }

    public function create()
    {
        return view('equipos_tecnicos.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'Categoria'       => 'required|string|max:50',
            'Marca'           => 'nullable|string|max:50',
            'Modelo'          => 'nullable|string|max:50',
            'Caracteristicas' => 'nullable|string',
            'Estado'          => 'nullable|string|max:50',
            'Disponibilidad'  => 'nullable|string|max:50',
        ]);

        EquipoTecnico::create($validated);

        return redirect()
            ->route('equipos_tecnicos.index')
            ->with('success', 'Equipo registrado correctamente.');
    }

    public function show($id)
    {
        $equipo = EquipoTecnico::findOrFail($id);

        return view('equipos_tecnicos.show', compact('equipo'));
    }

    public function edit($id)
    {
        $equipo = EquipoTecnico::findOrFail($id);

        return view('equipos_tecnicos.edit', compact('equipo'));
    }

    public function update(Request $request, $id)
    {
        $equipo = EquipoTecnico::findOrFail($id);

        $validated = $request->validate([
            'Categoria'       => 'required|string|max:50',
            'Marca'           => 'nullable|string|max:50',
            'Modelo'          => 'nullable|string|max:50',
            'Caracteristicas' => 'nullable|string',
            'Estado'          => 'nullable|string|max:50',
            'Disponibilidad'  => 'nullable|string|max:50',
        ]);

        $equipo->update($validated);

        return redirect()
            ->route('equipos_tecnicos.index')
            ->with('success', 'Equipo actualizado correctamente.');
    }

    public function destroy($id)
    {
        $equipo = EquipoTecnico::findOrFail($id);

        $equipo->delete();

        return redirect()
            ->route('equipos_tecnicos.index')
            ->with('success', 'Equipo eliminado correctamente.');
    }
}
