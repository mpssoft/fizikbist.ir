<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use Modules\Shop\Models\Discount;

class Lesson extends Model
{
    protected $fillable = [
        'course_id',
        'title',
        'description',
        'video_url',
        'spotplayer_lesson_id',
        'tags',
        'thumbnail',
        'is_free',
        'price',
        'duration',
        'status',
        'order',
        'view',
        'like',
    ];
    public function course()
    {
        return $this->belongsTo(Course::class);
    }
    public function students()
    {
        return $this->belongsToMany(User::class);
    }
    public function discounts()
    {
        return $this->morphToMany(Discount::class, 'discountable');
    }
    public function orderItems()
    {
        return $this->morphToMany(OrderItem::class,'item');
    }
}
