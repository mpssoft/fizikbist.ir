<?php
namespace App\Http\Controllers\Admin\panel;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\User;
use App\Services\SpotPlayerService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class AdminCourseController extends Controller
{
    public function index(Request $request)
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


        return view('admin.courses.index', compact('courses', 'user','activeCourses'));
    }

    public function create()
    {
        $teachers = User::where('role', 'teacher')->get();
        return view('admin.courses.create', compact('teachers'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'price' => 'required|integer|min:0',
            'discount_price' => 'nullable|integer|min:0',
            'discount_expires_at' => 'nullable|date',
            'description' => 'nullable|string',
            'content' => 'nullable',
            'cover_image' => 'nullable',
            'video' => 'nullable',
            'teacher_id' => 'nullable|exists:users,id',
            'status' => 'in:active,in_progress,inactive',
            'spotplayer_id' => 'nullable',
            'time' =>  'nullable',
            'grade_id'=> 'nullable|integer|exists:grades,id',
            'lang'=> 'nullable|string',
            'tags'=> 'nullable|string'
        ]);



        $data['slug'] = Str::slug($data['title']) . '-' . uniqid();

        Course::create($data);

        return redirect()->route('admin.courses.index')->with('success', 'Course created successfully!');
    }

    public function show(Course $course)
    {
        return view('admin.courses.show', compact('course'));
    }

    public function edit(Course $course)
    {
        $teachers = User::where('role', 'teacher')->orWhere('role','admin')->get();

        return view('admin.courses.edit', compact('course', 'teachers'));
    }

    public function update(Request $request, Course $course)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'price' => 'required|integer|min:0',
            'discount_price' => 'nullable|integer|min:0',
            'discount_expires_at' => 'nullable|date',
            'description' => 'nullable|string',
            'content' => 'nullable',
            'cover_image' => 'nullable',
            'video' => 'nullable',
            'teacher_id' => 'nullable|exists:users,id',
             'spotplayer_id' => 'nullable',
            'time' =>  'nullable',
            'status' => 'in:active,in_progress,inactive',
            'grade_id' =>  'nullable|integer|exists:grades,id',
            'lang'=> 'nullable|string',
            'tags'=> 'nullable|string'
        ]);


        $data['slug'] = Str::slug($data['title']) . '-' . uniqid();

        $course->update($data);

        return redirect()->route('admin.courses.index')->with('success', 'Course updated successfully!');
    }

    public function destroy(Course $course)
    {
        if ($course->cover_image) {
            Storage::disk('public')->delete($course->cover_image);
        }

        $course->delete();
        return redirect()->route('admin.courses.index')->with('success', 'Course deleted successfully!');
    }

    public function editUserCourseLicense(Request $request,Course $course){
        $spot = new SpotPlayerService();
        $spot->editCourseLicenseForUser($course);

}
}
