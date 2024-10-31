<?php

declare(strict_types=1);

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class GetExternalChangelogController extends Controller
{
    public function __invoke(Request $request)
    {
        return response()->json([
            'content' => Cache::get('external_changelog'),
        ]);
    }
}
