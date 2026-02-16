<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Cache;
use Modules\Sms\Models\SmsQueue;
use Modules\Sms\Services\SmsService;

class SmsQueueRun extends Command
{
    protected $signature = 'sms:queue-run';
    protected $description = 'Run SMS queue worker and stop when empty';
    protected $sms;

    public function handle()
    {
        $this->sms = new SmsService();
        $lock = Cache::lock('sms-queue-run-lock', 3600);

        if (!$lock->get()) {
            $this->info('Another process is already running.');
            return;
        }

        try {
            // Step 1: Dispatch pending queues
            $this->processPendingQueues();

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
    protected function processPendingQueues()
    {
        $batchSize = 100;

        do {
            $queues = SmsQueue::where('state', 'pending')
                ->where('scheduled_at', '<=', now())
                ->limit($batchSize)
                ->get();

            foreach ($queues as $queue) {

                if($queue->type == 'singleuser'){
                    $user = User::findOrFail($queue->user_id);
                    $bodyId = $queue->message_template->bodyId;
                    $text = "2345";
                    $this->sms->sendToUser($user, $text,$bodyId,$queue,1);

                    //Artisan::call('sms:queue-run');
                    //return back()->with(['status' => 'queued for user']);

                }elseif($queue->type == 'all'){

                    $users = User::all()->except(auth()->user()->id);

                    $bodyId = $queue->message_template->bodyId;
                    $text = "2345";
                    $this->sms->sendToMany($users,$text,$bodyId,$queue,count($users));

                    //Artisan::call('sms:queue-run');
                    //return back()->with(['status' => 'queued for user']);

                }else{
                    // send to group
                    $users = $queue->group->users()->get();

                    $bodyId = $queue->message_template->bodyId;
                    $text = "2345";
                    $this->sms->sendToMany($users,$text,$bodyId,$queue->id,count($users));

                    //Artisan::call('sms:queue-run');
                    //return back()->with(['status' => 'queued for user']);

                }
                // Mark as running
                $queue->update(['state' => 'running']);
            }

        } while ($queues->count() > 0);
    }

}
