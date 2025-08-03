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
    ];

    public function teacher()
    {
        return $this->belongsTo(User::class, 'teacher_id');
    }

}
