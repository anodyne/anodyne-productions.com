<x-base-layout>
    <x-nova2.header />

    <x-nova2.features />

    @if (version_compare($latestVersion, '2.7.0', '>='))
        <x-nova2.nova-27 />
    @endif

    <x-nova2.download :version="$latestVersion" />

    <x-nova2.resources />

    <x-nova2.sponsors :sponsors="$sponsors" />

    <x-footer />
</x-base-layout>