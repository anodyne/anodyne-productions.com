<?php

namespace App\Filament\Resources\ExternalContentResource\Pages;

use App\Filament\Resources\ExternalContentResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListExternalContents extends ListRecords
{
    protected static string $resource = ExternalContentResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
