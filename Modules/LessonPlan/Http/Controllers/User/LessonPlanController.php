<?php

namespace Modules\LessonPlan\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Notifications\Channels\MelipayamakChannel;
use App\Notifications\LessonPlanPaidNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
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

    public function create()
    {
        return view('lessonplan::user.create');
    }

    public function edit(LessonPlan $lessonplan)
    {
        $lessonplan->load('attachments'); // relation below
        return view('lessonplan::user.edit',compact('lessonplan'));
    }
    /**
     * Remove the specified resource from storage.
     */

    public function update(Request $request, LessonPlan $lessonplan)
    {

        $validated = $request->validate([
            'grade_id'    => 'nullable|exists:grades,id',
            'title'       => 'required|string|max:255',
            'description' => 'required|string',
            'files.*' => 'nullable|file|max:10240', // each file max 10MB
        ]);

        // Optional: check if the current user can update this lesson plan
        if ($lessonplan->user_id !== auth()->user()->id) {
            return response()->json([
                'success' => false,
                'message' => 'شما اجازه ویرایش این درسنامه را ندارید.'
            ], 403);
        }
        if ($lessonplan->status == 'pending') {
            return response()->json([
                'success' => false,
                'message' => 'درخواست درسنامه شما قبلا بروزرسانی شده و منتظر بررسی ادمین می باشد.تشکر از شکیبایی شما.'
            ], 403);
        }
        // Update lesson plan fields
        $lessonplan->update([
            'grade_id'    => $validated['grade_id'] ?? null,
            'title'       => $validated['title'],
            'description' => $validated['description'],
            'status' => 'pending',
            // Keep admin fields unchanged
            // 'admin_description', 'status', 'delivery_time' remain as is
        ]);
        if ($request->hasFile('files')) {
            foreach ($request->file('files') as $file) {


                $filename = Str::uuid() . '.' . $file->getClientOriginalExtension();

                // target directory
                $directory = "uploads/user/{$lessonplan->user_id}";

                // create directory if not exists (Laravel does this automatically,
                // but we keep it explicit for clarity)
                if (!Storage::exists($directory)) {
                    Storage::makeDirectory($directory);
                }

                // store file
                $path = $file->storeAs($directory, $filename);


                $lessonplan->attachments()->create([
                    'uploaded_by' => auth()->id(),
                    'original_name' => $file->getClientOriginalName(),
                    'path' => $path,
                    'mime_type' => $file->getMimeType(),
                    'size' => $file->getSize(),
                    'visibility' => 'both',
                ]);
            }
        }

        // TODO: optionally inform admin about update via SMS/email

        return response()->json([
            'success' => true,
            'message' => 'درسنامه با موفقیت ویرایش شد. برای پیگیری از پنل کاربری بخش درسنامه‌ها اقدام کنید.'
        ]);
    }
    public function store(Request $request)
    {

        $validated = $request->validate([
            'grade_id'       => 'nullable|exists:grades,id',
            'title'          => 'required|string|max:255',
            'description'    => 'required|string',
            'files.*' => 'nullable|file|max:10240', // each file max 10MB
        ]);

        $lessonplan = LessonPlan::create([
            'user_id'          => Auth::id(),
            'grade_id'         => $validated['grade_id'] ?? null,
            'title'            => $validated['title'],
            'description'      => $validated['description'],
            'admin_description'=> null, // empty, admin fills later
            'delivery_time'    => null,
            'status'           => 'pending', // initial status
        ]);

        if ($request->hasFile('files')) {
            foreach ($request->file('files') as $file) {


                $filename = Str::uuid() . '.' . $file->getClientOriginalExtension();

                // target directory
                $directory = "uploads/user/".auth()->id();

                // create directory if not exists (Laravel does this automatically,
                // but we keep it explicit for clarity)
                if (!Storage::exists($directory)) {
                    Storage::makeDirectory($directory);
                }

                // store file
                $path = $file->storeAs($directory, $filename);


                $lessonplan->attachments()->create([
                    'uploaded_by' => auth()->id(),
                    'original_name' => $file->getClientOriginalName(),
                    'path' => $path,
                    'mime_type' => $file->getMimeType(),
                    'size' => $file->getSize(),
                    'visibility' => 'both',
                ]);
            }
        }

        return response()->json([
            'success' => true,
            'lesson_plan_id' => $lessonplan->id,
            'ok'=>true,
            'message'=>'درخواست درسنامه با موفقیت ثبت شد. برای پیگیری از پنل کاربری بخش درسنامه های می توانید اقدام کنید. بسیار تشکر از اعتماد شما به فیزیک بیست.'
        ]);
    }
    public function destroy(LessonPlan $lessonplan)
    {

        if ($lessonplan->user_id === auth()->id()) {
            $this->deleteLessonPlanAttachments($lessonplan);
            $lessonplan->delete();
            return redirect()->route('user.lessonplans.index')
                ->with('success', 'Lesson Plan deleted successfully.');
        } else {
            abort(403, 'Unauthorized action.');
        }


    }

    public function deleteLessonPlanAttachments(LessonPlan $lessonplan)
    {
        foreach($lessonplan->attachments()->get() as $file){
            // Delete file from storage
            if (Storage::exists($file->path)) {
                echo "yes exists file";
                Storage::delete($file->path);
            }

        }

    }
}
