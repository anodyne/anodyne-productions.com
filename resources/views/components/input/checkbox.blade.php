@props([
    'label',
    'for' => false,
    'checked' => false,
])

<label for="{{ $for }}" class="inline-flex items-center space-x-2">
    <input type="checkbox" {{ $attributes->merge(['class' => 'rounded border-gray-300 text-purple-500 focus:ring-purple-400', 'id' => $for]) }} @if ($checked) checked @endif>
    <span>{{ $label }}</span>
</label>
