<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\PostGallery;
use App\Traits\UploadImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class PostGalleryController extends Controller
{

    use UploadImage;

    public function store(Request $request, Post $post)
    {
        $images = Session::get('images');
        foreach ($images as $key => $value){
            foreach ($value as $item){
                $gallery = new PostGallery();
                $gallery->post_id = $post->id;
                $gallery->image = $item;
                $gallery->save();
            }

        }
    }

    public function update(Request $request, PostGallery $gallery)
    {
        //
    }

    public function destroy(PostGallery $gallery)
    {
        //
    }
}
