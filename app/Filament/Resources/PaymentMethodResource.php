<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PaymentMethodResource\Pages;
use App\Filament\Resources\PaymentMethodResource\RelationManagers;
use App\Models\PaymentMethod;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\FileUpload;
use PhpParser\Node\Stmt\Label;
class PaymentMethodResource extends Resource
{
    protected static ?string $model = PaymentMethod::class;

    protected static ?string $navigationIcon = 'heroicon-o-credit-card';
    public static function getNavigationLabel(): string
    {
        return __('admin.payment_methods');
    }
    public static function getModelLabel(): string
    {
        return __('admin.payment_method');
    }
    public static function getPluralModelLabel(): string
{
    return __('admin.payment_methods');
}
    protected static ?int $navigationSort = 50;
  
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
          
                Forms\Components\TextInput::make('code')
                    ->required()
                    ->maxLength(10)
                    ->label(__('admin.code')),
                    FileUpload::make('image')
                    ->required()
                    ->image()
                    ->disk('public')
                    ->directory('payment_methods') 
                    ->maxSize(1024)
                    ->label(__('admin.image')),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name_en')
                ->searchable()
                ->label(__('admin.name_en'))
                ,
                Tables\Columns\TextColumn::make('name_ar')
                ->searchable()
                ->label(__('admin.name_ar'))
                ,
                Tables\Columns\TextColumn::make('code')
                ->searchable()
                ->label(__('admin.code'))
                ,
                Tables\Columns\TextColumn::make('created_at')
                ->sortable()
                ->label(__('admin.created_at'))
                ->dateTime()
                ->toggleable(isToggledHiddenByDefault: true)
                ,
                Tables\Columns\TextColumn::make('updated_at')
                ->sortable()
                ->label(__('admin.updated_at'))
                ->dateTime()
                ->toggleable(isToggledHiddenByDefault: true)
                ,
            
                // Tables\Columns\ImageColumn::make('image')
                // ->circular()
                // ->disk('public') 
                // ->width(100) 
                // ->height(100) 
                // ->defaultImageUrl(asset('storage/payment_methods/mony.png')) // Default image URL
                // ->label(__('admin.image')),
                
            ])
            ->filters([
                Tables\Filters\TrashedFilter::make(),
            ])
            ->actions([
                Tables\Actions\ViewAction::make()
                ->button(),
                Tables\Actions\EditAction::make()
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
        return [
            
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListPaymentMethods::route('/'),
            'create' => Pages\CreatePaymentMethod::route('/create'),
            'view' => Pages\ViewPaymentMethod::route('/{record}'),
            'edit' => Pages\EditPaymentMethod::route('/{record}/edit'),
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
