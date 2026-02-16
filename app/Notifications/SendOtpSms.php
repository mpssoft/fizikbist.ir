<?php
namespace App\Notifications;

use App\Notifications\Channels\RayganSmsChannel;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;

class SendOtpSms extends Notification
{
    use Queueable;

    protected $otp;
    protected $mobile;

    public function __construct($otp, $mobile)
    {
        $this->otp = $otp;
        $this->mobile = $mobile;
    }

    public function via($notifiable)
    {
        return ['melipayamak','raygansms']; // ['raygansms','melipayamak'] custom channel we'll define next
    }

    public function toRayganSms()
    {
        return [
            'to' => $this->mobile,
            'message' => "کد احراز هویت شما: {$this->otp} \nfizikbist.ir"
        ];
    }
    public function toMeliPayamakSms($notifiable)
    {
        return [
            'to' => $this->mobile,
            'text' => $this->otp,
            'bodyId' => 352289,
        ];
    }
}
