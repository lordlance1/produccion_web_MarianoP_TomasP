<x-base title="Game Details">
    <h1 class="text-center text-red-500 text-4xl font-semibold my-8">{{ $game->nombre }}</h1>

    <div class="bg-gray-900 p-6 rounded-lg shadow-lg max-w-2xl mx-auto">
        <img src="{{ $game->imagen }}" alt="{{ $game->nombre }}" class="w-full h-64 object-cover rounded-lg mb-4">
        <p class="text-gray-300 text-lg">{{ $game->descripcion }}</p>
        <p class="text-gray-400 mt-4"><strong>Category:</strong> {{ $game->categoria->nombre }}</p>
        <p class="text-gray-400"><strong>Released:</strong> {{ $game->fecha_lanzamiento }}</p>
    </div>
</x-base>
