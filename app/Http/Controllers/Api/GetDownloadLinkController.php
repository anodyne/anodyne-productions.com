<?php

declare(strict_types=1);

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class GetDownloadLinkController extends Controller
{
    public function __invoke(string $version)
    {
        /** @var Filesystem $disk */
        $disk = Storage::disk(str($version)->startsWith('2.') ? 'r2-nova2-downloads' : 'r2-nova3-downloads');

        $filename = sprintf(
            'nova-%s.zip',
            $version
        );

        return response()->json(['link' => $disk->temporaryUrl($filename, now()->addMinutes(5))]);
    }
}
