<?php

namespace App\Filament\Resources\ReleaseResource\Pages;

use App\Filament\Resources\ReleaseResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewRelease extends ViewRecord
{
    protected static string $resource = ReleaseResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
