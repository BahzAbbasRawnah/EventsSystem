<?php

namespace App\Filament\Resources;

use App\Filament\Resources\BookingResource\Pages;
use App\Filament\Resources\BookingResource\RelationManagers;
use App\Models\Booking;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class BookingResource extends Resource
{
    protected static ?string $model = Booking::class;
    public static function getNavigationLabel(): string
    {
        return __('admin.bookings');
    }
    public static function getModelLabel(): string
    {
        return __('admin.booking');
    }
    public static function getPluralModelLabel(): string
{
    return __('admin.bookings');
}
    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?int $navigationSort = 51;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('event.name')
                ->searchable()
                ->sortable()
                ->label(__('admin.event')),
                Tables\Columns\TextColumn::make('user.name')
                ->searchable()
                ->label(__('admin.full_name')),
                Tables\Columns\TextColumn::make('user.email')
                ->searchable()
                ->label(__('admin.email')),
                Tables\Columns\TextColumn::make('event.start_date')
                ->sortable()
                ->label(__('admin.start_date')),
                Tables\Columns\TextColumn::make('event.end_date')
                ->sortable()
                ->label(__('admin.end_date')),
                Tables\Columns\TextColumn::make('tickets_count')
                ->label(__('admin.tickets'))
                ->searchable()
                ->sortable(),
            
                Tables\Columns\TextColumn::make('ticket_price')
                ->label(__('admin.price'))
                ->searchable()
                ->sortable(),
            
                Tables\Columns\TextColumn::make('total_price')
                ->label(__('admin.total_price'))
                ->searchable()
                ->sortable()
                ->getStateUsing(function (Booking $record): float {
                    return $record->ticket_price * $record->tickets_count;
                })
                ->numeric()  
                ->money('SAR'),  
                Tables\Columns\TextColumn::make('created_at')
                ->sortable()
                ->label(__('admin.created_at'))
                ->dateTime()
                ->toggleable(isToggledHiddenByDefault: true)
                ,
                Tables\Columns\BadgeColumn::make('status')
   ->label(__('admin.status'))
    ->colors([
        'warning' => 'pending',
        'success' => 'approved',
        'danger' => 'rejected',
        'danger' => 'cancelled',
        'success' => 'finished',
    ])

     
            ])
            ->filters([
                Tables\Filters\TrashedFilter::make(),
            ])
            ->actions([
                Tables\Actions\ViewAction::make()
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
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListBookings::route('/'),
            'view' => Pages\ViewBooking::route('/{record}'),
            'edit' => Pages\EditBooking::route('/{record}/edit'),
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
