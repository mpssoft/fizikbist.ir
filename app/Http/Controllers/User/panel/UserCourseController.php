<?php

namespace App\Http\Controllers\User\panel;

use App\Http\Controllers\Controller;
use App\Models\Course;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Request;

class UserCourseController extends Controller
{
    public function courses(Request $request)
    {
        $user = Auth::user();
        if(request()->get('all')) {
            $courses = Course::paginate(10);

        }else if(request()->get('user')){
            $courses = auth()->user()->courses()->paginate(10);
        }else if(request()->get('bought')){
                $courses = auth()->user()->courses()->where('price','>',0)->paginate(10);
        }else {
                $courses = auth()->user()->courses()->paginate(10);
                request()->merge(['user'=>1]);
        }


        return view('user.courses.index', compact('courses', 'user'));

    }

    public function boughtCourses()
    {
        $licenses = auth()->user()->licenses()->get();

        return view('user.courses.bought',compact('licenses'));
    }
}
