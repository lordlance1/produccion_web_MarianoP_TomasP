<x-base title="Mascota Nueva">
    <x-h1>Mascota Nueva</x-h1>
    @if ($errors->any())
        <div class="p-4 mb-4 text-sm text-red-700 bg-red-100 rounded-lg dark:bg-red-200 dark:red-green-800"
            role="alert">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form class="mx-auto" action="{{ route('gamebuster.store') }}" method="POST">
        @csrf
        <div class="mb-6">
            <label for="nombre" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Ingrese el nombre
                de la Mascota</label>
            <input type="text" name="nombre" id="nombre"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"placeholder="Nombre de la Mascota" value="{{old('nombre')}}">
        </div>

        <div class="mb-6">
            <label for="fecha_nacimiento" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Ingrese
                la fecha de nacimiento de la mascota</label>
            <input type="date" name="fecha_nacimiento" id="fecha_nacimiento"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"placeholder="Fecha de nacimiento" value="{{old('fecha_nacimiento')}}">
        </div>

        <div class="mb-6">
            <label for="categoria_id" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Ingrese la
                categoría de la mascota</label>
            <select name="categoria_id" id="categoria_id"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                <option value=""></option>
                @foreach ($categorias as $categoria)
                    <option @selected($categoria->id== old('categoria_id')) value="{{ $categoria->id }}">{{ $categoria->nombre }}</option>
                @endforeach
                
            </select>
        </div>

        <div class="mb-6">
            <label for="descripcion" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Descripción de
                la mascota</label>
            <textarea name="descripcion" id="descripcion"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"placeholder="Descripcion de la Mascota" value="{{old('descripcion')}}"></textarea>
        </div>

        <button type="submit"
            class="px-4 py-2 bg-blue-500 text-white rounded-lg hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500">
            Guardar
        </button>
        <x-btn-primary :href="route('gamebuster.index')">volver</x-btn-primary>
    </form>
</x-base>
