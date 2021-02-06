<select {{ $attributes->merge(['class' => 'block w-full pl-3 pr-10 py-2 border-gray-300 focus:outline-none focus:ring-blue-500 focus:border-blue-500 rounded-lg shadow-sm']) }}>
    {{ $slot }}
</select>
