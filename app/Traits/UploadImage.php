<?php


namespace App\Traits;

use Illuminate\Support\Facades\Session;
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

    protected function convertBase64(array $images, string $tableName)
    {
        if (!is_array($images)){
            return false;
        }
        $uploadDir = public_path('uploads/');
        $imageDir = public_path('uploads/image/');
        if (!file_exists($uploadDir)){
            mkdir($uploadDir);
        }
        if (!file_exists($imageDir)){
            mkdir($imageDir);
        }
        if (!file_exists(public_path("uploads/image/$tableName/"))){
            mkdir(public_path("uploads/image/$tableName/"));
        }
        $galleries = [];
        foreach ($images as $image){
            $explode_1 = explode(';', $image);
            $explode_2 = explode('/', $explode_1[0]);
            $imageName = Str::random(12) . '.' . $explode_2[1];
            array_push($galleries, "uploads/image/$tableName/$imageName");
            Image::make($image)->save(public_path("uploads/image/$tableName/$imageName") , 100);
        }
        $collection = collect($galleries);
        Session::push('images', $collection);
    }

}
