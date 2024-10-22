<?php

namespace App\Filament\Resources\AddonResource\RelationManagers;

use App\Models\Question;
use Filament\Forms\Components\MarkdownEditor;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables\Actions\CreateAction;
use Filament\Tables\Actions\DeleteAction;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ToggleColumn;
use Filament\Tables\Filters\TernaryFilter;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Model;

class QuestionsRelationManager extends RelationManager
{
    protected static string $relationship = 'questions';

    protected static ?string $recordTitleAttribute = 'question';

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Textarea::make('question')
                    ->required()
                    ->rows(2)
                    ->columnSpanFull(),
                MarkdownEditor::make('answer')
                    ->required()
                    ->columnSpanFull(),
                Toggle::make('published')
                    ->helperText('Only published questions will be shown to users'),
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('question')
                    ->description(fn (Question $record): ?string => $record->answer)
                    ->searchable()
                    ->wrap(),
                ToggleColumn::make('published'),
            ])
            ->filters([
                TernaryFilter::make('published'),
            ])
            ->headerActions([
                CreateAction::make()
                    ->button()
                    ->successNotificationTitle('New add-on question created'),
            ])
            ->actions([
                EditAction::make()
                    ->successNotificationTitle('Add-on question updated'),
                DeleteAction::make()
                    ->successNotificationTitle('Add-on question deleted'),
            ])
            ->emptyStateHeading('No questions found')
            ->emptyStateDescription('Add any frequently asked questions that you think would help users.')
            ->emptyStateIcon('uxl-customer-doubt')
            ->emptyStateActions([
                CreateAction::make()
                    ->button()
                    ->successNotificationTitle('New add-on question created'),
            ]);
    }

    public static function getBadge(Model $ownerRecord, string $pageClass): ?string
    {
        $count = $ownerRecord->questions()->count();

        return $count > 0 ? $count : null;
    }
}
