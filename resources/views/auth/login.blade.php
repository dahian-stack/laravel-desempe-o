<x-guest-layout>
    <div class="mp-auth-heading">
        <p class="mp-auth-eyebrow"><span></span> BIENVENIDO DE NUEVO</p>
        <h1>Inicia <em>sesión.</em></h1>
        <p>Accede a tu espacio de trabajo en MEDIAPRO.</p>
    </div>

    <x-auth-session-status class="mp-auth-status" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}" class="mp-auth-form">
        @csrf

        <div class="mp-auth-field">
            <x-input-label for="email" value="Correo electrónico" />
            <x-text-input id="email" class="mp-auth-input block mt-2 w-full"
                          type="email" name="email" :value="old('email')"
                          required autofocus autocomplete="username"
                          placeholder="nombre@correo.com" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <div class="mp-auth-field">
            <x-input-label for="password" value="Contraseña" />
            <x-text-input id="password" class="mp-auth-input block mt-2 w-full"
                          type="password" name="password" required
                          autocomplete="current-password" placeholder="Tu contraseña" />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <div class="mp-auth-options">
            <label for="remember_me" class="mp-auth-check">
                <input id="remember_me" type="checkbox" name="remember">
                <span>Recordarme</span>
            </label>
            @if (Route::has('password.request'))
                <a class="mp-auth-link" href="{{ route('password.request') }}">¿Olvidaste tu contraseña?</a>
            @endif
        </div>

        <button type="submit" class="mp-auth-submit">INICIAR SESIÓN <span>→</span></button>

        <div class="mp-auth-switch">
            ¿Aún no tienes cuenta?
            <a href="{{ route('register') }}">Regístrate aquí</a>
        </div>
    </form>
</x-guest-layout>
