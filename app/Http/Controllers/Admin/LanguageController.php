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
        return redirect()->back()->with('success', 'Данные успешно добавлены');
    }

    public function show(Language $language)
    {
        return view('admin.language.show', compact('language'));
    }


    public function destroy(Language $language): RedirectResponse
    {
        try {
            $language->delete();
            return back()->with('success', 'Данные успешно удалены');
        }catch (\Exception $exception){
            return back()->with('error', $exception->getMessage());
        }
    }
}
