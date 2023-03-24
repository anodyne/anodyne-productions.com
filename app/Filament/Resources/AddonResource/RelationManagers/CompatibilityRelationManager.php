<?php

namespace App\Filament\Resources\AddonResource\RelationManagers;

use App\Enums\CompatibilityStatus;
use App\Models\Compatibility;
use App\Models\ReleaseSeries;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Contracts\Database\Eloquent\Builder;

class CompatibilityRelationManager extends RelationManager
{
    protected static string $relationship = 'compatibility';

    protected static ?string $modelLabel = 'compatibility report';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('user_id')
                    ->relationship('user', 'name')
                    ->searchable()
                    ->preload()
                    ->visible(fn () => ! auth()->user()->isUser),
                Forms\Components\Select::make('status')
                    ->options([
                        CompatibilityStatus::compatible->value => 'Compatible',
                        CompatibilityStatus::compatibleOverride->value => 'Compatible (Override)',
                        CompatibilityStatus::incompatible->value => 'Incompatible',
                        CompatibilityStatus::incompatibleOverride->value => 'Incompatible (Override)',
                    ]),
                Forms\Components\Select::make('version_id')
                    ->options(function (RelationManager $livewire): array {
                        return $livewire->ownerRecord->versions()->pluck('version', 'id')->toArray();
                    })
                    ->label('Add-on version'),
                Forms\Components\Select::make('release_series_id')
                    ->options(ReleaseSeries::ordered()->get()->pluck('name', 'id'))
                    ->label('Release series'),
                Forms\Components\MarkdownEditor::make('notes')->columnSpanFull(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('user.name')
                    ->icon(fn (Compatibility $record) => filled($record->notes) ? 'flex-notepad-text' : '')
                    ->iconPosition('after')
                    ->visible(fn () => ! auth()->user()->isUser),
                Tables\Columns\TextColumn::make('version.version')->label('Add-on version'),
                Tables\Columns\TextColumn::make('releaseSeries.name'),
                Tables\Columns\BadgeColumn::make('status')
                    ->formatStateUsing(fn (Compatibility $record) => $record->status->displayName())
                    ->colors([
                        'ring-1 ring-emerald-300 bg-emerald-400/10 text-emerald-500 dark:ring-emerald-400/30 dark:bg-emerald-400/10 dark:text-emerald-400' => 'compatible',
                        'ring-1 ring-rose-300 bg-rose-400/10 text-rose-500 dark:ring-rose-400/30 dark:bg-rose-400/10 dark:text-rose-400' => 'incompatible',
                    ]),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('releaseSeries.name')
                    ->label('Release series')
                    ->options(fn () => ReleaseSeries::ordered()->get()->pluck('name', 'id')),
                Tables\Filters\SelectFilter::make('status')
                    ->multiple()
                    ->options([
                        CompatibilityStatus::compatible->value => 'Compatible',
                        CompatibilityStatus::compatibleOverride->value => 'Compatible (Override)',
                        CompatibilityStatus::incompatible->value => 'Incompatible',
                        CompatibilityStatus::incompatibleOverride->value => 'Incompatible (Override)',
                    ]),
                Tables\Filters\Filter::make('has_notes')
                    ->query(fn (Builder $query) => $query->whereNotNull('notes'))
                    ->toggle(),
                Tables\Filters\Filter::make('is_override')
                    ->label('Override status')
                    ->query(fn (Builder $query) => $query->where('status', 'like', '%-override'))
                    ->toggle(),
                Tables\Filters\Filter::make('addon_scope')
                    ->label('Add-on level report')
                    ->query(fn (Builder $query) => $query->whereNull('version_id'))
                    ->toggle(),
            ])
            ->headerActions([
                Tables\Actions\CreateAction::make()->label('New compatibility report'),
            ])
            ->actions([
                Tables\Actions\ViewAction::make()
                    ->icon('flex-eye')
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
}
