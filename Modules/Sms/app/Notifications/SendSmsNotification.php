<?php

namespace Modules\Sms\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Modules\Sms\Channels\MelipayamakChannel;

class SendSmsNotification extends Notification
{
    use Queueable;

    protected $text;
    protected $bodyId;

    public function __construct($text,$bodyId)
    {
        $this->text = $text;
        $this->bodyId = $bodyId;
    }

    /**
     * Define which channels this notification should use.
     */
    public function via($notifiable)
    {
        return [MelipayamakChannel::class];
    }

    /**
     * Format data for MelipayamakChannel.
     */
    public function toMeliPayamakSms($notifiable)
    {
        return [
            'text'   => $this->text,
            'to'     => $notifiable->mobile,   // User model must have 'phone' field
            'bodyId' => $this->bodyId,
        ];
    }
}
