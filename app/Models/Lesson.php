<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use Modules\LessonPlan\Models\LessonPlan;
use Modules\Shop\Models\Discount;

class Lesson extends Model
{
    protected $fillable = [
        'course_id',
        'title',
        'description',
        'video_url',
        'spotplayer_id',
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

    public function lessonPlans()
    {
        return $this->morphToMany(LessonPlan::class, 'item', 'lesson_plan_items', 'item_id', 'lesson_plan_id')
            ->withTimestamps();
    }

}
