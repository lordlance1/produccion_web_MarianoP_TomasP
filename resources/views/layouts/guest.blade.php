<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

      
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />


        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="antialiased h-screen bg-cover bg-center" style="background-image: url('{{ asset('img/GameBusterFondo.png') }}');">
        <div class="min-h-screen flex items-center justify-center bg-gray-800 bg-opacity-10">
          <div class="absolute bottom-20 left-1/2 transform -translate-x-1/2 w-full max-w-xs p-4 bg-red-900 bg-opacity-40 backdrop-blur-sm rounded-lg shadow-lg">
                
                {{ $slot }}
            </div>
        </div>
    </body>
</html>
