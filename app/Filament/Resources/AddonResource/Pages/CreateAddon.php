<?php

namespace App\Filament\Resources\AddonResource\Pages;

use App\Filament\Resources\AddonResource;
use Filament\Forms\Components\Group;
use Filament\Forms\Components\Section;
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
            Step::make('Details')
                ->description('Provide some basic details about your add-on')
                ->schema([
                    Section::make(AddonResource::getFormSchema())
                        ->columns(1)
                        ->columnSpanFull(),
                    Section::make(AddonResource::getFormSchema('links'))
                        ->columns(3)
                        ->columnSpanFull(),
                    Section::make(AddonResource::getFormSchema('previews'))
                        ->columns(1)
                        ->columnSpanFull(),
                ]),

            Step::make('Files')
                ->description("Upload your add-on's files")
                ->schema([
                    Group::make(AddonResource::getFormSchema('versions'))
                        ->columns(1)
                        ->columnSpanFull(),
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
