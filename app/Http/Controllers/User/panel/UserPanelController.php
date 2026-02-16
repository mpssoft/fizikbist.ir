<?php

namespace App\Http\Controllers\User\panel;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserPanelController extends Controller
{
    public function home()
    {
        $completedCourses = count(auth()->user()->courses()->where('completed',true)->get());
        $inProgressCourses = count(auth()->user()->courses()->where('completed',false)->get());
        $userPoints = auth()->user()->courses()->sum('point');
        $timeSpend = auth()->user()->lessons()->where('completed',true)->sum('duration');

        $courses = auth()->user()->courses()->get();

        return view("user.home",compact('courses','completedCourses','inProgressCourses','userPoints','timeSpend'));
    }
    public function courses()
    {
        return "ok";
    }
}
