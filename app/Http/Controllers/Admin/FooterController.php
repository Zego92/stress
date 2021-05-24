<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\FooterStoreRequest;
use App\Http\Requests\Admin\FooterUpdateRequest;
use App\Models\Footer;
use App\Models\Language;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class FooterController extends Controller
{
    public function index()
    {
        $languages = Language::all();
        $footers = Footer::with('language')
            ->paginate(10);
        return view('admin.footer.index')
            ->with('languages', $languages)
            ->with('footers', $footers);
    }

    public function store(FooterStoreRequest $request): RedirectResponse
    {
        $data = $request->all();
        Footer::create($data);
        return redirect()->back()->with('success', 'Данные успешно добавлены');
    }

    public function show(Footer $footer)
    {
        $languages = Language::all();
        return view('admin.footer.show')
            ->with('footer', $footer)
            ->with('languages', $languages);
    }

    public function update(FooterUpdateRequest $request, Footer $footer): RedirectResponse
    {
        $data = $request->all();
        $footer->update($data);
        return redirect()->route('admin.footer.index')->with('success', 'Данные успешно обновлены');
    }

    public function destroy(Footer $footer): RedirectResponse
    {
        try {
            $footer->delete();
            return back()->with('success', 'Данные успешно обновлены');
        }catch (\Exception $exception){
            return back()->with('error', $exception->getMessage());
        }
    }
}
