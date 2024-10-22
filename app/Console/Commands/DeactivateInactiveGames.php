<?php

namespace App\Console\Commands;

use App\Enums\GameStatus;
use App\Models\Game;
use Illuminate\Console\Command;

class DeactivateInactiveGames extends Command
{
    protected $signature = 'app:deactivate-inactive-games';

    protected $description = 'Deactivate any games that have had an inactive status for 7 days';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        Game::withoutTimestamps(function () {
            Game::query()
                ->isIncluded()
                ->isNotInactive()
                ->where('status_inactive_days', '>=', 7)
                ->update(['status' => GameStatus::Inactive]);

            Game::query()
                ->isIncluded()
                ->isNotInactive()
                ->whereRelation('latestHeartbeat', 'last_published_post', '<', now()->subDays(30))
                ->update(['status' => GameStatus::Abandoned]);
        });
    }
}
