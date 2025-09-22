<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Modules\File\Models\File;
use Modules\LessonPlan\Models\LessonPlan;
use Modules\Shop\Models\CartItem;
use Modules\Shop\Models\Discount;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'mobile',
        'image',
        'two_factor_type',
        'otp',
        'otp_expires_at',
        'role',

    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }
    public function hasTwoFactorAuthenticationEnabled()
    {
        return  $this->two_factor_type !== 'off';
    }
    public function hasSmsTwoFactorAuthenticationEnabled()
    {
        return  $this->two_factor_type == 'sms';
    }
    public function activeCode()
    {
        return $this->hasMany(ActiveCode::class);
    }
    public function ratedCourses()
    {
        return $this->belongsToMany(Course::class)
            ->withPivot('point')
            ->withTimestamps();
    }
    // Courses where the user is a student (registered in courses)
    public function courses()
    {
        return $this->belongsToMany(Course::class)
            ->withPivot(['point'])  // rating given by user
            ->withTimestamps();
    }
    public function licenses() {
        return $this->hasMany(License::class);
    }
    // Courses where the user is a teacher
    public function teachingCourses()
    {
        return $this->hasMany(Course::class, 'teacher_id');
    }
    public function lessons()
    {
        return $this->belongsToMany(Lesson::class);
    }

    public function cartItems()
    {
        return $this->hasMany(CartItem::class);
    }
    public function discounts()
    {
        return $this->morphToMany(Discount::class, 'discountable');
    }
    public function orders()
    {
        return $this->hasMany(Order::class);
    }
    public function groups()
    {
        return $this->belongsToMany(Group::class, 'group_user')->withTimestamps();
    }
    public function files()
    {
        return $this->belongsToMany(File::class, 'file_user')
            ->withTimestamps();
    }
    public function lessonplans()
    {
        return $this->hasMany(LessonPlan::class);
    }
}
