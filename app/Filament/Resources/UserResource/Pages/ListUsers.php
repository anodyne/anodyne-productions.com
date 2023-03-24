<?php

namespace App\Filament\Resources\UserResource\Pages;

use App\Filament\Resources\UserResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;
use Filament\Tables;

class ListUsers extends ListRecords
{
    protected static string $resource = UserResource::class;

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
                ->label('New user')
                ->url(route('filament.resources.users.create'))
                ->button()
                ->size('md'),
        ];
    }

    protected function getTableEmptyStateHeading(): ?string
    {
        return 'No users found';
    }

    protected function getTableEmptyStateDescription(): ?string
    {
        return 'Add a user to give them access to the site.';
    }

    protected function getTableEmptyStateIcon(): ?string
    {
        return 'uxl-international-network';
    }
}
