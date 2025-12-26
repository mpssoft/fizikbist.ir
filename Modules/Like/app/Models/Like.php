<?php

namespace Modules\Like\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Modules\Like\Database\Factories\LikeFactory;

class Like extends Model
{
    use HasFactory;

    protected $fillable = ['user_id'];

    public function user()
    {
        return $this->belongsTo(\App\Models\User::class);
    }

    public function likeable()
    {
        return $this->morphTo();
    }
}
