<?php

namespace App\Filament\Resources;

use App\Enums\LinkType;
use App\Enums\UserRole;
use App\Filament\Resources\UserResource\Pages;
use App\Models\User;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Form;
use Filament\Forms\Set;
use Filament\Resources\Resource;
use Filament\Tables\Actions\DeleteAction;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Filters\TernaryFilter;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class UserResource extends Resource
{
    protected static ?string $model = User::class;

    protected static ?string $navigationIcon = 'flex-user-multiple';

    protected static ?string $navigationGroup = 'System';

    protected static ?int $navigationSort = 10;

    protected static ?string $recordTitleAttribute = 'name';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make()
                    ->schema([
                        TextInput::make('name')
                            ->required()
                            ->reactive()
                            ->afterStateUpdated(function (?User $record, Set $set, $state) {
                                if (blank($record->username)) {
                                    $set('username', str($state)->slug());
                                }
                            })
                            ->columnSpan(2),
                        TextInput::make('email')
                            ->required()
                            ->columnSpan(2),
                        TextInput::make('username')
                            ->required()
                            ->helperText('This will be used in the URL of your profile page as well as the URL(s) of any add-on(s) you create. Please use caution when changing this value.')
                            ->columnSpan(2),
                        Select::make('role')
                            ->required()
                            ->placeholder('Select a role')
                            ->options(UserRole::class)
                            ->visible(fn () => auth()->user()->isAdmin)
                            ->columnSpan(2),
                        Toggle::make('is_addon_author')
                            ->label('Add-on author')
                            ->helperText('Can this user create add-ons?')
                            ->columnSpan('full'),
                        Repeater::make('links')
                            ->schema([
                                Select::make('type')->options(LinkType::class),
                                TextInput::make('value')->requiredWith('type'),
                            ])
                            ->columnSpan(2)
                            ->columns(1),
                    ])
                    ->columns(4)
                    ->columnSpanFull(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')
                    ->description(fn (User $record) => $record->email)
                    ->searchable(query: function (Builder $query, string $search): Builder {
                        return $query->where(
                            fn ($q) => $q
                                ->where('name', 'like', "%{$search}%")
                                ->orWhere('email', 'like', "%{$search}%")
                        );
                    }),
                TextColumn::make('role')->badge(),
                IconColumn::make('is_addon_author')
                    ->boolean()
                    ->label('Add-on author')
                    ->trueIcon('flex-check-square')
                    ->falseIcon('flex-delete-square'),
            ])
            ->filters([
                SelectFilter::make('role')
                    ->options(array_map(
                        fn ($role) => $role->value,
                        UserRole::cases()
                    )),
                TernaryFilter::make('is_addon_author')->label('Is add-on author'),
            ])
            ->actions([
                // Tables\Actions\ViewAction::make()
                //     ->icon('flex-eye')
                //     ->size('md')
                //     ->iconButton()
                //     ->color('secondary'),
                EditAction::make()
                    ->icon('flex-edit-circle')
                    ->size('md')
                    ->iconButton()
                    ->color('gray'),
                DeleteAction::make()
                    ->icon('flex-delete-bin')
                    ->size('md')
                    ->iconButton(),
            ]);
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
            // 'view' => Pages\ViewUser::route('/{record}'),
            'edit' => Pages\EditUser::route('/{record}/edit'),
        ];
    }

    public static function getGlobalSearchResultDetails(Model $record): array
    {
        return [
            'Email' => $record->email,
        ];
    }
}
