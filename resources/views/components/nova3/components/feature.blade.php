@props([
    'title',
    'text',
])

<div class="relative bg-gray-700 rounded-2xl shadow-lg lg:text-center flex flex-col items-center justify-center">
    <div class="absolute top-0 mx-auto flex items-center justify-center h-14 w-14 rounded-2xl bg-amber-500 text-white -mt-7 ring-8 ring-gray-800">
        {{ $icon }}
    </div>
    <div class="mt-8 p-4 md:p-6">
        <dt class="text-xl font-semibold text-gray-200">
            {{ $title }}
        </dt>
        <dd class="mt-2 text-sm text-gray-400 leading-6">
            {{ $text }}
        </dd>
    </div>
</div>