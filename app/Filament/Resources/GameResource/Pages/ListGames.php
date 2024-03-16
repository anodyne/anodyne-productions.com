<?php

namespace App\Filament\Resources\GameResource\Pages;

use App\Filament\Resources\GameResource;
use App\Filament\Resources\GameResource\Widgets\GameGenresChart;
use App\Filament\Resources\GameResource\Widgets\GamesOverview;
use App\Filament\Resources\GameResource\Widgets\GameStatsOverview;
use App\Filament\Resources\GameResource\Widgets\GameVersionsChart;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListGames extends ListRecords
{
    protected static string $resource = GameResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }

    protected function getHeaderWidgets(): array
    {
        return [
            GamesOverview::class,
            GameStatsOverview::class,
        ];
    }

    protected function getFooterWidgets(): array
    {
        return [
            GameGenresChart::class,
            GameVersionsChart::class,
        ];
    }
}
