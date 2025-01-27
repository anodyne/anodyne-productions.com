<?php

declare(strict_types=1);

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ReleaseResource;
use App\Models\Release;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class GetExternalChangelogController extends Controller
{
    public function __invoke(Request $request)
    {
        return Cache::rememberForever('external_changelog', function () {
            $releases = Release::query()
                ->whereHas('releaseSeries', fn (Builder $query): Builder => $query->nova3())
                ->published()
                ->get();

            return ReleaseResource::collection($releases);
        });
    }
}
