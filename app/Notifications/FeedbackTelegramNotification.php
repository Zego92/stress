<?php

namespace App\Notifications;

use App\Models\Feedback;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use NotificationChannels\Telegram\TelegramChannel;
use NotificationChannels\Telegram\TelegramMessage;

class FeedbackTelegramNotification extends Notification
{
    use Queueable;

    private $feedback;

    public function __construct(Feedback $feedback)
    {
        $this->feedback = $feedback;
    }

    public function via($notifiable)
    {
        return [TelegramChannel::class];
    }

    public function toTelegram()
    {
        return TelegramMessage::create()
            ->to('')
            ->content('Получена новая заявка на расчет')
            ->content('От: ' . $this->feedback->fio)
            ->content('Телефон: ' . $this->feedback->phone)
            ->content('Email: ' . $this->feedback->email)
            ->content('Заголовок: ' . $this->feedback->title)
            ->content('Описание: ' . $this->feedback->descriptiom);
    }
}
