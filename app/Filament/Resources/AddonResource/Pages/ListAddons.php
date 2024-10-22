<?php

namespace App\Filament\Resources\AddonResource\Pages;

use App\Filament\Resources\AddonResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListAddons extends ListRecords
{
    protected static string $resource = AddonResource::class;

    protected static ?string $title = 'Add-Ons';

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
