<?php

namespace App\Observers;

use App\Models\Release;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;

class ReleaseObserver
{
    public function saving(Release $release): void
    {
        if ($release->isDirty('published')) {
            $githubRelease = Http::withHeader('X-GitHub-Api-Version', '2022-11-28')
                ->get('https://api.github.com/repos/anodyne/nova/releases/tags/'.$release->version)
                ->json();

            if (blank($release->details)) {
                $release->details = data_get($githubRelease, 'body');
            }
        }
    }

    public function saved(Release $release): void
    {
        Cache::forget('external_changelog');

        Cache::rememberForever(
            'external_changelog',
            fn () => Release::published()->get()->toArray()
        );
    }
}
