<?php

namespace App\Http\Controllers\Course\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    public function index()
    {
        return view('users.courses');
    }
}
