@extends('layouts.app', ['title' => 'Usuarios'])

@section('content')
<div class="container mx-auto">
    <h1 class="text-2xl font-bold mb-6">Lista de Usuarios</h1>

    {{-- Alerta de éxito --}}
    @if (session('status'))
        <div class="p-4 mb-4 text-sm text-green-700 bg-green-100 rounded-lg" role="alert">
            {{ session('status') }}
        </div>
    @endif

    {{-- Alerta de error --}}
    @if (session('error'))
        <div class="p-4 mb-4 text-sm text-red-700 bg-red-100 rounded-lg" role="alert">
            {{ session('error') }}
        </div>
    @endif

    <table class="table-auto w-full bg-white rounded shadow">
        <thead>
            <tr class="bg-gray-200 text-gray-700">
                <th class="px-4 py-2">ID</th>
                <th class="px-4 py-2">Nombre</th>
                <th class="px-4 py-2">Email</th>
                <th class="px-4 py-2">Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($usuarios as $usuario)
            <tr>
                <td class="border px-4 py-2">{{ $usuario->id }}</td>
                <td class="border px-4 py-2">{{ $usuario->name }}</td>
                <td class="border px-4 py-2">{{ $usuario->email }}</td>
                <td class="border px-4 py-2 space-x-2">
                    <a href="{{ route('usuarios.create') }}" 
                       class="bg-blue-500 text-white px-3 py-1 rounded">Crear</a>
                    
                    <a href="{{ route('usuarios.gestion') }}" 
                       class="bg-gray-500 text-white px-3 py-1 rounded">Gestionar</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
