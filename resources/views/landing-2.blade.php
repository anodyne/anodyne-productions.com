<x-layouts.base bg-color="white">
    <x-landing-2.header />

    <x-landing-2.features />

    @if (version_compare($latestVersion, '2.7.0', '>='))
        <x-landing-2.nova-27 />
    @endif

    <x-landing-2.download :version="$latestVersion" />

    <x-landing-2.resources />

    <x-landing-2.sponsors />

    <x-landing-2.footer />
</x-layouts.base>