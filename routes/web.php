<?php

use App\CommonMark\Extensions\Tag\TagExtension;
use App\Http\Controllers\DocsController;
use App\Http\Livewire\AddonsDisplay;
use App\Http\Livewire\AddonsList;
use App\Models\Addon;
use App\Models\Release;
use App\Models\Sponsor;
use Illuminate\Support\Facades\Route;
use League\CommonMark\Environment\Environment;
use League\CommonMark\Extension\CommonMark\CommonMarkCoreExtension;
use League\CommonMark\MarkdownConverter;

Route::get('/nova', function () {
    $release = Release::query()
        ->where('published', true)
        ->latest('date')
        ->first();

    $sponsors = Sponsor::query()
        ->active()
        ->premiumTier()
        ->shouldBeDisplayed()
        ->get()
        ->sortBy('formattedName');

    return view('nova-2', [
        'latestVersion' => $release->version,
        'sponsors' => $sponsors,
    ]);
})->name('home');

Route::view('/nova-3', 'nova-3')->name('nova-3');
Route::view('/nova-3/features', 'nova-3-features')->name('nova-3-features');

Route::get('/docs/{version?}/{page?}', DocsController::class)
    ->where('page', '(.*)')
    ->name('docs');

Route::get('/addons', AddonsList::class)->name('addons.index');
Route::get('/addons/{addon}', AddonsDisplay::class)->name('addons.show');

// Route::get('/addons/{addon}', function (Addon $addon) {
//     return view('addons.show', compact('addon'));
// })->name('addons.show');

Route::redirect('/', '/nova');

Route::get('/test', function () {
//     $markdown = '{% tip title="A word to the wise" %}
    // This is my **note** content.
    // {% /tip %}';

    $markdown = '{% quick-links %}
{% quick-link title="Installation" icon="flex-cloud-download" href="/docs/2.7/installation" description="Step-by-step guide to installing Nova on your server." /%}
{% /quick-links %}';

    // $markdown = '{% quick-link title="Installation" icon="flex-cloud-download" href="/docs/2.7/installation" description="Step-by-step guide to installing Nova on your server." /%}';

    // $markdown = '{% screenshot src="https://images.unsplash.com/photo-1676018526219-cac529193274?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1035&q=80" alt="foo" /%}';

    $environment = new Environment();

    $environment->addExtension(new CommonMarkCoreExtension());
    $environment->addExtension(new TagExtension());

    $converter = new MarkdownConverter($environment);

    // dd($converter->convert($markdown)->getContent());

    // echo $converter->convert($markdown)->getContent();

    return view('test', [
        'markdown' => $converter->convert($markdown)->getContent(),
    ]);
});
