<?php

namespace App\Notifications;

use App\Notifications\Channels\RayganSmsChannel;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class ActiveCode extends Notification
{
    use Queueable;

    public $code,$phoneNumber;
    /**
     * Create a new notification instance.
     */
    public function __construct($code,$phoneNumber)
    {
        $this->code = $code;
        $this->phoneNumber = $phoneNumber;

    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return [RayganSmsChannel::class];
       // return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
                    ->line('The introduction to the notification.')
                    ->action('Notification Action', url('/'))
                    ->line('Thank you for using our application!');
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            //
        ];
    }
    public function toRayganSms()
    {
        return [
            'text' => "code : {$this->code} \n w4study.ir",
            'phone_number' => $this->phoneNumber
        ];
    }
}
