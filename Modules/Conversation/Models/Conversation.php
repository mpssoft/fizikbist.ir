<?php

namespace Modules\Conversation\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;

class Conversation extends Model
{
    protected $fillable = ['user_id', 'body', 'parent_id', 'seen'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function replies()
    {
        return $this->hasMany(Conversation::class, 'parent_id');
    }

    public function parent()
    {
        return $this->belongsTo(Conversation::class, 'parent_id')
            ->with('user');
    }
}
