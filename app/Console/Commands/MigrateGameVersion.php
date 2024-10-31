<?php

namespace App\Console\Commands;

use App\Enums\ReleaseSeverity;
use App\Models\Game;
use App\Models\Release;
use Illuminate\Console\Command;
use Illuminate\Support\Carbon;

class MigrateGameVersion extends Command
{
    protected $signature = 'one-time:migrate-game-versions';

    protected $description = 'Migrate the versions to the releases table.';

    public function handle()
    {
        $this->error('Migrating game versions is a one-time command that cannot be run again.');

        return Command::INVALID;

        $release = Release::firstOrCreate(
            ['version' => '2.7.3'],
            [
                'severity' => ReleaseSeverity::Patch,
                'date' => Carbon::create(2023, 1, 7),
                'notes' => "Nova 2.7.3 addresses an issue that games with the BLANK genre have had doing the update to 2.7. We have made some small updates to the UI for update notifications that you'll see in future updates. We've also added some analytics gathering to the install and update processes to help with future support and product decisions. When updating this version of Nova, we recommend updating the index.php file as well.",
                'link' => 'https://anodyne-productions.com/nova',
            ]
        );

        Game::whereNotNull('version')->update([
            'version' => null,
            'release_id' => $release->id,
        ]);

        return Command::SUCCESS;
    }
}
