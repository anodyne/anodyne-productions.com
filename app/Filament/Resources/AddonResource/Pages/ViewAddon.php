<?php

namespace App\Filament\Resources\AddonResource\Pages;

use App\Filament\Resources\AddonResource;
use Filament\Forms;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewAddon extends ViewRecord
{
    protected static string $resource = AddonResource::class;

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
                    ->columnSpan(2),
            ]),
        ];
    }
}
