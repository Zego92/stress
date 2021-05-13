<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Language;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class CategoryController extends Controller
{
    public function index()
    {
        $languages = Language::all();
        $categories = Category::with('language')
            ->withCount('posts')
            ->paginate(10);
        return view('admin.categories.index')
            ->with('languages', $languages)
            ->with('categories', $categories);
    }

    public function store(Request $request): RedirectResponse
    {
        Category::create([
            'language_id' => $request->input('category_id'),
            'name' => $request->input('name'),
            'image' => $request->file('image')
        ]);
        return back()->with('success', 'Данные успешно добавлены');
    }

    public function show(Category $category)
    {
        $languages = Language::all();
        return view('admin.categories.show')
            ->with('category', $category)
            ->with('languages', $languages);
    }

    public function update(Request $request, Category $category)
    {
        File::delete($category->image);
        $category->update([
            'language_id' => $request->input('language_id'),
            'name' => $request->input('name'),
            'image' => $request->file('image'),
        ]);
    }

    public function destroy(Category $category): RedirectResponse
    {
        try {
            $category->delete();
            return back()->with('success', 'Данные успешно удалены');
        }catch (\Exception $exception){
            return back()->with('error', $exception->getMessage());
        }
    }
}
