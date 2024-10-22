<?php

namespace App\Filament\Resources\GameResource\Widgets;

use App\Models\Game;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use Flowframe\Trend\Trend;
use Flowframe\Trend\TrendValue;
use Illuminate\Support\Number;

class AllGamesOverview extends BaseWidget
{
    protected static ?string $pollingInterval = null;

    protected function getCards(): array
    {
        $activityThisMonth = Trend::model(Game::class)
            ->between(
                start: now()->startOfMonth(),
                end: now()->endOfMonth()
            )
            ->perDay()
            ->count()
            ->filter(fn (TrendValue $value) => $value->aggregate > 0);

        return [
            Stat::make(
                'Total installs (all time)',
                Number::format(Game::isIncluded()->count())
            ),

            Stat::make(
                'Fresh installs this month',
                Number::format(
                    Game::query()
                        ->isIncluded()
                        ->whereColumn('created_at', 'updated_at')
                        ->where('created_at', '>=', now()->startOfMonth())
                        ->count()
                )
            )
                ->chart($activityThisMonth->map(fn (TrendValue $value) => $value->aggregate)->all())
                ->chartColor('primary'),

            Stat::make(
                'Updates this month',
                Number::format(
                    Game::query()
                        ->isIncluded()
                        ->whereColumn('created_at', '!=', 'updated_at')
                        ->where('updated_at', '>=', now()->startOfMonth())
                        ->count()
                )
            )
                ->chart($activityThisMonth->map(fn (TrendValue $value) => $value->aggregate)->all())
                ->chartColor('primary'),
        ];
    }
}
