@props([
    'label',
    'for' => false,
    'checked' => false,
])

<label for="{{ $for }}" class="inline-flex items-center space-x-2">
    <input type="checkbox" {{ $attributes->merge(['class' => 'rounded border-gray-300 text-blue-500 focus:ring-blue-400', 'id' => $for]) }} @if ($checked) checked @endif>
    <span>{{ $label }}</span>
</label>
