<?php

namespace App\Jobs;

use App\Models\Game;
use Illuminate\Bus\Batchable;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Http;
use Throwable;

class RequestExternalContentSync implements ShouldQueue
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

        try {
            $url = sprintf('%s%s', str($this->game->url)->finish('/'), 'api/sync-external-content');

            $response = Http::get($url);

            if ($response->ok()) {
                $this->game->update(['content_updated_at' => now()]);
            }
        } catch (Throwable $th) {
            // TODO: Mark that there was an exception trying to sync
        }
    }
}
