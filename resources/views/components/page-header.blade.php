<div class="flex items-center justify-between mb-8">
    <h1 class="font-extrabold text-blue-dark">{{ $slot }}</h1>

    @if (isset($extra))
        {!! $extra !!}
    @endif
</div>
