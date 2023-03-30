<x-mail::message>
Hi {{ $name }},

As part of our overhaul of Anodyne's website and services, we've replaced AnodyneXtras with the Nova Exchange. This is the first step in providing the community with a more robust marketplace for discovering add-ons to customize Nova.

We've completed migrating the following {{ str('add-on')->plural(count($addons)) }} associated with your account:

<x-mail::panel>
@foreach ($addons as $addon)
- {{ $addon->name }} ({{ $addon->type->displayName() }})
@endforeach
</x-mail::panel>

There's nothing further you need to do at this point. Your {{ count($addons) === 1 ? 'add-on is' : 'add-ons are' }} available to the community to download as before. If you had previously set an add-on as *inactive* in AnodyneXtras, it's been marked as unpublished in the Nova Exchange and is **not** available for download.

Due to the nature of the design of the Nova Exchange, you'll likely find that your preview images will need to be updated or some of your descriptions / instructions may need to be tweaked. We also provide the ability to easily unpublish older versions of an add-on, which you may want to do to avoid people incorrectly downloading the wrong version.

If you have any questions, please don't hesitate to reach out in the `#xtras` channel of the Anodyne Discord server.

<x-mail::button :url="$url">
Sign in
</x-mail::button>

Thanks,<br>
Anodyne
</x-mail::message>
