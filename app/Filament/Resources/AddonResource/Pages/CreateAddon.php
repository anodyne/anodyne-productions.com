<?php

namespace App\Filament\Resources\AddonResource\Pages;

use App\Filament\Resources\AddonResource;
use Filament\Forms;
use Filament\Forms\Components\Card;
use Filament\Forms\Components\Wizard\Step;
use Filament\Resources\Pages\CreateRecord;
use Filament\Resources\Pages\CreateRecord\Concerns\HasWizard;

class CreateAddon extends CreateRecord
{
    use HasWizard;

    protected static string $resource = AddonResource::class;

    protected static ?string $title = 'Create Add-on';

    protected function getSteps(): array
    {
        return [
            Step::make('Add-on details')
                ->description('Provide some basic details about your add-on')
                ->schema([
                    Card::make(AddonResource::getFormSchema())
                        ->columns(1)
                        ->columnSpan('full'),

                    Card::make(AddonResource::getFormSchema('previews'))
                        ->columns(1)
                        ->columnSpan('full'),
                ]),

            Step::make('Add-on files')
                ->description("Upload your add-on's files")
                ->schema([
                    Forms\Components\Group::make(AddonResource::getFormSchema('versions'))
                        ->columns(1)
                        ->columnSpan('full'),
                ]),
        ];
    }

    protected function getCreatedNotificationMessage(): ?string
    {
        return 'Add-on created';
    }

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $data['user_id'] = auth()->id();

        return $data;
    }
}
