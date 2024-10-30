<x-base title="Nuevo Juego">
    <h1 class="text-center text-red-500 text-4xl font-semibold my-8">Agregar Nuevo Juego</h1>

    @if ($errors->any())
        <div class="p-4 mb-6 text-sm text-red-700 bg-red-100 rounded-lg">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form class="max-w-lg mx-auto bg-gradient-to-r from-gray-800 to-gray-900 p-6 rounded-lg shadow-lg border border-gray-700" action="{{ route('gamebuster.store') }}" method="POST">
        @csrf
        <div class="mb-6">
            <label for="nombre" class="block mb-2 text-sm font-medium text-white">Nombre del juego</label>
            <input type="text" name="nombre" id="nombre" class="bg-gray-700 border border-gray-600 text-white text-sm rounded-lg focus:ring-red-500 focus:border-red-500 block w-full p-2.5" placeholder="Nombre del juego" value="{{ old('nombre') }}">
        </div>

        <div class="mb-6">
            <label for="fecha_lanzamiento" class="block mb-2 text-sm font-medium text-white">Fecha de lanzamiento</label>
            <input type="date" name="fecha_lanzamiento" id="fecha_lanzamiento" class="bg-gray-700 border border-gray-600 text-white text-sm rounded-lg focus:ring-red-500 focus:border-red-500 block w-full p-2.5" value="{{ old('fecha_lanzamiento') }}">
        </div>

        <div class="mb-6">
            <label for="categoria_id" class="block mb-2 text-sm font-medium text-white">Categoría del juego</label>
            <select name="categoria_id" id="categoria_id" class="bg-gray-700 border border-gray-600 text-white text-sm rounded-lg focus:ring-red-500 focus:border-red-500 block w-full p-2.5">
                <option value="" disabled selected>Selecciona una categoría</option>
                @foreach ($categorias as $categoria)
                    <option @selected($categoria->id == old('categoria_id')) value="{{ $categoria->id }}">{{ $categoria->nombre }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-6">
            <label for="descripcion" class="block mb-2 text-sm font-medium text-white">Descripción</label>
            <textarea name="descripcion" id="descripcion" rows="4" class="bg-gray-700 border border-gray-600 text-white text-sm rounded-lg focus:ring-red-500 focus:border-red-500 block w-full p-2.5" placeholder="Descripción del juego">{{ old('descripcion') }}</textarea>
        </div>
        <div class="mb-6">
    <label for="imagen" class="block mb-2 text-sm font-medium text-white">URL de la imagen</label>
    <input type="text" name="imagen" id="imagen" class="bg-gray-700 border border-gray-600 text-white text-sm rounded-lg focus:ring-red-500 focus:border-red-500 block w-full p-2.5" placeholder="URL de la imagen" value="{{ old('imagen') }}">
</div>
        <div class="flex justify-between mt-6">
            <button type="submit" class="px-5 py-2 bg-red-600 text-white font-semibold rounded-lg hover:bg-red-700 focus:outline-none">Guardar</button>
            <a href="{{ route('gamebuster.index') }}" class="px-5 py-2 bg-gray-500 text-white font-semibold rounded-lg hover:bg-gray-600">Volver</a>
        </div>
    </form>
</x-base>