@props([
    'title',
    'text',
])

<div class="relative bg-white shadow rounded-lg lg:text-center flex flex-col items-center justify-center">
    <div class="absolute top-0 mx-auto flex items-center justify-center h-14 w-14 rounded-full bg-gradient-to-r from-orange-500 to-amber-500 text-white -mt-7 ring-8 ring-gray-100">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="h-6 w-6">
            {{ $path }}
        </svg>
    </div>
    <div class="mt-8 p-4 md:p-6">
        <dt class="text-xl font-semibold text-gray-900">
            {{ $title }}
        </dt>
        <dd class="mt-2 text-sm text-gray-500 leading-6">
            {{ $text }}
        </dd>
    </div>
</div>