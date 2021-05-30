<?php

namespace App\Notifications\User;

use App\Models\Feedback;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class FeedbackNotification extends Notification
{
    use Queueable;

    private $feedback;

    public function __construct(Feedback $feedback)
    {
        $this->feedback = $feedback;
    }

    public function via($notifiable): array
    {
        return ['mail'];
    }

    public function toMail($notifiable): MailMessage
    {
        info($notifiable);
        return (new MailMessage)
            ->subject('Заявка на расчет')
            ->level('success')
            ->greeting("Здравствуйте " . ' ' .  $this->feedback->fio)
            ->line('Ваша заявка получена!')
            ->line('Наш специалист свяжется с вами в ближайшее время')
            ->replyTo('Timchenco92@gmail.com');

    }

    public function toArray($notifiable): array
    {
        return [
            //
        ];
    }

}
