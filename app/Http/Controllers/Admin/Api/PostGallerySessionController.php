<?php

namespace App\Http\Controllers\Admin\Api;

use App\Http\Controllers\Controller;
use App\Traits\UploadImage;
use Illuminate\Http\Request;

class PostGallerySessionController extends Controller
{

    use UploadImage;

    public function store(Request $request)
    {
        $images = $request->images;
        $this->convertBase64($images);
    }
}
