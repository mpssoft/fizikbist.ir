<?php

namespace Modules\LessonPlan\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Modules\LessonPlan\Database\Factories\LessonPlanAttachmentFactory;

class LessonPlanAttachment extends Model
{
    protected $fillable = [
        'lesson_plan_id',
        'uploaded_by',
        'original_name',
        'path',
        'mime_type',
        'size',
        'visibility'
    ];

    public function lessonPlan()
    {
        return $this->belongsTo(LessonPlan::class);
    }

    public function uploader()
    {
        return $this->belongsTo(User::class, 'uploaded_by');
    }
}

