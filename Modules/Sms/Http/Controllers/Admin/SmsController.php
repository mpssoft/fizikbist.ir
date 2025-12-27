<?php

namespace Modules\Sms\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\User;

use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Log;
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
            $this->sms->sendToUser($user, $text,$bodyId,$smsQueue->id,1);
            toast('صف با موفقیت شروع شد','success','top-end');
            $this->runQueue();
            return back()->with(['status' => 'queued for user']);

        }elseif($smsQueue->type == 'all'){

            $users = User::all()->except(auth()->user()->id);


            $bodyId = $smsQueue->message_template->bodyId;
            $text = "2345";
            $this->sms->sendToMany($users,$text,$bodyId,$smsQueue,count($users));
            toast('صف با موفقیت شروع شد','success','top-end');
            $this->runQueue();
            return back()->with(['status' => 'queued for user']);

        }else{
            // send to group
            $users = $smsQueue->group->users()->get();

            $bodyId = $smsQueue->message_template->bodyId;
            $text = "2345";
            $this->sms->sendToMany($users,$text,$bodyId,$smsQueue,count($users));
            toast('صف با موفقیت شروع شد','success','top-end');
            $this->runQueue();
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

    public function runQueue()
    {
        $lock = Cache::lock('sms-queue-run-lock', 3600);

        if (!$lock->get()) {
            Log::info('Another process is already running.');
            return;
        }

        try {

            // Step 2: Run the queue worker to process jobs in background
            if (app('queue')->size('sms') > 0) {
                Artisan::call('queue:work', [
                    '--queue' => 'sms',
                    '--stop-when-empty' => true,
                ]);
            }
        } finally {
            $lock->release();
        }
    }
}
