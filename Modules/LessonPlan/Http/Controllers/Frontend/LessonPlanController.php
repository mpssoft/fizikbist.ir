<?php

namespace Modules\LessonPlan\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Modules\LessonPlan\Models\LessonPlan;

class LessonPlanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if(!Auth::check())
            session(['url.intended' => url()->previous()]);
        return view('lessonplan::frontend.index');
    }





}
