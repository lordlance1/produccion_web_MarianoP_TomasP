<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>@yield('title', 'Sin título')</title>


        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="bg-gray-100">

  
       @if(auth()->check()) {{-- Solo usuarios autenticados --}}
    <nav class="bg-white border-gray-200 dark:bg-gray-900">
        <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
            <a href="{{ route('dashboard') }}" class="flex items-center space-x-3 rtl:space-x-reverse">
                <img src="https://flowbite.com/docs/images/logo.svg" class="h-8" alt="Flowbite Logo" />
                <span class="self-center text-2xl font-semibold whitespace-nowrap dark:text-white">Mi Proyecto</span>
            </a>

            <div class="hidden w-full md:block md:w-auto" id="navbar-default">
                <ul class="font-medium flex flex-col p-4 md:p-0 mt-4 border rounded-lg md:flex-row md:space-x-8 md:mt-0">
                    <li><a href="{{ route('gamebuster.index') }}" class="block py-2 px-3">Juegos</a></li>
                    <li><a href="{{ route('tareas.index') }}" class="block py-2 px-3">Tareas</a></li>
                    <li><a href="{{ route('profile.edit') }}" class="block py-2 px-3">Perfil</a></li>

                    {{-- SOLO ADMIN --}}
                    @if(auth()->user()->role === 'admin')
                        <li><a href="{{ route('usuarios.create') }}" class="block py-2 px-3">Crear Usuario</a></li>
                        <li><a href="{{ route('usuarios.gestion') }}" class="block py-2 px-3">Gestionar Usuarios</a></li>
                    @endif

                    <li>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="block py-2 px-3">Logout</button>
                        </form>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
@endif



        <div class="container mx-auto w-10/12 p-4 bg-gray-300 shadow rounded mt-4">
            @yield('content')
        </div>

        <script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.js"></script>
    </body>
</html>
