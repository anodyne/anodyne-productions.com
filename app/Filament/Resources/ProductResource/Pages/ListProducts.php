<?php

namespace App\Filament\Resources\ProductResource\Pages;

use App\Filament\Resources\ProductResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListProducts extends ListRecords
{
    protected static string $resource = ProductResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
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
