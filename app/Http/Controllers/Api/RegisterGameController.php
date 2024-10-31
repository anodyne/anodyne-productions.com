<?php

declare(strict_types=1);

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Game;
use App\Models\Release;
use App\Support\Url;
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
        $url = Url::parse($request->url);

        $game = ($request->has('game_id'))
            ? Game::wherePrefixedId($request->game_id)->first()
            : Game::where('url', 'like', '%'.$url->urlWithPath())->firstOrNew();

        $data = [
            'name' => $request->name ?? $request->url,
            'genre' => $request->genre,
            'url' => $request->url,
            'release_id' => Release::version($request->version)->first()->id,
            'php_version' => $request->php_version,
            'db_driver' => $request->db_driver,
            'db_version' => $request->db_version,
            'server_software' => $request->server_software,
            'active_users' => $request->active_users,
            'active_characters' => $request->active_characters,
            'total_stories' => $request->total_stories,
            'total_story_groups' => $request->total_story_groups,
            'total_posts' => $request->total_posts,
            'total_post_words' => $request->total_post_words,
        ];

        if (! empty($request->get('install_date'))) {
            $data['created_at'] = Carbon::createFromFormat('U', $request->get('install_date'));
        }

        if ($game->exists) {
            $game->update($data);
        } else {
            $game = Game::create($data);
        }

        return response()->json([
            'game_id' => $game->prefixed_id,
        ]);
    }
}
