<x-guest-layout>
    <div class="mp-auth-heading mp-auth-heading-register">
        <p class="mp-auth-eyebrow"><span></span> FORMA PARTE DE MEDIAPRO</p>
        <h1>Crea tu <em>cuenta.</em></h1>
        <p>Regístrate para conocer y seguir tus producciones.</p>
    </div>

    <form method="POST" action="{{ route('register') }}" class="mp-auth-form">
        @csrf

        <div class="mp-auth-field">
            <x-input-label for="name" value="Nombre completo" />
            <x-text-input id="name" class="mp-auth-input block mt-2 w-full"
                          type="text" name="name" :value="old('name')" required
                          autofocus autocomplete="name" placeholder="Tu nombre y apellido" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <div class="mp-auth-field">
            <x-input-label for="email" value="Correo electrónico" />
            <x-text-input id="email" class="mp-auth-input block mt-2 w-full"
                          type="email" name="email" :value="old('email')" required
                          autocomplete="username" placeholder="nombre@correo.com" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <div class="mp-auth-field">
            <x-input-label for="password" value="Contraseña" />
            <x-text-input id="password" class="mp-auth-input block mt-2 w-full"
                          type="password" name="password" required
                          autocomplete="new-password" placeholder="Crea una contraseña" />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <div class="mp-auth-field">
            <x-input-label for="password_confirmation" value="Confirmar contraseña" />
            <x-text-input id="password_confirmation" class="mp-auth-input block mt-2 w-full"
                          type="password" name="password_confirmation" required
                          autocomplete="new-password" placeholder="Escribe nuevamente tu contraseña" />
            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="mp-terms-box">
            <label for="accept_terms" class="mp-terms-label">
                <input id="accept_terms" type="checkbox" name="accept_terms" value="1"
                       @checked(old('accept_terms')) required>
                <span>
                    Acepto que he leído y acepto nuestros
                    <a href="{{ url('/terminos-de-servicio') }}" target="_blank" rel="noopener">Términos de Servicio</a>
                    y nuestra
                    <a href="{{ url('/politica-de-privacidad') }}" target="_blank" rel="noopener">Política de Privacidad</a>.
                </span>
            </label>
            <x-input-error :messages="$errors->get('accept_terms')" class="mt-2" />
        </div>

        <button type="submit" class="mp-auth-submit">CREAR CUENTA <span>→</span></button>

        <div class="mp-auth-switch">
            ¿Ya tienes una cuenta?
            <a href="{{ route('login') }}">Inicia sesión</a>
        </div>
    </form>
</x-guest-layout>
