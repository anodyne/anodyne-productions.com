<x-mail::message>
# Greetings from Anodyne!

As part of our overhaul of Anodyne's website and services, we've shut down AnodyneXtras and replaced it with the Nova Exchange. We've completed migrating the following add-ons to the new Nova Exchange format:

<x-mail::panel>
@foreach ($addons as $addon)
- {{ $addon->name }} ({{ $addon->type->displayName() }})
@endforeach

*Note: any add-on that was previously inactive in AnodyneXtras is marked as unpublished now and **not** available for download.*
</x-mail::panel>

We encourage you to sign in, look around, and make sure that all of your add-ons look correct.

<x-mail::button :url="$url">
Sign in
</x-mail::button>

Thanks,<br>
Anodyne
</x-mail::message>
