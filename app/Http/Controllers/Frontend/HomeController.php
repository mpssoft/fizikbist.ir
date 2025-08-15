<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Lesson;
use App\Models\License;
use App\Models\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class HomeController extends Controller
{
    public function index()
    {
        //auth()->loginUsingId(1);

        $sliders = Slider::where('is_active',1)->orderBy('order')->get();
        $courses = Course::where('spotplayer_course_id','!=','')->get();
        $lessons = Lesson::latest()->take(6)->get();
        return view('frontend.home.index',compact('sliders','courses','lessons'));
    }
    public function play(Lesson $lesson)
    {

        return view('frontend.player.play',compact('lesson'));
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
        return view('frontend.home.about');
    }
    public function contact()
    {
        return view('frontend.home.contact');
    }
    public function faq()
    {
        return view('frontend.home.faq');
    }
}
