<?php

namespace App\Http\Controllers;

use App\Models\Language;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $language = Language::where('code', '=', 'ru')->first();
        return redirect()->route('user.language.home', $language);
    }
}
