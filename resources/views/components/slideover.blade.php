<div
    class="fixed inset-0 overflow-hidden"
    x-data="{ show: @entangle($attributes->wire('model')) }"
    x-init="
        $watch('show', (value) => {
            if (value) {
                $dispatch('slideover-opened')
            }
        })
    "
    x-show="show"
    x-on:keydown.window.escape="show = false"
>
    <div class="absolute inset-0 overflow-hidden">
        <div x-show="show" x-description="Background overlay, show/hide based on slide-over state." x-transition:enter="ease-in-out duration-500" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100" x-transition:leave="ease-in-out duration-500" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0" class="absolute inset-0 bg-gray-500 bg-opacity-75 transition-opacity" aria-hidden="true"></div>

        <section @click.away="show = false" class="absolute inset-y-0 pl-16 max-w-full right-0 flex" aria-labelledby="slide-over-heading">
            <div class="w-screen max-w-md" x-description="Slide-over panel, show/hide based on slide-over state." x-show="show" x-transition:enter="transition ease-in-out duration-500 sm:duration-700" x-transition:enter-start="translate-x-full" x-transition:enter-end="translate-x-0" x-transition:leave="transition ease-in-out duration-500 sm:duration-700" x-transition:leave-start="translate-x-0" x-transition:leave-end="translate-x-full">
                <form class="h-full divide-y divide-gray-200 flex flex-col bg-white shadow-xl">
                    <div class="flex-1 h-0 overflow-y-auto py-6">
                        <div class="px-4 sm:px-6">
                            <div class="flex items-start justify-between">
                                <h2 id="slide-over-heading" class="text-2xl font-extrabold tracking-tight text-gray-900">
                                    {{ $title }}
                                </h2>
                                <div class="ml-3 h-7 flex items-center">
                                    <button @click="open = false" class="bg-white rounded-md text-gray-400 hover:text-gray-500 focus:outline-none focus:ring-2 focus:ring-blue-500 transition-colors ease-in-out duration-200">
                                        <span class="sr-only">Close panel</span>
                                        <svg class="h-6 w-6" x-description="Heroicon name: outline/x" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                                        </svg>
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="flex-1 flex flex-col justify-between">
                            <div class="px-4 sm:px-6">
                                {{ $content }}
                            </div>
                        </div>
                    </div>
                    <div class="shrink-0 px-4 py-4 flex justify-end space-x-4">
                        {{ $footer }}
                    </div>
                </form>
            </div>
        </section>
    </div>
</div>