<x-base title="Browse Games - Gamebuster">
    <h1 class="text-center text-red-500 text-4xl font-semibold my-8">Gamebuster - Browse Games</h1>

    <div class="flex justify-end mb-6">
        <a href="{{ route('gamebuster.create') }}" class="px-4 py-2 bg-red-600 hover:bg-red-700 text-white rounded-lg font-semibold">Add New Game</a>
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
                <div class="flex justify-between items-center px-4 py-3 bg-gray-900">
                    <a href="{{ route('gamebuster.edit', $game->id) }}" class="px-3 py-1 bg-red-600 text-xs font-semibold rounded-lg hover:bg-red-700">Manage</a>
                    <a href="#" class="px-3 py-1 border border-gray-500 text-xs font-semibold rounded-lg hover:bg-gray-800">View Details</a>
                </div>
            </div>
        @endforeach
    </div>

    <div class="mt-8">
        {{ $games->links('pagination::tailwind') }}
    </div>

    @if (session('status'))
        <div class="mt-6 bg-green-500 text-white p-3 rounded-lg shadow-md">
            {{ session('status') }}
        </div>
    @endif
</x-base>