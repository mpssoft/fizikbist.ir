<?php

namespace Modules\LessonPlan\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Modules\LessonPlan\Models\LessonPlan;
use Modules\LessonPlan\Models\LessonPlanAttachment;


class FileUploadController extends Controller
{
    // Upload a file for a lesson plan
    public function upload(Request $request, LessonPlan $lessonPlan)
    {
        $request->validate([
            'file' => 'required|file|max:10240', // 10MB
        ]);

        $user = $request->user();

        if (!$user) {
            return response()->json([
                'success' => false,
                'message' => 'User not authenticated',
            ], 401);
        }

        $file = $request->file('file');

        // Generate unique filename
        $filename = Str::uuid() . '.' . $file->getClientOriginalExtension();

        // Store the file in user-specific folder
        $directory = "lesson-plans/{$lessonPlan->id}/user-{$user->id}";
        $path = $file->storeAs($directory, $filename, 'public');

        // Save file info to DB
        $attachment = $lessonPlan->attachments()->create([
            'uploaded_by' => $user->id,
            'original_name' => $file->getClientOriginalName(),
            'path' => $path,
            'mime_type' => $file->getMimeType(),
            'size' => $file->getSize(),
            'visibility' => 'user', // uploaded by user
        ]);

        return response()->json([
            'success' => true,
            'file_id' => $attachment->id,
            'original_name' => $attachment->original_name,
            'url' => Storage::url($path),
        ]);
    }

    // Remove a file from a lesson plan
    public function remove(Request $request, LessonPlanAttachment $attachment)
    {
        $user = $request->user();

        if (!$user) {
            return response()->json([
                'success' => false,
                'message' => 'User not authenticated',
            ], 401);
        }

        // Optional: check if the user has permission to delete
        if ($attachment->uploaded_by !== $user->id && !$user->is_admin) {
            return response()->json([
                'success' => false,
                'message' => 'Unauthorized',
            ], 403);
        }

        // Delete file from storage
        if (Storage::disk('public')->exists($attachment->path)) {
            Storage::disk('public')->delete($attachment->path);
        }

        // Remove record from DB
        $attachment->delete();

        return response()->json([
            'success' => true,
        ]);
    }
}
