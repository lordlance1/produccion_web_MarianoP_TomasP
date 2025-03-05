@php
    $hideNavbar = true;
@endphp

@extends('layouts.base')

@section('title', 'Sobre Nosotros')

@section('content')
    <h1 class="text-2xl font-bold mb-4">¿Quiénes Somos?</h1>
    <p class="mb-4">
        Somos una empresa dedicada a la gestión de tareas y videojuegos. Nuestro objetivo es proporcionar una 
        plataforma intuitiva y eficiente para organizar tus proyectos.
    </p>

    <h2 class="text-xl font-semibold mt-6">Misión</h2>
    <p class="mb-4">Facilitar la administración de tareas y la gestión de juegos en un solo lugar.</p>

    <h2 class="text-xl font-semibold mt-6">Visión</h2>
    <p class="mb-4">Ser la mejor plataforma de organización de proyectos y entretenimiento digital.</p>
    
    <div class="mt-4">
        <a href="{{ route('login') }}" class="inline-block px-4 py-2 bg-gray-500 text-white rounded hover:bg-gray-600">
            Volver
        </a>
    </div>
@endsection
