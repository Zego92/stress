<?php

namespace App\Http\Controllers;

use App\Http\Requests\User\FeedbackStoreRequest;
use App\Models\Feedback;
use App\Models\Language;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class FeedbackController extends Controller
{
    public function show(Request $request, Language $language)
    {
        $languages = Language::all();
        return view('user.feedback')
            ->with('languages', $languages)
            ->with('language', $language);
    }

    public function store(FeedbackStoreRequest $request): RedirectResponse
    {
        $data = $request->all();
        $data['username'] = $request->input('fio');
        $data['password'] = Str::random(8);
        $user = User::create($data);
        $data['user_id'] = $user->id;
        Feedback::create($data);
        return back()->with('success', 'Наш менеджер свяжется с вами в ближайшее время');
    }
}
