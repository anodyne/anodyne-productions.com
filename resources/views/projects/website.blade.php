<x-layouts.projects prose>
    <x-slot name="title">Anodyne's New Home</x-slot>

    <p>Like Nova 2, the Anodyne website has grown a little long in the tooth. The last design change to our virtual home happened in 2014 and a lot has changed on the internet since then. For the last 7 years, nothing has been done to update the design and we felt this was the final piece of the puzzle for refreshing our <a href="{{ route('projects.identity') }}">visual identity</a>.</p>

    <p>For the 7th version of our website, we chose a much simpler approach than we have previously. Since the vast majority of visitors are either looking to learn about Nova or download Nova, we decided to put Nova front and center. The main page is now a simple marketing page that explains what Nova is and provides resources for users.</p>

    <p>We've also added an updated preview page for Nova 3 and this projects mini-site to keep people updated on what's going on with some of the larger initiatives we have underway.</p>

    <h2>Deep Dive: A Different (Technical) Approach</h2>

    <p>Our previous version of the site was broken up into multiple micro-sites/services (<code><nobr>help.anodyne-productions</nobr></code>, <code><nobr>xtras.anodyne-productions</nobr></code>, <code><nobr>forums.anodyne-productions</nobr></code>). We were sold on this approach 7 years ago and had grand visions for what we could do with a structure like this. In reality, it led to a lot of wasted time and overhead in our architecture.</p>

    <p>When building a site structure made up of micro-sites/services, there are additional pieces that have to be built to provide the best possible user and developer experience. For example, the optimal user experience involves signing in once and never having to sign in again, no matter which part of the site you go to.</p>

    <p>From a technical perspective, we've shifted our own website away from micro-sites and decided to develop this as a monolith.

    <p>Unlike the previous version of our site which was separated into multiple subdomains, this version is a monolith. When breaking a site across subdomains like we did previously, things like single sign-on and sharing information between sites requires significant architecture, planning, and development. While those things are all well and good, for our site we just felt like that was overkill and it led </p>
</x-layouts.projects>