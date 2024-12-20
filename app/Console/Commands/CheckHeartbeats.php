<?php

namespace App\Console\Commands;

use App\Jobs\CheckHeartbeat;
use App\Models\Game;
use App\Models\Heartbeat;
use App\Models\HeartbeatReport;
use Illuminate\Bus\Batch;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Bus;
use Spatie\DiscordAlerts\Facades\DiscordAlert;

class CheckHeartbeats extends Command
{
    protected $signature = 'anodyne:check-heartbeats';

    protected $description = 'Run the heartbeat check on any included, non-inactive Nova game';

    public function handle()
    {
        // TODO: when Nova 3 is released, we will need to split this into 2 batches for different major release series

        $games = Game::query()
            ->isIncluded()
            ->isActive()
            ->whereRelation('release', 'has_heartbeat_endpoint', '=', true)
            ->get();

        $jobs = $games->mapInto(CheckHeartbeat::class);

        Bus::batch($jobs->all())
            ->allowFailures()
            ->finally(function (Batch $batch) {
                $report = HeartbeatReport::createDailyReport(
                    attempted: $batch->totalJobs,
                    successful: Heartbeat::today()->count(),
                );

                DiscordAlert::to('alerts')
                    ->message('Heartbeat checks completed', [
                        [
                            'title' => 'Nova heartbeat checks completed for '.now()->format('l F jS, Y'),
                            'color' => '#10b981',
                            'fields' => [
                                ['name' => 'Expected', 'value' => $report->attempted, 'inline' => true],
                                ['name' => 'Actual', 'value' => $report->successful, 'inline' => true],
                                ['name' => 'Unreachable', 'value' => $report->unreachable, 'inline' => true],
                            ],
                        ],
                    ]);
            })->name('Check heartbeats - '.now()->format('m/d/Y'))->dispatch();

        $this->info('Heartbeat checks have been dispatched');

        return Command::SUCCESS;
    }
}
