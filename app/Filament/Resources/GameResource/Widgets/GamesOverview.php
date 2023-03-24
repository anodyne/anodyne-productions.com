<?php

namespace App\Filament\Resources\GameResource\Widgets;

use App\Models\Game;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Card;
use Flowframe\Trend\Trend;
use Flowframe\Trend\TrendValue;

class GamesOverview extends BaseWidget
{
    protected static ?string $pollingInterval = null;

    protected function getCards(): array
    {
        $activityThisMonth = Trend::model(Game::class)
            ->between(
                start: now()->startOfMonth(),
                end: now()->endOfDay()
            )
            ->perDay()
            ->count();

        return [
            Card::make(
                'Total installs (all time)',
                number_format(Game::count())
            ),

            Card::make(
                'Fresh installs this month',
                Game::whereColumn('created_at', 'updated_at')->where('created_at', '>=', now()->startOfMonth())->count()
            )
                ->chart($activityThisMonth->map(fn (TrendValue $value) => $value->aggregate)->all())
                ->chartColor('primary'),

            Card::make(
                'Updates this month',
                Game::whereColumn('created_at', '!=', 'updated_at')->where('updated_at', '>=', now()->startOfMonth())->count()
            )
                ->chart($activityThisMonth->map(fn (TrendValue $value) => $value->aggregate)->all())
                ->chartColor('primary'),
        ];
    }
}
