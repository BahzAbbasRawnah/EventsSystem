<?php

namespace App\Filament\Resources\PackageFeatureResource\Pages;

use App\Filament\Resources\PackageFeatureResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListPackageFeatures extends ListRecords
{
    protected static string $resource = PackageFeatureResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
