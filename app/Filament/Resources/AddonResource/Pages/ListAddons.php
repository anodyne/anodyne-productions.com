<?php

namespace App\Filament\Resources\AddonResource\Pages;

use App\Filament\Resources\AddonResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;
use Filament\Tables;

class ListAddons extends ListRecords
{
    protected static string $resource = AddonResource::class;

    protected static ?string $title = 'Add-Ons';

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
                ->label('New add-on')
                ->url(route('filament.resources.addons.create'))
                ->button()
                ->size('md'),
        ];
    }

    protected function getTableEmptyStateHeading(): ?string
    {
        return 'No add-ons found';
    }

    protected function getTableEmptyStateDescription(): ?string
    {
        return 'Create your first add-on to share it with the community.';
    }

    protected function getTableEmptyStateIcon(): ?string
    {
        return 'uxl-plugin-sharing';
    }
}
