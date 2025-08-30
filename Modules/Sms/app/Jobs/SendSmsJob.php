<?php

namespace Modules\Sms\Jobs;


use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Notification;
use Modules\Sms\Notifications\SendSmsNotification;

class SendSmsJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $user;
    protected $text;
    protected $bodyId;

    /**
     * Number of tries for this job.
     */
    public $tries = 3;

    public function __construct($user, $text, $bodyId)
    {
        $this->user = $user;
        $this->text = $text;
        $this->bodyId = $bodyId;
    }

    public function handle()
    {
        // Send SMS notification to user via our custom channel
        Notification::send($this->user, new SendSmsNotification($this->text,$this->bodyId));
    }
}
