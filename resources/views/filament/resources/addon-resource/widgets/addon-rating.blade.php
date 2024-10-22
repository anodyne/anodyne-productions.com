<x-filament::widget>
	<x-filament::card>
		<div class="flex items-center space-x-4">
			<div class="ring-1 ring-inset rounded-lg p-3 bg-primary-50 text-primary-700 ring-primary-200 dark:bg-primary-950 dark:text-primary-300 dark:ring-primary-800">
				<x-flex-favorite-star class="h-6 w-6"></x-flex-favorite-star>
			</div>
			<div>
				<p class="text-sm leading-5 font-medium text-gray-500 dark:text-gray-400 truncate">Average rating</p>
				<p class="text-2xl font-semibold text-gray-900 dark:text-white">{{ $record->rating }}</p>
			</div>
		</div>
	</x-filament::card>
</x-filament::widget>
