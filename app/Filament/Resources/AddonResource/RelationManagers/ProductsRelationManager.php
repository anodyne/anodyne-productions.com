<?php

namespace App\Filament\Resources\AddonResource\RelationManagers;

use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Resources\Table;
use Filament\Tables;

class ProductsRelationManager extends RelationManager
{
    protected static string $relationship = 'products';

    protected static ?string $recordTitleAttribute = 'name';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->required()
                    ->maxLength(255),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name'),
            ])
            ->filters([
                //
            ])
            ->headerActions([
                Tables\Actions\AttachAction::make()
                    ->successNotificationMessage('Product has been associated with your add-on'),
            ])
            ->actions([
                Tables\Actions\DetachAction::make()
                    ->icon('flex-delete-bin')
                    ->size('md')
                    ->iconButton()
                    ->successNotificationMessage('Product association has been removed from your add-on'),
            ])
            ->bulkActions([]);
    }

    protected function getTableEmptyStateHeading(): ?string
    {
        return 'No products found';
    }

    protected function getTableEmptyStateDescription(): ?string
    {
        return 'Add any products your add-on supports.';
    }

    protected function getTableEmptyStateIcon(): ?string
    {
        return 'uxl-app-launch';
    }
}
