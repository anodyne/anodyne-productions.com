<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SponsorshipTierResource\RelationManagers\SponsorsRelationManager;
use App\Filament\Resources\SponsorTierResource\Pages;
use App\Models\SponsorTier;
use Filament\Infolists\Components\Section;
use Filament\Infolists\Components\TextEntry;
use Filament\Infolists\Infolist;
use Filament\Notifications\Notification;
use Filament\Resources\Resource;
use Filament\Tables\Actions\Action;
use Filament\Tables\Actions\ViewAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Auth;

class SponsorTierResource extends Resource
{
    protected static ?string $model = SponsorTier::class;

    protected static ?string $modelLabel = 'Tiers';

    protected static ?string $navigationIcon = 'flex-bill-dollar';

    protected static ?string $navigationGroup = 'Sponsorships';

    protected static ?int $navigationSort = 10;

    public static function infolist(Infolist $infolist): Infolist
    {
        return $infolist->schema([
            Section::make()->schema([
                TextEntry::make('name'),
                TextEntry::make('external_id')->label('Patreon ID'),
                TextEntry::make('description')->html(),
            ]),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')
                    ->size('lg')
                    ->weight('bold')
                    ->searchable(),
                TextColumn::make('sponsors_count')
                    ->counts('sponsors')
                    ->label('# of sponsors'),
            ])
            ->actions([
                ViewAction::make()
                    ->icon('flex-eye')
                    ->size('md')
                    ->iconButton()
                    ->color('gray'),
            ])
            ->headerActions([
                Action::make('refreshTiers')
                    ->label('Refresh sponsorship tiers')
                    ->color('gray')
                    ->action(function () {
                        Artisan::call('anodyne:fetch-sponsorship-tiers');

                        Notification::make()->success()->title('Sponsorship tiers refreshed');
                    })
                    ->visible(Auth::user()->is_admin),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            SponsorsRelationManager::class,
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
