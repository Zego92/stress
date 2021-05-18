<?php

namespace App\Providers;

use App\Events\FeedbackTelegramNotificationEvent;
use App\Listeners\FeedbackTelegramNotificationListener;
use App\Models\Category;
use App\Models\Feedback;
use App\Models\Language;
use App\Models\MainHeader;
use App\Models\Post;
use App\Observers\Admin\CategoryObserver;
use App\Observers\Admin\LanguageObserver;
use App\Observers\Admin\MainHeaderObserver;
use App\Observers\Admin\PostObserver;
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
        MainHeader::observe(MainHeaderObserver::class);
        Category::observe(CategoryObserver::class);
        Language::observe(LanguageObserver::class);
        Post::observe(PostObserver::class);
    }
}
