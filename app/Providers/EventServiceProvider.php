<?php

namespace App\Providers;

use App\Events\FeedbackTelegramNotificationEvent;
use App\Listeners\FeedbackTelegramNotificationListener;
use App\Models\Feedback;
use App\Observers\FeedbackObserver;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
        FeedbackTelegramNotificationEvent::class => [
            FeedbackTelegramNotificationListener::class
        ]
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        Feedback::observe(FeedbackObserver::class);
    }
}
