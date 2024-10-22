<?php

namespace App\Filament\Resources\SponsorTierResource\Pages;

use App\Filament\Resources\SponsorTierResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewSponsorTier extends ViewRecord
{
    protected static string $resource = SponsorTierResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
