<?php

namespace Modules\Like\Traits;

use Modules\Like\Models\Like;

trait HasLikes
{
    public function likes()
    {
        return $this->morphMany(Like::class, 'likeable');
    }

    public function toggleLike($userId = null): bool
    {
        $userId = $userId ?? auth()->id();

        $like = $this->likes()->where('user_id', $userId)->first();

        if ($like) {
            $like->delete();
            return false; // disliked
        }

        $this->likes()->create(['user_id' => $userId]);
        return true; // liked
    }

    public function isLikedBy($userId = null): bool
    {
        return $this->likes()
            ->where('user_id', $userId ?? auth()->id())
            ->exists();
    }
}
