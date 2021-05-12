<?php


namespace App\Traits;

use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

trait UploadImage
{
    protected function uploadImage(string $attr, $value): string
    {
        $uploadDir = public_path('uploads/');
        $imageDir = public_path('uploads/image/');
        if (!file_exists($uploadDir)){
            mkdir($uploadDir);
        }
        if (!file_exists($imageDir)){
            mkdir($imageDir);
        }
        if (!file_exists(public_path("uploads/image/$this->table/"))){
            mkdir(public_path("uploads/image/$this->table/"));
        }
        $imageName = Str::random(12) . '.png';
        Image::make($value)->save(public_path("uploads/image/$this->table/$imageName") , 100);
        return $this->attributes[$attr] = (string) "uploads/image/$this->table/$imageName";
    }
}
