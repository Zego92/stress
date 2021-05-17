<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\PostGallery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

class PostGalleryController extends Controller
{
    public function store(Request $request, Post $post)
    {
        foreach (Session::get('images') as $image){
            Image::make($image)->save(public_path("uploads/image/post_galleries/$image"), 100);
            PostGallery::create([
                'post_id' => $post->id,
                'image' => $image
            ]);
        }
        return true;
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
