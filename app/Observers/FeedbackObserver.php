<?php

namespace App\Observers;

use App\Events\FeedbackTelegramNotificationEvent;
use App\Models\Feedback;
use App\Notifications\User\FeedbackNotification;

class FeedbackObserver
{
    public function created(Feedback $feedback)
    {
        $feedback->notify(new FeedbackNotification($feedback));
        event(new FeedbackTelegramNotificationEvent($feedback));
    }

}
