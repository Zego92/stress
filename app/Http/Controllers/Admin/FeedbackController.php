<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\FeedbackUpdateRequest;
use App\Models\Feedback;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use NotificationChannels\Telegram\TelegramMessage;
use Telegram\Bot\Laravel\Facades\Telegram;

class FeedbackController extends Controller
{
    public function index()
    {
        $feedbacks = Feedback::with('language')->paginate(10);
        return view('admin.feedback.index')
            ->with('feedbacks', $feedbacks);
    }

    public function show(Feedback $feedback)
    {
        return view('admin.feedback.show')
            ->with('feedback', $feedback);
    }

    public function update(FeedbackUpdateRequest $request, Feedback $feedback): RedirectResponse
    {
        $feedback->update([
            'user_id' => $request->user_id,
            'fio' => $request->fio,
            'email' => $request->email,
            'status' => $request->status,
            'phone' => $request->phone,
            'title' => $request->title,
            'description' => $request->description,
        ]);
        return redirect()->route('admin.feedbacks.index')->with('success', 'Данные успешно обновлены');
    }

    public function destroy(Feedback $feedback): RedirectResponse
    {
        try {
            $feedback->delete();
            return back()->with('success', 'Данные успешно удалены');
        }catch (\Exception $exception){
            return back()->with('error', $exception->getMessage());
        }
    }
}
