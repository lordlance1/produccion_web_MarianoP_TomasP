<x-base title="Editar Juego">
    <h1 class="text-2xl font-bold mb-6">Editar Juego</h1>

    <form action="{{ route('gamebuster.update', $game->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-4">
            <label for="nombre" class="block text-sm font-medium text-gray-700">Nombre</label>
            <input type="text" name="nombre" id="nombre" value="{{ old('nombre', $game->nombre) }}" class="mt-1 block w-full">
            @error('nombre')
                <span class="text-red-600">{{ $message }}</span>
            @enderror
        </div>

        <div class="mb-4">
            <label for="fecha_lanzamiento" class="block text-sm font-medium text-gray-700">Fecha de Lanzamiento</label>
            <input type="date" name="fecha_lanzamiento" id="fecha_lanzamiento" value="{{ old('fecha_lanzamiento', $game->fecha_lanzamiento) }}" class="mt-1 block w-full">
            @error('fecha_lanzamiento')
                <span class="text-red-600">{{ $message }}</span>
            @enderror
        </div>

        <div class="mb-4">
            <label for="categoria_id" class="block text-sm font-medium text-gray-700">Categoría</label>
            <select name="categoria_id" id="categoria_id" class="mt-1 block w-full">
                @foreach($categorias as $categoria)
                    <option value="{{ $categoria->id }}" {{ $game->categoria_id == $categoria->id ? 'selected' : '' }}>
                        {{ $categoria->nombre }}
                    </option>
                @endforeach
            </select>
            @error('categoria_id')
                <span class="text-red-600">{{ $message }}</span>
            @enderror
        </div>

        <div class="mb-4">
            <label for="descripcion" class="block text-sm font-medium text-gray-700">Descripción</label>
            <textarea name="descripcion" id="descripcion" rows="4" class="mt-1 block w-full">{{ old('descripcion', $game->descripcion) }}</textarea>
            @error('descripcion')
                <span class="text-red-600">{{ $message }}</span>
            @enderror
        </div>

        <div class="mt-6">
            <x-btn-primary type="submit">Actualizar Juego</x-btn-primary>

        </div>
    </form>
</x-base>
