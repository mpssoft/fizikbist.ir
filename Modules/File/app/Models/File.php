<?php

namespace Modules\File\Models;

use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    protected $fillable = [
        'title',
        'file_path',
        'description',
        'file_type',     // pdf, word, excel...
        'access_type',   // free or paid
        'price',         // required if paid
        'state',         // active or inactive
        'category',      // category name
        'downloads',
        'icon',
    ];

    public function users()
    {
        return $this->belongsToMany(\App\Models\User::class, 'file_user')
            ->withTimestamps();
    }

}
