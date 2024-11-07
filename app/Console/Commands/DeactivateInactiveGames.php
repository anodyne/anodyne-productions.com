<?php

namespace App\Console\Commands;

use App\Enums\GameStatus;
use App\Models\Game;
use App\Models\HeartbeatReport;
use Illuminate\Console\Command;
use Spatie\DiscordAlerts\Facades\DiscordAlert;

class DeactivateInactiveGames extends Command
{
    protected $signature = 'anodyne:deactivate-inactive-games';

    protected $description = 'Deactivate any games that have had an inactive status for 7 days';

    public function handle()
    {
        $abandonedCount = Game::query()
            ->isIncluded()
            ->isActive()
            ->whereRelation('latestHeartbeat', 'last_published_post', '<', now()->subDays(90))
            ->update([
                'status' => GameStatus::Abandoned,
                'status_inactive_days' => 0,
            ]);

        $inactiveCount = Game::query()
            ->isIncluded()
            ->isActive()
            ->where('status_inactive_days', '>=', 7)
            ->update(['status' => GameStatus::Inactive]);

        HeartbeatReport::createAbandonedReport(
            abandoned: $abandonedCount,
            inactive: $inactiveCount
        );

        DiscordAlert::to('alerts')
            ->message('Deactivating games completed', [
                [
                    'title' => 'Marking abandoned and inactive games - '.now()->format('l F jS, Y'),
                    'color' => '#f43f5e',
                    'fields' => [
                        ['name' => 'Abandoned games', 'value' => $abandonedCount, 'inline' => true],
                        ['name' => 'Inactive games', 'value' => $inactiveCount, 'inline' => true],
                    ],
                ],
            ]);

        $this->info('Deactivated inactive games');

        return Command::SUCCESS;
    }
}
