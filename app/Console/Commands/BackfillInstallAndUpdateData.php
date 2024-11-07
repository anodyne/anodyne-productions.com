<?php

namespace App\Console\Commands;

use App\Models\Game;
use Illuminate\Console\Command;

class BackfillInstallAndUpdateData extends Command
{
    protected $signature = 'one-time:backfill-install-and-update-data';

    protected $description = 'Backfill all games with install and update data';

    public function handle()
    {
        $games = Game::get();

        foreach ($games as $game) {
            Game::withoutTimestamps(function () use ($game) {
                $game->forceFill([
                    'nova_installed_at' => $game->created_at,
                    'nova_updated_at' => $game->updated_at,
                ]);

                $game->save();
            });
        }

        $this->info('Install and update dates migrated');

        return Command::SUCCESS;
    }
}
