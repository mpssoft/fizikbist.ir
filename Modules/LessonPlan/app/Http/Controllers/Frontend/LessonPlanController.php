<?php

namespace Modules\LessonPlan\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Modules\LessonPlan\Models\LessonPlan;

class LessonPlanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('lessonplan::frontend.index');
    }

    public function store(Request $request)
    {

        $validated = $request->validate([
            'grade_id'       => 'nullable|exists:grades,id',
            'title'          => 'required|string|max:255',
            'description'    => 'required|string',

        ]);

        $lessonPlan = LessonPlan::create([
            'user_id'          => Auth::id(),
            'grade_id'         => $validated['grade_id'] ?? null,
            'title'            => $validated['title'],
            'description'      => $validated['description'],
            'admin_description'=> null, // empty, admin fills later
            'delivery_time'    => null,
            'status'           => 'pending', // initial status
        ]);

        // TODO inform admin with sms/email

        return response()->json(['ok'=>true,'message'=>'درخواست درسنامه با موفقیت ثبت شد. بزودی از طرف فیزیک بیست با شما تماس گرفته خواهد شد. بسیار تشکر از اعتماد شما به فیزیک بیست']);
    }

}
