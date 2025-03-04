<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    @if(auth()->check())
                        @if(auth()->user()->role === 'admin' || auth()->user()->role === 'editor')
                            <p>Bienvenido administrador/editor. Accede a la gestión de juegos.</p>
                            <a href="{{ route('gamebuster.index') }}" class="text-red-500 underline">Ir a la gestión de juegos</a>
                        @else
                            <p>Bienvenido usuario. Accede a la vista de juegos.</p>
                            <a href="{{ route('user.index') }}" class="text-blue-500 underline">Explorar juegos</a>
                        @endif
                    @else
                        <p>No estás autenticado.</p>
                        <a href="{{ route('login') }}" class="text-green-500 underline">Iniciar sesión</a>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
