@props([
    'rotate',
])

<x-landing-section
    id="ranks"
    gradient-direction="br"
    gradient-start="orange-400"
    gradient-stop="pink-600"
    color="orange-600"
    icon="st-stars"
>
    <x-slot name="heading">Showcase</x-slot>
    <x-slot name="title">Ranks. Done right.</x-slot>
    <x-slot name="content">We regularly highlight games that are doing really interesting things</x-slot>

    <x-landing-panel
        :gradient-start="$component->gradientStart"
        :gradient-stop="$component->gradientStop"
        :rotate="$rotate"
    >
        <x-landing-feature-list
            gradient-direction="br"
            :gradient-start="$component->gradientStart"
            :gradient-stop="$component->gradientStop"
            color="orange-600"
        >
            <x-landing-feature-list-item
                :color="$component->color"
                :gradient-direction="$component->gradientDirection"
                :gradient-start="$component->gradientStart"
                :gradient-stop="$component->gradientStop"
                title="Custom rank groupings"
                icon="fluent-grid"
            >
                Easily create groups for organizing your ranks that make it easy to find the ranks you're looking for when you need them.
            </x-landing-feature-list-item>
            <x-landing-feature-list-item
                :color="$component->color"
                :gradient-direction="$component->gradientDirection"
                :gradient-start="$component->gradientStart"
                :gradient-stop="$component->gradientStop"
                title="Re-usable rank information"
                icon="fluent-arrow-repeat-all"
            >
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Amet ut voluptatibus fugiat quisquam assumenda molestiae mollitia nostrum maiores dolores, vero dicta nesciunt, cum, recusandae ad perferendis tempora. Odit, vel nesciunt?
            </x-landing-feature-list-item>
            <x-landing-feature-list-item
                :color="$component->color"
                :gradient-direction="$component->gradientDirection"
                :gradient-start="$component->gradientStart"
                :gradient-stop="$component->gradientStop"
                title="Ultimate flexibility"
                icon="fluent-layer"
            >
                Compose your rank images from a base image and a pip image for the ultimate flexibility. With a few clicks, you can create an entirely new rank without touching any photo editing software.
            </x-landing-feature-list-item>
            <x-landing-feature-list-item
                :color="$component->color"
                :gradient-direction="$component->gradientDirection"
                :gradient-start="$component->gradientStart"
                :gradient-stop="$component->gradientStop"
                title="Ultimate flexibility"
                icon="fluent-layer"
            >
                Compose your rank images from a base image and a pip image for the ultimate flexibility. With a few clicks, you can create an entirely new rank without touching any photo editing software.
            </x-landing-feature-list-item>
        </x-landing-feature-list>
    </x-landing-panel>
</x-landing-section>