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
//        $galleries = PostGallery::where('post_id', '=', $post->id)->get();
        $galleries = $post->galleries()->where('post_id', '=', $post->id)->get();
        $languages = Language::where('code', '!=', $post->language->code)->get();
        $id = 0;
        foreach ($galleries as $gallery){
            info($gallery);
        }

        foreach ($languages as $language){
            $id = $item = DB::table('posts')->insertGetId([
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
        foreach ($galleries as $gallery){
            DB::table('post_galleries')->insert([
                'post_id' => $id,
                'image' => $gallery->image ?? 'no-image.png',
            ]);
        }


    }

    public function updated(Post $post)
    {
        //
    }

    public function deleted(Post $post)
    {
        $gallery = PostGallery::where('post_id', $post->id)->get();
        info($gallery);
//        foreach ($post->galleries()->get() as $gallery){
//            info('deleteGallery',$gallery);
//            File::delete($gallery->image);
//        }
//        foreach (Post::where('slug', $post->slug)->get() as $item){
//            $item->delete();
//        }
//        File::delete($post->image);


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
