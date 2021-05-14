<?php

namespace App\Observers\Admin;

use App\Models\Category;
use Illuminate\Support\Facades\File;

class CategoryObserver
{
    public function created(Category $category)
    {
        //
    }

    public function updated(Category $category)
    {
        //
    }

    public function deleted(Category $category)
    {
        File::delete($category->image);
    }

    public function restored(Category $category)
    {
        //
    }

    public function forceDeleted(Category $category)
    {
        //
    }
}
