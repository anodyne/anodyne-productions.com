<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProductResource\Pages;
use App\Models\Product;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;

class ProductResource extends Resource
{
    protected static ?string $model = Product::class;

    protected static bool $isGloballySearchable = false;

    protected static ?string $navigationIcon = 'flex-shipping-box';

    protected static ?string $navigationGroup = 'System';

    protected static ?int $navigationSort = 0;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Card::make([
                    Forms\Components\TextInput::make('name')->required()->columnSpan(1),
                    Forms\Components\RichEditor::make('description')->columnSpan('full'),
                    Forms\Components\Toggle::make('published'),
                ])
                ->columns(2)
                ->columnSpanFull(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->size('lg')
                    ->weight('bold'),
                Tables\Columns\TextColumn::make('addons_count')
                    ->counts('addons')
                    ->label('# of add-ons'),
                Tables\Columns\TextColumn::make('versions_count')
                    ->counts('versions')
                    ->label('# of versions'),
                Tables\Columns\ToggleColumn::make('published'),
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
                    ->iconButton(),
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
            'index' => Pages\ListProducts::route('/'),
            'create' => Pages\CreateProduct::route('/create'),
            'view' => Pages\ViewProduct::route('/{record}'),
            'edit' => Pages\EditProduct::route('/{record}/edit'),
        ];
    }
}
