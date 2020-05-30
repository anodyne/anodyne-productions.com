<x-dropdown class="ml-3" trigger-styles="flex text-sm border-2 border-transparent rounded-full focus:outline-none focus:border-gray-300 transition duration-150 ease-in-out">
    <img class="h-8 w-8 rounded-full" src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="" />

    <x-slot name="dropdown">
        <a href="#" class="{{ $component->dropdownLink() }}">
            @svg('outline-person', $component->dropdownIcon())
            <span>Your Profile</span>
        </a>
        <a href="#" class="{{ $component->dropdownLink() }}">
            @svg('outline-settings', $component->dropdownIcon())
            <span>Settings</span>
        </a>

        @if (! $slot->isEmpty())
            <div class="{{ $component->dropdownDivider() }}"></div>
            {{ $slot }}
            <div class="{{ $component->dropdownDivider() }}"></div>
        @endif

        <a href="#" class="{{ $component->dropdownLink() }}">
            @svg('outline-sign-out', $component->dropdownIcon())
            <span>Sign out</span>
        </a>
    </x-slot>
</x-dropdown>