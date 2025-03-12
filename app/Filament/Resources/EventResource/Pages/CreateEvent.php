<?php

namespace App\Filament\Resources\EventResource\Pages;

use App\Filament\Resources\EventResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
class CreateEvent extends CreateRecord
{
    protected static string $resource = EventResource::class;

    protected function afterCreate(): void
    {
        // Get the uploaded images
        $images = $this->form->getState()['images'];

        // Save each image to the images table
        foreach ($images as $image) {
            // Generate a random path for the image
            $randomPath = 'events/images/' . Str::uuid() . '.' . pathinfo($image, PATHINFO_EXTENSION);

            // Move the uploaded file to the new random path
            Storage::disk('public')->move($image, $randomPath);

            // Save the image details to the images table
            $this->record->images()->create([
                'path' => $randomPath,
                'original_name' => basename($image),
                'imageable_type' => 'App\Models\Event',
            ]);
        }
    }
}