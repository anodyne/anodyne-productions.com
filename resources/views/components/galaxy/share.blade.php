@props([
    'rotate',
])

<x-landing-section
    id="share"
    gradient-direction="br"
    gradient-start="cyan-400"
    gradient-stop="light-blue-500"
    color="light-blue-500"
    icon="st-social-profile-network"
>
    <x-slot name="heading">Share</x-slot>
    <x-slot name="title">A new way to tell stories.</x-slot>
    <x-slot name="content">A brand-new way of thinking about stories led us to a innovative approach to help you tell your stories the way you want.</x-slot>

    <x-landing-panel
        :gradient-start="$component->gradientStart"
        :gradient-stop="$component->gradientStop"
        :rotate="$rotate"
    >
        <x-landing-feature-list
            gradient-direction="br"
            :gradient-start="$component->gradientStart"
            :gradient-stop="$component->gradientStop"
            color="light-blue-500"
        >
            <x-landing-feature-list-item
                :color="$component->color"
                :gradient-direction="$component->gradientDirection"
                :gradient-start="$component->gradientStart"
                :gradient-stop="$component->gradientStop"
                title="Unified story timeline"
                icon="fluent-timeline"
            >
                Stories live on a timeline to give chronological context to your game. Readers will be able to see how your game's adventures unfold in precisely the order you intended them.
            </x-landing-feature-list-item>
            <x-landing-feature-list-item
                :color="$component->color"
                :gradient-direction="$component->gradientDirection"
                :gradient-start="$component->gradientStart"
                :gradient-stop="$component->gradientStop"
                title="Non-sequential storytelling"
                icon="fluent-text-bullet-list-tree"
            >
                You're no longer limited to telling stories one after another. With the unified timeline, you can go back and tell stories in whatever order you want, even including <em>inside</em> of other stories.
            </x-landing-feature-list-item>
            <x-landing-feature-list-item
                :color="$component->color"
                :gradient-direction="$component->gradientDirection"
                :gradient-start="$component->gradientStart"
                :gradient-stop="$component->gradientStop"
                title="Flexible post types"
                icon="fluent-edit-settings"
            >
                Create different ways for players to contribute to the story through post types. Control what fields display as well as a wide range of options for any posts of that type.
            </x-landing-feature-list-item>
            <x-landing-feature-list-item
                :color="$component->color"
                :gradient-direction="$component->gradientDirection"
                :gradient-start="$component->gradientStart"
                :gradient-stop="$component->gradientStop"
                title="Write anywhere in the story"
                icon="fluent-calligraphy-pen"
            >
                Players can add new posts anywhere in the story. This provides for vastly improved chronological ordering based on the story being told and not on when the post was published.
            </x-landing-feature-list-item>
        </x-landing-feature-list>
    </x-landing-panel>
</x-landing-section>