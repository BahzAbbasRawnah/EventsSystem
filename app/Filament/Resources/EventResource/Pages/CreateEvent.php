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

        foreach ($images as $image) {
            $randomFileName = Str::uuid() . '.' . pathinfo($image, PATHINFO_EXTENSION);
            $randomPath = 'images/' . $randomFileName; // Correct path under Assets/

            // Ensure image is stored in Assets/ folder instead of public/storage
            $imageContent = Storage::disk('public')->get($image); // Read file content
            Storage::disk('assets')->put($randomPath, $imageContent); // Store in Assets/

            // Delete the old image from public disk
            Storage::disk('public')->delete($image);

            // Save the new path to the database
            $this->record->images()->create([
                'path' => $randomPath,
                'original_name' => basename($image),
                'imageable_type' => 'App\Models\Event',
            ]);
        }
    }
}
