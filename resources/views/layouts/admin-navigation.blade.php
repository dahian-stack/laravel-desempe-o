<header class="mp-topbar mp-admin-topbar">
    @if(auth()->user()->role === 'admin')
        <a class="mp-brand" href="{{ route('dashboard') }}">MEDIA<span>PRO</span><small>IMAGENESCREATIVAS · ADMIN</small></a>
        <nav class="mp-nav mp-admin-nav" aria-label="Navegación administrativa">
            <a class="{{ request()->routeIs('dashboard') ? 'active' : '' }}" href="{{ route('dashboard') }}">Inicio</a>
            <a class="{{ request()->routeIs('clientes.*') ? 'active' : '' }}" href="{{ route('clientes.index') }}">Clientes</a>
            <a class="{{ request()->routeIs('producciones.*') ? 'active' : '' }}" href="{{ route('producciones.index') }}">Producciones</a>
            <a class="{{ request()->routeIs('personales.*') ? 'active' : '' }}" href="{{ route('personales.index') }}">Personal</a>
            <a class="{{ request()->routeIs('equipos_tecnicos.*') ? 'active' : '' }}" href="{{ route('equipos_tecnicos.index') }}">Equipos</a>
            <a class="{{ request()->routeIs('localizaciones.*') ? 'active' : '' }}" href="{{ route('localizaciones.index') }}">Localizaciones</a>
            <a class="{{ request()->routeIs('planes_rodaje.*') ? 'active' : '' }}" href="{{ route('planes_rodaje.index') }}">Rodaje</a>
            <a class="{{ request()->routeIs('escenas.*') ? 'active' : '' }}" href="{{ route('escenas.index') }}">Escenas</a>
        </nav>
    @else
        <a class="mp-brand" href="{{ route('portal.cliente') }}">MEDIA<span>PRO</span><small>IMAGENESCREATIVAS</small></a>
        <nav class="mp-nav mp-admin-nav" aria-label="Navegación del cliente">
            <a href="{{ route('portal.cliente') }}">Mi espacio</a>
            <a href="{{ route('profile.edit') }}" class="{{ request()->routeIs('profile.*') ? 'active' : '' }}">Mi perfil</a>
        </nav>
    @endif

    <div class="mp-user-menu mp-admin-user">
        <a class="mp-avatar mp-avatar-small" href="{{ route('profile.edit') }}" aria-label="Editar perfil">
            @if(auth()->user()->profile_photo_path)
                <img src="{{ route('profile.photo') }}" alt="Foto de perfil">
            @else
                {{ mb_strtoupper(mb_substr(auth()->user()->name, 0, 1)) }}
            @endif
        </a>
        <a class="mp-user-name" href="{{ route('profile.edit') }}">{{ auth()->user()->name }}</a>
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button class="mp-logout" type="submit">Salir <span>↗</span></button>
        </form>
    </div>
</header>