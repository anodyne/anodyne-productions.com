<?php

namespace App\Console\Commands;

use App\Jobs\CheckHeartbeat;
use App\Models\Game;
use Illuminate\Bus\Batch;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Bus;
use Spatie\DiscordAlerts\Facades\DiscordAlert;
use Throwable;

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
            ->before(function (Batch $batch) {
                // The batch has been created but no jobs have been added...
            })->progress(function (Batch $batch) {
                // A single job has completed successfully...
            })->then(function (Batch $batch) {
                // All jobs completed successfully...
            })->catch(function (Batch $batch, Throwable $e) {
                // First batch job failure detected...
            })->finally(function (Batch $batch) {
                DiscordAlert::to('alerts')
                    ->message('Heartbeat checks on inactive games completed', [
                        [
                            'title' => 'Nova heartbeat checks for inactive games completed on '.now()->format('l F jS, Y'),
                            'color' => '#fbbf24',
                            'fields' => [
                                ['name' => 'Inactive games', 'value' => $batch->totalJobs, 'inline' => true],
                            ],
                        ],
                    ]);
            })->name('Check heartbeats for inactive games '.now()->format('m/d/Y'))->dispatch();

        $this->info('Heartbeat checks for inactive games have been dispatched');

        return Command::SUCCESS;
    }
}
