@props([
    'leadingAddOn' => false,
    'trailingAddOn' => false,
])

<x-input.field :leading-add-on="$leadingAddOn" :trailing-add-on="$trailingAddOn">
    <input type="text" {{ $attributes->merge(['class' => 'appearance-none block w-full border-none p-0 focus:outline-none focus:ring-0 placeholder-gray-400 text-gray-500 focus:text-gray-900']) }}>
</x-input.field>
