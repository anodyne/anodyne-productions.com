<?php

namespace App\Jobs;

use App\Enums\GameStatus;
use App\Models\Game;
use Illuminate\Bus\Batchable;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Http;

class CheckHeartbeat implements ShouldQueue
{
    use Batchable;
    use Dispatchable;
    use InteractsWithQueue;
    use Queueable;
    use SerializesModels;

    public function __construct(
        protected Game $game
    ) {}

    public function handle(): void
    {
        if ($this->batch()->cancelled()) {
            return;
        }

        if ($this->game->release->releaseSeries->is_nova2) {
            $heartbeatUri = 'index.php/main/snapshot';
        } else {
            $heartbeatUri = 'api/heartbeat';
        }

        $url = sprintf('%s%s', str($this->game->url)->finish('/'), $heartbeatUri);

        try {
            $response = Http::get($url);

            if ($response->status() >= 400) {
                $status = match ($response->status()) {
                    403, 404, 500, 502, 503, 504, 508 => GameStatus::Errored,
                    default => GameStatus::Unknown,
                };

                Game::withoutTimestamps(function () use ($status, $response) {
                    $this->game->increment('status_inactive_days', 1, [
                        'status' => $status,
                        'status_response_code' => $response->status(),
                    ]);
                });
            } else {
                $jsonData = $response->json();

                $latest = $this->game->latestHeartbeat;

                $this->game->heartbeats()->create([
                    'nova_release_series' => $this->game->release->releaseSeries->name,
                    'nova_release' => $this->game->release->version,

                    'status_response_code' => $response->status(),

                    'active_users' => data_get($jsonData, 'active_users'),
                    'active_primary_characters' => data_get($jsonData, 'active_primary_characters'),
                    'active_secondary_characters' => data_get($jsonData, 'active_secondary_characters'),
                    'active_support_characters' => data_get($jsonData, 'active_support_characters'),
                    'total_stories' => data_get($jsonData, 'total_stories'),
                    'total_posts' => data_get($jsonData, 'total_posts'),
                    'total_post_words' => data_get($jsonData, 'total_post_words'),

                    'diff_total_stories' => (int) data_get($jsonData, 'total_stories') - (int) $latest?->total_stories ?? data_get($jsonData, 'total_stories'),
                    'diff_total_posts' => (int) data_get($jsonData, 'total_posts') - (int) $latest?->total_posts ?? data_get($jsonData, 'total_posts'),
                    'diff_total_post_words' => (int) data_get($jsonData, 'total_post_words') - (int) $latest?->total_post_words ?? data_get($jsonData, 'total_post_words'),

                    'last_published_post' => data_get($jsonData, 'last_published_post'),
                ]);

                Game::withoutTimestamps(function () use ($jsonData, $response) {
                    $this->game->update([
                        'active_users' => data_get($jsonData, 'active_users'),
                        'active_primary_characters' => data_get($jsonData, 'active_primary_characters'),
                        'active_secondary_characters' => data_get($jsonData, 'active_secondary_characters'),
                        'active_support_characters' => data_get($jsonData, 'active_support_characters'),
                        'total_stories' => data_get($jsonData, 'total_stories'),
                        'total_posts' => data_get($jsonData, 'total_posts'),
                        'total_post_words' => data_get($jsonData, 'total_post_words'),
                        'last_published_post' => data_get($jsonData, 'last_published_post'),
                        'status' => $response->status() >= 300 ? GameStatus::Redirecting : GameStatus::Active,
                        'status_response_code' => $response->status(),
                        'status_inactive_days' => 0,
                    ]);
                });
            }
        } catch (\Throwable $th) {
            Game::withoutTimestamps(function () {
                $this->game->increment('status_inactive_days', 1, [
                    'status' => GameStatus::Unreachable,
                    'status_response_code' => null,
                ]);
            });
        }
    }
}
