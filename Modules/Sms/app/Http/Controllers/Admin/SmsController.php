<?php

namespace Modules\Sms\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\User;

use Illuminate\Support\Facades\Artisan;
use Modules\Sms\Models\SmsQueue;
use Modules\Sms\Services\SmsService;

class SmsController extends Controller
{
    protected $sms;

    public function __construct(SmsService $sms)
    {
        $this->sms = $sms;
    }

    /**
     * Send to a single user
     */
    public function start(Request $request, SmsQueue $smsQueue)
    {
        if($smsQueue->type == 'singleuser'){
            $user = User::findOrFail($smsQueue->user_id);
            $bodyId = $smsQueue->message_template->bodyId;
            $text = "2345";
            $this->sms->sendToUser($user, $text,$bodyId);
            toast('صف با موفقیت شروع شد','success','top-end');
            //Artisan::call('sms:queue-run');
            return back()->with(['status' => 'queued for user']);

        }elseif($smsQueue->type == 'all'){

            $users = User::all()->except(auth()->user()->id);

            $bodyId = $smsQueue->message_template->bodyId;
            $text = "2345";
            $this->sms->sendToMany($users,$text,$bodyId);
            toast('صف با موفقیت شروع شد','success','top-end');
            //Artisan::call('sms:queue-run');
            return back()->with(['status' => 'queued for user']);

        }else{
            // send to group
            $users = $smsQueue->group->users()->get();

            $bodyId = $smsQueue->message_template->bodyId;
            $text = "2345";
            $this->sms->sendToMany($users,$text,$bodyId);
            toast('صف با موفقیت شروع شد','success','top-end');
            //Artisan::call('sms:queue-run');
            return back()->with(['status' => 'queued for user']);

        }

    }

    /**
     * Send to multiple users
     */
    public function ready(SmsQueue $smsQueue)
    {
        $smsQueue->update([
            'state' => 'pending'
        ]);

        return back();
    }
}
