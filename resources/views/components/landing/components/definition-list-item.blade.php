<div class="flex space-x-3">
    @svg($icon, "shrink-0 h-6 w-6 text-{$color}")
    <div class="space-y-2">
        <dt class="text-lg font-medium text-{{ $color }}">{{ $title }}</dt>
        <dd class="flex space-x-3">
            <span class="text-base">{{ $slot }}</span>
        </dd>
    </div>
</div>