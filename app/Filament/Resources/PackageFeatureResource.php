<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PackageFeatureResource\Pages;
use App\Models\SubscriptionPackage;
use App\Models\Feature;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class PackageFeatureResource extends Resource
{
    protected static ?string $model = SubscriptionPackage::class; // Use SubscriptionPackage as the model

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function getNavigationGroup(): ?string
    {
        return __('admin.subscription_settings');
    }

    protected static ?int $navigationSort = 13;

    public static function getNavigationLabel(): string
    {
        return __('admin.package_features');
    }

    public static function getModelLabel(): string
    {
        return __('admin.package_feature');
    }

    public static function getPluralModelLabel(): string
    {
        return __('admin.package_features');
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                // Subscription Package Select Field
                Forms\Components\Select::make('id') 
                    ->label(__('admin.subscription_package'))
                    ->options(SubscriptionPackage::pluck('name_ar', 'id'))
                    ->searchable()
                    ->required()
                    ->reactive()
                    ->afterStateUpdated(function ($state, callable $set) {
                        $set('feature_id', []); 
                    }),

                // Features CheckboxList Field
                Forms\Components\CheckboxList::make('feature_id')
                    ->label(__('admin.features'))
                    ->options(Feature::pluck('name_ar', 'id'))
                    ->required()
                    ->relationship('features', 'name_ar'), 
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name_ar')
                    ->label(__('admin.package')),

                Tables\Columns\TextColumn::make('features.name_ar')
                    ->label(__('admin.features'))
                    ->formatStateUsing(function ($record) {
                        // Ensure the features relationship is loaded
                        if ($record->features) {
                            return $record->features->pluck('name_ar')->implode(', ');
                        }
                        return '';
                    }),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make()->button(),
                Tables\Actions\ViewAction::make()->button(),
                Tables\Actions\DeleteAction::make()->button(),


            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }

    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()
            ->withoutGlobalScopes([
                SoftDeletingScope::class,
            ])
            ->with('features'); // Eager load the features relationship
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
            'index' => Pages\ListPackageFeatures::route('/'),
            'create' => Pages\CreatePackageFeature::route('/create'),
            'edit' => Pages\EditPackageFeature::route('/{record}/edit'),
        ];
    }
}