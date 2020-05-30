@props(['href', 'route'])

<option value="{{ $href }}"{{ Route::is($route) ? ' selected' : ''}}>
    {{ $slot }}
</option>