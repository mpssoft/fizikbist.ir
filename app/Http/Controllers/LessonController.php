<?php

namespace App\Http\Controllers;

use App\Models\Lesson;
use Illuminate\Http\Request;

class LessonController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function free()
    {
        $lessons = Lesson::where('is_free',true)->latest()->get();
        return view('frontend.lesson.free',compact('lessons'));
    }


}
