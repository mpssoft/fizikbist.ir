<?php

namespace App\Http\Controllers\User\panel;

use App\Http\Controllers\Controller;

class UserCourseController extends Controller
{
    public function courses()
    {
        return view('users.courses');
    }
}
