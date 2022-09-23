@props([
    'label',
    'for' => false,
    'checked' => false,
])

<label for="{{ $for }}" class="inline-flex items-center space-x-2">
    <input type="checkbox" {{ $attributes->merge(['class' => 'rounded border-gray-300 text-amber-500 focus:ring-amber-500', 'id' => $for]) }} @if ($checked) checked @endif>
    <span>{{ $label }}</span>
</label>
