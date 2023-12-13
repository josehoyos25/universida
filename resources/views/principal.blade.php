<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        @vite('resources/css/app.css')

        <title>Universidad Bubba</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet">

        <!-- Styles -->

    </head>
    <body class="antialiased bg-gray-100">
        <div class="container mx-auto p-8 bg-white rounded shadow">
            <header class="mb-8">
                <h1 class="text-3xl font-bold text-center">Universidad Bubba</h1>
                <div class="flex items-center">
                    <img src="/img/bubba.jpeg" alt="Bubba" class="mr-4 w-50 h-90 flex justify-center">
                </div>
                <nav class="mt-4 text-center">{{-- 
                    <a href="('/')" class="text-blue-500 mr-4">Principal</a> --}}
                    <a href="('/estudiantes')" class="text-blue-500 hover:text-blue-700 mr-4 font-bold">Estudiantes</a>
                    <a href="('profesores.crear')" class="text-blue-500 hover:text-blue-700 mr-4 font-bold">Profesores</a>
                    <a href="('cursos.index')" class="text-blue-500 hover:text-blue-700 font-bold mr-4">Cursos</a>
                    <a href="('matriculas.index')" class="text-blue-500 hover:text-blue-700 mr-4 font-bold">Matrículas</a>
                </nav>
            </header>

            <div>
                @yield('content')
            </div>
        </div>
    </body>
</html>
