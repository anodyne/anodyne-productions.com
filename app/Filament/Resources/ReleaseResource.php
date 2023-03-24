<?php

namespace App\Filament\Resources;

use App\Enums\ReleaseSeverity;
use App\Filament\Resources\ReleaseResource\Pages;
use App\Models\Release;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
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
                    ->options(
                        collect(ReleaseSeverity::cases())->flatMap(fn ($severity) => [$severity->value => $severity->displayName()])
                    )
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
                Forms\Components\Toggle::make('published')->default(false),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
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
                Tables\Columns\BadgeColumn::make('severity')
                    ->formatStateUsing(fn ($state) => ucfirst($state))
                    ->colors([
                        'ring-1 ring-rose-300 bg-rose-400/10 text-rose-500 dark:ring-rose-400/30 dark:bg-rose-400/10 dark:text-rose-400' => static fn ($state): bool => $state === 'critical' || $state === 'security',
                        'ring-1 ring-sky-300 bg-sky-400/10 text-sky-500 dark:ring-sky-400/30 dark:bg-sky-400/10 dark:text-sky-400' => 'minor',
                        'ring-1 ring-purple-300 bg-purple-400/10 text-purple-500 dark:ring-purple-400/30 dark:bg-purple-400/10 dark:text-purple-400' => 'major',
                        'ring-1 ring-slate-300 bg-slate-400/10 text-slate-500 dark:ring-slate-400/30 dark:bg-slate-400/10 dark:text-slate-400' => 'patch',
                    ]),
                Tables\Columns\TextColumn::make('games_count')
                    ->counts('games')
                    ->alignLeft()
                    ->label('# of games'),
                Tables\Columns\TextColumn::make('releaseSeries.name')->label('Release series'),
                Tables\Columns\ToggleColumn::make('published')
                    ->hidden(! auth()->user()->isAdmin),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('severity')->options(
                    collect(ReleaseSeverity::cases())->flatMap(fn ($severity) => [$severity->value => $severity->displayName()])
                ),
                Tables\Filters\SelectFilter::make('release_series_id')
                    ->relationship('releaseSeries', 'name')
                    ->label('Release series'),
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
                    ->color('secondary')
                    ->successNotificationTitle('Release updated'),
                Tables\Actions\DeleteAction::make()
                    ->icon('flex-delete-bin')
                    ->size('md')
                    ->iconButton()
                    ->successNotificationTitle('Release deleted'),
            ])
            ->bulkActions([])
            ->defaultSort('date', 'desc');
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ManageReleases::route('/'),
        ];
    }

    protected static function getNavigationBadge(): ?string
    {
        $count = static::getModel()::hasPendingRelease()->count();

        if ($count === 0) {
            return null;
        }

        return $count;
    }

    protected static function getNavigationBadgeColor(): ?string
    {
        return 'danger';
    }
}
