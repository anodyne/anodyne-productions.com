@props([
    'rotate',
])

<x-landing-section
    id="everything"
    gradient-direction="br"
    gradient-start="purple-500"
    gradient-stop="indigo-500"
    color="violet-600"
    icon="st-stars"
>
    <x-slot name="heading">Features</x-slot>
    <x-slot name="title">Better at... everything.</x-slot>
    <x-slot name="content">From the ground-up, Nova 3 takes everything that Nova has done for years and aims to make it better. The end result is a product that's faster, smarter, and easier to use than its ever been.</x-slot>

    <x-landing-panel
        :gradient-start="$component->gradientStart"
        :gradient-stop="$component->gradientStop"
        :rotate="$rotate"
    >
        <x-landing-definition-list>
            <x-landing-definition-list-item color="violet-600" title="Create new users">
                No clunky workaround with the join form for admins to add new users, simply click and add a new user.
            </x-landing-definition-list-item>
            <x-landing-definition-list-item color="violet-600" title="Streamlined character assignment">
                Assign characters to users and vice versa from their management pages.
            </x-landing-definition-list-item>
            <x-landing-definition-list-item color="violet-600" title="Multi-user character ownership">
                Manage a character with another player seamlessly to help tell stories better.
            </x-landing-definition-list-item>
            <x-landing-definition-list-item color="violet-600" title="Granular access control">
                Fine-grained control over roles means you can define more precisely what users can do.
            </x-landing-definition-list-item>
            <x-landing-definition-list-item color="violet-600" title="Flexible default roles">
                Set exactly which roles new users should have based on how you manage your game.
            </x-landing-definition-list-item>
            <x-landing-definition-list-item color="violet-600" title="Powerful page manager">
                Find what you need with advanced filters, bulk actions, and quick views.
            </x-landing-definition-list-item>
            <x-landing-definition-list-item color="violet-600" title="All-new form builder">
                Find what you need with advanced filters, bulk actions, and quick views.
            </x-landing-definition-list-item>
        </x-landing-definition-list>
    </x-landing-panel>
</x-landing-section>