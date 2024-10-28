<x-base title="Editar Usuario">
    <x-h1>Editar Usuario</x-h1>

    <form action="{{ route('usuarios.update', $usuario->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-6">
            <label for="name" class="block mb-2 text-sm font-medium">Nombre</label>
            <input type="text" name="name" value="{{ $usuario->name }}" required>
        </div>

        <div class="mb-6">
            <label for="email" class="block mb-2 text-sm font-medium">Correo Electrónico</label>
            <input type="email" name="email" value="{{ $usuario->email }}" required>
        </div>

        <button type="submit" 
        class="px-6 py-3 bg-green-500 text-white font-semibold rounded-lg shadow-md 
               hover:bg-green-600 focus:outline-none focus:ring-2 focus:ring-green-400 
               focus:ring-opacity-75 transition duration-300 ease-in-out">
        Actualizar Usuario
    </button>
    </form>
</x-base>
