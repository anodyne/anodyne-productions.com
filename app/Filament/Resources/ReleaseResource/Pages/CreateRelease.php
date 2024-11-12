<?php

namespace App\Filament\Resources\ReleaseResource\Pages;

use App\Filament\Resources\ReleaseResource;
use Filament\Resources\Pages\CreateRecord;

class CreateRelease extends CreateRecord
{
    protected static string $resource = ReleaseResource::class;

    protected function getCreatedNotificationMessage(): ?string
    {
        return 'Release created';
    }
}
