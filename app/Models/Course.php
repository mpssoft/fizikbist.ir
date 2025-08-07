<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'price',
        'discount_price',
        'discount_expires_at',
        'description',
        'cover_image',
        'slug',
        'teacher_id',
        'spotplayer_id'
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

    public function license()
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


}
