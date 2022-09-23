<?php

namespace App\Filament\Resources\AddonResource\Pages;

use App\Filament\Resources\AddonResource;
use Filament\Forms;
use Filament\Pages\Actions;
use Filament\Pages\Page;
use Filament\Resources\Pages\CreateRecord;

class CreateAddon extends CreateRecord
{
    protected static string $resource = AddonResource::class;

    protected function getFormSchema(): array
    {
        return [
            Forms\Components\Grid::make(4)->schema([
                Forms\Components\TextInput::make('name')
                    ->required()
                    ->columnSpan(2),
                Forms\Components\Select::make('type')
                    ->placeholder('Select a type')
                    ->options([
                        'theme' => 'Skin',
                        'extension' => 'MOD',
                    ])
                    ->hidden(fn () => ! auth()->user()->isUser)
                    ->columnSpan(2),
                Forms\Components\Select::make('type')
                    ->placeholder('Select a type')
                    ->options([
                        'theme' => 'Skin',
                        'extension' => 'MOD',
                        'rank' => 'Rank',
                    ])
                    ->hidden(fn () => auth()->user()->isUser)
                    ->columnSpan(2),
                Forms\Components\RichEditor::make('description')->columnSpan('full'),
                Forms\Components\Toggle::make('published')
                    ->default(false)
                    ->disabled()
                    ->dehydrated(fn (Page $livewire) => $livewire instanceof CreateRecord)
                    ->helperText("Add-ons can only be published after a product and version have been linked. You'll have the option to do both after creating the add-on record.")
                    ->columnSpan(2),
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
