<?php

namespace App\Filament\Resources\AddonResource\Pages;

use App\Filament\Resources\AddonResource;
use Filament\Forms;
use Filament\Pages\Actions;
use Filament\Pages\Page;
use Filament\Resources\Pages\EditRecord;

class EditAddon extends EditRecord
{
    protected static string $resource = AddonResource::class;

    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }

    protected function getHeaderWidgets(): array
    {
        return [
            AddonResource\Widgets\AddonDownloads::class,
            AddonResource\Widgets\AddonRating::class,
        ];
    }

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
                    ->disabled($this->record->products()->count() === 0 || $this->record->versions()->count() === 0)
                    ->helperText("Add-ons can only be published after a product and version have been linked. After adding both, you may have to refresh the page to mark your add-on as published.")
                    ->columnSpan(2),
            ]),
        ];
    }

    protected function getSavedNotificationMessage(): ?string
    {
        return 'Add-on updated';
    }
}
