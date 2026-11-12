<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    public function create(): View
    {
        return view('auth.register');
    }

    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:100'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:100', 'unique:' . User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'accept_terms' => ['accepted'],
        ], [
            'accept_terms.accepted' => 'Debes aceptar los Términos de Servicio y la Política de Privacidad para crear tu cuenta.',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        // La aceptación se registra desde el servidor, no desde campos editables por el usuario.
        $user->terms_accepted_at = now();
        $user->privacy_policy_version = '1.0';
        $user->terms_version = '1.0';
        $user->role = 'cliente';
        $user->save();

        $user->cliente()->create([
            'Nombre' => $request->name,
            'Tipo' => 'Individual',
            'Contacto' => $request->email,
        ]);

        event(new Registered($user));
        Auth::login($user);

        return redirect(route('dashboard', absolute: false));
    }
}
