<x-base-layout>
    <div class="py-16 bg-gray-100">
        <div class="min-h-screen flex flex-col items-center pt-6 sm:pt-0">
            <div>
                <x-logos.anodyne class="h-12 w-auto" gradient />
            </div>

            <div class="w-full sm:max-w-2xl mt-8 p-8 bg-white shadow-lg overflow-hidden sm:rounded-xl prose">
                {!! $policy !!}
            </div>
        </div>
    </div>
</x-base-layout>
