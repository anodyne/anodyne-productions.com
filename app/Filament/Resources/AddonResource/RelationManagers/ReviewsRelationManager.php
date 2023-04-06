<?php

namespace App\Filament\Resources\AddonResource\RelationManagers;

use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Model;

class ReviewsRelationManager extends RelationManager
{
    protected static string $relationship = 'reviews';

    protected static ?string $modelLabel = 'review';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('user_id')
                    ->label('User')
                    ->formatStateUsing(fn (Model $record) => $record->user->name)
                    ->columnSpan(1),
                Forms\Components\TextInput::make('rating')->columnSpan(1),
                Forms\Components\Textarea::make('content')->columnSpanFull(),
            ])
            ->columns(2);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('user.name'),
                Tables\Columns\TextColumn::make('rating')
                    ->icon('heroicon-s-star')
                    ->iconPosition('after'),
            ])
            ->filters([
                //
            ])
            ->headerActions([])
            ->actions([
                Tables\Actions\ViewAction::make()
                    ->icon('flex-eye')
                    ->size('md')
                    ->iconButton()
                    ->color('secondary'),
                Tables\Actions\DeleteAction::make()
                    ->icon('flex-delete-bin')
                    ->size('md')
                    ->iconButton(),
            ])
            ->bulkActions([]);
    }

    protected function getTableEmptyStateHeading(): ?string
    {
        return 'No reviews found';
    }

    protected function getTableEmptyStateIcon(): ?string
    {
        return 'uxl-rating-click';
    }
}
