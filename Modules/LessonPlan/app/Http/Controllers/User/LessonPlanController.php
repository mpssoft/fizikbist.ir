<?php

namespace Modules\LessonPlan\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Notifications\Channels\MelipayamakChannel;
use App\Notifications\LessonPlanPaidNotification;
use Illuminate\Http\Request;
use Modules\LessonPlan\Models\LessonPlan;

class LessonPlanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $lessonplans = auth()->user()->lessonplans()->paginate(10);

        return view('lessonplan::user.index',compact('lessonplans'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(LessonPlan $lessonplan)
    {

        if ($lessonplan->user_id === auth()->id()) {
            $lessonplan->delete();
            return redirect()->route('user.lessonplans.index')
                ->with('success', 'Lesson Plan deleted successfully.');
        } else {
            abort(403, 'Unauthorized action.');
        }


    }
}
