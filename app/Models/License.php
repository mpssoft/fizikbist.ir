<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class License extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'order_id',
        'order_item_id',
        'course_id',
        'spotplayer_id',
        'spotplayer_key',
        'spotplayer_url',
        'course_ids',
        'license_data',
    ];

    protected $casts = [
        'course_ids' => 'array',
        'license_data' => 'array',
    ];


    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function order()
    {
        return $this->belongsTo(Order::class);
    }
    public function course()
    {
        return $this->belongsTo(Course::class);
    }
}
