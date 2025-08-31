<?php

namespace Modules\Sms\Services;

use App\Models\User;
use Modules\Sms\Jobs\SendSmsJob;

class SmsService
{
    /**
     * Send SMS to a single user.
     */
    public function sendToUser(User $user, string $text, $bodyId,$queueId,$count)
    {
        SendSmsJob::dispatch($user, $text, $bodyId,$queueId,$count)->onQueue('sms');
    }

    /**
     * Send SMS to multiple users.
     */
    public function sendToMany($users, string $text, $bodyId,$queueId,$count)
    {
        foreach ($users as $user) {
            SendSmsJob::dispatch($user, $text, $bodyId,$queueId,$count)->onQueue('sms');
        }
    }
}
