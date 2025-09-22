<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Grade;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    public function all(Request $request, Course $course)
    {
        $this->seo()
            ->setTitle("دوره های آموزشی دروس فیزیک")

            ->setDescription("آموزش فیزیک به شیوه‌ای ساده، جذاب و کاربردی که دانش‌آموزان را برای موفقیت در کنکور و ادامه تحصیل در رشته‌های مهندسی و علوم پایه آماده کند. ما معتقدیم هر دانش‌آموزی می‌تواند فیزیک را بیاموزد.")
        ;
        $activeCourses = Course::where("status","active")->get();
        $courses = Course::where('status','active')->withCount([
            'raters as ratings_count',
            'students as students_count',

        ])
            ->withAvg('raters', 'course_user.point')
            ->with([
                'teacher',
                'discounts'
            ])
            ->paginate(10);


        return view('frontend.course.all',compact('courses'));
    }

    public function gradeCourses(string $gradeName)
    {
        $this->seo()
            ->setTitle("دوره های آموزشی فیزیک ".$gradeName)
            ->setDescription("آموزش فیزیک به شیوه‌ای ساده، جذاب و کاربردی که دانش‌آموزان را برای موفقیت در کنکور و ادامه تحصیل در رشته‌های مهندسی و علوم پایه آماده کند. ما معتقدیم هر دانش‌آموزی می‌تواند فیزیک را بیاموزد.")
        ;
        $ids = Grade::where('name',$gradeName)->pluck('id');
        $ids = $ids->toArray();
        $courses = Course::whereIn('status', ['active','in_progress'])
            ->whereIn('grade_id', $ids)         // match by grade_id
            ->withCount([
            'raters as ratings_count',
            'students as students_count',

        ])
            ->withAvg('raters', 'course_user.point')
            ->with([
                'teacher'
            ])
            ->paginate(10);


        return view('frontend.course.grade-courses',compact('courses'));
    }

    public function showCourse(Course $course)
    {
        $this->seo()
            ->setTitle($course->title)
            ->metatags()->setKeywords($course->tags)
            ->setDescription($course->description)
        ;
        return view('frontend.course.show-course-info',compact('course'));
    }
}
