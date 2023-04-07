<x-filament::widget>
	<x-filament::card>
		<div class="flex items-center space-x-4">
			<div class="bg-primary-500 rounded-lg p-3">
				<x-flex-favorite-star class="h-6 w-6 text-white"></x-flex-favorite-star>
			</div>
			<div>
				<p class="text-sm leading-5 font-medium text-gray-500 dark:text-gray-400 truncate">Average rating</p>
				<p class="text-2xl font-semibold text-gray-900 dark:text-white">{{ $record->rating }}</p>
			</div>
		</div>
	</x-filament::card>
</x-filament::widget>
