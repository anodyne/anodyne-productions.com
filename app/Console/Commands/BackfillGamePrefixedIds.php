<?php

namespace App\Console\Commands;

use App\Models\Game;
use Illuminate\Console\Command;
use ReflectionMethod;

class BackfillGamePrefixedIds extends Command
{
    protected $signature = 'one-time:backfill-game-prefixed-ids';

    protected $description = 'Backfill all games with a prefixed ID';

    public function handle()
    {
        $this->error('Notifying users of account migration is a one-time command that cannot be run again.');

        return Command::INVALID;

        Game::withoutTimestamps(function () {
            $games = Game::whereNull('prefixed_id')->get();

            $reflectedMethod = new ReflectionMethod(Game::class, 'generatePrefixedId');

            foreach ($games as $game) {
                $game->forceFill(['prefixed_id' => $reflectedMethod->invoke($game)]);
                $game->save();
            }
        });

        $this->info('Games have been back-filled with prefixed IDs');

        return Command::SUCCESS;
    }
}
