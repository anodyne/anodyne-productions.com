<?php

namespace App\Filament\Resources\AddonResource\Pages;

use App\Filament\Resources\AddonResource;
use Filament\Resources\Pages\ViewRecord;

class ViewAddon extends ViewRecord
{
    protected static string $resource = AddonResource::class;

    public function hasCombinedRelationManagerTabsWithForm(): bool
    {
        return true;
    }

    // protected function getHeaderWidgets(): array
    // {
    //     return [
    //         AddonResource\Widgets\AddonDownloads::class,
    //         AddonResource\Widgets\AddonRating::class,
    //     ];
    // }
}
