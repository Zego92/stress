<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\PostStoreRequest;
use App\Models\Category;
use App\Models\Language;
use App\Models\Post;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;

class PostController extends Controller
{
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

    public function store(PostStoreRequest $request): RedirectResponse
    {
        $data = $request->all();
        $data['slug'] = $request->input('title');
        Post::create($data);
        return back()->with('success', 'Данные успешно добавлены');
    }

    public function show(Post $post)
    {
        $languages = Language::all();
        $categories = Category::where('language_id', $post->language_id)->get();
        return view('admin.posts.show')
            ->with('post', $post)
            ->with('languages', $languages)
            ->with('categories', $categories);
    }

    public function update(Request $request, Post $post): RedirectResponse
    {
        if ($request->has('image')){
            $post->update(['image' => $request->file('image')]);
        }
        $post->update([
            'language_id' => $request->input('language_id'),
            'category_id' => $request->input('category_id'),
            'title' => $request->input('title'),
            'slug' => $request->input('title'),
            'description' => $request->input('description'),
        ]);
        return redirect()->route('admin.posts.index')->with('success', 'Данные успешно обновлены');
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
