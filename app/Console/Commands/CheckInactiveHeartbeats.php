<?php

namespace App\Console\Commands;

use App\Jobs\CheckHeartbeat;
use App\Models\Game;
use Illuminate\Console\Command;

class CheckInactiveHeartbeats extends Command
{
    protected $signature = 'app:check-inactive-heartbeats';

    protected $description = 'Run the heartbeat check on any included, inactive Nova 3 game';

    public function handle()
    {
        $games = Game::query()
            ->isIncluded()
            ->isInactive()
            ->whereRelation('release', 'has_heartbeat_endpoint', '=', true)
            ->get();

        $games->each(fn (Game $game) => dispatch(new CheckHeartbeat($game)));
    }
}
