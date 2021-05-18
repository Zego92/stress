<?php

namespace App\Http\Controllers\Admin\Api;

use App\Http\Controllers\Controller;
use App\Traits\UploadImage;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class PostGallerySessionController extends Controller
{

    use UploadImage;

    public function store(Request $request)
    {
        Session::forget('images');
        try {
            $result['success'] = true;
            $images = $request->images;
            $this->convertBase64($images, 'post_galleries');
            $result['message'] = 'Изображения успешно добавлены';
            return response()->json($result, 200);
        }catch (\Exception $exception){
            $result['success'] = true;
            $result['code'] = $exception->getMessage();
            $result['message'] = $exception->getCode();
            return response()->json($result, 422);
        }

    }
}
