<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\FeedbackPageStoreRequest;
use App\Http\Requests\Admin\FeedbackUpdateRequest;
use App\Models\FeedbackPage;
use App\Models\Language;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class FeedbackPageController extends Controller
{
    public function index()
    {
        $languages = Language::all();
        $feedbacks = FeedbackPage::with('language')
            ->paginate(10);
        return view('admin.feedbackPage.index')
            ->with('languages', $languages)
            ->with('feedbacks', $feedbacks);
    }

    public function store(FeedbackPageStoreRequest $request): RedirectResponse
    {
        FeedbackPage::create([
            'language_id' => $request->language_id,
            'headerTitle' => $request->headerTitle,
            'fioTitle' => $request->fioTitle,
            'fioPlaceholderTitle' => $request->fioPlaceholderTitle,
            'emailTitle' => $request->emailTitle,
            'emailPlaceholderTitle' => $request->emailPlaceholderTitle,
            'phoneTitle' => $request->phoneTitle,
            'phonePlaceholderTitle' => $request->phonePlaceholderTitle,
            'messageTitle' => $request->messageTitle,
            'messagePlaceholderTitle' => $request->messagePlaceholderTitle,
            'messageDescriptionTitle' => $request->messageDescriptionTitle,
            'messageDescriptionPlaceholderTitle' => $request->messageDescriptionPlaceholderTitle,
        ]);
        return back()->with('success', 'Данные успешно добавлены');
    }

    public function show(FeedbackPage $page_feedback)
    {
        $languages = Language::all();
        return view('admin.feedbackPage.show')
            ->with('feedback', $page_feedback)
            ->with('languages', $languages);
    }

    public function update(FeedbackUpdateRequest $request, FeedbackPage $page_feedback): RedirectResponse
    {
        $page_feedback->update([
            'language_id' => $request->language_id,
            'headerTitle' => $request->headerTitle,
            'fioTitle' => $request->fioTitle,
            'fioPlaceholderTitle' => $request->fioPlaceholderTitle,
            'emailTitle' => $request->emailTitle,
            'emailPlaceholderTitle' => $request->emailPlaceholderTitle,
            'phoneTitle' => $request->phoneTitle,
            'phonePlaceholderTitle' => $request->phonePlaceholderTitle,
            'messageTitle' => $request->messageTitle,
            'messagePlaceholderTitle' => $request->messagePlaceholderTitle,
            'messageDescriptionTitle' => $request->messageDescriptionTitle,
            'messageDescriptionPlaceholderTitle' => $request->messageDescriptionPlaceholderTitle,
        ]);
        return redirect()->route('admin.page-feedback.index')->with('success', 'Данные успешно Обновлены');
    }

    public function destroy(FeedbackPage $page_feedback): RedirectResponse
    {
        try {
            $page_feedback->delete();
            return back()->with('success', 'Данные успешно удалены');
        }catch (\Exception $exception){
            return back()->with('error', $exception->getMessage());
        }
    }
}
