<?php

namespace App\Helpers;
use Illuminate\Support\Facades\Storage;




class Helper{
    public static function handleImageUpload($image, $folder = 'products', $existingImagePath = null) {
        
        if ($image) {
            // Delete the existing image if provided
            if ($existingImagePath) {
                \Storage::disk('public')->delete($existingImagePath);
            }
            
            // Store the new image
            return $image->store($folder, 'public');
        }
        return $existingImagePath;
    }
}
?>
