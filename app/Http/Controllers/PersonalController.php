<?php

namespace App\Http\Controllers;

use App\Models\Personal;
use Illuminate\Http\Request;

class PersonalController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $personales = Personal::orderBy('ID_personal', 'desc')->get();

        return view('personales.index', compact('personales'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('personales.create');
    }

    /**
     * Store a newly created resource in storage.
     */
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
            ->with('success', '✅ Personal registrado correctamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $personal = Personal::findOrFail($id);
        return view('personales.show', compact('personal'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $personal = Personal::findOrFail($id);
        return view('personales.edit', compact('personal'));
    }

    /**
     * Update the specified resource in storage.
     */
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
            ->with('success', '✅ Personal actualizado correctamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $personal = Personal::findOrFail($id);
        $personal->delete();

        return redirect()
            ->route('personales.index')
            ->with('success', '✅ Personal eliminado correctamente.');
    }
}
