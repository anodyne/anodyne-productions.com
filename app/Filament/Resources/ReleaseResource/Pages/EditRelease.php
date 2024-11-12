<?php

namespace App\Filament\Resources\ReleaseResource\Pages;

use App\Filament\Resources\ReleaseResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditRelease extends EditRecord
{
    protected static string $resource = ReleaseResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
        ];
    }

    protected function getSavedNotificationMessage(): ?string
    {
        return 'Release updated';
    }

    protected function getDeletedNotificationMessage(): ?string
    {
        return 'Release deleted';
    }
}
