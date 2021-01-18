<x-layouts.projects>
    <x-slot name="title">Anodyne Projects</x-slot>

    <div class="grid gap-8 lg:grid-cols-2">
        <a href="{{ route('projects.identity') }}" class="bg-gray-100 ring-1 ring-gray-200 rounded-xl p-6">
            Identity
        </a>

        <a href="{{ route('projects.website') }}" class="bg-gray-100 ring-1 ring-gray-200 rounded-xl p-6">
            Website
        </a>

        <a href="{{ route('projects.support') }}" class="bg-gray-100 ring-1 ring-gray-200 rounded-xl p-6">
            Support changes
        </a>

        <a href="{{ route('projects.docs') }}" class="bg-gray-100 ring-1 ring-gray-200 rounded-xl p-6">
            Re-written docs
        </a>

        <a href="{{ route('projects.exchange') }}" class="bg-gray-100 ring-1 ring-gray-200 rounded-xl p-6">
            AnodyneXtras 2.0
        </a>

        <a href="{{ route('projects.galaxy') }}" class="bg-gray-100 ring-1 ring-gray-200 rounded-xl p-6">
            Secret Project
        </a>
    </div>
</x-layouts.projects>