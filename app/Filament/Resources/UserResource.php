<?php

namespace App\Filament\Resources;

use App\Enums\UserRole;
use App\Filament\Resources\UserResource\Pages;
use App\Models\User;
use Closure;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
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
                Forms\Components\Card::make()
                    ->schema([
                        Forms\Components\TextInput::make('name')
                            ->required()
                            ->reactive()
                            ->afterStateUpdated(function (?Model $record, Closure $set, $state) {
                                if (blank($record->username)) {
                                    $set('username', str($state)->slug());
                                }
                            })
                            ->columnSpan(2),
                        Forms\Components\TextInput::make('email')
                            ->required()
                            ->columnSpan(2),
                        Forms\Components\TextInput::make('username')
                            ->required()
                            ->helperText('This will be used in the URL of your profile page as well as the URL(s) of any add-on(s) you create. Please use caution when changing this value.')
                            ->columnSpan(2),
                        Forms\Components\Select::make('role')
                            ->required()
                            ->placeholder('Select a role')
                            ->options(
                                collect(UserRole::cases())
                                    ->flatMap(fn ($case) => [$case->value => $case->displayName()])
                                    ->all()
                            )
                            ->visible(fn () => auth()->user()->isAdmin)
                            ->columnSpan(2),
                        Forms\Components\Toggle::make('is_addon_author')
                            ->label('Add-on author')
                            ->helperText('Can this user create add-ons?')
                            ->columnSpan('full'),
                        Forms\Components\Repeater::make('links')
                            ->schema([
                                Forms\Components\Select::make('type')->options([
                                    'Website' => 'Website',
                                    'Email address' => 'Email address',
                                    'Discord server' => 'Discord server',
                                    'Github repo' => 'Github repo',
                                    'Twitter' => 'Twitter',
                                    'Mastodon' => 'Mastodon',
                                    'Facebook' => 'Facebook',
                                ])->required(),
                                Forms\Components\TextInput::make('value')->required(),
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
                Tables\Columns\TextColumn::make('name')
                    ->description(fn (User $record) => $record->email)
                    ->searchable(query: function (Builder $query, string $search): Builder {
                        return $query->where(
                            fn ($q) => $q
                                ->where('name', 'like', "%{$search}%")
                                ->orWhere('email', 'like', "%{$search}%")
                        );
                    }),
                Tables\Columns\BadgeColumn::make('role')
                    ->enum(
                        collect(UserRole::cases())->flatMap(fn ($role) => [$role->value => $role->displayName()])->all()
                    )
                    ->colors([
                        'ring-1 ring-purple-300 dark:ring-purple-400/30 bg-purple-400/10 text-purple-500 dark:text-purple-400' => UserRole::admin->value,
                        'ring-1 ring-emerald-300 bg-emerald-400/10 text-emerald-500 dark:ring-emerald-400/30 dark:bg-emerald-400/10 dark:text-emerald-400' => UserRole::staff->value,
                        'ring-1 ring-slate-300 bg-slate-400/10 text-slate-500 dark:ring-slate-400/30 dark:bg-slate-400/10 dark:text-slate-400' => UserRole::user->value,
                    ]),
                Tables\Columns\IconColumn::make('is_addon_author')
                    ->boolean()
                    ->label('Add-on author')
                    ->trueIcon('flex-check-square')
                    ->falseIcon('flex-delete-square'),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('role')
                    ->options(array_map(
                        fn ($role) => $role->value,
                        UserRole::cases()
                    )),
                Tables\Filters\TernaryFilter::make('is_addon_author')->label('Is add-on author'),
            ])
            ->actions([
                // Tables\Actions\ViewAction::make()
                //     ->icon('flex-eye')
                //     ->size('md')
                //     ->iconButton()
                //     ->color('secondary'),
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
