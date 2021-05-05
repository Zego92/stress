<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\MainHeaderStoreRequest;
use App\Http\Requests\Admin\MainHeaderUpdateRequest;
use App\Models\MainHeader;

class MainHeaderController extends Controller
{
    public function index()
    {
        $headers = MainHeader::with('country')->paginate(6);
        return view('admin.mainHeader.index', compact('headers'));
    }

    public function store(MainHeaderStoreRequest $request)
    {
        MainHeader::create([
            'language_id' => $request->language_id,
            'brandLogoImage' => $request->brandLogoImage,
            'homeTitle' => $request->homeTitle,
            'ourProjectsTitle' => $request->ourProjectsTitle,
            'contactTitle' => $request->contactTitle,
            'feedbackTitle' => $request->feedbackTitle,
        ]);
        return back()->with('success', 'Данные успешно добавлены');
    }

    public function show(MainHeader $mainHeader)
    {
        return view('admin.mainHeader.show', compact('mainHeader'));
    }

    public function update(MainHeaderUpdateRequest $request, MainHeader $mainHeader)
    {
        $mainHeader->update([
            'language_id' => $request->language_id,
            'brandLogoImage' => $request->brandLogoImage,
            'homeTitle' => $request->homeTitle,
            'ourProjectsTitle' => $request->ourProjectsTitle,
            'contactTitle' => $request->contactTitle,
            'feedbackTitle' => $request->feedbackTitle,
        ]);
    }

    public function destroy(MainHeader $mainHeader)
    {
        try {
            $mainHeader->delete();
            return back()->with('success', 'Данные успешно удалены');
        }catch (\Exception $exception){
            return back()->with('error', $exception->getMessage());
        }
    }
}
