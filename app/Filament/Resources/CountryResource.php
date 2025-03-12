<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CountryResource\Pages;
use App\Models\Country;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class CountryResource extends Resource
{
    protected static ?string $model = Country::class;
    public static function getNavigationLabel(): string
    {
        return __('admin.countries');
    }
    protected static ?string $navigationIcon = 'heroicon-o-flag'; 
    public static function getNavigationGroup(): ?string
    {
        return __('admin.address_settings');
    }
    public static function getModelLabel(): string
    {
        return __('admin.country');
    }
    public static function getPluralModelLabel(): string
{
    return __('admin.countries');
}
    protected static ?int $navigationSort = 1;
    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name_en')
                    ->required()
                    ->maxLength(255)
                    ->label(__('admin.name_en')),
                Forms\Components\TextInput::make('name_ar')
                    ->required()
                    ->maxLength(255)
                    ->label(__('admin.name_ar')),
                Forms\Components\TextInput::make('flag')
                    ->maxLength(10)
                    ->label(__('admin.flag')),
                Forms\Components\TextInput::make('code')
                    ->required()
                    ->maxLength(10)
                    ->label(__('admin.code')),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name_en')
                    ->searchable()
                    ->label(__('admin.name_en')),

                Tables\Columns\TextColumn::make('name_ar')
                    ->searchable()
                    ->label(__('admin.name_ar')),
                Tables\Columns\TextColumn::make('flag')
                    ->searchable()
                    ->label(__('admin.flag')),
                Tables\Columns\TextColumn::make('code')
                    ->searchable()
                    ->label(__('admin.code')),
               
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->label(__('admin.created_at'))
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->label(__('admin.updated_at'))
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                Tables\Filters\TrashedFilter::make(),
            ])
            ->actions([
                Tables\Actions\ViewAction::make()->label(__('admin.view'))
                ->button(),
                Tables\Actions\EditAction::make()->label(__('admin.edit'))
                ->button(),
                Tables\Actions\DeleteAction::make()
                ->button(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                    Tables\Actions\ForceDeleteBulkAction::make(),
                    Tables\Actions\RestoreBulkAction::make(),
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
            'index' => Pages\ListCountries::route('/'),
            'create' => Pages\CreateCountry::route('/create'),
            'view' => Pages\ViewCountry::route('/{record}'),
            'edit' => Pages\EditCountry::route('/{record}/edit'),
        ];
    }

    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()
            ->withoutGlobalScopes([
                SoftDeletingScope::class,
            ]);
    }
}