<?php

namespace App\Notifications\Channels;

use Illuminate\Notifications\Notification;

class RayganSmsChannel
{
    public function send($notifiable , Notification $notification)
    {
        $data = $notification->toRayganSms();

        $message = urlencode($data['message']);
        $receptor = $data['to'];
        $username = config('services.raygansms.username');
        $password = config('services.raygansms.password');
        $url = "https://raygansms.com/SendMessageWithCode.ashx?Username={$username}&Password={$password}&Message={$message}&Mobile={$receptor}";
        file_get_contents($url);

    }
}
