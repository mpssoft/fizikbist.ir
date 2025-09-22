<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Lesson;
use App\Models\License;
use App\Models\Slider;
use Artesaos\SEOTools\SEOMeta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class HomeController extends Controller
{
    public function index()
    {
        //auth()->loginUsingId(1);
        $this->seo()
            ->setTitle("آموزش به زبان شما!")
            ->setDescription("آموزش فیزیک به شیوه‌ای ساده، جذاب و کاربردی که دانش‌آموزان را برای موفقیت در کنکور و ادامه تحصیل در رشته‌های مهندسی و علوم پایه آماده کند. ما معتقدیم هر دانش‌آموزی می‌تواند فیزیک را بیاموزد.")
            ;
        $sliders = Slider::where('is_active',1)->orderBy('order')->get();
        $courses = Course::where('spotplayer_id','!=','')->where("status","active")->get();
        $lessons = Lesson::latest()->take(6)->get();

        return view('frontend.home.index',compact('sliders','courses','lessons'));
    }
    public function play(Lesson $lesson)
    {
        $this->seo()
            ->setTitle($lesson->title)
            ->setDescription($lesson->description)
            ->addImages($lesson->thumbnail)
            ->metatags()->setKeywords($lesson->tags)
        ;
        $lesson->increment('view');
        return view('frontend.player.play',compact('lesson'));
    }
    public function playFreeCourse(Course $course)
    {
        $this->seo()
            ->setTitle($course->title)
            ->setDescription($course->description)
            ->addImages($course->cover_image)
            ;

        if($course->price >0)
            return redirect()->route('all.courses')->with(['message'=>'این درس رایگان نیست']);
        $lessons = $course->lessons()->latest()->get();
        if(auth()->check()){

            $userCourse = auth()->user()->courses()->syncWithoutDetaching([
                $course->id => [
                    'enrolled_at' => now(),
                    'point' => 10,
                ],
            ]);


        }
        return view('frontend.player.play-free-course',compact('lessons'));
    }

        public function refreshCookie(Request $request)
    {
        if ((microtime(true) * 1000) > hexdec(substr($X = $_COOKIE['X'], 24, 12))) {
            $ch = curl_init();
            curl_setopt_array($ch, [
                CURLOPT_HEADER => true,
                CURLOPT_NOBODY => true,
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_URL => 'https://app.spotplayer.ir/',
                CURLOPT_HTTPHEADER => ['cookie: X=' . $X]
            ]);
            preg_match('/X=([a-f0-9]+);/', curl_exec($ch), $mm);
            setcookie('X', $mm[1], time() + (3600*24*365*100), '/', 'fizikbist.ir', true, false);
        }

    }
    public function playCourse(Request $request , Course $course)
    {

        $license = License::where('course_id',$course->id)
                        ->where('user_id',auth()->user()->id)->firstOrFail();

        return view('frontend.player.play-course', compact( 'license'));
    }

    protected function createCookie()
    {
        if ((microtime(true) * 1000) > hexdec(substr($X = $_COOKIE['X'], 24, 12))) {
            $ch = curl_init();
            curl_setopt_array($ch, [
              CURLOPT_HEADER => true,
                CURLOPT_NOBODY => true,
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_URL => 'https://app.spotplayer.ir/',
                CURLOPT_HTTPHEADER => ['cookie: X=' . $X]
            ]);
            preg_match('/X=([a-f0-9]+);/', curl_exec($ch), $mm);
            setcookie('X', $mm[1], time() + (3600*24*365*100), '/', 'localhost', true, false);
        }
    }

    public function about()
    {
        $this->seo()
            ->setTitle(" درباره ما")
            ->setDescription("حسین نژاداسد مدرس مجرب فیزیک دبیرستان با سال‌ها تجربه در آمادگی دانش‌آموزان برای کنکور و کسب رتبه‌های برتر در شهرستان سلماس.")
        ;
        return view('frontend.home.about');
    }
    public function contact()
    {
        $this->seo()
            ->setTitle("ارتباط با ما")
            ->setDescription("برای دریافت مشاوره رایگان، ثبت‌نام در دوره‌ها یا پاسخ به سوالات خود با ما در تماس باشید. ما همیشه آماده کمک به شما هستیم. ")
        ;
        return view('frontend.home.contact');
    }
    public function faq()
    {
        $this->seo()
            ->setTitle(" سوالات متداول ")
            ->setDescription(" پاسخ سوالات رایج دانش‌آموزان و اولیای محترم درباره دوره‌های فیزیک و آمادگی برای کنکور ")
        ;
        return view('frontend.home.faq');
    }
    public function termsOfService()
    {
        $this->seo()
            ->setTitle("  شرایط و ظوابط استفاده ")
            ->setDescription(" قوانین و مقررات استفاده از سایت فیزیک بیست ")
        ;
        return view('frontend.home.terms-of-service');
    }
}
