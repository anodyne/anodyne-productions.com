<x-landing-section
    id="mobile-first"
    gradient-direction="br"
    gradient-start="fuchsia-500"
    gradient-stop="purple-600"
    color="purple-600"
    icon="st-responsive-design"
>
    <x-slot name="heading">Mobile first</x-slot>
    <x-slot name="title">Play wherever you are.</x-slot>
    <x-slot name="content">Bring whatever device you want, Nova doesn't care! We've designed Nova from the ground up to work on devices of all sizes.</x-slot>

    <img src="{{ asset('images/devices.svg') }}" class="block w-full" alt="">
</x-landing-section>