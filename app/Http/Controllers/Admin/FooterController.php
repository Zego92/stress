<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Footer;
use App\Models\Language;
use Illuminate\Http\Request;

class FooterController extends Controller
{
    public function index()
    {
        $languages = Language::all();
        $footers = Footer::paginate(10);
        return view('admin.footer.index')
            ->with('languages', $languages)
            ->with('footers', $footers);
    }

    public function store(Request $request)
    {
        //
    }

    public function show(Footer $footer)
    {
        //
    }

    public function update(Request $request, Footer $footer)
    {
        //
    }

    public function destroy(Footer $footer)
    {
        //
    }
}
