<?php

namespace Modules\File\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Modules\File\Models\File;

class FileController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $this->seo()
            ->setTitle(" فایل ها و جزوات آموزشی !")
            ->setDescription("دانلود رایگان و خرید فایل‌های حرفه‌ای. فیزیک به شیوه‌ای ساده، جذاب و کاربردی که دانش‌آموزان را برای موفقیت در کنکور و ادامه تحصیل در رشته‌های مهندسی و علوم پایه آماده کند. ما معتقدیم هر دانش‌آموزی می‌تواند فیزیک را بیاموزد.")
        ;
        $files = File::where('state','active')->paginate(20);
        return view('file::frontend.index',compact('files'));
    }
}
