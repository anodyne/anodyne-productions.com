<?php

namespace App\Filament\Resources\SponsorResource\Pages;

use App\Filament\Resources\SponsorResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;
use Filament\Tables;

class ListSponsors extends ListRecords
{
    protected static string $resource = SponsorResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }

    protected function getTableEmptyStateActions(): array
    {
        return [
            Tables\Actions\Action::make('create')
                ->label('New sponsor')
                ->url(route('filament.resources.sponsors.create'))
                ->button()
                ->size('md'),
        ];
    }

    protected function getTableEmptyStateHeading(): ?string
    {
        return 'No sponsors found';
    }

    protected function getTableEmptyStateDescription(): ?string
    {
        return 'Add a sponsor to share it on the website.';
    }

    protected function getTableEmptyStateIcon(): ?string
    {
        return 'uxl-contract-deal';
    }
}
