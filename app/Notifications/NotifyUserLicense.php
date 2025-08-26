<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class NotifyUserLicense extends Notification
{
    use Queueable;
    protected $mobile;
    protected $course;
    /**
     * Create a new notification instance.
     */
    public function __construct($mobile,$course)
    {
        $this->mobile = $mobile;
        $this->course = $course;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['melipayamak'];
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
    public function toMeliPayamakSms($notifiable)
    {
        return [
            'to' => $this->mobile,
            'bodyId' => 360935,
            'text' => "$notifiable->name;$this->course"
        ];
    }
}
