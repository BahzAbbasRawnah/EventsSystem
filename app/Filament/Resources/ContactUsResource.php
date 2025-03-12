<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ContactUsResource\Pages;
use App\Models\ContactUs;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\Filter;

class ContactUsResource extends Resource
{
    protected static ?string $model = ContactUs::class;
    protected static ?string $navigationIcon = 'heroicon-o-chat-bubble-oval-left-ellipsis';

    protected static ?int $navigationSort = 31;
    public static function getNavigationGroup(): ?string
    {
        return __('admin.users');
    }
    public static function getModelLabel(): string
    {
        return __('admin.contact_us');
    }
    public static function getNavigationLabel(): string
    {
        return __('admin.contact_us');
    }
    public static function table(Tables\Table $table): Tables\Table
    {
        return $table
            ->columns([
                TextColumn::make('name')->label(__('admin.name'))->searchable(),
                TextColumn::make('email')->label(__('admin.email'))->searchable(),
                TextColumn::make('message')->label(__('admin.message'))->limit(50),
                TextColumn::make('created_at')->label(__('admin.created_at'))->dateTime(),
            ])
            ->filters([
                Filter::make('recent')->query(fn ($query) => $query->latest()),
            ])
            ->defaultSort('created_at', 'desc');
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListContactUs::route('/'),
        ];
    }
}
