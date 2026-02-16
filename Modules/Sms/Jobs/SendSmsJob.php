<?php

namespace Modules\Sms\Jobs;


use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Notification;
use Modules\Sms\Models\SmsQueue;
use Modules\Sms\Notifications\SendSmsNotification;

class SendSmsJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $user;
    protected $text;
    protected $bodyId;
    protected $queueId;
    protected $count;
    /**
     * Number of tries for this job.
     */
    public $tries = 3; // retry up to 3 times
    public $backoff = 60; // wait 60 seconds between attempts
    public function __construct($user, $text, $bodyId,$queueId,$count)
    {
        $this->user = $user;
        $this->text = $text;
        $this->bodyId = $bodyId;
        $this->queueId = $queueId;
        $this->count = $count;
    }

    public function handle()
    {

        // Send SMS notification to user via our custom channel
        Notification::send($this->user, new SendSmsNotification($this->text,$this->bodyId));

        SmsQueue::where('id', $this->queueId)->increment('processed_count');
        $queue = SmsQueue::find($this->queueId);
        if ($this->count >= $queue->processed_count) {
            $queue->update(['state' => 'completed']);
        }

    }

    public function failed(\Throwable $exception)
    {
         Log::info('failed-------> ');

    }
}
