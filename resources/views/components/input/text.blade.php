@props([
'leadingAddOn' => false,
])

<div class="flex items-center space-x-3 w-full rounded-md border border-gray-300 shadow-sm px-3 py-2 focus-within:border-blue-500 transition-colors ease-in-out duration-150">
    @if ($leadingAddOn)
        {{ $leadingAddOn }}
    @endif

    <input type="text" {{ $attributes->merge(['class' => 'appearance-none block w-full border-none p-0 focus:outline-none focus:ring-0 placeholder-gray-400 text-gray-500 focus:text-gray-900']) }}>
</div>
