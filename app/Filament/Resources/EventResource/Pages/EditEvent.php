<?php

namespace App\Filament\Resources\EventResource\Pages;

use App\Filament\Resources\EventResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditEvent extends EditRecord
{
    protected static string $resource = EventResource::class;
    protected function afterSave(): void
    {
        // Get the uploaded images
        $images = $this->form->getState()['images'];

        // Save each image to the images table
        foreach ($images as $image) {
            $this->record->images()->create([
                'path' => $image,
                'original_name' => basename($image),
                'imageable_type' => 'App\Models\Event',
            ]);
        }
    }
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
