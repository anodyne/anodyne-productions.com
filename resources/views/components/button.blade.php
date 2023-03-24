@if ($href)
  <a href="{{ $href }}" {{ $attributes->merge(['class' => "{$variantStyles()} {$sizeStyles()} {$baseStyles()}"]) }}>
    <span class="relative z-10 flex items-center justify-center space-x-1.5">
      {{ $slot }}
    </span>
  </a>
@else
  <button {{ $attributes->merge(['type' => 'button', 'class' => "{$variantStyles()} {$sizeStyles()} {$baseStyles()}"]) }}>
    <span class="relative z-10 flex items-center justify-center space-x-1.5">
      {{ $slot }}
    </span>
  </button>
@endif