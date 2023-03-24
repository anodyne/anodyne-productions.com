<?php

namespace App\Filament\Resources\ReleaseSeriesResource\RelationManagers;

use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Resources\Table;
use Filament\Tables;

class ReleasesRelationManager extends RelationManager
{
    protected static string $relationship = 'releases';

    protected static ?string $recordTitleAttribute = 'version';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('version')
                    ->required()
                    ->maxLength(255),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('version'),
            ])
            ->filters([
                //
            ])
            ->headerActions([
                Tables\Actions\AssociateAction::make(),
            ])
            ->actions([
                Tables\Actions\DissociateAction::make()
                    ->icon('flex-delete-bin')
                    ->size('md')
                    ->iconButton()
                    ->successNotificationTitle('Release removed from series'),
            ])
            ->bulkActions([]);
    }
}
