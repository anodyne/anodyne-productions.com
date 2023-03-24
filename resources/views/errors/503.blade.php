<x-base-layout bg-color="gray-200">
    <div class="max-w-3xl mx-auto h-screen flex flex-col items-center justify-center">
        <div class="mb-8">
            <x-logos.anodyne class="h-12 w-auto" gradient />
        </div>

        <div class="bg-white shadow-md md:shadow-xl p-8 md:p-16 md:rounded-xl">
            <img src="{{ asset('images/undraw_server_down_s4lk.svg') }}" class="h-72 w-auto" alt="server down illustration">

            <h1 class="mt-8 text-3xl leading-9 font-extrabold text-spanish-roast tracking-tight sm:text-4xl sm:leading-10 md:text-5xl md:leading-14 text-center">Service Unavailable</h1>

            <p class="mt-4 text-center text-xl font-medium text-gray-500">Never fear, we're on it! Try back soon.</p>
        </div>
    </div>
</x-base-layout>