<?php

namespace App\Filament\Resources\AddonResource\RelationManagers;

use Domain\Exchange\Models\Question;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Resources\Table;
use Filament\Tables;

class QuestionsRelationManager extends RelationManager
{
    protected static string $relationship = 'questions';

    protected static ?string $recordTitleAttribute = 'question';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Textarea::make('question')
                    ->required()
                    ->rows(2)
                    ->columnSpan('full'),
                Forms\Components\RichEditor::make('answer')
                    ->required()
                    ->columnSpan('full'),
                Forms\Components\Toggle::make('published'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('question')
                    ->description(fn (Question $record): string => $record->answer)
                    ->searchable()
                    ->wrap(),
                Tables\Columns\BooleanColumn::make('published')
                    ->trueIcon('flex-check-square')
                    ->falseIcon('flex-delete-square'),
            ])
            ->filters([
                Tables\Filters\TernaryFilter::make('published'),
            ])
            ->headerActions([
                Tables\Actions\CreateAction::make()
                    ->successNotificationMessage('New add-on question created'),
            ])
            ->actions([
                Tables\Actions\EditAction::make()
                    ->icon('flex-edit-circle')
                    ->size('md')
                    ->iconButton()
                    ->color('secondary')
                    ->successNotificationMessage('Add-on question updated'),
                Tables\Actions\DeleteAction::make()
                    ->icon('flex-delete-bin')
                    ->size('md')
                    ->iconButton()
                    ->successNotificationMessage('Add-on question deleted'),
            ])
            ->bulkActions([]);
    }

    protected function getTableEmptyStateHeading(): ?string
    {
        return 'No questions found';
    }

    protected function getTableEmptyStateDescription(): ?string
    {
        return 'Add any frequently asked questions that you think would help users.';
    }

    protected function getTableEmptyStateIcon(): ?string
    {
        return 'uxl-customer-doubt-1';
    }
}
