<?php

namespace App\Filament\Resources;

use App\Enums\ReleaseSeverity;
use App\Filament\Resources\ReleaseResource\Pages;
use App\Models\Release;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Grouping\Group;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class ReleaseResource extends Resource
{
    protected static ?string $model = Release::class;

    protected static ?string $navigationIcon = 'flex-cloud-wifi';

    protected static bool $isGloballySearchable = false;

    protected static ?string $navigationGroup = 'System';

    protected static ?int $navigationSort = 50;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('version')
                    ->required()
                    ->columnSpan(1),
                Forms\Components\Select::make('severity')
                    ->options(ReleaseSeverity::class)
                    ->required()
                    ->columnSpan(1),
                Forms\Components\DatePicker::make('date')
                    ->nullable()
                    ->weekStartsOnSunday()
                    ->columnSpan(1),
                Forms\Components\Select::make('release_series_id')
                    ->relationship('releaseSeries', 'name')
                    ->required()
                    ->columnSpan(1),
                Forms\Components\MarkdownEditor::make('notes')->columnSpanFull(),
                Forms\Components\TextInput::make('link')
                    ->default('https://anodyne-productions.com/nova')
                    ->required()
                    ->columnSpan(1),
                Forms\Components\TextInput::make('upgrade_guide_link')->columnSpan(1),
                Forms\Components\Toggle::make('published')->default(false)->columnSpan(1),
                Forms\Components\Toggle::make('has_heartbeat_endpoint')->default(true)->columnSpan(1),
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
                Tables\Columns\TextColumn::make('version')
                    ->searchable()
                    ->size('lg')
                    ->weight('bold')
                    ->alignLeft()
                    ->sortable()
                    ->icon(fn (Model $record) => $record->pendingRelease ? 'flex-alert-diamond' : '')
                    ->iconPosition('after')
                    ->color(fn (Model $record) => $record->pendingRelease ? 'danger' : ''),
                Tables\Columns\TextColumn::make('date')
                    ->date()
                    ->label('Release date')
                    ->alignLeft()
                    ->sortable(),
                Tables\Columns\TextColumn::make('severity')->badge(),
                Tables\Columns\TextColumn::make('games_count')
                    ->counts([
                        'games' => fn (Builder $query): Builder => $query->isIncluded(),
                    ])
                    ->alignLeft()
                    ->label('# of games'),
                Tables\Columns\TextColumn::make('releaseSeries.name')->label('Release series'),
                Tables\Columns\ToggleColumn::make('published')
                    ->hidden(! auth()->user()->isAdmin),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('severity'),
                Tables\Filters\SelectFilter::make('release_series_id')
                    ->relationship('releaseSeries', 'name')
                    ->label('Release series'),
            ])
            ->actions([
                Tables\Actions\ViewAction::make()
                    ->icon('flex-eye')
                    ->size('md')
                    ->iconButton()
                    ->color('gray'),
                Tables\Actions\EditAction::make()
                    ->icon('flex-edit-circle')
                    ->size('md')
                    ->iconButton()
                    ->color('gray')
                    ->successNotificationTitle('Release updated'),
                Tables\Actions\DeleteAction::make()
                    ->icon('flex-delete-bin')
                    ->size('md')
                    ->iconButton()
                    ->successNotificationTitle('Release deleted'),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ManageReleases::route('/'),
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
