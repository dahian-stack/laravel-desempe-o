<?php

namespace App\Http\Controllers;

use App\Models\PlanRodaje;
use App\Models\Produccion;
use App\Models\Localizacion;
use App\Models\Personal;
use Illuminate\Http\Request;

class PlanRodajeController extends Controller
{
    public function index()
    {
        $planes = PlanRodaje::with(['produccion', 'localizacion', 'personal'])->orderBy('ID_plan', 'desc')->get();
        return view('planes_rodaje.index', compact('planes'));
    }

    public function create()
    {
        $producciones = Produccion::orderBy('Titulo')->get();
        $localizaciones = Localizacion::orderBy('Nombre')->get();
        $personales = Personal::orderBy('Nombres')->get();
        return view('planes_rodaje.create', compact('producciones', 'localizaciones', 'personales'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'ID_produccion'   => 'required|exists:Produccion,ID_produccion',
            'ID_localizacion' => 'required|exists:Localizacion,ID_localizacion',
            'ID_personal'     => 'nullable|exists:Personal,ID_personal',
            'Fecha'           => 'required|date',
            'Hora_inicio'     => 'required|date_format:H:i',
            'Hora_fin'        => 'required|date_format:H:i|after:Hora_inicio',
            'Observaciones'   => 'nullable|string',
        ]);

        PlanRodaje::create($validated);

        return redirect()
            ->route('planes_rodaje.index')
            ->with('success', '✅ Plan de rodaje registrado correctamente.');
    }

    public function show($id)
    {
        $plan = PlanRodaje::with(['produccion', 'localizacion', 'personal'])->findOrFail($id);
        return view('planes_rodaje.show', compact('plan'));
    }

    public function edit($id)
    {
        $plan = PlanRodaje::findOrFail($id);
        $producciones = Produccion::orderBy('Titulo')->get();
        $localizaciones = Localizacion::orderBy('Nombre')->get();
        $personales = Personal::orderBy('Nombres')->get();
        return view('planes_rodaje.edit', compact('plan', 'producciones', 'localizaciones', 'personales'));
    }

    public function update(Request $request, $id)
    {
        $plan = PlanRodaje::findOrFail($id);

        $validated = $request->validate([
            'ID_produccion'   => 'required|exists:Produccion,ID_produccion',
            'ID_localizacion' => 'required|exists:Localizacion,ID_localizacion',
            'ID_personal'     => 'nullable|exists:Personal,ID_personal',
            'Fecha'           => 'required|date',
            'Hora_inicio'     => 'required|date_format:H:i',
            'Hora_fin'        => 'required|date_format:H:i|after:Hora_inicio',
            'Observaciones'   => 'nullable|string',
        ]);

        $plan->update($validated);

        return redirect()
            ->route('planes_rodaje.index')
            ->with('success', '✅ Plan de rodaje actualizado correctamente.');
    }

    public function destroy($id)
    {
        $plan = PlanRodaje::findOrFail($id);
        $plan->delete();

        return redirect()
            ->route('planes_rodaje.index')
            ->with('success', '✅ Plan de rodaje eliminado correctamente.');
    }
}
