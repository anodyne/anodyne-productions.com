<?php

namespace App\Filament\Resources\ReleaseSeriesResource\Pages;

use App\Filament\Resources\ReleaseSeriesResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewReleaseSeries extends ViewRecord
{
    protected static string $resource = ReleaseSeriesResource::class;

    protected function getActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
