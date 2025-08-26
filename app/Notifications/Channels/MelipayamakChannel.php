<?php

namespace App\Notifications\Channels;

use Illuminate\Notifications\Notification;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class MelipayamakChannel
{
    public function send($notifiable, Notification $notification)
    {
        if (!method_exists($notification, 'toMeliPayamakSms')) {
            return;
        }
        Log::info("reched sms send ..");
        $messageData = $notification->toMeliPayamakSms($notifiable);

        $response = Http::withHeaders([
            'Content-Type' => 'application/json'
        ])->post('https://rest.payamak-panel.com/api/SendSMS/BaseServiceNumber', [
            'username'    => config('melipayamak.username'),
            'password'    => config('melipayamak.password'),
            'text'   =>     $messageData['text'],
            'to'          => $messageData['to'],
            'bodyId'      => $messageData['bodyId'],
        ]);
        log::info($response);
                // Optional: handle response/log errors

        return $response;
    }
}
