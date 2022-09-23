<div class="absolute inset-0 bg-gradient-to-{{ $gradientDirection }} from-{{ $gradientStart }} to-{{ $gradientStop }} shadow-lg {{ $rotation() }} sm:rounded-3xl"></div>
<div class="relative px-4 py-10 bg-white shadow-lg sm:rounded-3xl sm:p-20">
    {{ $slot }}
</div>