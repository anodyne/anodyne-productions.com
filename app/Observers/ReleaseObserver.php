<?php

namespace App\Observers;

use App\Models\Release;
use Illuminate\Support\Facades\Cache;

class ReleaseObserver
{
    public function saved(Release $release): void
    {
        Cache::forget('external_changelog');

        Cache::rememberForever(
            'external_changelog',
            fn () => Release::published()->get()->toArray()
        );
    }
}
