<?php

namespace App\Http\Controllers\User\panel;

use App\Http\Controllers\Controller;
use App\Models\Course;
use Illuminate\Support\Facades\Auth;

class UserCourseController extends Controller
{
    public function courses()
    {
        $user = Auth::user();

        $courses = Course::withCount([
            'raters as ratings_count',
            'students as students_count'
        ])
            ->withAvg('raters', 'course_user.point')
            ->with([
                'raters' => function($q) use ($user) {
                    $q->where('user_id', $user->id);
                },
                'teacher'
            ])
            ->paginate(10);



        return view('user.courses.index', compact('courses', 'user'));

    }
}
