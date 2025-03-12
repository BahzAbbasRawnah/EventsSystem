<?php

namespace App\Filament\Resources\SubscriptionPackageResource\Pages;

use App\Filament\Resources\SubscriptionPackageResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewSubscriptionPackage extends ViewRecord
{
    protected static string $resource = SubscriptionPackageResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
