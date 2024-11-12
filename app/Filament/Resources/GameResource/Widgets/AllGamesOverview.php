<?php

namespace App\Filament\Resources\GameResource\Widgets;

use App\Models\Game;
use Filament\Support\Enums\IconPosition;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use Illuminate\Support\Number;

class AllGamesOverview extends BaseWidget
{
    protected static ?string $pollingInterval = null;

    protected function getCards(): array
    {
        $installsThisMonth = Game::query()
            ->isIncluded()
            ->isActive()
            ->where('nova_installed_at', '>=', now()->startOfMonth())
            ->count();

        $installsLastMonth = Game::query()
            ->isIncluded()
            ->isActive()
            ->where('nova_installed_at', '>=', now()->subMonth()->startOfMonth())
            ->where('nova_installed_at', '<', now()->startOfMonth())
            ->count();

        $installsDiff = $installsThisMonth - $installsLastMonth;

        $updatesThisMonth = Game::query()
            ->isIncluded()
            ->isActive()
            ->whereColumn('nova_installed_at', '!=', 'nova_updated_at')
            ->where('nova_updated_at', '>=', now()->startOfMonth())
            ->count();

        $updatesLastMonth = Game::query()
            ->isIncluded()
            ->isActive()
            ->whereColumn('nova_installed_at', '!=', 'nova_updated_at')
            ->where('nova_updated_at', '>=', now()->subMonth()->startOfMonth())
            ->where('nova_updated_at', '<', now()->startOfMonth())
            ->count();

        $updatesDiff = $updatesThisMonth - $updatesLastMonth;

        return [
            Stat::make(
                'Total installs (all time)',
                Number::format(Game::isIncluded()->count())
            ),

            Stat::make('Fresh installs this month', Number::format($installsThisMonth))
                ->description(match (true) {
                    $installsDiff > 0 => Number::format($installsDiff).' more than last month',
                    $installsDiff < 0 => Number::format(abs($installsDiff)).' fewer than last month',
                    default => null
                })
                ->descriptionColor(match (true) {
                    $installsDiff > 0 => 'success',
                    $installsDiff < 0 => 'danger',
                    default => null
                })
                ->descriptionIcon(
                    icon: match (true) {
                        $installsDiff > 0 => 'heroicon-o-arrow-trending-up',
                        $installsDiff < 0 => 'heroicon-o-arrow-trending-down',
                        default => null
                    },
                    position: IconPosition::After
                ),

            Stat::make('Updates this month', Number::format($updatesThisMonth))
                ->description(match (true) {
                    $updatesDiff > 0 => Number::format($updatesDiff).' more than last month',
                    $updatesDiff < 0 => Number::format(abs($updatesDiff)).' fewer than last month',
                    default => null
                })
                ->descriptionColor(match (true) {
                    $updatesDiff > 0 => 'success',
                    $updatesDiff < 0 => 'danger',
                    default => null
                })
                ->descriptionIcon(
                    icon: match (true) {
                        $updatesDiff > 0 => 'heroicon-o-arrow-trending-up',
                        $updatesDiff < 0 => 'heroicon-o-arrow-trending-down',
                        default => null
                    },
                    position: IconPosition::After
                ),
        ];
    }
}
