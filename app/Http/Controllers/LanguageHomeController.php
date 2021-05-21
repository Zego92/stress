<?php

namespace App\Http\Controllers;

use App\Models\Language;
use Illuminate\Http\Request;

class LanguageHomeController extends Controller
{
    public function index(Request $request, Language $language)
    {
//        dd($language->mainHeader);
        $languages = Language::all();
        return view('user.home')
            ->with('language', $language)
            ->with('languages', $languages);
    }
}
