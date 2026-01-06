<?php

namespace App\Services;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;

class ImageUploadService
{
    protected ImageManager $imageManager;

    public function __construct()
    {
        $this->imageManager = new ImageManager(new Driver());
    }

    /**
     * Upload and process an image
     */
    public function upload(UploadedFile $file, string $directory = 'images', array $sizes = []): array
    {
        // Generate unique filename
        $filename = $this->generateFilename($file);
        
        // Default sizes if not provided
        if (empty($sizes)) {
            $sizes = [
                'original' => null,
                'large' => ['width' => 1200, 'height' => 800],
                'medium' => ['width' => 800, 'height' => 600],
                'thumbnail' => ['width' => 300, 'height' => 200],
            ];
        }

        $paths = [];

        foreach ($sizes as $sizeName => $dimensions) {
            $image = $this->imageManager->read($file->getRealPath());

            if ($dimensions !== null) {
                // Resize with aspect ratio
                $image->scale(
                    width: $dimensions['width'],
                    height: $dimensions['height']
                );
            }

            // Encode to WebP for better compression
            $encoded = $image->toWebp(quality: 85);

            // Generate path
            $path = "{$directory}/{$sizeName}_{$filename}.webp";

            // Store the image
            Storage::disk('public')->put($path, $encoded);

            $paths[$sizeName] = $path;
        }

        return $paths;
    }

    /**
     * Delete an image and all its variants
     */
    public function delete(string $path): bool
    {
        // Extract directory and filename pattern
        $directory = dirname($path);
        $filename = basename($path);
        
        // Remove size prefix (e.g., "original_", "large_")
        $baseFilename = preg_replace('/^(original|large|medium|thumbnail)_/', '', $filename);

        // Delete all variants
        $variants = ['original', 'large', 'medium', 'thumbnail'];
        foreach ($variants as $variant) {
            $variantPath = "{$directory}/{$variant}_{$baseFilename}";
            if (Storage::disk('public')->exists($variantPath)) {
                Storage::disk('public')->delete($variantPath);
            }
        }

        return true;
    }

    /**
     * Generate a unique filename
     */
    protected function generateFilename(UploadedFile $file): string
    {
        return Str::random(40);
    }

    /**
     * Get the public URL for an image
     */
    public function getUrl(string $path, string $size = 'original'): string
    {
        if (empty($path)) {
            return '';
        }

        // If path already includes size prefix, use as is
        if (preg_match('/^(original|large|medium|thumbnail)_/', basename($path))) {
            return Storage::disk('public')->url($path);
        }

        // Otherwise, add size prefix
        $directory = dirname($path);
        $filename = basename($path);
        $sizedPath = "{$directory}/{$size}_{$filename}";

        return Storage::disk('public')->url($sizedPath);
    }
}
