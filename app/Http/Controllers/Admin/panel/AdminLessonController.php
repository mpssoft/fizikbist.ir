<?php

namespace App\Http\Controllers\Admin\panel;

use App\Models\Course;
use App\Models\Lesson;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;

class AdminLessonController extends Controller
{
    public function index(Course $course)
    {

        $publishedLessons = Lesson::where("status","published")->get();
        $draftLessons = Lesson::where("status","draft")->get();
        $totalViews = Lesson::sum('view');
        $lessons = Lesson::with(['course'])->paginate(10);
        return view('admin.lessons.index', compact('publishedLessons','draftLessons', 'lessons','totalViews'));


    }

    public function create(Course $course)
    {
        return view('admin.lessons.create', compact('course'));
    }

    public function store(Request $request)
    {

        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'course_id' => 'required' ,
            'description' => 'nullable|string',
            'video_url' => 'nullable',
            'spotplayer_id' => 'nullable|string',
            'tags' => 'nullable|string',
            'thumbnail' => 'nullable|string',
            'is_free' => 'nullable|boolean',
            'price' => 'nullable|integer',
            'status' => 'in:published,draft',
            'order' => 'nullable|integer',
            'view' => 'nullable|integer',
            'like' => 'nullable|integer',
        ]);

        $lesson = Lesson::create($validated);
        toast('درس جدید اضافه شد','success','center');
        return redirect()->route('admin.lessons.index')
            ->with('success', 'Lesson created successfully.');
    }

    public function edit(Course $course, Lesson $lesson)
    {
        return view('admin.lessons.edit', compact('course', 'lesson'));
    }

    public function update(Request $request, Course $course, Lesson $lesson)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'course_id' => 'required' ,
            'description' => 'nullable|string',
            'video_url' => 'nullable',
            'spotplayer_id' => 'nullable|string',
            'tags' => 'nullable|string',
            'thumbnail' => 'nullable|string',
            'is_free' => 'nullable|boolean',
            'price' => 'nullable|integer',
            'status' => 'in:published,draft',
            'order' => 'nullable|integer',
            'view' => 'nullable|integer',
            'like' => 'nullable|integer',
        ]);

        $lesson->update($validated);
        toast('درس با موفقیت بروزرسانی شد','success','center');
        return redirect()->route('admin.lessons.index', $course)
            ->with('success', 'Lesson updated successfully.');
    }

    public function destroy(Course $course, Lesson $lesson)
    {
        $lesson->delete();

        return redirect()->route('admin.lessons.index', $course)
            ->with('success', 'Lesson deleted successfully.');
    }
}
