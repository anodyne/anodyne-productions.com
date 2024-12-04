<?php

namespace App\Filament\Resources;

use App\Enums\GameGenre;
use App\Enums\GameStatus;
use App\Filament\Resources\GameResource\Pages;
use App\Models\Game;
use App\Models\GameUpdate;
use Carbon\Carbon;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Grid as FormGrid;
use Filament\Forms\Components\KeyValue;
use Filament\Forms\Components\Section as FormSection;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Form;
use Filament\Infolists\Components\Actions\Action as InfolistAction;
use Filament\Infolists\Components\Grid;
use Filament\Infolists\Components\IconEntry;
use Filament\Infolists\Components\KeyValueEntry;
use Filament\Infolists\Components\RepeatableEntry;
use Filament\Infolists\Components\Section;
use Filament\Infolists\Components\Split;
use Filament\Infolists\Components\TextEntry;
use Filament\Infolists\Components\TextEntry\TextEntrySize;
use Filament\Infolists\Components\ViewEntry;
use Filament\Infolists\Infolist;
use Filament\Resources\Resource;
use Filament\Support\Enums\FontWeight;
use Filament\Tables\Actions\Action;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Actions\ViewAction;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ToggleColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Filters\TernaryFilter;
use Filament\Tables\Table;
use Illuminate\Contracts\Support\Htmlable;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\HtmlString;
use Illuminate\Support\Number;

class GameResource extends Resource
{
    protected static ?string $model = Game::class;

    protected static ?string $navigationIcon = 'flex-game-controller';

    protected static ?string $navigationGroup = 'Nova';

    protected static ?int $navigationSort = 30;

    protected static ?string $recordTitleAttribute = 'name';

    public static function form(Form $form): Form
    {
        return $form->schema([
            FormSection::make()
                ->schema([
                    TextInput::make('name'),
                    Select::make('genre')
                        ->options(GameGenre::class),
                    TextInput::make('url')
                        ->url()
                        ->label('URL')
                        ->columnSpanFull(),
                    Select::make('status')
                        ->options(GameStatus::class)
                        ->visible(Auth::user()->is_admin),
                    Toggle::make('is_excluded')
                        ->visible(Auth::user()->is_admin),
                ])
                ->columns(2)
                ->columnSpanFull(),

            FormSection::make()
                ->schema([
                    FormGrid::make()
                        ->relationship('release')
                        ->schema([
                            TextInput::make('version')->label('Nova version'),
                        ]),
                    TextInput::make('php_version')->label('PHP version'),
                    TextInput::make('server_software'),
                    TextInput::make('db_driver')->label('Database platform'),
                    TextInput::make('db_version')->label('Database version'),
                ])
                ->columns(2)
                ->columnSpanFull(),

            FormSection::make()
                ->schema([
                    DatePicker::make('nova_installed_at')->label('Initial install'),
                    DatePicker::make('nova_updated_at')->label('Last update'),
                ])
                ->columns(2)
                ->columnSpanFull(),

            FormSection::make()
                ->schema([
                    KeyValue::make('custom_properties'),
                ])
                ->columnSpanFull(),
        ]);
    }

    public static function infolist(InfoList $infolist): Infolist
    {
        return $infolist->schema([
            Grid::make(3)->schema([
                Grid::make(1)
                    ->schema([
                        Section::make()
                            ->heading('Basic info')
                            ->icon('flex-info-circle')
                            ->iconColor('primary')
                            ->schema([
                                Grid::make(2)->schema([
                                    TextEntry::make('name'),
                                    TextEntry::make('genre'),
                                ]),
                                TextEntry::make('url')
                                    ->label('URL')
                                    ->url(fn (Game $record): string => $record->url)
                                    ->openUrlInNewTab(),
                                Grid::make(2)->schema([
                                    TextEntry::make('nova_installed_at')
                                        ->label('Initial install date')
                                        ->date(),
                                    TextEntry::make('nova_updated_at')
                                        ->label('Last software update')
                                        ->date(),
                                ]),
                                KeyValueEntry::make('custom_properties'),
                            ]),
                        Section::make('Ready for Nova 3')
                            ->icon('flex-number-3-square')
                            ->iconColor(fn (Game $record): string => $record->nova3_ready ? 'success' : 'danger')
                            ->schema([
                                Grid::make(3)->schema([
                                    IconEntry::make('php')
                                        ->label('PHP 8.3+')
                                        ->getStateUsing(fn (Game $record): bool => version_compare($record->php_version, '8.3', '>='))
                                        ->icon(fn (bool $state): string => match ($state) {
                                            true => 'flex-check-square',
                                            false => 'flex-delete-square',
                                        })
                                        ->color(fn (bool $state): string => match ($state) {
                                            true => 'success',
                                            false => 'danger',
                                        }),
                                    IconEntry::make('database_driver')
                                        ->label('Database engine')
                                        ->icon(fn (string $state): string => match ($state) {
                                            'MySQL' => 'flex-check-square',
                                            'MariaDB' => 'flex-check-square',
                                            default => 'flex-delete-square',
                                        })
                                        ->color(fn (string $state): string => match ($state) {
                                            'MySQL' => 'success',
                                            'MariaDB' => 'success',
                                            default => 'danger',
                                        }),
                                    IconEntry::make('database_version')
                                        ->icon(fn (string $state, Game $record): string => match (true) {
                                            $record->is_mysql && version_compare($state, '8.0', '>=') => 'flex-check-square',
                                            ! $record->is_mysql && version_compare($state, '10.0', '>=') => 'flex-check-square',
                                            default => 'flex-delete-square',
                                        })
                                        ->color(fn (string $state, Game $record): string => match (true) {
                                            $record->is_mysql && version_compare($state, '8.0', '>=') => 'success',
                                            ! $record->is_mysql && version_compare($state, '10.0', '>=') => 'success',
                                            default => 'danger',
                                        }),
                                ]),
                            ]),
                        Section::make('Heartbeat')
                            ->description(
                                'Heartbeats are collected daily and reflect information that is current as of the previous day.'
                            )
                            ->icon('flex-heart-rate')
                            ->iconColor('info')
                            ->relationship('latestHeartbeat')
                            ->schema([
                                Grid::make(3)->schema([
                                    ViewEntry::make('active_users')
                                        ->label('Users')
                                        ->view(
                                            'filament.infolists.entries.stat'
                                        )
                                        ->columnSpanFull(),

                                    ViewEntry::make('active_primary_characters')
                                        ->label('Primary charcters')
                                        ->view(
                                            'filament.infolists.entries.stat'
                                        ),
                                    ViewEntry::make(
                                        'active_secondary_characters'
                                    )
                                        ->label('Secondary characters')
                                        ->view(
                                            'filament.infolists.entries.stat'
                                        ),
                                    ViewEntry::make('active_support_characters')
                                        ->label('Support characters')
                                        ->view(
                                            'filament.infolists.entries.stat'
                                        ),

                                    ViewEntry::make('total_stories')->view(
                                        'filament.infolists.entries.stat'
                                    ),
                                    ViewEntry::make('total_posts')->view(
                                        'filament.infolists.entries.stat'
                                    ),
                                    ViewEntry::make('total_post_words')
                                        ->view(
                                            'filament.infolists.entries.stat',
                                            ['short' => true]
                                        )
                                        ->tooltip(fn (Game $record): ?string => Number::format($record->latestHeartbeat?->total_post_words).' words'),

                                    TextEntry::make('latestHeartbeat.created_at')
                                        ->getStateUsing(function (Game $record): ?string {
                                            return $record->latestHeartbeat->created_at?->diffForHumans([
                                                'options' => Carbon::JUST_NOW | Carbon::ONE_DAY_WORDS,
                                                'syntax' => Carbon::DIFF_RELATIVE_TO_NOW,
                                            ]) ?? 'No heartbeat recorded';
                                        }),
                                ]),
                            ])
                            ->visible(
                                fn (Game $record): bool => $record
                                    ->heartbeats()
                                    ->count() > 0
                            ),
                        Section::make('Game stats')
                            ->description(
                                'Game statistics are collected along with telemetry data during the update process.'
                            )
                            ->icon('flex-graph')
                            ->iconColor('info')
                            ->schema([
                                Grid::make(2)->schema([
                                    ViewEntry::make('active_users')->view(
                                        'filament.infolists.entries.stat'
                                    ),
                                    ViewEntry::make('active_characters')->view(
                                        'filament.infolists.entries.stat'
                                    ),

                                    ViewEntry::make('total_stories')->view(
                                        'filament.infolists.entries.stat'
                                    ),
                                    ViewEntry::make('total_story_groups')->view(
                                        'filament.infolists.entries.stat'
                                    ),

                                    ViewEntry::make('total_posts')->view(
                                        'filament.infolists.entries.stat'
                                    ),
                                    ViewEntry::make('total_post_words')->view(
                                        'filament.infolists.entries.stat'
                                    ),
                                ]),
                            ])
                            ->hidden(
                                fn (Game $record): bool => $record
                                    ->heartbeats()
                                    ->count() > 0
                            ),
                    ])
                    ->columnSpan(2),
                Grid::make(1)
                    ->schema([
                        Section::make()
                            ->heading('Server info')
                            ->description(
                                "Server information should be treated as sensitive data and not shared with anyone other than the game's owner."
                            )
                            ->icon('flex-database')
                            ->iconColor('warning')
                            ->schema([
                                ViewEntry::make('release.version')
                                    ->label('Nova version')
                                    ->view('filament.infolists.entries.stat-small'),
                                ViewEntry::make('php_version')
                                    ->label('PHP version')
                                    ->view('filament.infolists.entries.stat-small'),
                                ViewEntry::make('server_software')->view(
                                    'filament.infolists.entries.stat-small'
                                ),
                                ViewEntry::make('database_driver')
                                    ->label('Database engine')
                                    ->view('filament.infolists.entries.stat-small'),
                                ViewEntry::make('database_version')
                                    ->view('filament.infolists.entries.stat-small')
                                    ->tooltip(fn (Game $record): string => $record->db_version),
                            ]),
                        Section::make('Update history')
                            ->icon('flex-clock-rewind')
                            ->iconColor('info')
                            ->schema([
                                RepeatableEntry::make('updateHistory')
                                    ->hiddenLabel()
                                    ->schema([
                                        Split::make([
                                            TextEntry::make('previousRelease.version')
                                                ->hiddenLabel()
                                                ->size(TextEntrySize::Medium)
                                                ->weight(FontWeight::SemiBold)
                                                ->state(fn (GameUpdate $record): Htmlable => new HtmlString('<span class="tabular-nums">'.$record->previousRelease?->version.'</span>'))
                                                ->grow(false)
                                                ->hidden(fn (GameUpdate $record): bool => blank($record->previousRelease)),
                                            TextEntry::make('arrow')
                                                ->hiddenLabel()
                                                ->size(TextEntrySize::Large)
                                                ->state(fn (): Htmlable => new HtmlString('&rarr;'))
                                                ->hidden(fn (GameUpdate $record): bool => blank($record->previousRelease))
                                                ->grow(false),
                                            TextEntry::make('release.version')
                                                ->hiddenLabel()
                                                ->size(TextEntrySize::Medium)
                                                ->weight(FontWeight::SemiBold)
                                                ->state(fn (GameUpdate $record): Htmlable => new HtmlString('<span class="tabular-nums">'.$record->release->version.'</span>'))
                                                ->grow(true),
                                            TextEntry::make('created_at')
                                                ->date()
                                                ->hiddenLabel()
                                                ->color('gray')
                                                ->grow(false),
                                        ])
                                            ->extraAttributes(['class' => 'items-center'], merge: true)
                                            ->columnSpanFull(),
                                    ])
                                    ->columns(3)
                                    ->contained(false),
                            ])
                            ->visible(fn (Game $record): bool => filled($record->updateHistory)),
                        Section::make()
                            ->heading('Status')
                            ->icon('flex-browser-alert')
                            ->iconColor('gray')
                            ->headerActions([
                                InfolistAction::make('resetStatus')
                                    ->requiresConfirmation()
                                    ->label('Reset status')
                                    ->link()
                                    ->color('warning')
                                    ->modalDescription('Are you sure you want to reset the status data for this game?')
                                    ->action(function (Game $record): void {
                                        $record->update([
                                            'status' => GameStatus::Active,
                                            'status_response_code' => null,
                                            'status_inactive_days' => 0,
                                        ]);
                                    }),
                            ])
                            ->schema([
                                Grid::make(1)->schema([
                                    ViewEntry::make('status')
                                        ->getStateUsing(fn (Game $record): string => $record->status->getLabel())
                                        ->view(
                                            'filament.infolists.entries.stat-small'
                                        ),
                                    ViewEntry::make('status_response_code')
                                        ->label('Response code')
                                        ->getStateUsing(fn (Game $record): string|int => $record->status_response_code ?? '-')
                                        ->view(
                                            'filament.infolists.entries.stat-small'
                                        ),
                                    ViewEntry::make('status_inactive_days')
                                        ->label('Consecutive inactive days')
                                        ->view(
                                            'filament.infolists.entries.stat-small'
                                        ),
                                    ViewEntry::make('latestHeartbeat.last_published_post')
                                        ->label('Time since last published post')
                                        ->getStateUsing(function (Game $record): ?string {
                                            return $record->latestHeartbeat->last_published_post?->diffForHumans([
                                                'options' => Carbon::JUST_NOW | Carbon::ONE_DAY_WORDS,
                                                'syntax' => Carbon::DIFF_RELATIVE_TO_NOW,
                                            ]) ?? 'No published posts';
                                        })
                                        ->view(
                                            'filament.infolists.entries.stat-small'
                                        )
                                        ->visible(fn (Game $record): bool => filled($record->latestHeartbeat)),
                                ]),
                            ])
                            ->visible(fn (Game $record): bool => $record->release->has_heartbeat_endpoint),
                    ])
                    ->columnSpan(1),
            ]),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->query(
                Game::query()
                    ->unless(Auth::user()->is_admin, fn (Builder $query): Builder => $query->isIncluded())
            )
            ->defaultSort('nova_updated_at', 'desc')
            ->defaultPaginationPageOption(25)
            ->columns([
                TextColumn::make('name')
                    ->description(fn (Game $record): ?string => $record->url)
                    ->searchable(
                        query: function (
                            Builder $query,
                            string $search
                        ): Builder {
                            return $query->where(
                                fn ($q) => $q
                                    ->where('name', 'like', "%{$search}%")
                                    ->orWhere('url', 'like', "%{$search}%")
                            );
                        }
                    ),
                TextColumn::make('genre')->badge(),
                TextColumn::make('status')
                    ->badge()
                    ->toggleable()
                    ->formatStateUsing(function (Game $record): ?string {
                        $output = $record->status->getLabel();

                        if (
                            $record->status === GameStatus::Errored ||
                            $record->status === GameStatus::Unknown
                        ) {
                            $output .= ':'.$record->status_response_code;
                        }

                        return $output;
                    }),
                TextColumn::make('release.version')->label('Nova version'),
                TextColumn::make('php_version')
                    ->label('PHP version')
                    ->toggleable(),
                TextColumn::make('database_platform')
                    ->toggleable(),
                TextColumn::make('database_driver')
                    ->label('Database driver')
                    ->toggleable()
                    ->toggledHiddenByDefault(),
                TextColumn::make('db_driver')
                    ->label('Database driver (raw)')
                    ->toggleable()
                    ->toggledHiddenByDefault(),
                TextColumn::make('database_version')
                    ->label('Database version')
                    ->toggleable()
                    ->toggledHiddenByDefault(),
                TextColumn::make('db_version')
                    ->label('Database version (raw)')
                    ->toggleable()
                    ->toggledHiddenByDefault(),
                IconColumn::make('nova3_ready')
                    ->label('Nova 3 ready')
                    ->alignCenter()
                    ->icon(fn (bool $state): string => match ($state) {
                        true => 'flex-check-square',
                        false => 'flex-delete-square'
                    })
                    ->color(fn (bool $state): string => match ($state) {
                        true => 'success',
                        false => 'danger'
                    })
                    ->toggleable()
                    ->toggledHiddenByDefault(),
                TextColumn::make('server_software')
                    ->toggleable()
                    ->toggledHiddenByDefault(),
                TextColumn::make('active_users')
                    ->sortable()
                    ->toggleable()
                    ->toggledHiddenByDefault(),
                TextColumn::make('active_characters')
                    ->sortable()
                    ->toggleable()
                    ->toggledHiddenByDefault(),
                TextColumn::make('total_stories')
                    ->sortable()
                    ->toggleable()
                    ->toggledHiddenByDefault(),
                TextColumn::make('total_story_groups')
                    ->sortable()
                    ->toggleable()
                    ->toggledHiddenByDefault(),
                TextColumn::make('total_posts')
                    ->formatStateUsing(fn (?int $state): string => Number::format($state ?? 0))
                    ->default(0)
                    ->sortable()
                    ->toggleable()
                    ->toggledHiddenByDefault(),
                TextColumn::make('total_post_words')
                    ->formatStateUsing(fn (?int $state): string => Number::format($state ?? 0))
                    ->default(0)
                    ->sortable()
                    ->toggleable()
                    ->toggledHiddenByDefault(),
                ToggleColumn::make('is_excluded')
                    ->hidden(fn (): bool => ! auth()->user()->isAdmin)
                    ->toggleable()
                    ->toggledHiddenByDefault(),
                TextColumn::make('nova_installed_at')
                    ->since()
                    ->label('Installed')
                    ->size('sm')
                    ->toggleable()
                    ->toggledHiddenByDefault()
                    ->sortable(),
                TextColumn::make('nova_updated_at')
                    ->since()
                    ->label('Last updated')
                    ->size('sm')
                    ->toggleable()
                    ->toggledHiddenByDefault()
                    ->sortable(),
            ])
            ->filters([
                SelectFilter::make('release')->relationship(
                    'release',
                    'version'
                ),
                SelectFilter::make('genre')
                    ->options(GameGenre::class)
                    ->multiple(),
                SelectFilter::make('status')
                    ->multiple()
                    ->options(GameStatus::class)
                    ->default([
                        GameStatus::Active->value,
                    ]),
                TernaryFilter::make('excluded')
                    ->placeholder('Without excluded games')
                    ->trueLabel('With excluded games')
                    ->falseLabel('Only excluded games')
                    ->queries(
                        true: fn (Builder $query) => $query,
                        false: fn (Builder $query) => $query->isExcluded(),
                        blank: fn (Builder $query) => $query->isIncluded()
                    )
                    ->visible(fn (): bool => auth()->user()->is_admin),
                SelectFilter::make('php')
                    ->label('PHP')
                    ->options([
                        'php7' => 'PHP 7',
                        'php8' => 'PHP 8',
                    ])
                    ->query(fn ($state, Builder $query): Builder => match ($state['value']) {
                        'php7' => $query->where('php_version', '<', '8.0'),
                        'php8' => $query->where('php_version', '>=', '8.0'),
                        default => $query,
                    }),
                SelectFilter::make('database')
                    ->options([
                        'mysql' => 'MySQL',
                        'mariadb' => 'MariaDB',
                    ])
                    ->query(fn ($state, Builder $query): Builder => match ($state['value']) {
                        'mysql' => $query->isMysql(),
                        'mariadb' => $query->isMariadb(),
                        default => $query,
                    }),
                TernaryFilter::make('nova3')
                    ->label('Ready for Nova 3')
                    ->trueLabel('Yes')
                    ->falseLabel('No')
                    ->queries(
                        true: fn (Builder $query) => $query->isReadyForNova3(),
                        false: fn (Builder $query) => $query->isNotReadyForNova3(),
                        blank: fn (Builder $query) => $query
                    ),
            ])
            ->actions([
                Action::make('linkToGame')
                    ->icon('flex-share')
                    ->color('gray')
                    ->url(fn (Game $record): ?string => $record->url),
                ViewAction::make(),
                EditAction::make(),
            ]);
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
