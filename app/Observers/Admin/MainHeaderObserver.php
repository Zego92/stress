<?php

namespace App\Observers\Admin;

use App\Models\MainHeader;
use Illuminate\Support\Facades\File;

class MainHeaderObserver
{
    public function created(MainHeader $mainHeader)
    {
        //
    }

    public function updated(MainHeader $mainHeader)
    {
        File::delete($mainHeader->brandLogoImage);
    }

    public function deleted(MainHeader $mainHeader)
    {
        File::delete($mainHeader->brandLogoImage);
    }

    public function restored(MainHeader $mainHeader)
    {
        //
    }

    public function forceDeleted(MainHeader $mainHeader)
    {
        //
    }
}
