<x-filament::widget>
    <x-filament::card>
        <div>
            <dt>
                <div class="absolute bg-primary-500 rounded-lg p-3">
                    <x-flex-favorite-star class="h-6 w-6 text-white"></x-flex-favorite-star>
                </div>
                <p class="ml-16 text-sm font-medium text-gray-500 truncate">Avg Rating</p>
            </dt>
            <dd class="ml-16 flex items-baseline">
                <p class="text-2xl font-semibold text-gray-900 dark:text-white">{{ $record->rating }}</p>
            </dd>
        </div>
    </x-filament::card>
</x-filament::widget>
