@props([
    'image' => false,
])

<div class="flex flex-col bg-white overflow-hidden shadow rounded-xl">
    @if ($image)
        <img src="{{ $image }}" alt="" class="w-full h-auto bg-cover">
    @endif

    <div class="flex-1 w-full px-4 py-5 sm:p-6">
        {{ $slot }}
    </div>

    @isset ($footer)
        <div class="bg-gray-50 w-full px-4 py-4 sm:px-6">
            {{ $footer }}
        </div>
    @endisset
</div>