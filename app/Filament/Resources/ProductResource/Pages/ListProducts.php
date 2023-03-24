<?php

namespace App\Filament\Resources\ProductResource\Pages;

use App\Filament\Resources\ProductResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;
use Filament\Tables;

class ListProducts extends ListRecords
{
    protected static string $resource = ProductResource::class;

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
                ->label('New product')
                ->url(route('filament.resources.products.create'))
                ->button()
                ->size('md'),
        ];
    }

    protected function getTableEmptyStateHeading(): ?string
    {
        return 'No products found';
    }

    protected function getTableEmptyStateDescription(): ?string
    {
        return 'Create a product for users to interact with.';
    }

    protected function getTableEmptyStateIcon(): ?string
    {
        return 'uxl-app-launch';
    }
}
