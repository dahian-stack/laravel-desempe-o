<?php

namespace App\Http\Controllers;

use App\Models\Personal;
use Illuminate\Http\Request;

class PersonalController extends Controller
{
    public function index()
    {
        $personales = Personal::orderBy('ID_personal', 'desc')->get();

        return view('personales.index', compact('personales'));
    }

    public function create()
    {
        return view('personales.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'Nombres'        => 'required|string|max:100',
            'Apellidos'      => 'required|string|max:100',
            'Especialidad'   => 'nullable|string|max:100',
            'Experiencia'    => 'nullable|string',
            'Portafolio'     => 'nullable|string',
            'Disponibilidad' => 'nullable|string|max:50',
            'Tarifa'         => 'nullable|numeric|min:0',
            'Contacto'       => 'nullable|string|max:100',
        ]);

        Personal::create($validated);

        return redirect()
            ->route('personales.index')
            ->with('success', 'Personal registrado correctamente.');
    }

    public function show($id)
    {
        $personal = Personal::findOrFail($id);

        return view('personales.show', compact('personal'));
    }

    public function edit($id)
    {
        $personal = Personal::findOrFail($id);

        return view('personales.edit', compact('personal'));
    }

    public function update(Request $request, $id)
    {
        $personal = Personal::findOrFail($id);

        $validated = $request->validate([
            'Nombres'        => 'required|string|max:100',
            'Apellidos'      => 'required|string|max:100',
            'Especialidad'   => 'nullable|string|max:100',
            'Experiencia'    => 'nullable|string',
            'Portafolio'     => 'nullable|string',
            'Disponibilidad' => 'nullable|string|max:50',
            'Tarifa'         => 'nullable|numeric|min:0',
            'Contacto'       => 'nullable|string|max:100',
        ]);

        $personal->update($validated);

        return redirect()
            ->route('personales.index')
            ->with('success', 'Personal actualizado correctamente.');
    }

    public function destroy($id)
    {
        $personal = Personal::findOrFail($id);

        $personal->delete();

        return redirect()
            ->route('personales.index')
            ->with('success', 'Personal eliminado correctamente.');
    }
}
