@props(['href' => null, 'type' => 'button'])

@if ($href)
    <a href="{{ $href }}" class="text-white bg-blue-700 hover:bg-black focus:ring-4 focus:ring-blue-300 font-medium rounded-md text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">
        {{ $slot }}
    </a>
@else
    <button type="{{ $type }}" class="text-white bg-blue-700 hover:bg-black focus:ring-4 focus:ring-blue-300 font-medium rounded-md text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">
        {{ $slot }}
    </button>
@endif
