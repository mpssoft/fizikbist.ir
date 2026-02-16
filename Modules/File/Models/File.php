<?php

namespace Modules\File\Models;

use Illuminate\Database\Eloquent\Model;
use Modules\LessonPlan\Models\LessonPlan;

class File extends Model
{
    protected $fillable = [
        'title',
        'file_path',
        'description',
        'file_type',     // pdf, word, excel...
        'access_type',   // free or paid
        'price',         // required if paid
        'state',         // active or inactive
        'category',      // category name
        'downloads',
        'icon',
    ];

    public function users()
    {
        return $this->belongsToMany(\App\Models\User::class, 'file_user')
            ->withTimestamps();
    }
    public function lessonPlans()
    {
        return $this->morphToMany(LessonPlan::class, 'item', 'lesson_plan_items', 'item_id', 'lesson_plan_id')
            ->withTimestamps();
    }

}
