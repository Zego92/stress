<?php

namespace App\Observers\Admin;

use App\Models\Language;
use App\Models\PostGallery;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class PostGalleryObserver
{
    public function created(PostGallery $postGallery)
    {
    }

    public function updated(PostGallery $postGallery)
    {
        //
    }

    public function deleted(PostGallery $postGallery)
    {
        File::delete($postGallery->image);
    }

    public function restored(PostGallery $postGallery)
    {
        //
    }

    public function forceDeleted(PostGallery $postGallery)
    {
        //
    }
}
