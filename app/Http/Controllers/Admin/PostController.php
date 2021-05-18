<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Language;
use App\Models\Post;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

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
        $posts = Post::with('category', 'language')->withCount('galleries')->paginate(10);
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
            'image' => $request->file('image'),
            'title' => $request->input('title'),
            'slug' => $request->input('title'),
            'description' => $request->input('description'),
        ]);
        $this->gallery->store($request, $post);
        return back()->with('success', 'Данные успешно добавлены');
    }

    public function show(Post $post)
    {
        dd($post->galleries()->get());
    }

    public function update(Request $request, Post $post)
    {
        //
    }

    public function destroy(Post $post): RedirectResponse
    {
        try {
            $post->delete();
            return back()->with('success', 'Данные успешно удалены');
        }catch (\Exception $exception){
            return back()->with('error', $exception->getMessage());
        }
    }
}
