<?php

namespace App\Traits;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

trait UploadTrait
{
    public function uploadThumbnail(UploadedFile $uploadedFile, $slug, $image = null)
    {
        if ($image)  Storage::disk('public')->delete($image);
        $image_name = 'thumbnail-of-'.$slug.'.'.$uploadedFile->getClientOriginalExtension();
        $file = Storage::disk('public')->putFileAs("posts/$slug", $uploadedFile, $image_name);

        return $file;
    }

}
