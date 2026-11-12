<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ClientePortalController extends Controller
{
    public function index(Request $request)
    {
        $cliente = $request->user()
            ->cliente()
            ->with([
                'producciones.escenas',
                'producciones.planesRodaje',
            ])
            ->first();

        return view('portal.cliente', compact('cliente'));
    }
}
