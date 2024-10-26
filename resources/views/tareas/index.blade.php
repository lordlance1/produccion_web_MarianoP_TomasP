<x-base>
    <div class="container mx-auto border-black w-10/12 p-4 bg-white shadow-md rounded-lg">
        <!-- Título de la lista -->
        <x-h1>Lista de tareas</x-h1>

        <!-- Sección de la lista de tareas -->
        <ul class="divide-y divide-gray-200">
            @foreach($tareas as $tarea)
                <li class="flex justify-between items-center p-4 hover:bg-gray-100 transition">
                    <div>
                        <h3 class="text-lg font-bold text-gray-700">{{ $tarea->titulo }}</h3>
                        <p class="text-sm text-gray-500">{{ $tarea->descripcion }}</p>
                    </div>
                    <div class="flex space-x-2">
                        <x-btn-primary href="#">Editar</x-btn-primary>
                        <x-btn-danger href="#">Eliminar</x-btn-danger>
                    </div>
                </li>
            @endforeach
        </ul>

        <!-- Botón para crear tarea -->
        <div class="mt-4">
            <x-btn-primary href="{{ route('tareas.create') }}">
                Crear tarea
            </x-btn-primary>
        </div>
    </div>
</x-base>
