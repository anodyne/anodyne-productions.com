<?php

namespace App\Filament\Resources\GameResource\Widgets;

use App\Models\Game;
use Filament\Widgets\ChartWidget;

class AllGamesGenresChart extends ChartWidget
{
    protected static ?string $heading = 'Installed genres';

    protected static ?string $pollingInterval = null;

    protected function getType(): string
    {
        return 'bar';
    }

    protected function getData(): array
    {
        $data = Game::query()
            ->isIncluded()
            ->isNotInactive()
            ->orderBy('genre', 'asc')
            ->selectRaw('genre, count(*) as total')
            ->groupBy('genre')
            ->get();

        return [
            'datasets' => [
                [
                    'label' => 'Genres',
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
            'labels' => $data->map(fn (Game $game) => $game->genre->getLabel()),
        ];
    }
}
