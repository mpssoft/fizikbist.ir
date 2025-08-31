<?php

namespace Modules\Sms\Services;

use App\Models\User;
use Modules\Sms\Jobs\SendSmsJob;

class SmsService
{
    /**
     * Send SMS to a single user.
     */
    public function sendToUser(User $user, string $text, $bodyId,$queue,$count)
    {
        SendSmsJob::dispatch($user, $this->renderMessage($user,$queue->message_template->message), $bodyId,$queue->id,$count)->onQueue('sms');
    }

    /**
     * Send SMS to multiple users.
     */
    public function sendToMany($users, string $text, $bodyId,$queue,$count)
    {
        foreach ($users as $user) {
            SendSmsJob::dispatch($user, $this->renderMessage($user,$queue->message_template->message), $bodyId,$queue->id,$count)->onQueue('sms');
        }
    }
    public function renderMessage($user,$message)
    {
        preg_match_all('/{([^}]+)}/u', $message, $matches);
        $placeholders = $matches[1]; // only inside content without {}

        $text = [];
         foreach ($placeholders as $item){
             if($item == 'name')
                 $text[]=$user->name;
             elseif ($item == 'mobile')
                 $text[] = $user->mobile;
             elseif ($item == 'email')
                 $text[]= $user->email;
             else
                 $text[]= $item;

         }

        return implode(';',$text);
    }
}
