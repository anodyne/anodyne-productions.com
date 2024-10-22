<?php

namespace App\Filament\Resources\GameResource\Widgets;

use App\Models\Game;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use Illuminate\Support\Number;

class GamesStats extends BaseWidget
{
    protected static ?string $pollingInterval = null;

    protected function getCards(): array
    {
        return [
            Stat::make(
                'Total active primary characters',
                Number::format(
                    Game::isIncluded()->sum('active_primary_characters')
                )
            ),

            Stat::make(
                'Total active secondary characters',
                Number::format(
                    Game::isIncluded()->sum('active_secondary_characters')
                )
            ),

            Stat::make(
                'Total active support characters',
                Number::format(
                    Game::isIncluded()->sum('active_support_characters')
                )
            ),

            Stat::make(
                'Total active users',
                Number::format(Game::isIncluded()->sum('active_users'))
            ),

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
