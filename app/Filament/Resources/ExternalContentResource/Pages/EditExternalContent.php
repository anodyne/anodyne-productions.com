<?php

namespace App\Filament\Resources\ExternalContentResource\Pages;

use App\Filament\Resources\ExternalContentResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditExternalContent extends EditRecord
{
    protected static string $resource = ExternalContentResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
        ];
    }
}
