<?php

namespace Modules\Splash\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Modules\Splash\Database\Factories\SplashFactory;

class Splash extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = ['title', 'image', 'active', 'link'];
    // protected static function newFactory(): SplashFactory
    // {
    //     // return SplashFactory::new();
    // }
}
