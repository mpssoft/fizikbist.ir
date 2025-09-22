<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


use Modules\Shop\Models\Discount;

class Course extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'price',
        'discount_price',
        'discount_expires_at',
        'description',
        'content',
        'cover_image',
        'video',
        'slug',
        'time',
        'status',
        'teacher_id',
        'grade_id',
        'spotplayer_id',
        'lang',
        'tags',
    ];

    // The teacher of this course (one teacher per course)
    public function teacher()
    {
        return $this->belongsTo(User::class, 'teacher_id');
    }

    // Students registered in this course
    public function students()
    {
        return $this->belongsToMany(User::class)
            ->withPivot('point')  // rating or any extra info in pivot
            ->withTimestamps();
    }

    public function licenses()
    {
        $this->hasMany(License::class);
    }
    // Users who rated this course (same as students but filtered by those who have a rating)
    public function raters()
    {
        return $this->belongsToMany(User::class)
            ->withPivot('point')
            ->wherePivotNotNull('point')
            ->withTimestamps();
    }
    public function orders()
    {
        $this->hasMany(Order::class);
    }
    public function lessons()
    {
        return $this->hasMany(Lesson::class);
    }
    // In Course model

    public function discounts()
    {
        return $this->morphToMany(Discount::class, 'discountable')
            ->where('is_active', 1)
            ->whereDate('start_at', '<=', now())
            ->whereDate('end_at', '>=', now());
    }

    public function orderItems()
    {
        return $this->morphToMany(OrderItem::class,'item');
    }
    public function grade()
    {
        return $this->belongsTo(Grade::class);
    }
}
