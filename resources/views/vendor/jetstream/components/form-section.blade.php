@props(['submit'])

<div {{ $attributes->merge(['class' => 'md:grid md:grid-cols-3 md:gap-6 shadow-md overflow-hidden sm:rounded-xl px-4 py-5 bg-white sm:p-6']) }}>
    <x-jet-section-title>
        <x-slot name="title">{{ $title }}</x-slot>
        <x-slot name="description">{{ $description }}</x-slot>
    </x-jet-section-title>

    <div class="mt-5 md:mt-0 md:col-span-2">
        <form wire:submit.prevent="{{ $submit }}">
            <div>
                <div class="grid grid-cols-6 gap-6">
                    {{ $form }}
                </div>

                @if (isset($actions))
                    <div class="flex items-center mt-8">
                        {{ $actions }}
                    </div>
                @endif
            </div>
        </form>
    </div>
</div>
