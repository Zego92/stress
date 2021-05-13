<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\MainHeaderStoreRequest;
use App\Http\Requests\Admin\MainHeaderUpdateRequest;
use App\Models\Language;
use App\Models\MainHeader;
use App\Traits\UploadImage;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class MainHeaderController extends Controller
{
    public function index()
    {
        $headers = MainHeader::with('language')->paginate(10);
        $languages = Language::all();
        return view('admin.mainHeader.index')
            ->with('headers', $headers)
            ->with('languages', $languages);
    }

    public function store(MainHeaderStoreRequest $request): RedirectResponse
    {
        MainHeader::create([
            'language_id' => $request->language_id,
            'brandLogoImage' => $request->file('brandLogoImage'),
            'homeTitle' => $request->homeTitle,
            'ourProjectsTitle' => $request->ourProjectsTitle,
            'contactTitle' => $request->contactTitle,
            'feedbackTitle' => $request->feedbackTitle,
        ]);
        return back()->with('success', 'Данные успешно добавлены');
    }

    public function show(MainHeader $header)
    {
        $languages = Language::all();
        return view('admin.mainHeader.show')
            ->with('header', $header)
            ->with('languages', $languages);
    }

    public function update(MainHeaderUpdateRequest $request, MainHeader $header): RedirectResponse
    {
        File::delete($header->brandLogoImage);
        $header->update([
            'language_id' => $request->language_id,
            'brandLogoImage' => $request->file('brandLogoImage'),
            'homeTitle' => $request->homeTitle,
            'ourProjectsTitle' => $request->ourProjectsTitle,
            'contactTitle' => $request->contactTitle,
            'feedbackTitle' => $request->feedbackTitle,
        ]);
        return redirect()->route('admin.header.index')->with('success', 'Данные успешно обновлены');
    }

    public function destroy(MainHeader $header): RedirectResponse
    {
        try {
            $header->delete();
            return back()->with('success', 'Данные успешно удалены');
        }catch (\Exception $exception){
            return back()->with('error', $exception->getMessage());
        }
    }
}
