@props([
    'category',
    'title',
])

<a class="flex flex-col rounded-2xl shadow-lg ring-2 ring-transparent hover:ring-amber-500 hover:border-transparent overflow-hidden transition-all ease-in-out duration-200" {{ $attributes->merge(['href' => '#']) }}>
    <div class="flex-1 bg-white p-6 flex flex-col justify-between">
        <div class="flex-1">
            <div class="text-xs text-gray-400 uppercase tracking-wide font-semibold">{{ $category }}</div>
            <div class="block mt-2">
                <p class="text-xl font-semibold text-gray-900">
                    {{ $title }}
                </p>
                <p class="mt-3 text-base text-gray-500">
                    {{ $slot }}
                </p>
            </div>
        </div>
    </div>
</a>