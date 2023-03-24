<?php

namespace App\Filament\Resources\ReleaseSeriesResource\Pages;

use App\Filament\Resources\ReleaseSeriesResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListReleaseSeries extends ListRecords
{
    protected static string $resource = ReleaseSeriesResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }

    protected function getTableEmptyStateHeading(): ?string
    {
        return 'No release series found';
    }

    protected function getTableEmptyStateDescription(): ?string
    {
        return 'Add a release series to track releases and compatibility for add-ons.';
    }

    protected function getTableEmptyStateIcon(): ?string
    {
        return 'uxl-app-module';
    }
}
