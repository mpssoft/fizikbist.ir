<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Lesson;
use App\Models\Slider;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        auth()->loginUsingId(1);
        $sliders = Slider::all();
        $courses = Course::all();
        $lessons = Lesson::latest()->take(6)->get();
        return view('frontend.home.index',compact('sliders','courses','lessons'));
    }
    public function play(Lesson $lesson)
    {

        return view('frontend.player.play',compact('lesson'));
    }
}
