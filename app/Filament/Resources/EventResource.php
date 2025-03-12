<?php

namespace App\Filament\Resources;

use App\Filament\Resources\EventResource\Pages;
use App\Filament\Resources\EventResource\RelationManagers;
use App\Models\Event;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Models\Category;
use App\Models\City;
use App\Models\Country;
use App\Models\District;
use Livewire\Features\SupportFileUploads\TemporaryUploadedFile;
use Illuminate\Database\Eloquent\Builder;
use Filament\Forms\Get;

class EventResource extends Resource
{
    protected static ?string $model = Event::class;
    public static function getNavigationLabel(): string
    {
        return __('admin.events');
    }
    public static function getModelLabel(): string
    {
        return __('admin.event');
    }
    public static function getPluralModelLabel(): string
{
    return __('admin.events');
}
    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?int $navigationSort = 21;

    public static function getNavigationGroup(): ?string
    {
        return __('admin.events');
    }
    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('category_id')
                ->label(__('admin.category')) 
                ->options(Category::all()->pluck('name', 'id')) 
                ->searchable() 
                ->required(),
                Forms\Components\Select::make('country_id')
                ->label(__('admin.country'))
                ->options(Country::all()->pluck('name_ar', 'id'))
                ->searchable()
                ->required()
                ->live(), // Make the select reactive
            
            Forms\Components\Select::make('city_id')
                ->label(__('admin.city'))
                ->options(function (Get $get) {
                    // Load cities based on the selected country
                    return City::where('country_id', $get('country_id'))
                        ->pluck('name_ar', 'id');
                })
                ->searchable()
                ->required()
                ->live(), // Make the select reactive
            
            Forms\Components\Select::make('district_id')
                ->label(__('admin.district'))
                ->options(function (Get $get) {
                    // Load districts based on the selected city
                    return District::where('city_id', $get('city_id'))
                        ->pluck('name_ar', 'id');
                })
                ->searchable()
                ->required(),

                 Forms\Components\Hidden::make('user_id')
                ->default(auth()->user()->id),
                Forms\Components\TextInput::make('name_en')
                ->required()
                ->maxLength(255)
                ->label(__('admin.name_en')),
                Forms\Components\TextInput::make('name_ar')
                ->required()
                ->maxLength(255)
                ->label(__('admin.name_ar')),
                Forms\Components\TextInput::make('ticket_price')
                ->required()
                ->numeric()
                ->maxLength(255)
                ->label(__('admin.ticket_price')),
                Forms\Components\TextInput::make('tickets_quantity')
                ->required()
                ->numeric()
                ->maxLength(255)
                ->label(__('admin.tickets_quantity')),
                Forms\Components\DateTimePicker::make('start_date')
                ->displayFormat('d/m/Y')
                ->required()
                ->label(__('admin.start_date')),
                Forms\Components\DateTimePicker::make('end_date')
                ->displayFormat('d/m/Y')
                ->required()
                ->after('start_date')
                ->label(__('admin.end_date')),

                Forms\Components\Textarea::make('description_en')
                ->maxLength(255)
                ->label(__('admin.description_en')),

                Forms\Components\Textarea::make('description_ar')
                ->maxLength(255)
                ->label(__('admin.description_ar')),

                Forms\Components\FileUpload::make('images')
                ->multiple()
                ->image()
                ->label(__('admin.image'))
                ->directory('events/images')
                ->preserveFilenames()
                ->getUploadedFileNameForStorageUsing(function (TemporaryUploadedFile $file): string {
                    return $file->getClientOriginalName();
                })
             
                ->required(),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                ->label(__('admin.name'))
                ->searchable(query: function (Builder $query, string $search) {
                    $query->where(function (Builder $query) use ($search) {
                        $query->where('name_ar', 'like', "%{$search}%")
                              ->orWhere('name_en', 'like', "%{$search}%");
                    });
                })
                ->sortable(query: function (Builder $query, string $direction) {
                    $query->orderBy('name_ar', $direction)
                          ->orderBy('name_en', $direction);
                }),

                Tables\Columns\TextColumn::make('ticket_price')
                ->label(__('admin.ticket_price'))
                ->sortable(),


                Tables\Columns\TextColumn::make('tickets_quantity')
                ->label(__('admin.tickets_quantity')),
                Tables\Columns\TextColumn::make('start_date')
                ->label(__('admin.start_date'))
                ->sortable()
                ->toggleable(isToggledHiddenByDefault: true),

                Tables\Columns\TextColumn::make('country.name_ar')
                ->label(__('admin.country'))
                ->searchable()
                ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('city.name_ar')
                ->label(__('admin.city'))
                ->searchable()
                ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('end_date')
                ->label(__('admin.end_date'))
                ->sortable()
                ->toggleable(isToggledHiddenByDefault: true),



                Tables\Columns\TextColumn::make('district.name_ar')
                ->label(__('admin.district'))
                ->searchable()
                ->sortable(),

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
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListEvents::route('/'),
            'create' => Pages\CreateEvent::route('/create'),
            'view' => Pages\ViewEvent::route('/{record}'),
            'edit' => Pages\EditEvent::route('/{record}/edit'),
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
