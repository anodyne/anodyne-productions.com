<x-mail::message>
# Greetings from Anodyne!

It's been a busy 18 months for Anodyne that culminated today in the release of a massive amount of work that we've been doing. On top of releasing Nova 2.7 at the end of 2022, we've also been working on an all-new visual identity for both Anodyne and Nova (some of which you've likely seen already), a brand-new website and backend management system, completely re-written documentation for Nova, and the Nova Exchange to replace AnodyneXtras. We're thrilled for all of this to be live.

As a result of this work, the Anodyne account associated with this email address has been migrated to the new system. For security reasons, we've generated a new password for you:

<x-mail::panel>
{{ $password }}
</x-mail::panel>

We **strongly** recommend that you change this password to something of your own choosing either through the password reset feature or by updating your profile once you've signed in.

<x-mail::button :url="$url">
Sign in
</x-mail::button>

Thanks,<br>
Anodyne
</x-mail::message>
