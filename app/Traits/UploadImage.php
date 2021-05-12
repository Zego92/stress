<?php


namespace App\Traits;

use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

trait UploadImage
{
    protected function uploadImage(string $attr, $value): string
    {
        if (!file_exists(public_path("uploads/image/$this->table/"))){
            mkdir(public_path("uploads/image/$this->table/"));
        }
        $imageName = Str::random(12) . '.png';
        Image::make($value)->save(public_path("uploads/image/$this->table/$imageName") , 100);
        return $this->attributes[$attr] = (string) "uploads/image/$this->table/$imageName";
    }
}
