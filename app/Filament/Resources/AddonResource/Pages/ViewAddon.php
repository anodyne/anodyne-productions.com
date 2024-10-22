<?php

namespace App\Filament\Resources\AddonResource\Pages;

use App\Filament\Resources\AddonResource;
use App\Filament\Resources\AddonResource\Widgets\AddonDownloads;
use App\Filament\Resources\AddonResource\Widgets\AddonRating;
use Filament\Resources\Pages\ViewRecord;

class ViewAddon extends ViewRecord
{
    protected static string $resource = AddonResource::class;

    public function hasCombinedRelationManagerTabsWithContent(): bool
    {
        return true;
    }

    protected function getHeaderWidgets(): array
    {
        return [
            AddonDownloads::class,
            AddonRating::class,
        ];
    }
}
