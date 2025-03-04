@extends('layouts.app')

@section('title', 'Contacto')

@section('content')
    <h1 class="text-2xl font-bold mb-4">Contáctanos</h1>
    <p class="text-gray-700">Si tienes dudas o sugerencias, contáctanos mediante el siguiente formulario o a nuestro correo:</p>

    <p class="mt-4"><strong>Email:</strong> soporte@miapp.com</p>
    <p><strong>Teléfono:</strong> +54 11 1234-5678</p>

    <h2 class="text-xl font-semibold mt-6">Formulario de Contacto</h2>

    <form action="{{ route('contacto.enviar') }}" method="POST" class="mt-4 bg-white p-4 rounded shadow">
        @csrf
        <label class="block">Nombre:</label>
        <input type="text" name="nombre" class="border p-2 w-full" required>

        <label class="block mt-2">Correo Electrónico:</label>
        <input type="email" name="email" class="border p-2 w-full" required>

        <label class="block mt-2">Mensaje:</label>
        <textarea name="mensaje" class="border p-2 w-full" required></textarea>

        <button type="submit" class="bg-blue-500 text-white py-2 px-4 mt-4 rounded">Enviar</button>
    </form>
@endsection
