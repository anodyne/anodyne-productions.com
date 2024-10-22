<section id="download" class="relative isolate overflow-hidden bg-slate-900">
	<a name="download"></a>

	<div class="py-24 px-6 sm:px-6 sm:py-32 lg:px-8">
		<div class="mx-auto max-w-4xl text-center">
			<h2 class="text-3xl font-display text-white/50 sm:text-4xl">
				Ready to get started?
			</h2>

			<h2 class="mt-1.5 font-bold text-3xl font-display text-white sm:text-4xl">
				Download Nova today.
			</h2>

			<div class="mt-12">
				<label class="text-slate-100 text-lg font-medium">Choose your version</label>

				<div class="mt-4 hidden lg:flex flex-row items-center justify-center gap-x-6">
					@foreach ($allVersions as $v)
						<button
							type="button"
							wire:click="$set('version', '{{ $v['value'] }}')"
							@class([
								'flex flex-col flex-1 px-3 py-1.5 transition rounded-lg text-left ring-1 ring-inset ring-white',
								'bg-purple-600 ring-opacity-20' => data_get($selectedVersion, 'value') === $v['value'],
								'bg-white bg-opacity-10 text-slate-200 hover:bg-opacity-15 ring-opacity-10' => data_get($selectedVersion, 'value') !== $v['value']
							])
							wire:key="version-{{ $v['id'] }}"
						>
							<div
								@class([
									'text-base font-semibold',
									'text-white' => data_get($selectedVersion, 'value') === $v['value'],
									'text-slate-200' => data_get($selectedVersion, 'value') !== $v['value']
								])
							>
								{{ $v['name'] }}
							</div>
							<div
								@class([
									'text-xs/5 font-normal',
									'text-purple-200' => data_get($selectedVersion, 'value') === $v['value'],
									'text-slate-400' => data_get($selectedVersion, 'value') !== $v['value']
								])
							>
								{{ $v['content'] }}
							</div>
						</button>
					@endforeach
				</div>

				<div class="mt-4 block w-full md:w-1/2 md:mx-auto dark lg:hidden">
					<x-input.select wire:model.live="version">
						@foreach ($allVersions as $v)
							<option value="{{ $v['value'] }}" @selected(data_get($selectedVersion, 'value') === $v['value'])>
								{{ $v['name'] }} ({{ $v['content'] }})
							</option>
						@endforeach
					</x-input.select>
				</div>
			</div>

			@if (str($version)->contains('2.6'))
				<div class="mt-8 flex space-x-3 text-white font-medium text-sm leading-6 text-left max-w-lg mx-auto">
					@svg('flex-alert-diamond', 'h-8 w-8 text-danger-400 shrink-0')
					<span>Nova 2.6.3 is a legacy version and intended only for games hosted on a server running PHP 5.3 - 5.6. This version of Nova is no longer receiving updates.</span>
				</div>
			@endif

			@if (str($version)->contains('2.3'))
				<div class="mt-8 flex space-x-3 text-white font-medium text-sm leading-6 text-left max-w-lg mx-auto">
					@svg('flex-alert-diamond', 'h-8 w-8 text-danger-400 shrink-0')
					<span>Nova 2.3.2 is a legacy version and intended only for games hosted on a server running PHP 5.2. This version of Nova is no longer receiving updates.</span>
				</div>
			@endif

			<div class="mt-8">
				<label class="text-slate-100 text-lg font-medium">Choose your genre</label>

				<div class="mt-4 hidden lg:grid grid-cols-4 gap-x-6 gap-y-3">
					@foreach ($allGenres as $g)
						<button
							type="button"
							wire:click="$set('genre', '{{ $g['value'] }}')"
							@class([
								'flex-1 px-3 py-1.5 transition rounded-lg text-left ring-1 ring-inset ring-white',
								'bg-purple-600 ring-opacity-20' => data_get($selectedGenre, 'value') === $g['value'],
								'bg-white bg-opacity-10 text-slate-200 hover:bg-opacity-15 ring-opacity-10' => data_get($selectedGenre, 'value') !== $g['value'] || blank($genre)
							])
							wire:key="genre-{{ $g['id'] }}"
						>
							<div
								@class([
									'text-sm/6 font-semibold',
									'text-white' => data_get($selectedGenre, 'value') === $g['value'],
									'text-slate-200' => data_get($selectedGenre, 'value') !== $g['value'] || blank($genre)
								])
							>
								{{ $g['name'] }}
							</div>

							@isset($g['content'])
								<div
									@class([
										'text-xs/5 font-normal',
										'text-purple-200' => data_get($selectedGenre, 'value') === $g['value'],
										'text-slate-400' => data_get($selectedGenre, 'value') !== $g['value'] || blank($genre)
									])
								>
									{{ $g['content'] }}
								</div>
							@endisset
						</button>
					@endforeach
				</div>

				<div class="mt-4 block w-full md:w-1/2 md:mx-auto dark lg:hidden">
					<x-input.select wire:model.live="genre">
						<option @selected(blank($genre))>Choose a genre</option>
						@foreach ($allGenres as $g)
							<option value="{{ $g['value'] }}" @selected(data_get($selectedGenre, 'value') === $g['value'])>
								{{ $g['name'] }}
								@isset($g['content'])
									({{ $g['content'] }})
								@endisset
							</option>
						@endforeach
					</x-input.select>
				</div>
			</div>

			@if (filled($version) && filled($genre))
				<div>
					<x-button :href="$downloadLink" variant="brand" class="mt-12 w-full sm:w-auto flex items-center space-x-2.5">
						<div>
							Download Nova
							{{ data_get($selectedVersion, 'name') }}
							&ndash;
							{{ data_get($selectedGenre, 'name') }}
						</div>

						@svg('flex-cloud-download', 'h-5 w-5 shrink-0')
					</x-button>
				</div>
			@endif
		</div>
	</div>

	<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1024 1024" class="absolute top-1/2 left-1/2 -z-10 h-[64rem] w-[64rem] -translate-x-1/2" aria-hidden="true">
		<circle cx="512" cy="512" r="512" fill="url(#8d958450-c69f-4251-94bc-4e091a323369)" fill-opacity="0.7" />
		<defs>
			<radialGradient id="8d958450-c69f-4251-94bc-4e091a323369" cx="0" cy="0" r="1" gradientUnits="userSpaceOnUse" gradientTransform="translate(512 512) rotate(90) scale(512)">
				<stop stop-color="#7775D6" />
				<stop offset="1" stop-color="#7dd3fc" stop-opacity="0" />
			</radialGradient>
		</defs>
	</svg>
</section>