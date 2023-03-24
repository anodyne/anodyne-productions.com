<x-layouts.projects>
    <x-slot name="title">AnodyneXtras &rarr; Nova Exchange</x-slot>

    <div class="prose prose-lg">
        <dl class="space-y-6">
            <div class="space-y-1">
                <dt class="font-semibold text-xl text-gray-900">User registration has moved to the Xtras site</dt>
                <dd>We've ported the user registration and password reset functionality from the old main site into the Xtras site. Users shouldn't see any major changes other than they aren't re-directed to the main site anymore for registering an account or resetting their password.</dd>
            </div>
        </dl>

        <h2>What's next?</h2>

        <p>We've already started re-writing AnodyneXtras and have some really exciting plans for the service that we're hoping to launch this summer. One of the biggest changes is that we'll be renaming the service to <span class="font-bold">Nova Exchange</span>. Given that AnodyneXtras has been entirely focused on Nova, we felt that using Nova in the name made more sense.</p>

        <p>Here are some of the features we're focused on for this new version of the service:</p>
    </div>

    @php
        $userFeatures = [
            ['title' => 'Realtime filtering', 'content' => "Find the add-on you're looking for quickly and easily."],
            ['title' => 'Sorting options', 'content' => "Sort results by created, updated, popular, or their rating."],
            ['title' => 'Quick access to download', 'content' => "No need to view the item page, just click to download."],
            ['title' => 'User reviews', 'content' => "Give your rating context by leaving a complete review."],
            ['title' => 'Favorites', 'content' => "Mark items as favorites to keep track of them in the future."],
        ];
    @endphp

    <div class="mx-auto py-16">
        <div class="max-w-3xl mx-auto text-center">
            <h3 class="text-base text-orange-500 font-semibold tracking-wide uppercase">For Users</h3>
            <h2 class="text-3xl font-extrabold text-gray-900">Discover add-ons for your game</h2>
        </div>
        <dl class="mt-12 space-y-10 sm:space-y-0 sm:grid sm:grid-cols-2 sm:gap-x-6 sm:gap-y-12 lg:grid-cols-3 lg:gap-x-8">
            @foreach ($userFeatures as $userFeature)
            <div class="flex">
                <!-- Heroicon name: check -->
                <svg class="shrink-0 h-6 w-6 text-green-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                </svg>
                <div class="ml-3">
                    <dt class="text-lg leading-6 font-medium text-gray-900">
                        {{ $userFeature['title'] }}
                    </dt>
                    <dd class="mt-2 text-base text-gray-500">
                        {{ $userFeature['content'] }}
                    </dd>
                </div>
            </div>
            @endforeach
        </dl>
    </div>

    @php
        $authorFeatures = [
            ['title' => 'FAQs', 'content' => "Answer commonly asked questions for all users to see."],
            ['title' => 'Multi-version compatibility', 'content' => "Associate multiple Nova versions with a single download file."],
            ['title' => 'More Markdown options', 'content' => "Use Markdown features like fenced code blocks, tables, and more."],
            ['title' => 'Genres', 'content' => "For Nova 3, create and share your own genre files and assets."],
        ];
    @endphp

    <div class="mx-auto py-16">
        <div class="max-w-3xl mx-auto text-center">
            <h3 class="text-base text-orange-500 font-semibold tracking-wide uppercase">For Authors</h3>
            <h2 class="text-3xl font-extrabold text-gray-900">Share your add-ons with the community</h2>
        </div>
        <dl class="mt-12 space-y-10 sm:space-y-0 sm:grid sm:grid-cols-2 sm:gap-x-6 sm:gap-y-12 lg:grid-cols-3 lg:gap-x-8">
            @foreach ($authorFeatures as $authorFeature)
            <div class="flex">
                <!-- Heroicon name: check -->
                <svg class="shrink-0 h-6 w-6 text-green-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                </svg>
                <div class="ml-3">
                    <dt class="text-lg leading-6 font-medium text-gray-900">
                        {{ $authorFeature['title'] }}
                    </dt>
                    <dd class="mt-2 text-base text-gray-500">
                        {{ $authorFeature['content'] }}
                    </dd>
                </div>
            </div>
            @endforeach
        </dl>
    </div>
</x-layouts.projects>