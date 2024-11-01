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
            ->wherePrefixedId($request->addon_id)
            ->sole();

        return response()->json([
            'name' => $addon->name,
            'version' => $addon->latestVersion->version,
            'addon_id' => $addon->prefixed_id,
        ]);
    }
}
