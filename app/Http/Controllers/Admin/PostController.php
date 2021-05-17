<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Language;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{

    private $gallery;

    public function __construct(PostGalleryController $gallery)
    {
        $this->gallery = $gallery;
    }

    public function index()
    {
        $languages = Language::all();
        $categories = Category::all();
        $posts = Post::paginate(10);
        return view('admin.posts.index')
            ->with('languages', $languages)
            ->with('categories', $categories)
            ->with('posts', $posts);
    }

    public function store(Request $request)
    {
        $post = Post::create([
            'language_id' => $request->input('language_id'),
            'category_id' => $request->input('category_id'),
            'title' => $request->input('title'),
            'description' => $request->input('description'),
        ]);
        $gallery = $this->gallery->store($request, $post);
        if ($post && $gallery){
            return back()->with('success', 'Данные успешно добавлены');
        }
    }

    public function show(Post $post)
    {
        //
    }

    public function update(Request $request, Post $post)
    {
        //
    }

    public function destroy(Post $post)
    {
        //
    }
}
