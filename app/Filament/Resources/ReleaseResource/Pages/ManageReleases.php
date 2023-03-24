<?php

namespace App\Filament\Resources\ReleaseResource\Pages;

use App\Filament\Resources\ReleaseResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ManageRecords;

class ManageReleases extends ManageRecords
{
    protected static string $resource = ReleaseResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make()->successNotificationTitle('Release created'),
        ];
    }
}
