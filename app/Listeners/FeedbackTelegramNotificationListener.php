<?php

namespace App\Listeners;

use App\Events\FeedbackTelegramNotificationEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Log;
use Telegram\Bot\Exceptions\TelegramResponseException;
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
            $text = "<strong>Добавлен новый запрос на Рачет стоимости</strong>" . "\n"
                ."<strong>ФИО: </strong>" . $event->feedback->fio . "\n"
                ."<strong>Телефон: </strong>" . $event->feedback->phone . "\n"
                ."<strong>Email: </strong>". $event->feedback->email . "\n"
                ."<strong>Тема: </strong>". $event->feedback->title . "\n";
            $response = Telegram::sendMessage([
                'chat_id' => '-1001234585965',
                'parse_mode' => 'HTML',
                'text' => $text
            ]);
            $messageId = $response->getMessageId();
            Log::channel('feedbackTelegramNotification')->info('Send message successfully and ID - ' . $messageId);
        }catch (TelegramResponseException $exception){
            Log::channel('feedbackTelegramNotification')->error($exception);
        }
    }
}
