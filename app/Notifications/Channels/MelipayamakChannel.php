<?php

namespace App\Notifications\Channels;

use Illuminate\Notifications\Notification;
use Illuminate\Support\Facades\Http;

class MelipayamakChannel
{
    public function send($notifiable, Notification $notification)
    {
        if (!method_exists($notification, 'toMeliPayamakSms')) {
            return;
        }

        $messageData = $notification->toMeliPayamakSms();

        $username    = config('melipayamak.username');
        $password    = config('melipayamak.password');
        $bodyId = $messageData['bodyId'];
        $to          = $messageData['to']; // returns mobile number
        $text   = $messageData['otpCode']; // array of variables

        $response = Http::withHeaders([
            'Content-Type' => 'application/json'
        ])->post('https://rest.payamak-panel.com/api/SendSMS/BaseServiceNumber', [
            'username'    => $username,
            'password'    => $password,
            'text'   =>     $text,
            'to'          => $to,
            'bodyId'      => $bodyId,
        ]);

        // Optional: handle response/log errors

        return $response->json();
    }
}
