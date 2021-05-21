<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\PostGallery;
use App\Traits\UploadImage;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;

class PostGalleryController extends Controller
{

    use UploadImage;

    public function store(Request $request): RedirectResponse
    {
        $images = Session::get('images');
        foreach ($images as $value){
            foreach ($value as $item){
                $gallery = new PostGallery();
                $gallery->post_id = $request->post_id;
                $gallery->image = $item;
                $gallery->save();
                Session::forget('images');
            }

        }
        return back()->with('success', 'Данные успешно добавлены');
    }

    public function destroy(PostGallery $gallery)
    {
        try {
            $gallery->delete();
            return back()->with('success', 'Данные успешно удалены');
        }catch (\Exception $exception){
            return back()->with('error', $exception->getMessage());
        }
    }
}
