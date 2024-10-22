<?php

namespace App\Filament\Resources\AddonResource\RelationManagers;

use App\Models\Review;
use Filament\Infolists\Components\TextEntry;
use Filament\Infolists\Components\TextEntry\TextEntrySize;
use Filament\Infolists\Infolist;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Support\Enums\FontWeight;
use Filament\Tables\Actions\DeleteAction;
use Filament\Tables\Actions\ViewAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Model;
use Mokhosh\FilamentRating\Columns\RatingColumn;
use Mokhosh\FilamentRating\Entries\RatingEntry;

class ReviewsRelationManager extends RelationManager
{
    protected static string $relationship = 'reviews';

    protected static ?string $modelLabel = 'review';

    public function infolist(Infolist $infolist): Infolist
    {
        return $infolist->schema([
            TextEntry::make('user_id')
                ->label('')
                ->size(TextEntrySize::Large)
                ->weight(FontWeight::SemiBold)
                ->formatStateUsing(fn (Review $record): ?string => $record->user->name),
            RatingEntry::make('rating')
                ->label('Rating'),
            TextEntry::make('content')
                ->label('')
                ->size(TextEntrySize::Large),
        ])->columns(1);
    }

    public function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('user.name'),
                RatingColumn::make('rating')->color('primary'),
            ])
            ->actions([
                ViewAction::make()->iconButton(),
                DeleteAction::make()->iconButton(),
            ])
            ->emptyStateHeading('No reviews found')
            ->emptyStateDescription(null)
            ->emptyStateIcon('uxl-rating-click');
    }

    public static function getBadge(Model $ownerRecord, string $pageClass): ?string
    {
        $count = $ownerRecord->reviews()->count();

        return $count > 0 ? $count : null;
    }
}
