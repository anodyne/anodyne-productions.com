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

        <div class="mt-4 flex flex-col md:flex-row md:items-center md:justify-center gap-y-6 md:gap-y-0 md:gap-x-6">
					@foreach ($versions as $version)
						<button
							type="button"
							wire:click="selectVersion('{{ $version['value'] }}')"
							@class([
								'flex flex-col flex-1 px-3 py-1.5 transition rounded-lg text-left ring-1 ring-inset ring-white',
								'bg-purple-600 ring-opacity-20' => $selectedVersion['value'] === $version['value'],
								'bg-white bg-opacity-10 text-slate-200 hover:bg-opacity-15 ring-opacity-10' => $selectedVersion['value'] !== $version['value']
							])
							wire:key="version-{{ $version['id'] }}"
						>
							<div
								@class([
									'text-base font-semibold',
									'text-white' => $selectedVersion['value'] === $version['value'],
									'text-slate-200' => $selectedVersion['value'] !== $version['value']
								])
							>
								{{ $version['name'] }}
							</div>
							<div
								@class([
									'text-xs font-normal',
									'text-purple-200' => $selectedVersion['value'] === $version['value'],
									'text-slate-400' => $selectedVersion['value'] !== $version['value']
								])
							>
								{{ $version['content'] }}
							</div>
						</button>
					@endforeach
        </div>
      </div>

			@if (str($selectedVersion['value'])->contains('2.6'))
				<div class="mt-8 flex space-x-3 text-white font-medium text-sm leading-6 text-left max-w-lg mx-auto">
					@svg('flex-alert-diamond', 'h-8 w-8 text-danger-500 shrink-0')
					<span>Nova 2.6.2 is a legacy version and intended only for games hosted on a server running PHP 5.3 - 5.6. This version of Nova is no longer receiving updates.</span>
				</div>
			@endif

			@if (str($selectedVersion['value'])->contains('2.3'))
				<div class="mt-8 flex space-x-3 text-white font-medium text-sm leading-6 text-left max-w-lg mx-auto">
					@svg('flex-alert-diamond', 'h-8 w-8 text-danger-500 shrink-0')
					<span>Nova 2.3.2 is a legacy version and intended only for games hosted on a server running PHP 5.2. This version of Nova is no longer receiving updates.</span>
				</div>
			@endif

      <div class="mt-8">
        <label class="text-slate-100 text-lg font-medium">Choose your genre</label>

        <div class="mt-4 grid grid-cols-1 md:grid-cols-4 gap-y-6 md:gap-x-6 md:gap-y-3">
					@foreach ($genres as $genre)
						<button
							type="button"
							wire:click="selectGenre('{{ $genre['value'] }}')"
							@class([
								'flex-1 px-3 py-1.5 transition rounded-lg text-left ring-1 ring-inset ring-white',
								'bg-purple-600 ring-opacity-20' => filled($selectedGenre) && $selectedGenre['value'] === $genre['value'],
								'bg-white bg-opacity-10 text-slate-200 hover:bg-opacity-15 ring-opacity-10' => filled($selectedGenre) && $selectedGenre['value'] !== $genre['value'] || blank($selectedGenre)
							])
							wire:key="genre-{{ $genre['id'] }}"
						>
							<div
								@class([
									'text-sm font-semibold',
									'text-white' => filled($selectedGenre) && $selectedGenre['value'] === $genre['value'],
									'text-slate-200' => filled($selectedGenre) && $selectedGenre['value'] !== $genre['value'] || blank($selectedGenre)
								])
							>
								{{ $genre['name'] }}
							</div>

							@isset($genre['content'])
								<div
									@class([
										'text-xs font-normal',
										'text-purple-200' => filled($selectedGenre) && $selectedGenre['value'] === $genre['value'],
										'text-slate-400' => filled($selectedGenre) && $selectedGenre['value'] !== $genre['value'] || blank($selectedGenre)
									])
								>
									{{ $genre['content'] }}
								</div>
							@endif
						</button>
					@endforeach
        </div>
      </div>

			@if (filled($selectedVersion) && filled($selectedGenre))
				<div>
					<x-button href="{{ $this->downloadLink() }}" variant="brand" class="mt-12 flex items-center space-x-2.5">
						<div>
							Download Nova
							{{ $selectedVersion['name'] }}
							&ndash;
							{{ $selectedGenre['name'] }}
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