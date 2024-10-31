<?php

namespace App\Filament\Resources\ExternalContentResource\Pages;

use App\Filament\Resources\ExternalContentResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewExternalContent extends ViewRecord
{
    protected static string $resource = ExternalContentResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
