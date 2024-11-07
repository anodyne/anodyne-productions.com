<?php

declare(strict_types=1);

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Addon;
use Illuminate\Http\Request;

class AddonLatestVersionController extends Controller
{
    public function __invoke(Request $request, string $addonId)
    {
        $addon = Addon::with('latestVersion')
            ->published()
            ->wherePrefixedId($addonId)
            ->sole();

        return response()->json([
            'name' => $addon->name,
            'version' => $addon->latestVersion->version,
            'id' => $addon->prefixed_id,
            'url' => route('addons.show', [$addon->user, $addon]),
        ]);
    }
}
