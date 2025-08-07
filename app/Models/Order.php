<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = ['user_id', 'course_id', 'status','price'];

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function course() {
        return $this->belongsTo(Course::class);
    }

    public function payments() {
        return $this->hasMany(Payment::class);
    }
    public function licenses()
    {
        return $this->hasMany(License::class);
    }
}
