<?php

namespace Modules\Sms\Models;

use App\Models\Group;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SmsQueue extends Model
{
    use HasFactory;

    protected $fillable = [
        'type',
        'group_id',
        'user_id',
        'message_template_id',
        'message',
        'processed_count',
        'description',
        'state',
        'scheduled_at',
    ];

    protected $casts = [
        'scheduled_at' => 'datetime',
    ];

    // Relations
    public function group()
    {
        return $this->belongsTo(Group::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function message_template()
    {
        return $this->belongsTo(MessageTemplate::class);
    }
}
