<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SubscriptionPackageResource\Pages;
use App\Filament\Resources\SubscriptionPackageResource\RelationManagers;
use App\Models\SubscriptionPackage;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

use function Laravel\Prompts\search;

class SubscriptionPackageResource extends Resource
{
    protected static ?string $model = SubscriptionPackage::class;

    public static function getNavigationLabel(): string
    {
        return __('admin.subscription_packages');
    }
    public static function getModelLabel(): string
    {
        return __('admin.subscription_package');
    }
    public static function getPluralModelLabel(): string
{
    return __('admin.subscription_packages');
}
    protected static ?string $navigationIcon = 'heroicon-o-banknotes';

    public static function getNavigationGroup(): ?string
    {
        return __('admin.subscription_settings');
    }
    protected static ?int $navigationSort = 11;

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
                Forms\Components\Select::make('period') 
                    ->options([
                        'daily' => 'Daily',
                        'weekly' => 'Weekly',
                        'monthly' => 'Monthly',
                        'yearly' => 'Yearly',
                    ])  
                    ->required()
                    ->label(__('admin.period')),
                Forms\Components\TextInput::make('price')
                    ->required()
                    ->numeric()
                    ->maxLength(255)
                    ->label(__('admin.price')),
                Forms\Components\Textarea::make('description')
                    ->maxLength(255)
                    ->label(__('admin.description')),

            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name_en')
                    ->label(__('admin.name_en'))
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('name_ar')
                    ->label(__('admin.name_ar'))
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('price')
                    ->label(__('admin.price'))
                    ->sortable(),
                Tables\Columns\TextColumn::make('period')
                    ->label(__('admin.period'))
                    ->sortable(),
                Tables\Columns\TextColumn::make('description')
                    ->label(__('admin.description'))
                    ->searchable(),
                    Tables\Columns\TextColumn::make('created_at')
                    ->label(__('admin.created_at'))
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                    Tables\Columns\TextColumn::make('updated_at')
                    ->label(__('admin.updated_at'))
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                 
            ])
            ->filters([
                Tables\Filters\TrashedFilter::make(),
            ])
            ->actions([
                Tables\Actions\ViewAction::make()->button(),
                Tables\Actions\EditAction::make()->button(),
                Tables\Actions\DeleteAction::make()->button(),
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
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListSubscriptionPackages::route('/'),
            'create' => Pages\CreateSubscriptionPackage::route('/create'),
            'view' => Pages\ViewSubscriptionPackage::route('/{record}'),
            'edit' => Pages\EditSubscriptionPackage::route('/{record}/edit'),
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
