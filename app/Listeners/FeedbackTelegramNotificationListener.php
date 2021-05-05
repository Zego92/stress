<?php

namespace App\Listeners;

use App\Events\FeedbackTelegramNotificationEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Log;
use Telegram\Bot\Exceptions\TelegramSDKException;
use Telegram\Bot\Laravel\Facades\Telegram;

class FeedbackTelegramNotificationListener
{
    public function __construct()
    {
        //
    }

    public function handle(FeedbackTelegramNotificationEvent $event)
    {
        try {
            $text = "<strong>Добавлен новый запрос на подключени API:</strong>" . "\n"
                ."<strong>ФИО: </strong>" . $event->feedback->fio . "\n"
                ."<strong>Телефон: </strong>" . $event->feedback->phone . "\n"
                ."<strong>Email: </strong>". $event->feedback->email . "\n"
                ."<strong>Email: </strong>". $event->feedback->title . "\n"
                ."<strong>Email: </strong>". $event->feedback->description . "\n";
            $response = Telegram::setAsyncRequest(true)->sendMessage([
                'chat_id' => env('TELEGRAM_CHAT_ID'),
                'parse_mode' => 'HTML',
                'text' => $text
            ]);
            $messageId = $response->getMessageId();
            Log::channel('feedbackTelegramNotification')->info('Send message successfully and ID - ' . $messageId);
            return true;
        }catch (TelegramSDKException $exception){
            Log::channel('feedbackTelegramNotification')->error($exception);
            return false;
        }
    }
}
