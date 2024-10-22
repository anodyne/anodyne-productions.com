<?php

declare(strict_types=1);

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Addon;
use Illuminate\Http\Request;

class AddonLatestVersionController extends Controller
{
    public function __invoke(Request $request)
    {
        $addon = Addon::with('latestVersion')
            ->published()
            ->where('slug', $slug)
            ->sole();

        return response()->json([
            'name' => $addon->name,
            'slug' => $addon->slug,
            'version' => $addon->latestVersion->version,
        ]);
    }
}
