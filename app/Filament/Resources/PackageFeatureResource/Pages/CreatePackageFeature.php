<?php

namespace App\Filament\Resources\PackageFeatureResource\Pages;

use App\Filament\Resources\PackageFeatureResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreatePackageFeature extends CreateRecord
{
    protected static string $resource = PackageFeatureResource::class;
    protected function afterCreate(): void
{
    // Get the selected features
    $featureIds = $this->form->getState()['feature_id'];

    // Attach the selected features to the subscription package
    $this->record->features()->sync($featureIds);
}
}
