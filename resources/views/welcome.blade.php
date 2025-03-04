<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>Gamebuster</title>

        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

        <style>
            body {
                background-color: #1a1a1d;
                color: white;
                font-family: Arial, sans-serif;
            }
            .header {
                text-align: center;
                font-size: 24px;
                margin-top: 20px;
            }
            .container {
                max-width: 900px;
                margin: 40px auto;
                background-color: #222;
                padding: 20px;
                border-radius: 10px;
                box-shadow: 0px 0px 10px rgba(255, 255, 255, 0.2);
            }
            a {
                color: #ff5252;
                text-decoration: none;
                font-weight: bold;
            }
            a:hover {
                color: #d32f2f;
            }
        </style>
    </head>
    <body>
        <div class="container">
            <h1 class="header">Bienvenido a Gamebuster</h1>

            @if(Route::has('login'))
                <div class="text-center mt-4">
                    @auth
                        @if(auth()->user()->role === 'admin' || auth()->user()->role === 'editor')
                            <p>Accede a la administración de juegos:</p>
                            <a href="{{ route('gamebuster.index') }}">Ir a la administración de juegos</a>
                        @else
                            <p>Explora nuestros juegos:</p>
                            <a href="{{ route('user.index') }}">Ver juegos</a>
                        @endif
                    @else
                        <p>Para acceder, inicia sesión o regístrate:</p>
                        <a href="{{ route('login') }}">Iniciar sesión</a>
                        @if(Route::has('register'))
                            <span> | </span>
                            <a href="{{ route('register') }}">Registrarse</a>
                        @endif
                    @endauth
                </div>
            @endif
        </div>
    </body>
</html>
