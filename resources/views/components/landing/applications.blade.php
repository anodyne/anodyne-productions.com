@props([
    'rotate',
])

<x-landing-section
    id="applications"
    gradient-direction="br"
    gradient-start="green-400"
    gradient-stop="cyan-500"
    color="teal-500"
    icon="st-approve-disapprove"
>
    <x-slot name="heading">Applications</x-slot>
    <x-slot name="title">All your applications in one place.</x-slot>
    <x-slot name="content">Rarely do game masters decide alone whether they're accepting an application, so why shouldn't the review process incorporate whoever else is helping make the decision?</x-slot>

    <x-landing-panel
        :gradient-start="$component->gradientStart"
        :gradient-stop="$component->gradientStop"
        :rotate="$rotate"
    >
        <x-landing-definition-list>
            <x-landing-definition-list-item color="teal-500" title="Creating new users">
                No need to use the join form anymore, simply click and add a new user.
            </x-landing-definition-list-item>
            <x-landing-definition-list-item color="teal-500" title="Streamlined character assignment">
                Assign characters to users and vice versa from their management pages.
            </x-landing-definition-list-item>
            <x-landing-definition-list-item color="teal-500" title="Multi-user character ownership">
                Manage a character with another player seamlessly to help tell stories better.
            </x-landing-definition-list-item>
            <x-landing-definition-list-item color="teal-500" title="Granular access control">
                You can manage phone, email and chat conversations all from a single mailbox.
            </x-landing-definition-list-item>
            <x-landing-definition-list-item color="teal-500" title="Flexible default roles">
                Find what you need with advanced filters, bulk actions, and quick views.
            </x-landing-definition-list-item>
            <x-landing-definition-list-item color="teal-500" title="Robust application review process">
                Find what you need with advanced filters, bulk actions, and quick views.
            </x-landing-definition-list-item>
            <x-landing-definition-list-item color="teal-500" title="Powerful page manager">
                Find what you need with advanced filters, bulk actions, and quick views.
            </x-landing-definition-list-item>
            <x-landing-definition-list-item color="teal-500" title="All-new form builder">
                Find what you need with advanced filters, bulk actions, and quick views.
            </x-landing-definition-list-item>
        </x-landing-definition-list>
    </x-landing-panel>
</x-landing-section>