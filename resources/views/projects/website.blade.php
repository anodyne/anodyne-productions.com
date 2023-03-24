<x-layouts.projects prose>
    <x-slot name="title">Anodyne's New Home</x-slot>

    <p>It took some digging, but toward the end of 2020 we realized that the last design change to our website happened all the way back in 2014. A lot has changed on the internet since then! For the last 7 years, the website has remained relatively untouched and we felt this was the final piece of the puzzle for refreshing our <a href="{{ route('projects.identity') }}">visual identity</a> to kick off 2021.</p>

    <p>For the latest design of our website (the 7th for those keeping count), we chose a simpler approach than we have in the past. Since the vast majority of visitors are either looking to learn more about Nova or download Nova, we decided to put Nova front and center. The main page is now a simple landing page that explains what Nova is and provides resources and the download options for users.</p>

    <p>We've also added an updated preview page for Nova 3 and this mini-site to keep people updated on some of the larger initiatives we have underway.</p>

    <p>Overall we're really happy with the changes we've made. The new website in tandem with our new visual identity gives Anodyne a fresh new look that we're really excited about. We'll be continuing to evolve the website and our branding over time, but this is a great first step.</p>

    <h2>A Few Changes</h2>

    <dl class="space-y-6">
        <div class="space-y-1">
            <dt class="font-semibold">Sign-ins have been disabled</dt>
            <dd>There were a lot of pieces involved with sign-ins, many of which presented compatability issues with our new server setup. For the time being, there is no need for users to be able to sign-in, but we'll be adding this to the site as part of our next phase of work.</dd>
        </div>

        <div class="space-y-1">
            <dt class="font-semibold">Account management is no longer available</dt>
            <dd>The next phase of work will add account management features back in before the launch of the Nova Exchange.</dd>
        </div>

        <div class="space-y-1">
            <dt class="font-semibold">Users <em>may</em> need to re-register in the future</dt>
            <dd>We haven't made a final decision on this yet, but it's possible that we will start over with the users database and require re-registration for everyone.</dd>
        </div>
    </dl>

    <h2>Deep Dive: A Different (Technical) Approach</h2>

    <p>Our previous version of the site was broken up into multiple micro-sites/services (<code><nobr>help.anodyne-productions</nobr></code>, <code><nobr>xtras.anodyne-productions</nobr></code>, <code><nobr>forums.anodyne-productions</nobr></code>). We were sold on this approach 7 years ago and had grand visions for what we could do with a structure like this. In reality, it led to a lot of wasted time and overhead in our architecture.</p>

    <p>When building a site structure made up of micro-sites/services, there are additional pieces that have to be built to provide the best possible user and developer experience. For example, the optimal user experience involves signing in once and never having to sign in again, no matter which part of the site you go to. We had an implementation of single sign-on that was shaky at best and felt there was a better way to solve the problem.</p>

    <p>With this new version of the site we're shifting away from micro-sites/services in favor of a <a href="https://m.signalvnoise.com/the-majestic-monolith/" target="_blank" rel="nofollow">monolith</a>. This provides us with significantly more flexibility and development speed since we won't have to build separate systems for talking between services and providing single sign-on capabilities. It's all just one big site.</p>
</x-layouts.projects>