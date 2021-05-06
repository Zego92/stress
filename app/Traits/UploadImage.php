<?php


namespace App\Traits;


use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

trait UploadImage
{
    protected function uploadImage(string $attr, $value): string
    {
        $imageName = Str::random();
        Image::make($value)->save(storage_path('/uploads/' . $this->table . '/' . $imageName), 250, 'png');
        return $this->attributes[$attr] = $imageName;
    }
}
