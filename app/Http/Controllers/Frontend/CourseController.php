<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Course;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    public function all(Request $request, Course $course)
    {
        $activeCourses = Course::where("status","active")->get();
        $courses = Course::where('price','>','0')->withCount([
            'raters as ratings_count',
            'students as students_count',

        ])
            ->withAvg('raters', 'course_user.point')
            ->with([
                'teacher'
            ])
            ->paginate(10);


        return view('frontend.course.all',compact('courses'));
    }
}
