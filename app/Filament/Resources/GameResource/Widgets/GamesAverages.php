<?php

namespace App\Filament\Resources\GameResource\Widgets;

use App\Models\Game;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use Illuminate\Support\Number;

class GamesAverages extends BaseWidget
{
    protected static ?string $pollingInterval = null;

    protected function getCards(): array
    {
        return [
            Stat::make(
                'Avg. active characters / game',
                Number::format(Game::isIncluded()->average('active_characters'), 0)
            ),

            Stat::make(
                'Avg. story posts / game',
                Number::format(Game::isIncluded()->average('total_posts'), 0)
            ),

            Stat::make(
                'Avg. story post words / game',
                Number::format(Game::isIncluded()->average('total_post_words'), 0)
            ),
        ];
    }
}
