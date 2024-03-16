<?php

namespace App\Filament\Resources;

use App\Enums\GameGenre;
use App\Filament\Resources\GameResource\Pages;
use App\Models\Game;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Number;

class GameResource extends Resource
{
    protected static ?string $model = Game::class;

    protected static ?string $navigationIcon = 'flex-game-controller';

    protected static ?string $navigationGroup = 'System';

    protected static ?int $navigationSort = 30;

    protected static ?string $recordTitleAttribute = 'name';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Card::make()
                    ->schema([
                        Forms\Components\TextInput::make('name'),
                        Forms\Components\Select::make('genre')
                            ->options(
                                collect(GameGenre::cases())
                                    ->flatMap(fn ($genre) => [$genre->value => $genre->getLabel()])
                                    ->all()
                            ),
                        Forms\Components\TextInput::make('url')
                            ->type('url')
                            ->label('URL')
                            ->columnSpan('full'),
                    ])
                    ->columns(2)
                    ->columnSpan('full'),

                Forms\Components\Card::make()
                    ->schema([
                        Forms\Components\Grid::make()->relationship('release')->schema([
                            Forms\Components\TextInput::make('version')->label('Nova version'),
                        ]),
                        Forms\Components\TextInput::make('php_version')->label('PHP version'),
                        Forms\Components\TextInput::make('server_software'),
                        Forms\Components\TextInput::make('db_driver')->label('Database platform'),
                        Forms\Components\TextInput::make('db_version')->label('Database version'),
                    ])
                    ->columns(2)
                    ->columnSpan('full'),

                Forms\Components\Card::make()
                    ->schema([
                        Forms\Components\DatePicker::make('created_at')->label('Initial install'),
                        Forms\Components\DatePicker::make('updated_at')->label('Last update'),
                    ])
                    ->columns(2)
                    ->columnSpan('full'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->description(fn (Game $record): string => $record->url ?? '')
                    ->searchable(query: function (Builder $query, string $search): Builder {
                        return $query->where(
                            fn ($q) => $q
                                ->where('name', 'like', "%{$search}%")
                                ->orWhere('url', 'like', "%{$search}%")
                        );
                    }),
                Tables\Columns\BadgeColumn::make('genre')
                    ->enum(
                        collect(GameGenre::cases())
                            ->flatMap(fn ($genre) => [$genre->value => $genre->getLabel()])
                            ->all()
                    )
                    ->colors(['ring-1 ring-slate-300 bg-slate-400/10 text-slate-500 dark:ring-slate-400/30 dark:bg-slate-400/10 dark:text-slate-400']),
                Tables\Columns\TextColumn::make('release.version')->label('Nova version'),
                Tables\Columns\TextColumn::make('php_version')->label('PHP version')->toggleable(),
                Tables\Columns\TextColumn::make('db_driver')->label('Database driver')->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('db_version')->label('Database version')->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('server_software')->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('active_users')
                    ->formatStateUsing(fn (string $state): ?string => Number::format($state))
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('active_characters')
                    ->formatStateUsing(fn (string $state): ?string => Number::format($state))
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('total_stories')
                    ->formatStateUsing(fn (string $state): ?string => Number::format($state))
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('total_story_groups')
                    ->formatStateUsing(fn (string $state): ?string => Number::format($state))
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('total_posts')
                    ->formatStateUsing(fn (string $state): ?string => Number::format($state))
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('total_post_words')
                    ->formatStateUsing(fn (string $state): ?string => Number::format($state))
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\CheckboxColumn::make('is_excluded')
                    ->hidden(fn () => ! auth()->user()->isAdmin)
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('created_at')
                    ->since()
                    ->label('Installed')
                    ->size('sm')
                    ->toggleable(isToggledHiddenByDefault: true)
                    ->sortable(),
                Tables\Columns\TextColumn::make('updated_at')
                    ->since()
                    ->label('Last updated')
                    ->size('sm')
                    ->toggleable(isToggledHiddenByDefault: true)
                    ->sortable(),
            ])
            ->filters([
                Tables\Filters\TernaryFilter::make('excluded')
                    ->placeholder('Without excluded games')
                    ->trueLabel('With excluded games')
                    ->falseLabel('Only excluded games')
                    ->queries(
                        true: fn (Builder $query) => $query,
                        false: fn (Builder $query) => $query->isExcluded(),
                        blank: fn (Builder $query) => $query->isIncluded(),
                    )
                    ->hidden(fn () => ! auth()->user()->isAdmin),
            ])
            ->actions([
                Tables\Actions\ViewAction::make()
                    ->icon('flex-eye')
                    ->size('md')
                    ->iconButton()
                    ->color('gray'),
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
            'index' => Pages\ListGames::route('/'),
            'create' => Pages\CreateGame::route('/create'),
            'view' => Pages\ViewGame::route('/{record}'),
            'edit' => Pages\EditGame::route('/{record}/edit'),
        ];
    }

    public static function getWidgets(): array
    {
        return [];
    }

    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()
            ->unless(auth()->user()->isAdmin, fn (Builder $query) => $query->isIncluded())
            ->orderBy('updated_at', 'desc');
    }

    public static function getGloballySearchableAttributes(): array
    {
        return ['name', 'url'];
    }

    public static function getGlobalSearchResultDetails(Model $record): array
    {
        return [
            'URL' => $record->url,
        ];
    }
}
