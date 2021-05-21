<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Language;
use App\Models\Post;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index(Request $request, Language $language)
    {
        $languages = Language::all();
        $categories = Category::all();
        $posts = Post::paginate(6);
        return view('user.projects')
            ->with('language', $language)
            ->with('languages', $languages)
            ->with('categories', $categories)
            ->with('posts', $posts);
    }

    public function show(Language $language, Category $category, Post $post)
    {
        $languages = Language::all();
        return view('user.project')
            ->with('language', $language)
            ->with('category', $category)
            ->with('post', $post)
            ->with('languages', $languages);
    }
}
