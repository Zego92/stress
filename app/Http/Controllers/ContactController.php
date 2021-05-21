<?php

namespace App\Http\Controllers;

use App\Models\Language;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function show(Request $request, Language $language)
    {
        $languages = Language::all();
        return view('user.contacts')
            ->with('language', $language)
            ->with('languages', $languages);

    }
}
