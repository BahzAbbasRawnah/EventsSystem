<?php

namespace App\Filament\Resources;

use App\Filament\Resources\FAQResource\Pages;
use App\Filament\Resources\FAQResource\RelationManagers;
use App\Models\FAQ;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class FAQResource extends Resource
{
    protected static ?string $model = FAQ::class;
    protected static ?string $navigationIcon = 'heroicon-o-information-circle';

    protected static ?int $navigationSort = 31;
    public static function getNavigationGroup(): ?string
    {
        return __('admin.users');
    }
    public static function getModelLabel(): string
    {
        return __('admin.faq');
    }
    public static function getNavigationLabel(): string
    {
        return __('admin.faq');
    }
    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('question_en')
                    ->label(__('admin.question_en'))
                    ->required()
                    ->maxLength(255),

                Forms\Components\TextInput::make('question_ar')
                    ->label(__('admin.question_ar'))
                    ->required()
                    ->maxLength(255),

                Forms\Components\Textarea::make('answer_en')
                    ->label(__('admin.answer_en'))
                    ->required(),

                Forms\Components\Textarea::make('answer_ar')
                    ->label(__('admin.answer_ar'))
                    ->required(),

                Forms\Components\Toggle::make('is_active')
                    ->label(__('admin.status'))
                    ->default(true),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('question_en')
                    ->label(__('admin.question_en'))
                    ->searchable(),

                Tables\Columns\TextColumn::make('question_ar')
                    ->label(__('admin.question_ar'))
                    ->searchable(),

                Tables\Columns\BooleanColumn::make('is_active')
                    ->label(__('admin.status')),

                Tables\Columns\TextColumn::make('created_at')
                    ->label(__('admin.created_at'))
                    ->dateTime(),
            ])
            ->filters([
                Tables\Filters\TernaryFilter::make('is_active')
                    ->label(__('admin.status'))
                    ->trueLabel(__('admin.active'))
                    ->falseLabel(__('admin.inactive')),
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),

            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListFAQS::route('/'),
            'create' => Pages\CreateFAQ::route('/create'),
            'view' => Pages\ViewFAQ::route('/{record}'),
            'edit' => Pages\EditFAQ::route('/{record}/edit'),
        ];
    }
}
