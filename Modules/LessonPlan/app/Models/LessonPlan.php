<?php

namespace Modules\LessonPlan\Models;

use App\Models\Lesson;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Modules\File\Models\File;
use Modules\Shop\Models\Discount;

class LessonPlan extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'grade_id',
        'title',
        'price',
        'description',
        'admin_description',
        'delivery_time',
        'status',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function orderItems()
    {
        return $this->morphMany(OrderItem::class,'item');
    }
    // LessonPlan.php

// All lessons attached
    public function lessons()
    {
        return $this->morphedByMany(Lesson::class, 'item', 'lesson_plan_items', 'lesson_plan_id', 'item_id');
    }

// All files attached
    public function files()
    {
        return $this->morphedByMany(File::class, 'item', 'lesson_plan_items', 'lesson_plan_id', 'item_id');
    }

// Optional: generic items
    public function items()
    {
        return collect()
            ->merge($this->lessons)
            ->merge($this->files);

    }
    public function discounts()
    {
        return $this->morphToMany(Discount::class, 'discountable');
    }
}
