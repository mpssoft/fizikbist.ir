<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Modules\LessonPlan\Models\LessonPlan;

class Order extends Model
{
    protected $fillable = ['user_id', 'status','price'];

    public function user() {
        return $this->belongsTo(User::class);
    }


    public function payments() {
        return $this->hasMany(Payment::class);
    }


    public function items()
    {
        return $this->hasMany(OrderItem::class);
    }


}
