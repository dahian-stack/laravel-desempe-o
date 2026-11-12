<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;
use Illuminate\View\View;
use Symfony\Component\HttpFoundation\RedirectResponse as SymfonyRedirectResponse;

class ProfileController extends Controller
{
    public function edit(Request $request): View
    {
        return view('profile.edit', ['user' => $request->user()]);
    }

    public function update(Request $request): RedirectResponse
    {
        $user = $request->user();

        $validated = $request->validate([
            'name' => ['required', 'string', 'max:100'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:100', Rule::unique('users')->ignore($user->id)],
        ]);

        if ($validated['email'] !== $user->email) {
            $user->email_verified_at = null;
        }

        $user->name = $validated['name'];
        $user->email = $validated['email'];
        $user->save();

        // Mantener sincronizado el nombre y contacto del registro vinculado.
        $user->cliente()->update([
            'Nombre' => $validated['name'],
            'Contacto' => $validated['email'],
        ]);

        return back()->with('status', 'profile-updated');
    }

    public function updatePhoto(Request $request): RedirectResponse
    {
        $request->validate([
            'photo' => ['required', 'image', 'mimes:jpg,jpeg,png,webp', 'max:4096'],
        ]);

        $user = $request->user();
        $oldPath = $user->profile_photo_path;

        $path = $request->file('photo')->store('profile-photos/'.$user->id, 'b2');

        $user->profile_photo_path = $path;
        $user->save();

        if ($oldPath) {
            Storage::disk('b2')->delete($oldPath);
        }

        return back()->with('status', 'photo-updated');
    }

    public function deletePhoto(Request $request): RedirectResponse
    {
        $user = $request->user();

        if ($user->profile_photo_path) {
            Storage::disk('b2')->delete($user->profile_photo_path);
            $user->profile_photo_path = null;
            $user->save();
        }

        return back()->with('status', 'photo-deleted');
    }

    public function photo(Request $request)
    {
        $path = $request->user()->profile_photo_path;

        abort_unless($path, 404);

        $url = Storage::disk('b2')->temporaryUrl($path, now()->addMinutes(10));

        return redirect()->away($url);
    }

    public function destroy(Request $request): RedirectResponse
    {
        $request->validate([
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();
        $photoPath = $user->profile_photo_path;

        // No borrar el registro histórico del cliente ni sus producciones.
        $user->cliente()->update(['user_id' => null]);

        Auth::logout();

        $user->delete();

        if ($photoPath) {
            Storage::disk('b2')->delete($photoPath);
        }

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('landing')->with('status', 'account-deleted');
    }
}
