<x-base title="Gestionar Usuarios">
    <x-h1>Gestionar Usuarios</x-h1>

    <div class="max-w-3xl mx-auto mt-10 bg-white p-8 rounded-lg shadow-md">
        <h2 class="text-2xl font-bold mb-5">Lista de Usuarios</h2>

        @if ($usuarios->isEmpty())
            <div class="p-4 mb-4 text-sm text-gray-900 bg-gray-100 rounded-lg dark:bg-gray-800 dark:text-gray-300" role="alert">
                No hay usuarios registrados.
            </div>
        @else
            <table class="w-full border-collapse border border-gray-300">
                <thead>
                    <tr>
                        <th class="border p-2">ID</th>
                        <th class="border p-2">Nombre</th>
                        <th class="border p-2">Correo Electrónico</th>
                        <th class="border p-2">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($usuarios as $usuario)
                    <tr>
                        <td class="border p-2">{{ $usuario->id }}</td>
                        <td class="border p-2">{{ $usuario->name }}</td>
                        <td class="border p-2">{{ $usuario->email }}</td>
                        <td class="border p-2 flex space-x-2">
                            <a href="{{ route('usuarios.edit', $usuario) }}" class="bg-blue-500 text-white px-4 py-2 rounded">Editar</a>
                            <form action="{{ route('usuarios.destroy', $usuario) }}" method="POST" onsubmit="return confirm('¿Estás seguro?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>

    <div class="mt-4 flex justify-end">
        <x-btn-primary :href="route('usuarios.create')">Crear Nuevo Usuario</x-btn-primary>
    </div>
</x-base>
