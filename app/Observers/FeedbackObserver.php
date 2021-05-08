<?php

namespace App\Observers;

use App\Events\FeedbackTelegramNotificationEvent;
use App\Models\Feedback;

class FeedbackObserver
{
    public function created(Feedback $feedback): ?array
    {
        return event(new FeedbackTelegramNotificationEvent($feedback));
    }

}
