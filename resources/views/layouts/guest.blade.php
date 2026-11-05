
<div class="mb-2 flex flex-col items-center justify-center">

    {{-- Icono de Mediapro --}}
    <svg
        xmlns="http://www.w3.org/2000/svg"
        viewBox="0 0 64 64"
        class="w-16 h-16 mb-2"
        fill="none"
    >
        <defs>
            <linearGradient id="mediaPurple" x1="0" y1="0" x2="1" y2="1">
                <stop offset="0%" stop-color="#8B5CF6"/>
                <stop offset="100%" stop-color="#6D28D9"/>
            </linearGradient>
        </defs>

        <rect x="9" y="19" width="46" height="35"
              rx="5" fill="#1F2937"/>

        <path d="M9 19 L15 7 L59 7 L53 19 Z"
              fill="url(#mediaPurple)"/>

        <path d="M20 8 L26 18 M33 8 L39 18 M46 8 L52 18"
              stroke="white" stroke-width="4"/>

        <path d="M28 29 L28 45 L42 37 Z"
              fill="white"/>

        <path d="M5 31 C-1 12 51 -2 59 22"
              stroke="#A78BFA" stroke-width="2.5"
              stroke-linecap="round"/>
    </svg>

    {{-- Nombre de la aplicación --}}
    <h1 class="text-3xl font-black tracking-widest text-gray-900">
        MEDIA<span class="text-violet-600">PRO</span>
    </h1>

    <p class="mt-1 text-xs font-medium uppercase tracking-widest text-gray-500">
        Producción audiovisual
    </p>

</div>
