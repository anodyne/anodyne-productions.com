<?php

namespace App\Filament\Widgets;

use App\Models\Game;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use Illuminate\Support\Number;

class AllGamesStats extends BaseWidget
{
    protected static ?string $pollingInterval = null;

    protected function getStats(): array
    {
        return [
            Stat::make(
                'Total story posts',
                Number::format(Game::isIncluded()->sum('total_posts'))
            ),

            Stat::make(
                'Total story post words',
                Number::format(Game::isIncluded()->sum('total_post_words'))
            ),
        ];
    }
}
