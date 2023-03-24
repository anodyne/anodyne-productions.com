<?php

namespace App\Filament\Resources\SponsorTierResource\Pages;

use App\Filament\Resources\SponsorTierResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditSponsorTier extends EditRecord
{
    protected static string $resource = SponsorTierResource::class;

    protected function getActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
        ];
    }
}
