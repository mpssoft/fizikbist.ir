@extends('layouts.app')

@section('style')
    <style>
        .spinner {
            border-width: 2px;
            border-style: solid;
            border-color: white transparent transparent transparent;
            border-radius: 9999px;
            width: 1.25rem;
            height: 1.25rem;
            animation: spin 0.6s linear infinite;
        }

        @keyframes spin {
            to {
                transform: rotate(360deg);
            }
        }

    </style>
@endsection
@section("content")
    <!-- Hero Slider Section -->
    @if($motion = \Modules\Motion\Models\Motion::where('active',true)->first())
        @include('motion::frontend.home-video',compact('motion'))
    @endif
    <!-- Home Section -->
    <section id="homeSection" class="section">
        <!-- Hero Section -->
        <!-- Hero Section -->
        <div
            class="{{is_tv()?'bg-gray-300 dark:bg-slate-800':'gradient-bg hero-pattern'}} text-white py-20 relative overflow-hidden">
            <div class="absolute inset-0 bg-black bg-opacity-20"></div>
            <div class=" mx-auto  text-center relative z-10">

                @if(is_tv())
                    <h1 style="font-family:'Vazirmatn-bold' !important;"
                        class="text-4xl pt-2 font-bold mb-8 text-gray-800 dark:text-white">
                        آموزش مفهومی فیزیک
                    </h1>
                    @include('frontend.home.home-slider-tv', ['sliders' => $sliders])
                @else
                    <h1 style="font-family:'Vazirmatn-bold' !important;"
                        class=" text-4xl pt-2 font-bold mb-8 bg-gradient-to-r from-white via-yellow-200 to-pink-200  text-transparent bg-clip-text  drop-shadow-[2px_2px_10px_black] dark:drop-shadow-[2px_2px_7px_violet] tv-optimized-text-shadow">
                        آموزش مفهومی فیزیک
                    </h1>
                    @include('frontend.home.home-slider', ['sliders' => $sliders])

                @endif
                <p class="text-2xl mb-10 opacity-95 font-medium drop-shadow-lg">
                    با استاد حسین نژاداسد
                </p>
                @if(is_tv())

                    <a href="#free-courses-section"
                       class="bg-blue-600 dark:bg-blue-500 text-white px-10 py-5 rounded-2xl text-xl font-bold hover:bg-blue-700 dark:hover:bg-blue-600 transition-colors duration-300 shadow-lg">
                        <i class="fas fa-rocket mr-3"></i>
                        شروع یادگیری
                    </a>
                @else
                    <a href="#free-courses-section"
                       class="bg-gradient-to-r from-pink-500 via-purple-500 to-blue-500 text-white px-10 py-5 rounded-2xl text-xl font-bold hover:scale-105 transition-all duration-300 shadow-2xl hover:shadow-pink-500/50 tv-optimized-text-shadow">
                        <i class="fas fa-rocket mr-3"></i>
                        شروع یادگیری
                    </a>
                @endif


            </div>
        </div>

        <!-- Teacher Introduction -->
        <div class="  max-w-7xl mx-auto px-4 py-16">
            <!-- Teacher Introduction Section -->
            <div class="bg-white dark:bg-slate-800 rounded-2xl shadow-xl p-8 md:p-12 transition-colors duration-300">
                <div class="grid md:grid-cols-2 gap-12 items-center">
                    <!-- Content Section -->
                    <div>
                        <h2 class="text-3xl font-bold text-gray-800 dark:text-white mb-6 transition-colors duration-300">
                            معرفی استاد
                        </h2>
                        <p class="text-gray-600 dark:text-gray-300 text-lg leading-relaxed mb-6 transition-colors duration-300">
                            استاد حسین نژاداسد با بیش از ۱۰ سال تجربه در تدریس فیزیک و تخصص در روش‌های نوین آموزش،
                            آماده است تا شما را در مسیر تسلط بر فیزیک و کسب نتایج عالی در کنکور همراهی کند.
                        </p>
                        <div class="space-y-3">
                            <div class="flex items-center">
                                <i class="fas fa-check-circle text-green-500 dark:text-green-400 ml-3 transition-colors duration-300"></i>
                                <span class="text-gray-700 dark:text-gray-200 transition-colors duration-300">کارشناسی ارشد فیزیک</span>
                            </div>
                            <div class="flex items-center">
                                <i class="fas fa-check-circle text-green-500 dark:text-green-400 ml-3 transition-colors duration-300"></i>
                                <span class="text-gray-700 dark:text-gray-200 transition-colors duration-300">بیش از ۱۰ سال تجربه تدریس</span>
                            </div>

                        </div>
                    </div>

                    <!-- Profile Section -->
                    <div class="text-center">
                        <div class="w-64 h-64 mx-auto bg-gradient-to-br from-purple-400 via-blue-500 to-indigo-600 dark:from-purple-500 dark:via-blue-600 dark:to-indigo-700 rounded-full flex items-center justify-center text-white text-6xl tv-optimized-text-shadow shadow-2xl transition-all duration-300 hover:scale-105">
                            <i class="fas fa-user-tie"></i>
                        </div>
                        <h3 class="text-xl font-semibold mt-6 text-gray-800 dark:text-white transition-colors duration-300">
                            استاد حسین نژاداسد
                        </h3>
                        <p class="text-gray-600 dark:text-gray-400 transition-colors duration-300 mb-4">
                            دبیر فیزیک
                        </p>


                    </div>
                </div>
            </div>

        </div>
    </section>


    <!-- Free Lessons Section -->
    @if(count($lessons))
        <section class="py-20 bg-gray-200" id="free-courses-section">
            <div class="container mx-auto px-6">
                <div class="text-center mb-16">
                    <h2 class="text-4xl font-bold text-gray-800 mb-4">درس‌های رایگان</h2>
                    <p class="text-xl text-gray-600 max-w-2xl mx-auto">با درس‌های رایگان ما شروع کنید و کیفیت
                        آموزش‌هایمان را تجربه کنید.</p>
                </div>

                <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                    <!-- Free Lesson Card 1 -->
                    @foreach($lessons as $lesson)
                        <div
                            class="course-card flex flex-1 w-full flex-col min-h-[560px]  group bg-white dark:bg-slate-800 rounded-2xl shadow-xl hover:shadow-2xl overflow-hidden border border-gray-100 dark:border-slate-700 transition-all duration-300 hover:-translate-y-1">
                            <!-- Course Image -->
                            <div
                                class="relative h-60 bg-gradient-to-br from-blue-500 to-blue-600 flex items-center justify-center overflow-hidden tv-optimized-text-shadow"
                                style="background:url('{{$lesson->thumbnail}}');background-size: 100% 100%">
                                <div
                                    class="absolute inset-0 bg-black/20 group-hover:bg-black/10 transition-colors duration-300"></div>
                                <!-- Course Badge -->


                                <div
                                    class="absolute top-4 right-4 bg-white/90 dark:bg-slate-800/90 with-blur text-blue-600 dark:text-blue-400 px-3 py-1 rounded-full text-sm font-medium">
                                    رایگان
                                </div>

                            </div>

                            <!-- Course Content -->
                            <div class="p-6 bg-white dark:bg-slate-800 flex-1 flex flex-col">
                                <h3 class="text-xl font-bold text-gray-800 dark:text-slate-200 mb-3 group-hover:text-blue-600 dark:group-hover:text-blue-400 transition-colors duration-200">
                                    {{$lesson->title}}
                                </h3>

                                <!-- lesson Stats -->
                                <div class="flex items-center gap-4 mb-4 text-sm text-gray-500 dark:text-slate-400">
                                    <div class="flex items-center gap-1">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                  d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                        </svg>
                                        <span>{{$lesson->duration}} دقیقه</span>
                                    </div>
                                    <div class="flex items-center gap-1">
                                        <span class="fas fa-eye"> </span>
                                        <span>{{$lesson->view}} بازدید </span>
                                    </div>
                                    {{--<div class="flex items-center gap-1">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                        </svg>
                                        <span>{{count($course->students)}} دانش‌آموز</span>
                                    </div>--}}
                                </div>

                                <!-- Course Description -->
                                <p class="text-gray-600 dark:text-slate-400 mb-6 leading-relaxed   line-clamp-2">
                                    {{$lesson->description}}
                                </p>
                                <div class="flex-1"></div>

                                <div class=" items-center justify-between  ">
                                    @if($lesson->price==0)
                                        <!-- Action Buttons -->
                                        <div class="flex justify-between items-center" id="free-course">
                                            <a href="{{route('play',$lesson->id)}}"
                                               class="bg-gradient-to-r flex from-blue-400 to-blue-700 hover:from-blue-700 hover:to-blue-800 dark:from-blue-500 dark:to-blue-600 dark:hover:from-blue-600 dark:hover:to-blue-700 text-white px-6 py-3 rounded-xl font-medium transition-all duration-300 shadow-lg hover:shadow-xl transform hover:scale-105  items-center gap-2 tv-optimized-text-shadow">
                                                <span> تماشای فیلم</span>
                                                <svg class="w-4 h-4" fill="none" stroke="currentColor"
                                                     viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                          stroke-width="2" d="M15 19l-7-7 7-7"></path>
                                                </svg>
                                            </a>

                                        </div>
                                    @else
                                        <!-- Paid Course Actions -->
                                        <div class="" id="paid-course">
                                            <div class="flex items-center justify-between mb-4">
                                                <div class="text-right">

                                                    @if(!is_null($lesson->discounts->first()))
                                                        @php
                                                            $disValue = $lesson->discounts->first()->value;
                                                            $disType = $lesson->discounts->first()->type;
                                                            if($disType == 'percent'){
                                                                $dis  = $lesson->price * ($disValue/100);
                                                            }else{
                                                                $dis = $lesson->price - $disValue;
                                                            }
                                                        @endphp
                                                        <div
                                                            class=" font-bold text-gray-800 dark:text-slate-200">{{number_format($lesson->price-$dis)}}
                                                            تومان
                                                        </div>
                                                        <div
                                                            class="text-sm text-gray-500 dark:text-slate-400 line-through">{{number_format($lesson->price)}}
                                                            تومان
                                                        </div>
                                                    @else
                                                        <div
                                                            class=" font-bold text-gray-800 dark:text-slate-200">{{number_format($lesson->price)}}
                                                            تومان
                                                        </div>
                                                    @endif
                                                </div>
                                                @if(!is_null($lesson->discounts->first()))
                                                    <div
                                                        class="bg-red-100 dark:bg-red-900/30 text-red-600 dark:text-red-400 px-2 py-1 rounded-lg text-sm font-medium">
                                                        {{$lesson->discounts->first()->value}}% تخفیف
                                                    </div>
                                                @endif
                                            </div>

                                            <div class="flex gap-3">
                                                <button id="btn-{{$lesson->id}}"
                                                        onclick="addToCart('course','{{$lesson->id}}')"
                                                        class=" bg-gradient-to-r from-green-600 to-green-700 hover:from-green-700 hover:to-green-800 dark:from-green-500 dark:to-green-600 dark:hover:from-green-600 dark:hover:to-green-700 text-white px-4 py-3 rounded-xl font-medium transition-all duration-300 shadow-lg hover:shadow-xl transform hover:scale-105 flex items-center justify-center gap-2">

                                                    <i class="fas fa-cart-arrow-down"></i>
                                                    <span>افزودن به سبد</span>
                                                    <span class="spinner-{{$lesson->id}}  hidden"><i
                                                            class="fas fa-spinner fa-spin-pulse"></i></span>
                                                </button>
                                            </div>

                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>

                    @endforeach
                </div>

                <div class="text-center mt-12">
                    <button
                        class="bg-gray-800 text-white px-8 py-3 rounded-lg font-semibold hover:bg-gray-700 transition duration-300">
                        مشاهده همه درس‌های رایگان
                    </button>
                </div>
            </div>
        </section>
    @endif
    <!-- Featured Courses Section -->
    <section class="py-20  dark:bg-gray-900 dark:text-white">
        <div class="container mx-auto px-6">
            <div class="text-center mb-16">
                <h2 class="text-4xl font-bold dark:text-white mb-4">دوره‌های محبوب</h2>

            </div>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                @foreach($courses as $course)
                    <div
                        class="course-card flex flex-1 w-full flex-col min-h-[560px]  group bg-white dark:bg-slate-800 rounded-2xl shadow-xl hover:shadow-2xl overflow-hidden border border-gray-100 dark:border-slate-700 transition-all duration-300 hover:-translate-y-1">
                        <!-- Course Image -->
                        <div
                            class="relative h-60 bg-gradient-to-br from-blue-500 to-blue-600 flex items-center justify-center overflow-hidden tv-optimized-text-shadow"
                            style="background:url('{{$course->cover_image}}');background-size: 100% 100%">
                            <div
                                class="absolute inset-0 bg-black/20 group-hover:bg-black/10 transition-colors duration-300"></div>
                            <!-- Course Badge -->

                            @if($course->price==0)
                                <div
                                    class="absolute top-4 right-4 bg-white/90 dark:bg-slate-800/90 with-blur text-blue-600 dark:text-blue-400 px-3 py-1 rounded-full text-sm font-medium">
                                    رایگان
                                </div>
                            @endif

                        </div>

                        <!-- Course Content -->
                        <div class="p-6 relative bg-white dark:bg-slate-800 flex-1 flex flex-col">
                            <h3 class="text-xl font-bold text-gray-800 dark:text-slate-200 mb-3 group-hover:text-blue-600 dark:group-hover:text-blue-400 transition-colors duration-200">
                                {{$course->title}}
                            </h3>
                            <div
                                class="absolute top-14 left-0 bg-white/90  {{$course->lang == 'fa'? 'dark:bg-amber-400':'dark:bg-sky-500'}}  text-white   rounded-r-full px-3 py-1 dark:shadow-black dark:shadow-[-8px_0_24px_rgba(0,0,0,0.4)] border-2 border-gray-100 border-l-0  text-xl ">
                                {{ $course->lang == 'tr' ? 'زبان ترکی':'زبان فارسی' }}
                            </div>
                            <!-- Course Stats -->
                            <div class="flex items-center gap-4 mb-4 text-sm text-gray-500 dark:text-slate-400">
                                <div class="flex items-center gap-1">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                              d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>
                                    <span>{{$course->time}} ساعت</span>
                                </div>
                                <div class="flex items-center gap-1">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                              d="M15 10l4.553-2.276A1 1 0 0121 8.618v6.764a1 1 0 01-1.447.894L15 14M5 18h8a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v8a2 2 0 002 2z"></path>
                                    </svg>
                                    <span>{{count($course->lessons)}} ویدیو</span>
                                </div>
                                <div class="flex items-center gap-1">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                              d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                    </svg>
                                    <span>{{count($course->students)}} دانش‌آموز</span>
                                </div>
                            </div>

                            <!-- Course Description -->
                            <p class="text-gray-600 dark:text-slate-400 mb-6 leading-relaxed   line-clamp-2">
                                {{$course->description}}
                            </p>
                            <div class="flex-1"></div>

                            <div class=" items-center justify-between  ">
                                @if($course->price==0)
                                    <!-- Action Buttons -->
                                    <div class="flex justify-between items-center" id="free-course">
                                        <a href="{{route('playFreeCourse',$course->id)}}"
                                           class="bg-gradient-to-r flex from-blue-400 to-blue-700 hover:from-blue-700 hover:to-blue-800 dark:from-blue-500 dark:to-blue-600 dark:hover:from-blue-600 dark:hover:to-blue-700 text-white px-6 py-3 rounded-xl font-medium transition-all duration-300 shadow-lg hover:shadow-xl transform hover:scale-105  items-center gap-2 tv-optimized-text-shadow">
                                            <span>مرور دوره</span>
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                      d="M15 19l-7-7 7-7"></path>
                                            </svg>
                                        </a>
                                        <a href="{{route('show.course',$course->id)}}"
                                           class=" bg-gradient-to-r from-blue-600 to-blue-700 hover:from-green-700 hover:to-blue-800 dark:from-blue-500 dark:to-blue-600 dark:hover:from-blue-600 dark:hover:to-blue-700 text-white px-4 py-3 rounded-xl font-medium transition-all duration-300 shadow-lg hover:shadow-xl transform hover:scale-105 flex items-center justify-center gap-2">

                                            <i class="fas fa-circle-info"></i>
                                            <span>  اطلاعات بیشتر </span>

                                        </a>
                                        {{--     <!-- Rating -->
                                             <div class="flex items-center gap-1">
                                                 <div class="flex text-yellow-400">
                                                     <svg class="w-4 h-4 fill-current" viewBox="0 0 20 20">
                                                         <path d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z"/>
                                                     </svg>
                                                     <svg class="w-4 h-4 fill-current" viewBox="0 0 20 20">
                                                         <path d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z"/>
                                                     </svg>
                                                     <svg class="w-4 h-4 fill-current" viewBox="0 0 20 20">
                                                         <path d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z"/>
                                                     </svg>
                                                     <svg class="w-4 h-4 fill-current" viewBox="0 0 20 20">
                                                         <path d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z"/>
                                                     </svg>
                                                     <svg class="w-4 h-4 fill-current" viewBox="0 0 20 20">
                                                         <path d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z"/>
                                                     </svg>
                                                 </div>
                                                 <span class="text-sm text-gray-600 dark:text-slate-400 mr-1">۴.۸</span>
                                             </div>--}}
                                    </div>
                                @else
                                    <!-- Paid Course Actions -->
                                    <div class=" " id="paid-course">
                                        <!-- Price and Discount Section -->
                                        <div class="flex items-center justify-between mb-6 border-2 border-gray-600 p-5 rounded-2xl">
                                            <div class="flex flex-col  w-full">
                                            @if(!is_null($course->discounts->where('start_at','<',now())->where('end_at','>',now())->where('is_active',1)->first()))
                                                @php
                                                    $disValue = $course->discounts->first()->value;
                                                    $disType = $course->discounts->first()->type;
                                                    if($disType == 'percent'){
                                                    $dis  = $course->price * ($disValue/100);
                                                    }else{
                                                    $dis = $course->price - $disValue;
                                                    }
                                                @endphp
                                                <div class="flex justify-between  items-center">
                                                <div class="flex flex-col text-right">
                                                    <div class="text-center text-sm text-gray-500 dark:text-slate-400 line-through mb-1">
                                                        {{number_format($course->price)}} تومان
                                                    </div>
                                                    <div class="font-bold text-gray-800 dark:text-slate-200 text-2xl">
                                                        {{number_format($course->price-$dis)}} تومان
                                                    </div>
                                                </div>
                                                <!-- Discount Badge -->
                                                <div class="flex bg-red-100 dark:bg-red-900/30 text-red-600 dark:text-red-400 px-4 py-2 rounded-xl text-lg font-bold shadow-sm">
                                                    {{$course->discounts->first()->value}}%  تخفیف
                                                </div>
                                                </div>
                                                <!-- Countdown -->
                                                <div
                                                    class="bg-gradient-to-br from-slate-700 via-slate-600 to-slate-500 dark:from-slate-800 dark:via-slate-700 dark:to-slate-600 justify-center mt-5 text-white p-4 rounded-xl  flex items-center gap-3 shadow-2xl w-full "
                                                    data-expire="{{ $course->discounts->first()->end_at }}"
                                                    id="countdown-{{ $course->id }}">
                                                    Loading timer...
                                                </div>
                                            @else
                                                <!-- Price Section -->
                                                <div class="text-right">
                                                    <div class="font-bold text-gray-800 dark:text-slate-200 text-2xl">
                                                        {{number_format($course->price)}} تومان
                                                    </div>
                                                </div>

                                            @endif
                                            </div>
                                        </div>


                                        <div class="flex justify-between gap-3">
                                            <button id="btn-{{$course->id}}"
                                                    onclick="addToCart('course','{{$course->id}}')"
                                                    class=" bg-gradient-to-r from-green-600 to-green-700 hover:from-green-700 hover:to-green-800 dark:from-green-500 dark:to-green-600 dark:hover:from-green-600 dark:hover:to-green-700 text-white px-4 py-3 rounded-xl font-medium transition-all duration-300 shadow-lg hover:shadow-xl transform hover:scale-105 flex items-center justify-center gap-2">

                                                <i class="fas fa-cart-arrow-down"></i>
                                                <span>افزودن به سبد</span>
                                                <span class="spinner-{{$course->id}}  hidden"><i
                                                        class="fas fa-spinner fa-spin-pulse"></i></span>
                                            </button>
                                            <a href="{{route('show.course',$course->id)}}"
                                               class=" bg-gradient-to-r from-blue-600 to-blue-700 hover:from-green-700 hover:to-blue-800 dark:from-blue-500 dark:to-blue-600 dark:hover:from-blue-600 dark:hover:to-blue-700 text-white px-4 py-3 rounded-xl font-medium transition-all duration-300 shadow-lg hover:shadow-xl transform hover:scale-105 flex items-center justify-center gap-2">

                                                <i class="fas fa-circle-info"></i>
                                                <span>  اطلاعات بیشتر </span>

                                            </a>
                                        </div>

                                        {{--      <!-- Rating for paid course -->
                                              <div class="flex items-center justify-center gap-1 mt-4 pt-4 border-t border-gray-200 dark:border-slate-700">
                                                  <div class="flex text-yellow-400">
                                                      <svg class="w-4 h-4 fill-current" viewBox="0 0 20 20">
                                                          <path d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z"/>
                                                      </svg>
                                                      <svg class="w-4 h-4 fill-curren" tviewBox="0 0 20 20">
                                                          <path d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z"/>
                                                      </svg>
                                                      <svg class="w-4 h-4 fill-current" viewBox="0 0 20 20">
                                                          <path d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z"/>
                                                      </svg>
                                                      <svg class="w-4 h-4 fill-current" viewBox="0 0 20 20">
                                                          <path d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z"/>
                                                      </svg>
                                                      <svg class="w-4 h-4 fill-current" viewBox="0 0 20 20">
                                                          <path d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z"/>
                                                      </svg>
                                                  </div>
                                                  <span class="text-sm text-gray-600 dark:text-slate-400 mr-1">۴.۸ (۱۲۳ نظر)</span>
                                              </div>
                                        --}}  </div>
                                @endif
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>


    <!-- /.content -->
    @push('scripts')
        <script type="module">


            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $(document).on('click', '.delete-action', function (e) {
                e.preventDefault();

                let id = $(this).attr('id');
                let url = $(this).attr('href');
                Swal.fire({
                    title: 'حذف',
                    text: 'آیا مطمئن هستید؟',
                    icon: 'warning',
                    cancelButtonText: 'لغو',
                    confirmButtonText: 'حذف',
                    confirmButtonColor: 'red',
                    cancelButtonColor: 'blue',
                    showCancelButton: true
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            url: url,
                            method: 'DELETE',
                            success: function (response) {
                                Swal.fire({
                                    text: response.data.message,
                                    showConfirmButton: false,
                                    color: '#fff',
                                    background: '#28a745',
                                    icon: 'success',
                                    toast: true,
                                    timer: 1000
                                });
                                $(`tr[data='${id}']`).remove();
                            },
                            error: function (response) {

                            }
                        });
                    }
                });
            });

        </script>

    @endpush
@endsection
@section('script')

    {{ $script ?? '' }}

@endsection
@section('head')
    {{ $head ?? '' }}
@endsection
