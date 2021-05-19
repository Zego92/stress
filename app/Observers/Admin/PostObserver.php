<?php

namespace App\Observers\Admin;

use App\Models\Language;
use App\Models\Post;
use App\Models\PostGallery;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

class PostObserver
{
    public function created(Post $post)
    {
        $languages = Language::where('id', '!=', $post->language_id)->get();

        foreach ($languages as $language){
            DB::table('posts')->insertGetId([
                'language_id' => $language->id,
                'category_id' => $post->category_id,
                'title' => $post->title,
                'slug' => Str::slug($post->title),
                'description' => $post->description,
                'image' => $post->image,
                'created_at' => $post->created_at,
                'updated_at' => $post->updated_at,
            ]);
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
