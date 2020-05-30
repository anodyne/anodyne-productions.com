@props(['href', 'route'])

<a href="{{ $href }}" class="ml-8 group inline-flex items-center py-4 px-1 border-b-2 font-medium text-sm leading-5 focus:outline-none transition ease-in-out duration-150 first:ml-0 @if (Route::is($route)) border-blue-500 text-blue-600 focus:text-blue-800 focus:border-blue-700 @else border-transparent text-gray-500 focus:text-blue-800 focus:border-blue-700 hover:text-gray-700 hover:border-gray-300 focus:text-gray-700 focus:border-gray-300 @endif">
    <div class="-ml-0.5 mr-2 @if (Route::is($route)) text-blue-500 group-hover:text-blue-500 group-focus:text-blue-600 @else text-gray-400 group-hover:text-gray-500 group-focus:text-gray-600 @endif">
        {{ $icon }}
    </div>
    <span>{{ $slot }}</span>
</a>