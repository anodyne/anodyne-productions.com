<?php

namespace App\Filament\Resources\GameResource\Pages;

use App\Filament\Resources\GameResource;
use App\Filament\Resources\GameResource\Widgets\AllGamesGenresChart;
use App\Filament\Resources\GameResource\Widgets\AllGamesOverview;
use App\Filament\Resources\GameResource\Widgets\AllGamesVersionsChart;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListGames extends ListRecords
{
    protected static string $resource = GameResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }

    protected function getHeaderWidgets(): array
    {
        return [
            AllGamesOverview::class,
        ];
    }

    protected function getFooterWidgets(): array
    {
        return [
            AllGamesGenresChart::class,
            AllGamesVersionsChart::class,
        ];
    }
}
