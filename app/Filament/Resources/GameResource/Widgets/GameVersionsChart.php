<?php

namespace App\Filament\Resources\GameResource\Widgets;

use App\Models\Game;
use Filament\Widgets\DoughnutChartWidget;

class GameVersionsChart extends DoughnutChartWidget
{
    protected static ?string $heading = 'Installed versions';

    protected static ?string $pollingInterval = null;

    protected function getData(): array
    {
        $data = Game::with('release')
            ->orderBy('release_id', 'asc')
            ->selectRaw('release_id, count(*) as total')
            ->groupBy('release_id')
            ->get();

        return [
            'datasets' => [
                [
                    'label' => 'Versions',
                    'data' => $data->map(fn (Game $game) => $game->total),
                    'backgroundColor' => [
                        '#0ea5e9',
                        '#a855f7',
                        '#10b981',
                        '#facc15',
                        '#f97316',
                        '#f472b6',
                        '#f43f5e',
                        '#64748b',
                    ],
                    'borderWidth' => 0,
                    'cutout' => '65%',
                    'spacing' => 15,
                ],
            ],
            'labels' => $data->map(fn (Game $game) => $game->release->version),
        ];
    }
}
