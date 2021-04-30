<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\LanguageStoreRequest;
use App\Models\Language;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class LanguageController extends Controller
{
    public function index()
    {
        $languages = Language::all();
        return view('admin.language.index', compact('languages'));
    }

    public function store(LanguageStoreRequest $request): RedirectResponse
    {
        Language::create([
            'code' => $request->code
        ]);
        return back()->with('success', 'Новый язык успешно добавлен');
    }

    public function show(Language $language)
    {
        return view('admin.language.show', compact('language'));
    }

    public function update(Request $request, Language $language)
    {
        //
    }

    public function destroy(Language $language)
    {
        //
    }
}
