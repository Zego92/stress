<?php

namespace App\Observers;

use App\Models\Feedback;
use App\Notifications\FeedbackTelegramNotification;

class FeedbackObserver
{
    public function created(Feedback $feedback): FeedbackTelegramNotification
    {
        return new FeedbackTelegramNotification($feedback);
    }

}
