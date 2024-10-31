<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ReleaseSeriesResource\Pages;
use App\Filament\Resources\ReleaseSeriesResource\RelationManagers\ReleasesRelationManager;
use App\Models\ReleaseSeries;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables\Actions\DeleteAction;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Actions\ViewAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ToggleColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;

class ReleaseSeriesResource extends Resource
{
    protected static ?string $model = ReleaseSeries::class;

    protected static ?string $navigationIcon = 'flex-layers';

    protected static bool $isGloballySearchable = false;

    protected static ?string $navigationGroup = 'Nova';

    protected static ?int $navigationSort = 40;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('name')->required()->columnSpanFull(),
                Toggle::make('include_in_compatibility'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->modifyQueryUsing(fn (Builder $query): Builder => $query->ordered())
            ->reorderable('order_column')
            ->columns([
                TextColumn::make('name')
                    ->size('lg')
                    ->weight('bold')
                    ->alignLeft()
                    ->searchable(),
                TextColumn::make('releases_count')
                    ->counts('releases')
                    ->alignLeft()
                    ->label('# of releases'),
                ToggleColumn::make('include_in_compatibility'),
            ])
            ->actions([
                ViewAction::make()
                    ->icon('flex-eye')
                    ->size('md')
                    ->iconButton()
                    ->color('gray'),
                EditAction::make()
                    ->icon('flex-edit-circle')
                    ->size('md')
                    ->iconButton()
                    ->color('gray')
                    ->successNotificationTitle('Release series updated'),
                DeleteAction::make()
                    ->icon('flex-delete-bin')
                    ->size('md')
                    ->iconButton()
                    ->successNotificationTitle('Release series deleted'),
            ]);
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
