<?php

namespace App\Console\Commands;

use App\Jobs\CheckHeartbeat;
use App\Models\Game;
use App\Models\HeartbeatReport;
use Illuminate\Bus\Batch;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Bus;
use Spatie\DiscordAlerts\Facades\DiscordAlert;

class CheckInactiveHeartbeats extends Command
{
    protected $signature = 'anodyne:check-inactive-heartbeats';

    protected $description = 'Run the heartbeat check on any included, inactive Nova 3 game';

    public function handle()
    {
        $games = Game::query()
            ->isIncluded()
            ->isInactive()
            ->whereRelation('release', 'has_heartbeat_endpoint', '=', true)
            ->get();

        $jobs = $games->mapInto(CheckHeartbeat::class);

        Bus::batch($jobs->all())
            ->allowFailures()
            ->finally(function (Batch $batch) {
                $report = HeartbeatReport::createInactiveReport($batch->totalJobs);

                DiscordAlert::to('alerts')
                    ->message('Heartbeat checks on inactive games completed', [
                        [
                            'title' => 'Nova heartbeat checks for inactive games completed on '.now()->format('l F jS, Y'),
                            'color' => '#fbbf24',
                            'fields' => [
                                ['name' => 'Inactive games', 'value' => $report->attempted, 'inline' => true],
                            ],
                        ],
                    ]);
            })->name('Check heartbeats for inactive games - '.now()->format('m/d/Y'))->dispatch();

        $this->info('Heartbeat checks for inactive games have been dispatched');

        return Command::SUCCESS;
    }
}
