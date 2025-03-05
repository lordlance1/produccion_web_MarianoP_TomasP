<x-base title="Browse Games - Gamebuster">
    <h1 class="text-center text-red-500 text-4xl font-semibold my-8">Gamebuster - Browse Games</h1>
    
    <!-- Formulario de búsqueda -->
    <div class="flex justify-center mb-6">
        <form action="{{ route('user.index') }}" method="GET" class="flex">
            <input 
                type="text" 
                name="search" 
                placeholder="Search games by name..." 
                value="{{ request('search') }}"
                class="px-4 py-2 rounded-l bg-gray-800 text-white border border-gray-700 focus:outline-none focus:border-red-400"
            >
            <button type="submit" class="px-4 py-2 bg-red-500 text-white font-semibold rounded-r hover:bg-red-600">
                Search
            </button>
        </form>
    </div>

    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
        @foreach ($games as $game)
            <div class="bg-gradient-to-r from-black via-gray-900 to-gray-800 text-white shadow-lg rounded-lg overflow-hidden border border-gray-700">
                <div class="relative">
                    <img src="{{ $game->imagen }}" alt="{{ $game->nombre }}" class="w-full h-48 object-cover">
                </div>
                <div class="p-4">
                    <h5 class="text-lg font-semibold text-red-400 mb-1">{{ $game->nombre }}</h5>
                    <p class="text-sm text-gray-300">{{ \Illuminate\Support\Str::limit($game->descripcion, 80) }}</p>
                    <p class="text-xs text-gray-400 mt-2"><strong>Category:</strong> {{ $game->categoria->nombre }}</p>
                    <p class="text-xs text-gray-400"><strong>Released:</strong> {{ $game->fecha_lanzamiento }}</p>
                </div>
                <div class="flex justify-center px-4 py-3 bg-gray-900">
                    <a href="{{ route('user.show', $game->id) }}" class="px-3 py-1 border border-gray-500 text-xs font-semibold rounded-lg hover:bg-gray-800">
                        View Details
                    </a>
                </div>
            </div>
        @endforeach
    </div>

    
    <div class="mt-8 flex flex-col items-center">
        <!-- Paginación -->
        <div>
            {{ $games->links('pagination::tailwind') }}
        </div>
        <!-- Leyenda de resultados, ubicada debajo de la paginación 
        <div class="text-gray-400 text-sm mt-2">
            Showing {{ $games->firstItem() }} to {{ $games->lastItem() }} of {{ $games->total() }} results
        </div>-->
    </div>
    
</x-base>
