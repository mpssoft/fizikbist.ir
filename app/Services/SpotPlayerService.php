<?php

namespace App\Services;

use App\Models\Course;
use App\Models\License;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use function PHPUnit\Framework\isEmpty;

class SpotPlayerService
{
    protected $apiKey;
    protected $baseUrl;

    public function __construct()
    {
        $this->apiKey = config('services.spotplayer.api_key');
        $this->baseUrl = 'https://panel.spotplayer.ir/license/edit/';
    }
    public function editCourseLicenseForUser(Course $course)
    {
        $devices = [
            'p0' => 1, // All Devices 1-99
            'p1' => 1, // Windows 0-99
            'p2' => 1, // MacOS 0-99
            'p3' => 1, // Ubuntu 0-99
            'p4' => 1, // Android 0-99
            'p5' => 1, // IOS 0-99
            'p6' => 1, // WebApp 0-99
        ];

        $license = License::where('course_id',$course->id)
                        ->where('user_id',auth()->user()->id)
                        ->firstOrFail();
        $payload = $this->buildLicensePayload(auth()->user(), $license->course_ids,$devices);
        Log::info(" edit license for auth()->user()->name $course->title   " );


        $response = Http::withHeaders([
            '$API' => $this->apiKey,
            'Accept' => 'application/json',
        ])->post($this->baseUrl.$license->spotplayer_key, $payload);
        Log::info("response from spotplayer: ".$response);
    }
    public function createLicenseForUser($user, $order, $courseIds,$model): ?License
    {
        Log::info(" reached createLicenseForUser $user->name $model->title   courseIds: $courseIds" );
        $devices = [
        'p0' => 1, // All Devices 1-99
        'p1' => 1, // Windows 0-99
        'p2' => 1, // MacOS 0-99
        'p3' => 1, // Ubuntu 0-99
        'p4' => 1, // Android 0-99
        'p5' => 1, // IOS 0-99
        'p6' => 1, // WebApp 0-99
    ];
        $payload = $this->buildLicensePayload($user, $courseIds,$devices);

        $response = Http::withHeaders([
            '$API' => $this->apiKey,
            '$LEVEL' => '-1',
            'Accept' => 'application/json',
        ])->post($this->baseUrl, $payload);
        Log::info("response from spotplayer: ".$response);
        if ($response->successful()) {
            $data = $response->json();
            Log::info('response success ...');
            return License::create([
                'user_id'         => $user->id,
                'order_id'        => $order->id,
                'course_id'        => $model->id,
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

    protected function buildLicensePayload($user,  $courseIds,$devices): array
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
            'device' => $devices
        ];
    }

}
