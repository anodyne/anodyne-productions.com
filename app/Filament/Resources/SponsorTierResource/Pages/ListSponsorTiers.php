<?php

namespace App\Filament\Resources\SponsorTierResource\Pages;

use App\Filament\Resources\SponsorTierResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListSponsorTiers extends ListRecords
{
    protected static string $resource = SponsorTierResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }

    protected function getTableEmptyStateHeading(): ?string
    {
        return 'No sponsorship tiers found';
    }

    protected function getTableEmptyStateDescription(): ?string
    {
        return 'Add a sponsorship tier from Patreon.';
    }

    protected function getTableEmptyStateIcon(): ?string
    {
        return 'uxl-advertise-announce';
    }
}
