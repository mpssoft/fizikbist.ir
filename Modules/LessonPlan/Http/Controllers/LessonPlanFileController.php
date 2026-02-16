<?php

namespace Modules\LessonPlan\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Modules\LessonPlan\Models\LessonPlanAttachment;

class LessonPlanFileController extends Controller
{
    public function destroy(LessonPlanAttachment $attachment)
    {

        // optional: auth check
        if ($attachment->lessonPlan->user_id !== auth()->id()) {
            return response()->json(['success' => false ,'message'=>'خطا در حذف فایل!'], 403);
        }

        Storage::delete($attachment->path);
        $attachment->delete();

        return response()->json(['success' => true,'message' => 'فایل ضمیمه حذف شد!']);
    }
    public function download(LessonPlanAttachment $file)
    {
        // optional: admin auth check
        // abort_unless(auth()->user()->isAdmin(), 403);

        $path = $file->path;

        if (!Storage::exists($path)) {
            abort(404);
        }

        return Storage::download(
            $path,
            $file->original_name // download filename
        );
    }

}
