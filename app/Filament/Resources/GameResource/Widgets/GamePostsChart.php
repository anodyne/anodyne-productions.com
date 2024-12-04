<?php

namespace App\Filament\Resources\GameResource\Widgets;

use App\Models\Game;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Number;

class GamePostsChart extends BaseWidget
{
    public ?Model $record = null;

    protected static ?string $pollingInterval = null;

    protected ?string $heading = 'Posts per day';

    protected function getCards(): array
    {
        return [
            Stat::make(
                'Average posts / day',
                Number::format($this->game->heartbeats->avg('diff_total_posts'))
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
