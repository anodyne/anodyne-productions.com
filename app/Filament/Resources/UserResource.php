<?php

namespace App\Filament\Resources;

use App\Filament\Resources\UserResource\Pages;
use App\Filament\Resources\UserResource\RelationManagers;
use Domain\Users\Models\User;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class UserResource extends Resource
{
    protected static ?string $model = User::class;

    protected static bool $isGloballySearchable = false;

    protected static ?string $navigationIcon = 'flex-user-multiple';

    protected static ?string $navigationGroup = 'System';

    protected static ?int $navigationSort = 10;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Grid::make(4)->schema([
                    Forms\Components\TextInput::make('name')
                        ->required()
                        ->columnSpan(2),
                    Forms\Components\TextInput::make('email')
                        ->required()
                        ->columnSpan(2),
                    Forms\Components\Select::make('role')
                        ->required()
                        ->options([
                            'user' => 'User',
                            'staff' => 'Staff Member',
                            'admin' => 'Admin',
                        ])
                        ->visible(fn () => auth()->user()->isAdmin)
                        ->columnSpan(2),
                    Forms\Components\Toggle::make('is_exchange_author')
                        ->label('Exchange author')
                        ->helperText('Can this user create add-ons in Exchange?')
                        ->columnSpan('full'),
                ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')->searchable(),
                Tables\Columns\TextColumn::make('email')->searchable(),
                Tables\Columns\BadgeColumn::make('role')
                    ->enum([
                        'admin' => 'Admin',
                        'staff' => 'Staff',
                        'user' => 'User',
                    ])
                    ->colors([
                        'bg-amber-100 dark:bg-amber-900 text-amber-700 dark:text-amber-400' => 'admin',
                        'bg-purple-100 dark:bg-purple-900 text-purple-700 dark:text-purple-400' => 'staff',
                        'bg-gray-100 dark:bg-gray-900 text-gray-700 dark:text-gray-400' => 'user',
                    ]),
                Tables\Columns\BooleanColumn::make('is_exchange_author')
                    ->label('Exchange Author')
                    ->trueIcon('flex-check-square')
                    ->falseIcon('flex-delete-square'),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('role')
                    ->options([
                        'admin' => 'Admin',
                        'staff' => 'Staff',
                        'user' => 'User',
                    ]),
                Tables\Filters\TernaryFilter::make('is_exchange_author')->label('Is Exchange Author'),
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
            'index' => Pages\ListUsers::route('/'),
            'create' => Pages\CreateUser::route('/create'),
            'view' => Pages\ViewUser::route('/{record}'),
            'edit' => Pages\EditUser::route('/{record}/edit'),
        ];
    }
}
