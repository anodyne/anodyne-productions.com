<?php

namespace App\Console\Commands;

use App\Enums\ReleaseSeverity;
use App\Models\Game;
use App\Models\Release;
use Illuminate\Console\Command;
use Illuminate\Support\Carbon;

class MigrateGameVersion extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'anodyne:migrate-game-versions';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Migrate the versions to the releases table.';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $release = Release::firstOrCreate(
            ['version' => '2.7.3'],
            [
                'severity' => ReleaseSeverity::patch,
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
