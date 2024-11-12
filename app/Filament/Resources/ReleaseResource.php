<?php

namespace App\Filament\Resources;

use App\Enums\ReleaseSeverity;
use App\Filament\Resources\ReleaseResource\Pages;
use App\Models\Release;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\MarkdownEditor;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Form;
use Filament\Infolists\Components\Grid;
use Filament\Infolists\Components\IconEntry;
use Filament\Infolists\Components\Section as InfolistSection;
use Filament\Infolists\Components\Split;
use Filament\Infolists\Components\TextEntry;
use Filament\Infolists\Components\TextEntry\TextEntrySize;
use Filament\Infolists\Components\ViewEntry;
use Filament\Infolists\Infolist;
use Filament\Resources\Resource;
use Filament\Tables\Actions\DeleteAction;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Actions\ViewAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ToggleColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Grouping\Group;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class ReleaseResource extends Resource
{
    protected static ?string $model = Release::class;

    protected static ?string $navigationIcon = 'flex-cloud-wifi';

    protected static bool $isGloballySearchable = false;

    protected static ?string $navigationGroup = 'Nova';

    protected static ?int $navigationSort = 50;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make()
                    ->schema([
                        TextInput::make('version')
                            ->required()
                            ->columnSpan(1),
                        Select::make('severity')
                            ->options(ReleaseSeverity::class)
                            ->required()
                            ->columnSpan(1),
                        DatePicker::make('date')
                            ->nullable()
                            ->weekStartsOnSunday()
                            ->columnSpan(1),
                        Select::make('release_series_id')
                            ->relationship(
                                name: 'releaseSeries',
                                titleAttribute: 'name',
                                modifyQueryUsing: fn (Builder $query): Builder => $query->orderBy('name', 'desc')
                            )
                            ->required()
                            ->columnSpan(1),
                        MarkdownEditor::make('notes')->columnSpanFull(),
                        TextInput::make('link')
                            ->default('https://anodyne-productions.com/nova')
                            ->required()
                            ->columnSpan(1),
                        TextInput::make('upgrade_guide_link')->columnSpan(1),
                        Toggle::make('published')->default(false)->columnSpan(1),
                        Toggle::make('has_heartbeat_endpoint')->default(true)->columnSpan(1),
                    ])
                    ->columns(2)
                    ->columnSpanFull(),
            ]);
    }

    public static function infolist(Infolist $infolist): Infolist
    {
        return $infolist->schema([
            Grid::make(3)->schema([
                Grid::make(1)
                    ->schema([
                        InfolistSection::make()
                            ->heading('Release info')
                            ->icon('flex-cloud-wifi')
                            ->iconColor('primary')
                            ->schema([
                                ViewEntry::make('version')
                                    ->view('filament.infolists.entries.stat'),
                                ViewEntry::make('games')
                                    ->label('Number of games running this release')
                                    ->state(fn (Release $record): int => $record->games()->isIncluded()->count())
                                    ->view('filament.infolists.entries.stat'),
                                TextEntry::make('notes')
                                    ->hiddenLabel()
                                    ->size(TextEntrySize::Large),
                                TextEntry::make('upgrade_guide_link')
                                    ->url(fn (Release $record): ?string => $record->upgrade_guide_link)
                                    ->openUrlInNewTab()
                                    ->visible(fn (Release $record): bool => filled($record->upgrade_guide_link)),
                            ]),
                    ])
                    ->columnSpan(2),
                Grid::make(1)
                    ->schema([
                        InfolistSection::make()
                            ->heading('Metadata')
                            ->icon('flex-info-circle')
                            ->iconColor('gray')
                            ->schema([
                                TextEntry::make('date')
                                    ->label('Release date')
                                    ->date(),
                                TextEntry::make('releaseSeries.name')
                                    ->label('Release series'),
                                TextEntry::make('severity')->badge(),
                                Split::make([
                                    IconEntry::make('published')
                                        ->hiddenLabel()
                                        ->trueColor('success')
                                        ->trueIcon('flex-check-square')
                                        ->falseColor('gray')
                                        ->falseIcon('flex-delete-square')
                                        ->tooltip(fn (Release $record): string => match ($record->published) {
                                            true => 'Published',
                                            false => 'Not published yet',
                                        })
                                        ->grow(false),
                                    IconEntry::make('has_heartbeat_endpoint')
                                        ->hiddenLabel()
                                        ->icon('flex-heart-rate')
                                        ->trueColor('success')
                                        ->falseColor('gray')
                                        ->tooltip(fn (Release $record): string => match ($record->has_heartbeat_endpoint) {
                                            true => 'Has heartbeat endpoint',
                                            false => 'Does not have heartbeat endpoint',
                                        })
                                        ->grow(false),
                                ]),
                            ]),
                    ])
                    ->columnSpan(1),
            ]),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->groups([
                Group::make('releaseSeries.name')
                    ->collapsible()
                    ->orderQueryUsing(function (Builder $query, string $direction): Builder {
                        return $query
                            ->join('release_series', 'releases.release_series_id', '=', 'release_series.id')
                            ->orderBy('release_series.order_column', 'asc');
                    }),
            ])
            ->defaultGroup('releaseSeries.name')
            ->defaultSort('date', 'desc')
            ->defaultPaginationPageOption(25)
            ->columns([
                TextColumn::make('version')
                    ->searchable()
                    ->size('lg')
                    ->weight('bold')
                    ->alignLeft()
                    ->sortable()
                    ->icon(fn (Model $record) => $record->pendingRelease ? 'flex-alert-diamond' : '')
                    ->iconPosition('after')
                    ->color(fn (Model $record) => $record->pendingRelease ? 'danger' : ''),
                TextColumn::make('date')
                    ->date()
                    ->label('Release date')
                    ->alignLeft()
                    ->sortable(),
                TextColumn::make('severity')->badge(),
                TextColumn::make('games_count')
                    ->counts([
                        'games' => fn (Builder $query): Builder => $query->isIncluded(),
                    ])
                    ->alignLeft()
                    ->label('# of games'),
                TextColumn::make('releaseSeries.name')->label('Release series'),
                ToggleColumn::make('published')
                    ->hidden(! auth()->user()->isAdmin),
            ])
            ->filters([
                SelectFilter::make('severity'),
                SelectFilter::make('release_series_id')
                    ->relationship('releaseSeries', 'name')
                    ->label('Release series'),
            ])
            ->actions([
                ViewAction::make()
                    ->icon('flex-eye')
                    ->size('md')
                    ->iconButton()
                    ->color('gray'),
                EditAction::make()
                    ->icon('flex-edit-circle')
                    ->size('md')
                    ->iconButton()
                    ->color('gray')
                    ->successNotificationTitle('Release updated'),
                DeleteAction::make()
                    ->icon('flex-delete-bin')
                    ->size('md')
                    ->iconButton()
                    ->successNotificationTitle('Release deleted'),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListReleases::route('/'),
            'create' => Pages\CreateRelease::route('/create'),
            'view' => Pages\ViewRelease::route('/{record}'),
            'edit' => Pages\EditRelease::route('/{record}/edit'),
        ];
    }

    public static function getNavigationBadge(): ?string
    {
        $count = static::getModel()::hasPendingRelease()->count();

        if ($count === 0) {
            return null;
        }

        return $count;
    }

    public static function getNavigationBadgeColor(): ?string
    {
        return 'danger';
    }
}
