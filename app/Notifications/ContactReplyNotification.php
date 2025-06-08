<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Messages\MailMessage;

class ContactReplyNotification extends Notification
{
    use Queueable;

    protected $reply;

    public function __construct($reply)
    {
        $this->reply = $reply;
    }

    public function via($notifiable)
    {
        return ['mail'];
    }

    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->subject('Balasan dari Admin Rentalelektronik')
            ->greeting('Halo,')
            ->line('Admin telah membalas pesan Anda:')
            ->line($this->reply)
            ->line('Terima kasih telah menghubungi kami.');
    }
}
