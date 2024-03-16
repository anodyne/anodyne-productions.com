<?php

namespace App\Filament\Resources\GameResource\Widgets;

use App\Models\Game;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Card;
use Illuminate\Support\Number;

class GameStatsOverview extends BaseWidget
{
    protected static ?string $pollingInterval = null;

    protected function getCards(): array
    {
        return [
            Card::make(
                'Total users',
                Number::format(Game::isIncluded()->sum('active_users'))
            ),

            Card::make(
                'Total posts',
                Number::format(Game::isIncluded()->sum('total_posts'))
            ),

            Card::make(
                'Total words',
                Number::format(Game::isIncluded()->sum('total_post_words'))
            ),
        ];
    }
}
