<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Grade;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    public function all(Request $request, Course $course)
    {
        $activeCourses = Course::where("status","active")->get();
        $courses = Course::where('status','active')->withCount([
            'raters as ratings_count',
            'students as students_count',

        ])
            ->withAvg('raters', 'course_user.point')
            ->with([
                'teacher',
                'discounts'
            ])
            ->paginate(10);


        return view('frontend.course.all',compact('courses'));
    }

    public function gradeCourses(string $gradeName)
    {
        $ids = Grade::where('name',$gradeName)->pluck('id');
        $ids = $ids->toArray();
        $courses = Course::whereIn('status', ['active','in_progress'])
            ->whereIn('grade_id', $ids)         // match by grade_id
            ->withCount([
            'raters as ratings_count',
            'students as students_count',

        ])
            ->withAvg('raters', 'course_user.point')
            ->with([
                'teacher'
            ])
            ->paginate(10);


        return view('frontend.course.grade-courses',compact('courses'));
    }
}
