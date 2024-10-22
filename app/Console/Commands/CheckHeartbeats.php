<?php

namespace App\Console\Commands;

use App\Jobs\CheckHeartbeat;
use App\Models\Game;
use Illuminate\Console\Command;

class CheckHeartbeats extends Command
{
    protected $signature = 'app:check-heartbeats';

    protected $description = 'Run the heartbeat check on any included, non-inactive Nova game';

    public function handle()
    {
        $games = Game::query()
            ->isIncluded()
            ->isNotInactive()
            ->whereRelation('release', 'has_heartbeat_endpoint', '=', true)
            ->get();

        $games->each(fn (Game $game) => dispatch(new CheckHeartbeat($game)));
    }
}
