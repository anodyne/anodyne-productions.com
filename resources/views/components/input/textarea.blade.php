<x-input.field>
    <textarea {{ $attributes->merge(['class' => 'appearance-none block w-full border-none p-0 focus:outline-none focus:ring-0 placeholder-gray-400 text-gray-500 focus:text-gray-900', 'rows' => 5]) }}>{{ $slot }}</textarea>
</x-input.field>
