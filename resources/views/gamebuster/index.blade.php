<x-base title="Lista de Games">
    <x-h1>gamebuster</x-h1>
   
    <div class="mb-3">
        <x-btn-primary href="{{route('gamebuster.create')}}">Agregar Nuevo juego</x-btn-primary>
    </div>
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">Nombre</th>
                    <th scope="col" class="px-6 py-3">Fecha de Lanzamiento</th>
                    <th scope="col" class="px-6 py-3">Categoría</th>
                    <th scope="col" class="px-6 py-3">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($games as $game)
                <tr class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                    <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        {{ $game->nombre }}
                    </td>
                    <td class="px-6 py-4">
                        {{ $game->fecha_lanzamiento }}
                    </td>
                    <td class="px-6 py-4">
                        {{ $game->categoria->nombre }}
                    </td>
                    <td class="px-6 py-4">
                        <td class="px-6 py-4">
                            <x-btn-primary href="{{ route('gamebuster.edit', $game->id) }}">Gestionar</x-btn-primary>
                        </td>
                        
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        {{$games->links()}}
    </div>
    @if (session('status'))
    <div class="p-4 mb-4 text-sm text-green-700 bg-green-100 rounded-lg dark:bg-green-200 dark:text-green-800" role="alert">
        {{ session('status') }}
    </div>
@endif


</x-base>
