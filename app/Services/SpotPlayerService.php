<?php

namespace App\Services;

use App\Models\License;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class SpotPlayerService
{
    protected $apiKey;
    protected $baseUrl;

    public function __construct()
    {
        $this->apiKey = config('services.spotplayer.api_key');
        $this->baseUrl = 'https://panel.spotplayer.ir/license/edit/';
    }

    public function createLicenseForUser($user, $order, $courseIds): ?License
    {
        Log::info(" reached createLicenseForUser $user->name  $order->course->title courseIds: $courseIds" );
        $payload = $this->buildLicensePayload($user, $courseIds);

        $response = Http::withHeaders([
            '$API' => $this->apiKey,
            '$LEVEL' => '-1',
            'Accept' => 'application/json',
        ])->post($this->baseUrl, $payload);
        Log::info("response from spotplayer: ".$response);
        if ($response->successful()) {
            $data = $response->json();

            return License::create([
                'user_id'         => $user->id,
                'order_id'        => $order->id,
                'course_id'        => $order->course->id,
                'spotplayer_id'   => $data['_id'] ?? null,
                'spotplayer_key'  => $data['key'] ?? null,
                'spotplayer_url'  => $data['url'] ?? null,
                'course_ids'      => $courseIds,
                'license_data'    => $data,
            ]);
        }

        Log::error('SpotPlayer license creation failed', [
            'user' => $user->id,
            'order' => $order->id,
            'payload' => $payload,
            'response' => $response->body(),
        ]);

        return null;
    }

    protected function buildLicensePayload($user,  $courseIds): array
    {
        return [
            'test' => false,
            'course' => [$courseIds],
            'offline' => 30,
            'name' => $user->name ?? 'User',
            'payload' => '',
            'data' => [
                'confs' => 0,
                'limit' => collect($courseIds)->mapWithKeys(function ($id) {
                    return [$id => '0-'];
                })->toArray(),
            ],
            'watermark' => [
                'position' => 511,
                'reposition' => 15,
                'margin' => 40,
                'texts' => [
                    [
                        'text' => $user->mobile,
                        'repeat' => 10,
                        'font' => 1,
                        'weight' => 1,
                        'color' => 2164260863,
                        'size' => 50,
                        'stroke' => ['color' => 2164260863, 'size' => 1],
                    ]
                ],
            ],
            'device' => [
                'p0' => 1, // All Devices 1-99
                'p1' => 1, // Windows 0-99
                'p2' => 0, // MacOS 0-99
                'p3' => 0, // Ubuntu 0-99
                'p4' => 0, // Android 0-99
                'p5' => 0, // IOS 0-99
                'p6' => 0, // WebApp 0-99
            ]
        ];
    }

}
