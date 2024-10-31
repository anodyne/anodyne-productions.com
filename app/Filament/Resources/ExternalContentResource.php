<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ExternalContentResource\Pages;
use App\Models\ExternalContent;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Form;
use Filament\Infolists\Components\Grid;
use Filament\Infolists\Components\Section as InfolistSection;
use Filament\Infolists\Components\TextEntry;
use Filament\Infolists\Infolist;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ToggleColumn;
use Filament\Tables\Table;
use Illuminate\Support\Facades\Auth;

class ExternalContentResource extends Resource
{
    protected static ?string $model = ExternalContent::class;

    protected static ?string $modelLabel = 'External Content';

    protected static ?string $pluralModelLabel = 'External Content';

    protected static ?string $navigationLabel = 'External Content';

    protected static ?string $navigationIcon = 'flex-sharing-data';

    protected static ?string $navigationGroup = 'Nova';

    protected static ?int $navigationSort = 60;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make()
                    ->columns(2)
                    ->schema([
                        TextInput::make('name')->required(),
                        TextInput::make('key')->required(),
                        Textarea::make('value')->columnSpanFull(),
                        Toggle::make('active')->default(false),
                    ]),
            ]);
    }

    public static function infolist(Infolist $infolist): Infolist
    {
        return $infolist->schema([
            Grid::make(3)->schema([
                Grid::make(1)
                    ->schema([
                        InfolistSection::make()
                            ->columns(2)
                            ->schema([
                                TextEntry::make('name'),
                                TextEntry::make('key')->copyable(),
                                TextEntry::make('value')->columnSpanFull(),
                            ]),
                    ])
                    ->columnSpan(2),
                Grid::make(1)
                    ->schema([
                        InfolistSection::make('Active')
                            ->icon('flex-check-square')
                            ->iconColor('success')
                            ->schema([
                                TextEntry::make('active')
                                    ->hiddenLabel()
                                    ->state('This piece of external content is active and will be synced with any Nova 3 game.'),
                            ])
                            ->visible(fn (ExternalContent $record): bool => $record->active),
                        InfolistSection::make('Inactive')
                            ->icon('flex-delete-square')
                            ->iconColor('danger')
                            ->schema([
                                TextEntry::make('active')
                                    ->hiddenLabel()
                                    ->state('This piece of external content is inactive and will not be synced with any Nova 3 game.'),
                            ])
                            ->hidden(fn (ExternalContent $record): bool => $record->active),
                    ])
                    ->columnSpan(1),
            ]),

        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')
                    ->description(fn (ExternalContent $record): string => $record->key)
                    ->searchable(),
                TextColumn::make('value'),
                ToggleColumn::make('active')->visible(Auth::user()->isAdmin),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->emptyStateHeading('No external content found')
            ->emptyStateDescription('Create external content that will sync with Nova 3 games.')
            ->emptyStateIcon('uxl-package-fly');
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListExternalContents::route('/'),
            'create' => Pages\CreateExternalContent::route('/create'),
            'view' => Pages\ViewExternalContent::route('/{record}'),
            'edit' => Pages\EditExternalContent::route('/{record}/edit'),
        ];
    }
}
