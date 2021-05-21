<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Language;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function show(Language $language, Category $category)
    {

        $categories = Category::all();
        $languages = Language::all();
        $category->setRelation('posts', $category->posts()->paginate(6));
//        dd($category);
        return view('user.category')
            ->with('category', $category)
            ->with('language', $language)
            ->with('languages', $languages)
            ->with('categories', $categories);
    }
}
