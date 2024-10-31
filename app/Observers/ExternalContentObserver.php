<?php

namespace App\Observers;

use App\Models\ExternalContent;
use Illuminate\Support\Facades\Cache;

class ExternalContentObserver
{
    public function saved(ExternalContent $content): void
    {
        Cache::forget('external_content');

        Cache::rememberForever(
            'external_content',
            fn () => ExternalContent::active()->pluck('value', 'key')->toArray()
        );
    }
}
