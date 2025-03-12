<?php

namespace App\Filament\Resources\PackageFeatureResource\Pages;

use App\Filament\Resources\PackageFeatureResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditPackageFeature extends EditRecord
{
    protected static string $resource = PackageFeatureResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
            Actions\ForceDeleteAction::make(),
            Actions\RestoreAction::make(),
        ];
    }
}
