<?php

namespace App\Traits;

use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Laravel\Facades\Image;


trait HandlesUserImages
{
    public function updateUserImage($imageFile, $user, $diskName = 'users')
    {
        $disk = Storage::disk($diskName);

        // Remove existing images
        $this->removeExistingImages($user, $disk);

        // Upload new image
        $imagePath = $imageFile->store('', $diskName);

        // Generate thumbnail
        $this->createThumbnail($imageFile, $imagePath, $disk);

        return $imagePath;
    }

    protected function removeExistingImages($user, $disk)
    {
        if ($user->image) {
            $images = [
                $user->image,
                $this->getThumbPath($user->image)
            ];

            foreach ($images as $image) {
                if ($disk->exists($image)) {
                    $disk->delete($image);
                }
            }
        }
    }

    protected function getThumbPath($originalPath)
    {
        $info = pathinfo($originalPath);

        return  'thumbs/' . $info['basename'] ;
    }

    protected function createThumbnail($imageFile, $originalPath, $disk)
    {
        try {
            // Use the correct method for Laravel 10+
            $image = Image::read($imageFile->getRealPath()); // Use read() instead of make()

            $image->cover(150,150);

            $thumbPath = $this->getThumbPath($originalPath);

            // Encode and save the image
            $disk->put($thumbPath, (string) $image->encode());

        } catch (\Exception $e) {
            // Log error or handle gracefully
            Log::error('Thumbnail creation failed: ' . $e->getMessage());
        }
    }
}
