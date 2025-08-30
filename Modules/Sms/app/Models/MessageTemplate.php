<?php

namespace Modules\Sms\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Modules\Sms\Http\Controllers\Admin\SmsQueueController;

class MessageTemplate extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'message',
        'bodyId',
    ];

    // If related to Body model
    // public function body()
    // {
    //     return $this->belongsTo(Body::class, 'bodyId');
    // }

    public function queues()
    {
        return $this->belongsToMany(SmsQueue::class);
    }
}
