<?php

namespace App\Filament\Resources\AddonResource\Pages;

use App\Filament\Resources\AddonResource;
use App\Filament\Resources\AddonResource\Widgets\AddonDownloads;
use App\Filament\Resources\AddonResource\Widgets\AddonRating;
use Filament\Actions\DeleteAction;
use Filament\Actions\ForceDeleteAction;
use Filament\Actions\RestoreAction;
use Filament\Resources\Pages\EditRecord;

class EditAddon extends EditRecord
{
    protected static string $resource = AddonResource::class;

    public function hasCombinedRelationManagerTabsWithContent(): bool
    {
        return true;
    }

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
            ForceDeleteAction::make(),
            RestoreAction::make(),
        ];
    }

    protected function getHeaderWidgets(): array
    {
        return [
            AddonDownloads::class,
            AddonRating::class,
        ];
    }

    protected function getSavedNotificationMessage(): ?string
    {
        return 'Add-on updated';
    }
}
