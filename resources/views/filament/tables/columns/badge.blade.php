@php
    $addon = $getRecord();
@endphp

<div class="flex items-center px-4 py-3">
    <x-badge :color="$addon->type->badgeColor()" size="sm">{{ $addon->type->getLabel() }}</x-badge>
</div>
