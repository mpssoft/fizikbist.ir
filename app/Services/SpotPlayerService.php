<?php
namespace App\Services;

use Illuminate\Support\Facades\Http;

class SpotPlayerService
{
    protected $apiKey;
    protected $baseUrl = 'https://panel.spotplayer.ir';

    public function __construct()
    {
        $this->apiKey = config('services.spotplayer.api_key');
    }

    public function createLicense(string $courseId, string $userEmail = null, int $expireDays = null)
    {
        $payload = ['course_id' => $courseId];
        if ($userEmail) $payload['user_email'] = $userEmail;
        if ($expireDays) $payload['expire_days'] = $expireDays;

        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . $this->apiKey,
            'Level' => '-1',
            'Content-Type' => 'application/json',
        ])->post("{$this->baseUrl}/license/edit/", $payload);

        if ($response->successful()) {
            return $response->json();
        }

        throw new \Exception('SpotPlayer license error: ' . $response->body());
    }
}
