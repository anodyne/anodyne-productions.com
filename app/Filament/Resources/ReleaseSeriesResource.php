<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ReleaseSeriesResource\Pages;
use App\Filament\Resources\ReleaseSeriesResource\RelationManagers\ReleasesRelationManager;
use App\Models\ReleaseSeries;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;

class ReleaseSeriesResource extends Resource
{
    protected static ?string $model = ReleaseSeries::class;

    protected static ?string $navigationIcon = 'flex-layers';

    protected static bool $isGloballySearchable = false;

    protected static ?string $navigationGroup = 'System';

    protected static ?int $navigationSort = 40;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')->required()->columnSpanFull(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->size('lg')
                    ->weight('bold')
                    ->alignLeft(),
                Tables\Columns\TextColumn::make('releases_count')
                    ->counts('releases')
                    ->alignLeft()
                    ->label('# of releases'),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\ViewAction::make()
                    ->icon('flex-eye')
                    ->size('md')
                    ->iconButton()
                    ->color('secondary'),
                Tables\Actions\EditAction::make()
                    ->icon('flex-edit-circle')
                    ->size('md')
                    ->iconButton()
                    ->color('secondary')
                    ->successNotificationTitle('Release series updated'),
                Tables\Actions\DeleteAction::make()
                    ->icon('flex-delete-bin')
                    ->size('md')
                    ->iconButton()
                    ->successNotificationTitle('Release series deleted'),
            ])
            ->bulkActions([]);
    }

    public static function getRelations(): array
    {
        return [
            ReleasesRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListReleaseSeries::route('/'),
            'create' => Pages\CreateReleaseSeries::route('/create'),
            'view' => Pages\ViewReleaseSeries::route('/{record}'),
            'edit' => Pages\EditReleaseSeries::route('/{record}/edit'),
        ];
    }
}
