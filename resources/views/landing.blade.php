
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ImagenesCreativas | Mediapro</title>
    <link rel="icon" type="image/png" href="{{ asset('favicon.png') }}">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gray-950 text-white min-h-screen">

<header class="flex justify-between items-center px-8 py-6">
    <h1 class="text-2xl font-black tracking-widest">
        MEDIA<span class="text-violet-500">PRO</span>
    </h1>

    <a href="{{ route('login') }}"
       class="bg-violet-700 hover:bg-violet-800 px-5 py-2 rounded-lg transition">
        Iniciar sesión
    </a>
</header>

<main class="min-h-[75vh] flex flex-col items-center justify-center text-center px-6">

    <p class="text-violet-400 uppercase tracking-[0.3em] text-sm mb-4">
        ImagenesCreativas presenta
    </p>

    <h2 class="text-5xl md:text-7xl font-black mb-6">
        Tu producción,<br>
        <span class="text-violet-500">nuestra creatividad.</span>
    </h2>

    <p class="text-gray-300 max-w-2xl text-lg mb-8">
        Una plataforma para organizar y gestionar proyectos
        audiovisuales, desde la planificación hasta la producción.
    </p>

    <a href="{{ route('login') }}"
       class="bg-violet-700 hover:bg-violet-800 px-8 py-3 rounded-xl font-bold transition">
        Acceder a la plataforma
    </a>

</main>

<footer class="text-center text-gray-500 py-6 text-sm">
    © {{ date('Y') }} ImagenesCreativas · Mediapro
</footer>

</body>
</html>

