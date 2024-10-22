<?php

namespace App\Filament\Resources\AddonResource\RelationManagers;

use App\Models\Version;
use Filament\Forms\Components\MarkdownEditor;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\SpatieMediaLibraryFileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables\Actions\CreateAction;
use Filament\Tables\Actions\DeleteAction;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ToggleColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class VersionsRelationManager extends RelationManager
{
    protected static string $relationship = 'versions';

    protected static ?string $recordTitleAttribute = 'version';

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('version')->required(),
                Select::make('product')
                    ->label('Supported Nova version')
                    ->required()
                    ->multiple()
                    ->placeholder('Select Nova version')
                    ->relationship('product', 'name', fn (Builder $query) => $query->published())
                    ->preload()
                    ->maxItems(1),
                Select::make('releaseSeries')
                    ->label('Supported Nova release series')
                    ->required()
                    ->multiple()
                    ->placeholder('Select Nova release series')
                    ->relationship('releaseSeries', 'name')
                    ->preload(),
                MarkdownEditor::make('release_notes')->columnSpanFull(),
                MarkdownEditor::make('install_instructions')
                    ->helperText('If you provide install instructions for the version, those will be displayed when the version is selected. Otherwise, the install instructions on the add-on will be used.')
                    ->columnSpanFull(),
                MarkdownEditor::make('upgrade_instructions')->columnSpanFull(),
                MarkdownEditor::make('credits')
                    ->helperText('Provide any credits you feel are necessary and specific to this version of your add-on')
                    ->columnSpanFull(),
                SpatieMediaLibraryFileUpload::make('filename')
                    ->columnSpanFull()
                    ->collection('downloads')
                    ->disk(app()->environment('local') ? 'public' : 'r2-addons')
                    ->customProperties(fn (Model $record) => ['user_id' => $record->addon->user_id]),
                Toggle::make('published')->default(true),
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->defaultSort('version', 'desc')
            ->columns([
                TextColumn::make('version')
                    ->sortable()
                    ->description(fn (Version $record): ?string => $record->getFirstMedia('downloads')?->name ?? null),
                TextColumn::make('downloads_count')
                    ->counts('downloads')
                    ->label('Downloads'),
                TextColumn::make('product.name')->label('Nova version'),
                TextColumn::make('releaseSeries.name')->label('Nova releases'),
                ToggleColumn::make('published'),
            ])
            ->headerActions([
                CreateAction::make()
                    ->button()
                    ->successNotificationTitle('New add-on version created'),
            ])
            ->actions([
                EditAction::make()
                    ->successNotificationTitle('Add-on version updated'),
                DeleteAction::make()
                    ->successNotificationTitle('Add-on version deleted'),
            ])
            ->emptyStateHeading('No versions found')
            ->emptyStateDescription('Create a new version and upload a zip file.')
            ->emptyStateIcon('uxl-download')
            ->emptyStateActions([
                CreateAction::make()
                    ->button()
                    ->successNotificationTitle('New add-on version created'),
            ]);
    }

    public static function getBadge(Model $ownerRecord, string $pageClass): ?string
    {
        $count = $ownerRecord->versions()->count();

        return $count > 0 ? $count : null;
    }
}
