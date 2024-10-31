<?php

namespace App\Console\Commands;

use App\Jobs\RequestExternalContentSync;
use App\Models\Game;
use App\Models\Heartbeat;
use Illuminate\Bus\Batch;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Bus;
use Spatie\DiscordAlerts\Facades\DiscordAlert;

class RequestGameExternalContentSync extends Command
{
    protected $signature = 'anodyne:request-game-external-content-sync';

    protected $description = 'Send a request to every Nova 3 game to sync external content';

    public function handle()
    {
        $games = Game::query()
            ->isIncluded()
            ->isActive()
            ->whereRelation('release.releaseSeries', 'name', 'like', 'Nova 3%')
            ->get();

        $jobs = $games->mapInto(RequestExternalContentSync::class);

        Bus::batch($jobs->all())
            ->allowFailures()
            ->finally(function (Batch $batch) {
                $expectedCount = $batch->totalJobs;
                $actualCount = Heartbeat::today()->count();
                $unreachableCount = $expectedCount - $actualCount;

                DiscordAlert::to('alerts')
                    ->message('External content sync completed', [
                        [
                            'title' => 'External content sync completed - '.now()->format('l F jS, Y'),
                            'color' => '#10b981',
                            'fields' => [
                                ['name' => 'Expected', 'value' => $expectedCount, 'inline' => true],
                                ['name' => 'Actual', 'value' => $actualCount, 'inline' => true],
                                ['name' => 'Unreachable', 'value' => $unreachableCount, 'inline' => true],
                            ],
                        ],
                    ]);
            })->name('External content sync - '.now()->format('m/d/Y'))->dispatch();

        $this->info('Request external content syncs have been dispatched');

        return Command::SUCCESS;
    }
}
