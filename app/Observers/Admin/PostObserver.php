<?php

namespace App\Observers\Admin;

use App\Models\Language;
use App\Models\Post;
use App\Models\PostGallery;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class PostObserver
{
    public function created(Post $post)
    {
        $galleries = PostGallery::where('post_id', $post->id)->get();
        $languages = Language::where('code', '!=', $post->language->code)->get();
        foreach ($languages as $language){
            DB::table('posts')->insert([
                'language_id' => $language->id,
                'category_id' => $post->category_id,
                'title' => $post->title,
                'slug' => Str::slug($post->title),
                'description' => $post->description,
                'image' => $post->image,
            ]);
        }
        if (isset($galleries) && !empty($galleries)){
            foreach ($galleries as $gallery){
                DB::table('post_galleries')->insert([
                    'post_id' => $post->id,
                    'image' => $gallery->image,
                ]);
            }
        }

    }

    public function updated(Post $post)
    {
        //
    }

    public function deleted(Post $post)
    {
        File::delete($post->image);
    }

    public function restored(Post $post)
    {
        //
    }

    public function forceDeleted(Post $post)
    {
        //
    }
}
