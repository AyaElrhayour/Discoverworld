<?php

namespace App\Services;

use App\Models\Image;
use App\Models\Adventure;
use Illuminate\Support\Str;

/**
 * Class ImageService.
 */
class ImageService
{
    public function store($images, Adventure $adventure)
    {
        foreach ($images as $image) {
            $imageName = $this->moveImage($image);
            Image::create([
                "name" => $imageName,
                "adventure_id" => $adventure->id
            ]);
        }
    }

    public function moveImage($image)
    {
        $imageName = Str::random(10)  .  time() . "." . $image->extension();
        $image->move(public_path('images/storage'), $imageName);
        return $imageName;
    }
}
