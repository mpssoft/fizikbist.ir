<?php

namespace Modules\Blog\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Like\Models\Like;
use Modules\Like\Traits\HasLikes;

// use Modules\Blog\Database\Factories\BlogFactory;

class Blog extends Model
{
    use HasFactory,HasLikes;

    /**
     * The attributes that are mass assignable.
     */
    protected $table = 'blogs';

    protected $fillable = [
        'title',
        'description',
        'content',
        'cover_image',
        'tags',
        'status',
        'user_id',
        'author',
        'author_image',
        'author_about',
        'reading_time',
        'view',
    ];
    public function categories()
    {
        return $this->belongsToMany(Category::class, 'blog_category', 'blog_id', 'category_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class,'user_id','id');
    }
    // In Blog model
     public function likes() {
        return $this->morphMany(Like::class, 'likeable');
    }
    public function isLikedByUser($userId): bool
    {
        return $this->likes()->where('user_id', $userId)->exists();
    }
}
