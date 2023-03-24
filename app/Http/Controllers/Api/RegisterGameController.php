<?php

declare(strict_types=1);

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Game;
use App\Models\Release;
use Carbon\Carbon;
use Illuminate\Http\Request;

class RegisterGameController extends Controller
{
    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            $url = str($request->url);

            if ($url->contains(config('anodyne.registration.exceptions'))) {
                return false;
            }

            return $next($request);
        });
    }

    public function __invoke(Request $request)
    {
        $data = [
            'name' => $request->name ?? $request->url,
            'genre' => $request->genre,
            'release_id' => Release::version($request->version)->first()->id,
            'php_version' => $request->php_version,
            'db_driver' => $request->db_driver,
            'db_version' => $request->db_version,
            'server_software' => $request->server_software,
        ];

        if (! empty($request->get('install_date'))) {
            $data['created_at'] = Carbon::createFromFormat('U', $request->get('install_date'));
        }

        Game::updateOrCreate(['url' => $request->url], $data);

        return response()->json();
    }
}
