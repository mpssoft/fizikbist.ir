<?php

namespace App\Http\Controllers\Admin\panel;

use App\Http\Controllers\Controller;
use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminPanelController extends Controller
{
    public function home()
    {
        $user = Auth::user();
        $activeCourses = Course::where("status","active")->get();
        $courses = Course::withCount([
            'raters as ratings_count',
            'students as students_count',

        ])
            ->withAvg('raters', 'course_user.point')
            ->with([
                'raters' => function($q) use ($user) {
                    $q->where('user_id', $user->id);
                },
                'teacher','grade'
            ])
            ->paginate(10);


        return view('admin.home', compact('courses', 'user','activeCourses'));

    }
}
