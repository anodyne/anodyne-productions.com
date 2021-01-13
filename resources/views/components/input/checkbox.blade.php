@props([
    'label',
    'for' => false,
    'checked' => false,
])

<label for="{{ $for }}" class="inline-flex items-center space-x-2">
    <input type="checkbox" {{ $attributes->merge(['class' => 'rounded border-gray-300 text-anodyne-orange-4 focus:ring-anodyne-orange-4', 'id' => $for]) }} @if ($checked) checked @endif>
    <span>{{ $label }}</span>
</label>
