<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\BannerStoreRequest;
use App\Http\Requests\Admin\BannerUpdateRequest;
use App\Models\Banner;
use App\Models\Language;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class BannerController extends Controller
{
    public function index()
    {
        $languages = Language::all();
        $banners = Banner::with('language')->paginate(10);
        return view('admin.banner.index')
            ->with('languages', $languages)
            ->with('banners', $banners);
    }

    public function store(BannerStoreRequest $request): RedirectResponse
    {
        $data = $request->all();
        $data['image'] = $request->file('image');
        Banner::create($data);
        return back()->with('success', 'Данные успешно добавлены');
    }

    public function show(Banner $banner)
    {
        $languages = Language::all();
        return view('admin.banner.show')
            ->with('banner', $banner)
            ->with('languages', $languages);
    }

    public function update(BannerUpdateRequest $request, Banner $banner): RedirectResponse
    {
        if ($request->has('image')){
            File::delete($banner->image);
            $banner->update(['image' => $request->file('image')]);
        }
        $banner->update([
            'language_id' => $request->language_id,
            'title' => $request->title,
        ]);
        return redirect()->route('admin.banners.index')->with('success', 'Данные успешно обновлены');
    }

    public function destroy(Banner $banner): RedirectResponse
    {
        try {
            File::delete($banner->image);
            $banner->delete();
            return back()->with('success', 'Данные успешно удалены');
        }catch (\Exception $exception){
            return back()->with('error', $exception->getMessage());
        }
    }
}
