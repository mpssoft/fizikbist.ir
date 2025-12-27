<?php

namespace Modules\LessonPlan\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Lesson;
use App\Notifications\Channels\MelipayamakChannel;
use App\Notifications\LessonPlanAcceptedNotification;
use App\Notifications\LessonPlanPaidNotification;
use App\Notifications\LessonPlanReadyNotification;
use Illuminate\Http\Request;
use Modules\File\Models\File;
use Modules\LessonPlan\Models\LessonPlan;

class LessonPlanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $lessonplans = LessonPlan::paginate(10);
        return view('lessonplan::admin.index',compact('lessonplans'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('lessonplan::admin.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request) {}

    /**
     * Show the specified resource.
     */
    public function show($id)
    {
        return view('lessonplan::show');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(LessonPlan $lessonplan)
    {
        return view('lessonplan::admin.edit',compact('lessonplan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, LessonPlan $lessonplan)
    {
        // Validate input
        $validated = $request->validate([
            'grade_id'    => 'nullable|exists:grades,id',
            'title'       => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'nullable|integer',
            'delivery_time' => 'nullable',
            'status'      => 'nullable|in:pending,accepted,rejected,paid,in_progress,ready',
            'admin_description' => 'nullable|string',
        ]);
        /*if($validated['status'] == 'ready'){
            // inform user with sms
            $channel = new MelipayamakChannel();
            $response = $channel->send(auth()->user(), new LessonPlanReadyNotification($lessonplan->user->mobile, $lessonplan->title));
        }elseif($validated['status'] == 'accepted'){
            // inform user with sms
            $channel = new MelipayamakChannel();
            $response = $channel->send(auth()->user(), new LessonPlanAcceptedNotification($lessonplan->user->mobile, $lessonplan->title));
        }*/
        // Update the lesson plan
        $lessonplan->update($validated);

        // Return JSON response
        return redirect()->route('admin.lessonplans.index')->with([
            'status' => 'success',
            'message' => 'Lesson plan updated successfully.',
            'lessonplan' => $lessonplan,
        ]);
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(LessonPlan $lessonplan)
    {
        $lessonplan->delete();

        return redirect()->route('admin.lessonplans.index')
            ->with('success', 'Lesson Plan deleted successfully.');
    }


    public function changeStatus(Request $request, LessonPlan $lessonPlan)
    {
        $validated = $request->validate([
            'status'=> 'required|in:pending,accepted,rejected,paid,in_progress,ready'
        ]);
        if($validated['status'] == 'ready'){
            // inform user with sms
            $channel = new MelipayamakChannel();
            $response = $channel->send($lessonPlan->user, new LessonPlanReadyNotification($lessonPlan->user->mobile, $lessonPlan->title));
        }elseif($validated['status'] == 'accepted'){
            // inform user with sms
            $channel = new MelipayamakChannel();
            $response = $channel->send($lessonPlan->user, new LessonPlanAcceptedNotification($lessonPlan->user->mobile, $lessonPlan->title));
        }
        $lessonPlan->update($validated);
        return redirect()->route('admin.lessonplans.index');
    }
    public function attachSingleItem(Request $request, LessonPlan $lessonplan)
    {
        $validated = $request->validate([
            'item_id' => 'required|integer',
            'item_type' => 'required|string',
        ]);

        if ($validated['item_type'] === 'Lesson') {
            $lessonplan->lessons()->syncWithoutDetaching($validated['item_id']);
        } elseif ($validated['item_type'] === 'File') {
            $lessonplan->files()->syncWithoutDetaching($validated['item_id']);
        } else {
            return response()->json(['status' => 'error', 'message' => 'Invalid type'], 422);
        }

        return response()->json(['status' => 'success' ,]);
    }
    public function detachSingleItem(Request $request, LessonPlan $lessonplan)
    {
        $validated = $request->validate([
            'item_id' => 'required|integer',
            'item_type' => 'required|string',
        ]);

        if ($validated['item_type'] === 'Lesson') {
            $lessonplan->lessons()->detach($validated['item_id']);
        } elseif ($validated['item_type'] === 'File') {
            $lessonplan->files()->detach($validated['item_id']);
        }

        return response()->json(['status' => 'success']);
    }

    public function searchItems(Request $request, LessonPlan $lessonplan)
    {
        $q = $request->query('q');

        $lessons = Lesson::where('title', 'like', "%$q%")->get();
        $files   = File::where('title', 'like', "%$q%")->get();

        // Merge them first, then map to arrays for JSON
        $results = $lessons->merge($files)->map(function($item){
            return [
                'id'    => $item->id,
                'title' => $item->title,
                'type'  => class_basename($item), // Lesson or File
            ];
        });


        return response()->json($results);
    }

}
