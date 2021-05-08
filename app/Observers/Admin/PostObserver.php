<?php

namespace App\Observers\Admin;

use App\Models\Post;
use Illuminate\Support\Facades\File;

class PostObserver
{
    public function created(Post $post)
    {
        //
    }

    public function updated(Post $post)
    {
        //
    }

    public function deleted(Post $post)
    {
        File::delete('')
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
