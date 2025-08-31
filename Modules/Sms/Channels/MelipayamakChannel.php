<?php

namespace Modules\Sms\Channels;

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


        $messageData = $notification->toMeliPayamakSms($notifiable);
        Log::info("Reached SMS send ..text=".$messageData['text']);

        $response = Http::withHeaders([
            'Content-Type' => 'application/json'
        ])->post('https://rest.payamak-panel.com/api/SendSMS/BaseServiceNumber', [
            'username' => config('melipayamak.username'),
            'password' => config('melipayamak.password'),
            'text'     => $messageData['text'],
            'to'       => $messageData['to'],
            'bodyId'   => $messageData['bodyId'],
        ]);

        Log::info($response);

        if (isset($response['RetStatus']) && $response['RetStatus'] != 1) {
            // Throw an exception so Laravel treats this as a failed job
            throw new \Exception("SMS failed: " . json_encode($response));
        }

        return $response;
    }
}
