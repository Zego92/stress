<?php

namespace App\Observers\Admin;

use App\Models\PostGallery;

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
        //
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
