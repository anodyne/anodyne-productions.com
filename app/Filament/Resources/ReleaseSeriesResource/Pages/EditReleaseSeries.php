<?php

namespace App\Filament\Resources\ReleaseSeriesResource\Pages;

use App\Filament\Resources\ReleaseSeriesResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditReleaseSeries extends EditRecord
{
    protected static string $resource = ReleaseSeriesResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
