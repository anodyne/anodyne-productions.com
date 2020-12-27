<select {{ $attributes->merge(['class' => 'block w-full pl-3 pr-10 py-2 border-gray-300 focus:outline-none focus:ring-purple-400 focus:border-purple-400 rounded-md shadow-sm']) }}>
    {{ $slot }}
</select>
