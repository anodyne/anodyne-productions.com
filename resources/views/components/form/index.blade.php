@props([
    'action',
    'footer' => false,
    'method' => 'POST',
    'divide' => false,
    'space' => true,
])

<form
    action="{{ $action }}"
    method="{{ $method === 'GET' ?: 'POST' }}"
    role="form"
    {{ $attributes }}
>
    @csrf

    @if (! in_array($method, ['GET', 'POST']))
        @method($method)
    @endif

    <div @class([
        'divide-y divide-gray-100 dark:divide-gray-200/10' => $divide,
    ])>
        {{ $slot }}
    </div>
</form>
