<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\FeedbackPage;
use App\Models\Language;
use Illuminate\Http\Request;

class FeedbackPageController extends Controller
{
    public function index()
    {
        $languages = Language::all();
        $feedbacks = FeedbackPage::paginate(10);
        return view('admin.feedbackPage.index')
            ->with('languages', $languages)
            ->with('feedbacks', $feedbacks);
    }

    public function store(Request $request)
    {
        //
    }

    public function show(FeedbackPage $feedbackPage)
    {
        //
    }

    public function update(Request $request, FeedbackPage $feedbackPage)
    {
        //
    }

    public function destroy(FeedbackPage $feedbackPage)
    {
        //
    }
}
