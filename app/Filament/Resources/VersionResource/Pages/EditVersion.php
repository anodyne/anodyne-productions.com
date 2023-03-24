<?php

namespace App\Filament\Resources\VersionResource\Pages;

use App\Filament\Resources\VersionResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditVersion extends EditRecord
{
    protected static string $resource = VersionResource::class;

    protected function getActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
        ];
    }
}
