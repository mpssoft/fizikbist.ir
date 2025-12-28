<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    protected $fillable = [
        'order_id',
        'item_id',
        'item_type',
        'quantity',
        'price'
    ];

    // Polymorphic relation to the actual item (Course, Lesson, etc.)
    public function item()
    {
        return $this->morphTo();
    }
    public function licenses()
    {
        return $this->belongsTo(License::class);
    }
    // Belongs to an order
    public function order()
    {
        return $this->belongsTo(Order::class);
    }
}
