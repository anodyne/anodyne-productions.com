@php
  $features = [
    [
      'title' => 'All-in-one website',
      'content' => "A dedicated website with all of your content lets you easily show off your game to the world.",
      'icon' => 'fd-browser-favorite',
    ],
    [
      'title' => 'Easy character management',
      'content' => "Manage all of your game's characters in one place and let players take ownership of the characters they play.",
      'icon' => 'fd-theater-mask',
    ],
    [
      'title' => 'Tell your stories',
      'content' => "An integrated story and posting system gives you and your players the freedom to tell your game's stories.",
      'icon' => 'fd-book-edit',
    ],
    [
      'title' => 'Post locking',
      'content' => "Post locking intelligently locks and unlocks multi-author posts to help prevent your changes being overwritten.",
      'icon' => 'fd-lock-closed',
    ],
    [
      'title' => 'Reporting',
      'content' => "Get valuable insights into activity, posting levels, and even forecasting game activity for the rest of the month.",
      'icon' => 'fd-graph-dot',
    ],
    [
      'title' => 'Customize your way',
      'content' => "Change the way your site looks or works with tools to customize things any way you want.",
      'icon' => 'fd-wrench',
    ],
  ];
@endphp

<a name="features"></a>
<div class="py-24 sm:py-32">
  <div class="mx-auto max-w-7xl px-6 lg:px-8">
    <div class="mx-auto max-w-2xl sm:text-center">
      <h2 class="text-3xl font-bold tracking-tight text-slate-900 sm:text-4xl">Powerful RPG management features</h2>
      <p class="mt-6 text-lg leading-8 text-slate-600">Simplify your RPG management with features and tools that will let
        you stop managing your game and start playing it again.</p>
    </div>
  </div>
  <div class="relative overflow-hidden pt-16">
    <div class="mx-auto max-w-7xl px-6 lg:px-8">
      <img src="/images/nova2-app-admin.png" alt="App screenshot" class="mb-[-12%] rounded-xl shadow-2xl ring-1 ring-slate-900/10" width="3072" height="1800">
      <div class="relative" aria-hidden="true">
        <div class="absolute -inset-x-20 bottom-0 bg-gradient-to-t from-slate-50 pt-[7%]"></div>
      </div>
    </div>
  </div>
  <div class="mx-auto mt-16 max-w-7xl px-6 sm:mt-20 md:mt-24 lg:px-8">
    <dl class="mx-auto grid max-w-2xl grid-cols-1 gap-x-6 gap-y-10 text-base leading-7 text-slate-600 sm:grid-cols-2 lg:mx-0 lg:max-w-none lg:grid-cols-3 lg:gap-x-8 lg:gap-y-16">
      @foreach ($features as $feature)
        <div class="relative pl-9">
          <dt class="inline font-semibold text-slate-900">
            @svg($feature['icon'], 'absolute top-0.5 left-0 h-6 w-6')
            {{-- @svg($feature['icon'], 'absolute top-1 left-1 h-5 w-5 text-purple-600') --}}
            {{ $feature['title'] }}
          </dt>
          <dd class="inline">{{ $feature['content'] }}</dd>
        </div>
      @endforeach
    </dl>
  </div>
</div>