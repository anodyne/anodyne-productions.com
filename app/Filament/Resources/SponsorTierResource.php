<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SponsorTierResource\Pages;
use App\Models\SponsorTier;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;

class SponsorTierResource extends Resource
{
    protected static ?string $model = SponsorTier::class;

    protected static ?string $modelLabel = 'Tiers';

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    protected static ?string $navigationGroup = 'Sponsorships';

    protected static ?int $navigationSort = 10;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->size('lg')
                    ->weight('bold')
                    ->searchable(),
                Tables\Columns\TextColumn::make('sponsors_count')
                    ->counts('sponsors')
                    ->label('# of sponsors'),
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
                    ->color('secondary'),
                Tables\Actions\DeleteAction::make()
                    ->icon('flex-delete-bin')
                    ->size('md')
                    ->iconButton()
                    ->successNotificationTitle('Sponsor deleted'),
            ])
            ->bulkActions([]);
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
            'index' => Pages\ListSponsorTiers::route('/'),
            'create' => Pages\CreateSponsorTier::route('/create'),
            'view' => Pages\ViewSponsorTier::route('/{record}'),
            'edit' => Pages\EditSponsorTier::route('/{record}/edit'),
        ];
    }
}
