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

        <!-- Home Section -->
        <section id="homeSection" class="section">
            <!-- Hero Section -->
            <div class="gradient-bg hero-pattern text-white py-20 relative overflow-hidden">
                <div class="absolute inset-0 bg-black bg-opacity-20"></div>
                <div class=" mx-auto  text-center relative z-10">
                    <h2 class="text-4xl pt-2 font-bold mb-8 bg-gradient-to-r from-white via-yellow-200 to-pink-200 bg-clip-text text-transparent drop-shadow-2xl tv-optimized-text-shadow">
                        آموزش تخصصی فیزیک
                    </h2>
                    @include('frontend.home.home-slider', ['sliders' => $sliders])
                    <p class="text-2xl mb-10 opacity-95 font-medium drop-shadow-lg">
                        با استاد حسین نژاداسد و روش‌های نوین تدریس
                    </p>
                    <a href="#free-courses-section"
                            class="bg-gradient-to-r from-pink-500 via-purple-500 to-blue-500 text-white px-10 py-5 rounded-2xl text-xl font-bold hover:scale-105 transition-all duration-300 shadow-2xl hover:shadow-pink-500/50 tv-optimized-text-shadow">
                        <i class="fas fa-rocket mr-3"></i>
                        شروع یادگیری
                    </a>
                </div>
            </div>

            <!-- Teacher Introduction -->
            <div class="  max-w-7xl mx-auto px-4 py-16">
                <div class="dark:bg-slate-400 rounded-2xl shadow-xl p-8 md:p-12">
                    <div class="grid md:grid-cols-2 gap-12 items-center">
                        <div>
                            <h2 class="text-3xl font-bold text-gray-800 mb-6">معرفی استاد</h2>
                            <p class="text-gray-600 text-lg leading-relaxed mb-6">
                                استاد حسین نژاداسد با بیش از ۱۰ سال تجربه در تدریس فیزیک و تخصص در روش‌های نوین آموزش،
                                آماده است تا شما را در مسیر تسلط بر فیزیک و کسب نتایج عالی در کنکور همراهی کند.
                            </p>
                            <div class="space-y-3">
                                <div class="flex items-center">
                                    <i class="fas fa-check-circle text-green-500 ml-3"></i>
                                    <span>کارشناسی ارشد فیزیک</span>
                                </div>
                                <div class="flex items-center">
                                    <i class="fas fa-check-circle text-green-500 ml-3"></i>
                                    <span>بیش از ۱۰ سال تجربه تدریس</span>
                                </div>
                            </div>
                        </div>
                        <div class="text-center">
                            <div
                                class="w-64 h-64 mx-auto bg-gradient-to-br from-purple-400 to-blue-500 rounded-full flex items-center justify-center text-white text-6xl tv-optimized-text-shadow">
                                <i class="fas fa-user-tie"></i>
                            </div>
                            <h3 class="text-xl font-semibold mt-4 text-gray-800">استاد حسین نژاداسد</h3>
                            <p class="text-gray-600">دبیر فیزیک</p>
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
                    <p class="text-xl text-gray-600 max-w-2xl mx-auto">با درس‌های رایگان ما شروع کنید و کیفیت آموزش‌هایمان را تجربه کنید.</p>
                </div>

                <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                    <!-- Free Lesson Card 1 -->
                    @foreach($lessons as $lesson)
                        <div class="bg-white rounded-xl shadow-lg overflow-hidden border border-gray-100 hover:shadow-xl transition duration-300">
                        <div class="relative">
                            <div class="h-48 bg-gradient-to-br from-blue-400 to-blue-600 flex items-center justify-center relative tv-optimized-text-shadow" style="background:url('{{$lesson->thumbnail}}');background-size: contain">
                                <div class="absolute inset-0 bg-black bg-opacity-20"></div>
                                <div class="text-white text-4xl z-10">🎬</div>
                                <div class="absolute inset-0 flex items-center justify-center">
                                    <div class="w-16 h-16 bg-white bg-opacity-90 rounded-full flex items-center justify-center cursor-pointer hover:bg-opacity-100 transition duration-300">
                                        <div class="w-0 h-0 border-l-[20px] border-l-blue-600 border-t-[12px] border-t-transparent border-b-[12px] border-b-transparent mr-1"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="absolute top-4 right-4 bg-green-500 text-white px-3 py-1 rounded-full text-sm font-medium">رایگان</div>
                            <div class="absolute bottom-4 right-4 bg-black bg-opacity-70 text-white px-2 py-1 rounded text-sm">
                                {{ $lesson->duration}} </div>
                        </div>
                        <div class="p-6">
                            <h3 class="text-xl font-semibold text-gray-800 mb-2">{{ $lesson->title }}</h3>
                            <p class="text-gray-600 mb-4">{{ $lesson->description }}</p>
                            <div class="flex items-center justify-between">
                                <div class="flex items-center text-gray-500 text-sm">
                                    <span class="ml-2">👁</span>
                                    <span>{{$lesson->view}}  بازدید</span>
                                </div>
                                <a href="{{route('play',$lesson->id)}}" class="bg-blue-600 text-white px-6 py-2 rounded-lg hover:bg-blue-700 transition duration-300">تماشا کنید</a>
                            </div>
                        </div>
                    </div>
                    @endforeach
                 </div>

                <div class="text-center mt-12">
                    <button class="bg-gray-800 text-white px-8 py-3 rounded-lg font-semibold hover:bg-gray-700 transition duration-300">مشاهده همه درس‌های رایگان</button>
                </div>
            </div>
        </section>
        @endif
        <!-- Featured Courses Section -->
        <section class="py-20  dark:bg-gray-900 dark:text-white">
            <div class="container mx-auto px-6">
                <div class="text-center mb-16">
                    <h2 class="text-4xl font-bold dark:text-white mb-4">دوره‌های محبوب</h2>
                    <p class="text-xl text-gray-600 max-w-2xl mx-auto">محبوب‌ترین دوره‌های ما را کشف کنید که برای کمک به تسلط بر مهارت‌های جدید و پیشرفت شغلی شما طراحی شده‌اند.</p>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    @foreach($courses as $course)
                        <div class="course-card flex flex-1 w-full flex-col min-h-[560px]  group bg-white dark:bg-slate-800 rounded-2xl shadow-xl hover:shadow-2xl overflow-hidden border border-gray-100 dark:border-slate-700 transition-all duration-300 hover:-translate-y-1">
                            <!-- Course Image -->
                            <div class="relative h-60 bg-gradient-to-br from-blue-500 to-blue-600 flex items-center justify-center overflow-hidden tv-optimized-text-shadow" style="background:url('{{$course->cover_image}}');background-size: 100% 100%">
                                <div class="absolute inset-0 bg-black/20 group-hover:bg-black/10 transition-colors duration-300"></div>
                                <!-- Course Badge -->

                                @if($course->price==0)
                                    <div class="absolute top-4 right-4 bg-white/90 dark:bg-slate-800/90 with-blur text-blue-600 dark:text-blue-400 px-3 py-1 rounded-full text-sm font-medium">
                                        رایگان
                                    </div>
                                @endif
                            </div>

                            <!-- Course Content -->
                            <div class="p-6 bg-white dark:bg-slate-800 flex-1 flex flex-col">
                                <h3 class="text-xl font-bold text-gray-800 dark:text-slate-200 mb-3 group-hover:text-blue-600 dark:group-hover:text-blue-400 transition-colors duration-200">
                                    {{$course->title}}
                                </h3>

                                <!-- Course Stats -->
                                <div class="flex items-center gap-4 mb-4 text-sm text-gray-500 dark:text-slate-400">
                                    <div class="flex items-center gap-1">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                        </svg>
                                        <span>{{$course->time}} ساعت</span>
                                    </div>
                                    <div class="flex items-center gap-1">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 10l4.553-2.276A1 1 0 0121 8.618v6.764a1 1 0 01-1.447.894L15 14M5 18h8a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v8a2 2 0 002 2z"></path>
                                        </svg>
                                        <span>{{count($course->lessons)}} ویدیو</span>
                                    </div>
                                    <div class="flex items-center gap-1">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
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
                                            <a href="{{route('playFreeCourse',$course->id)}}" class="bg-gradient-to-r flex from-blue-400 to-blue-700 hover:from-blue-700 hover:to-blue-800 dark:from-blue-500 dark:to-blue-600 dark:hover:from-blue-600 dark:hover:to-blue-700 text-white px-6 py-3 rounded-xl font-medium transition-all duration-300 shadow-lg hover:shadow-xl transform hover:scale-105  items-center gap-2 tv-optimized-text-shadow">
                                                <span>مرور دوره</span>
                                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                                                </svg>
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
                                        <div class="" id="paid-course">
                                            <div class="flex items-center justify-between mb-4">
                                                <div class="text-right">

                                                    @if(!is_null($course->discounts->first()))
                                                        @php
                                                            $disValue = $course->discounts->first()->value;
                                                            $disType = $course->discounts->first()->type;
                                                            if($disType == 'percent'){
                                                                $dis  = $course->price * ($disValue/100);
                                                            }else{
                                                                $dis = $course->price - $disValue;
                                                            }
                                                        @endphp
                                                        <div class=" font-bold text-gray-800 dark:text-slate-200">{{number_format($course->price-$dis)}} تومان</div>
                                                        <div class="text-sm text-gray-500 dark:text-slate-400 line-through">{{number_format($course->price)}} تومان</div>
                                                    @else
                                                        <div class=" font-bold text-gray-800 dark:text-slate-200">{{number_format($course->price)}} تومان</div>
                                                    @endif
                                                </div>
                                                @if(!is_null($course->discounts->first()))
                                                    <div class="bg-red-100 dark:bg-red-900/30 text-red-600 dark:text-red-400 px-2 py-1 rounded-lg text-sm font-medium">
                                                        {{$course->discounts->first()->value}}% تخفیف
                                                    </div>
                                                @endif
                                            </div>

                                            <div class="flex gap-3">
                                                <a href="{{route('shop.cart.add',['model'=>'course','id'=>$course->id])}}" class=" bg-gradient-to-r from-green-600 to-green-700 hover:from-green-700 hover:to-green-800 dark:from-green-500 dark:to-green-600 dark:hover:from-green-600 dark:hover:to-green-700 text-white px-4 py-3 rounded-xl font-medium transition-all duration-300 shadow-lg hover:shadow-xl transform hover:scale-105 flex items-center justify-center gap-2 tv-optimized-text-shadow">

                                                    <i class="fas fa-cart-arrow-down"></i>
                                                    <span>افزودن به سبد</span>
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

        <!-- Statistics Section -->
       {{-- <section class="py-20 bg-gradient-to-r from-gray-800 to-gray-900 text-white">
            <div class="container mx-auto px-6">
                <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-8 text-center">
                    <div>
                        <div class="stat-counter mb-2">+۵۰ هزار</div>
                        <h3 class="text-xl font-semibold mb-2">دانشجوی ثبت‌نام شده</h3>
                        <p class="text-gray-300">یادگیرندگان فعال در سراسر جهان</p>
                    </div>
                    <div>
                        <div class="stat-counter mb-2">+۲۰۰</div>
                        <h3 class="text-xl font-semibold mb-2">مدرس متخصص</h3>
                        <p class="text-gray-300">متخصصان صنعت</p>
                    </div>
                    <div>
                        <div class="stat-counter mb-2">+۵۰۰</div>
                        <h3 class="text-xl font-semibold mb-2">دوره موجود</h3>
                        <p class="text-gray-300">در دسته‌بندی‌های مختلف</p>
                    </div>
                    <div>
                        <div class="stat-counter mb-2">%۹۵</div>
                        <h3 class="text-xl font-semibold mb-2">نرخ موفقیت</h3>
                        <p class="text-gray-300">نرخ تکمیل دوره</p>
                    </div>
                </div>
            </div>
        </section>
--}}
        <!-- Why Choose Us Section -->
        <section class="py-20 bg-gray-50">
            <div class="container mx-auto px-6">
                <div class="text-center mb-16">
                    <h2 class="text-4xl font-bold text-gray-800 mb-4">چرا پلتفرم ما را انتخاب کنید؟</h2>
                    <p class="text-xl text-gray-600 max-w-2xl mx-auto">ما همه چیزهایی که برای موفقیت در سفر یادگیری خود نیاز دارید را فراهم می‌کنیم.</p>
                </div>

                <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                    <div class="text-center p-6">
                        <div class="w-16 h-16 bg-blue-100 rounded-full flex items-center justify-center mx-auto mb-4">
                            <span class="text-2xl">🎯</span>
                        </div>
                        <h3 class="text-xl font-semibold text-gray-800 mb-3">یادگیری شخصی‌سازی شده</h3>
                        <p class="text-gray-600">مسیرهای یادگیری تطبیقی متناسب با سرعت و سبک یادگیری شما.</p>
                    </div>

                    <div class="text-center p-6">
                        <div class="w-16 h-16 bg-green-100 rounded-full flex items-center justify-center mx-auto mb-4">
                            <span class="text-2xl">🏆</span>
                        </div>
                        <h3 class="text-xl font-semibold text-gray-800 mb-3">گواهینامه‌های صنعتی</h3>
                        <p class="text-gray-600">گواهینامه‌های معتبری کسب کنید که چشم‌انداز شغلی شما را بهبود می‌بخشد.</p>
                    </div>

                    <div class="text-center p-6">
                        <div class="w-16 h-16 bg-purple-100 rounded-full flex items-center justify-center mx-auto mb-4">
                            <span class="text-2xl">💬</span>
                        </div>
                        <h3 class="text-xl font-semibold text-gray-800 mb-3">پشتیبانی ۲۴/۷</h3>
                        <p class="text-gray-600">هر زمان که نیاز داشتید از تیم پشتیبانی اختصاصی ما کمک بگیرید.</p>
                    </div>

                    <div class="text-center p-6">
                        <div class="w-16 h-16 bg-yellow-100 rounded-full flex items-center justify-center mx-auto mb-4">
                            <span class="text-2xl">📱</span>
                        </div>
                        <h3 class="text-xl font-semibold text-gray-800 mb-3">یادگیری موبایل</h3>
                        <p class="text-gray-600">با پلتفرم بهینه‌شده برای موبایل ما، هر جا و هر زمان یاد بگیرید.</p>
                    </div>

                    <div class="text-center p-6">
                        <div class="w-16 h-16 bg-red-100 rounded-full flex items-center justify-center mx-auto mb-4">
                            <span class="text-2xl">🔄</span>
                        </div>
                        <h3 class="text-xl font-semibold text-gray-800 mb-3">دسترسی مادام‌العمر</h3>
                        <p class="text-gray-600">پس از ثبت‌نام، برای همیشه با به‌روزرسانی‌های رایگان به دوره‌هایتان دسترسی داشته باشید.</p>
                    </div>

                    <div class="text-center p-6">
                        <div class="w-16 h-16 bg-indigo-100 rounded-full flex items-center justify-center mx-auto mb-4">
                            <span class="text-2xl">👥</span>
                        </div>
                        <h3 class="text-xl font-semibold text-gray-800 mb-3">انجمن</h3>
                        <p class="text-gray-600">به انجمن پر جنب و جوش یادگیرندگان و متخصصان بپیوندید.</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- Testimonials Section -->
        <section class="py-20 bg-white">
            <div class="container mx-auto px-6">
                <div class="text-center mb-16">
                    <h2 class="text-4xl font-bold text-gray-800 mb-4">دانشجویان ما چه می‌گویند</h2>
                    <p class="text-xl text-gray-600">داستان‌های موفقیت واقعی از جامعه یادگیری ما.</p>
                </div>

                <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                    <div class="bg-gray-50 rounded-xl p-6 border border-gray-100">
                        <div class="flex items-center mb-4">
                            <div class="w-12 h-12 bg-blue-500 rounded-full flex items-center justify-center text-white font-semibold">ع.ا</div>
                            <div class="mr-4">
                                <h4 class="font-semibold text-gray-800">علی احمدی</h4>
                                <p class="text-gray-600 text-sm">توسعه‌دهنده نرم‌افزار</p>
                            </div>
                        </div>
                        <div class="flex text-yellow-500 mb-3">
                            <span>⭐⭐⭐⭐⭐</span>
                        </div>
                        <p class="text-gray-700">"دوره توسعه وب کاملاً شغل من را متحول کرد. مدرسان فوق‌العاده هستند و محتوا بی‌نظیر است!"</p>
                    </div>

                    <div class="bg-gray-50 rounded-xl p-6 border border-gray-100">
                        <div class="flex items-center mb-4">
                            <div class="w-12 h-12 bg-green-500 rounded-full flex items-center justify-center text-white font-semibold">م.ر</div>
                            <div class="mr-4">
                                <h4 class="font-semibold text-gray-800">مریم رضایی</h4>
                                <p class="text-gray-600 text-sm">تحلیلگر داده</p>
                            </div>
                        </div>
                        <div class="flex text-yellow-500 mb-3">
                            <span>⭐⭐⭐⭐⭐</span>
                        </div>
                        <p class="text-gray-700">"پس از تکمیل دوره علم داده، شغل رویایی‌ام را به عنوان تحلیلگر داده پیدا کردم. بسیار توصیه می‌کنم!"</p>
                    </div>

                    <div class="bg-gray-50 rounded-xl p-6 border border-gray-100">
                        <div class="flex items-center mb-4">
                            <div class="w-12 h-12 bg-purple-500 rounded-full flex items-center justify-center text-white font-semibold">ح.م</div>
                            <div class="mr-4">
                                <h4 class="font-semibold text-gray-800">حسن محمدی</h4>
                                <p class="text-gray-600 text-sm">طراح UX</p>
                            </div>
                        </div>
                        <div class="flex text-yellow-500 mb-3">
                            <span>⭐⭐⭐⭐⭐</span>
                        </div>
                        <p class="text-gray-700">"دوره طراحی UI/UX تمام مهارت‌هایی که برای ورود به حوزه طراحی نیاز داشتم را به من داد. پروژه‌ها فوق‌العاده کاربردی بودند!"</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- Call to Action Section -->
        <section class=" py-20 bg-gradient-to-r from-blue-600 to-purple-700 text-white tv-optimized-text-shadow">
            <div class="container mx-auto px-6 text-center pt-20">
                <h2 class="text-4xl font-bold mb-6">آماده شروع سفر یادگیری خود هستید؟</h2>
                <p class="text-xl mb-8 opacity-90 max-w-2xl mx-auto">به هزاران دانشجویی بپیوندید که در حال حاضر با دوره‌های تخصصی ما شغل خود را پیش می‌برند.</p>
                <div class="space-x-4 space-x-reverse">

                    <a href="{{route('all.courses')}}" class="border-2 border-white text-white px-8 py-4 rounded-lg font-semibold text-lg hover:bg-white hover:text-blue-600 transition duration-300">مرور دوره‌ها</a>
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

    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        'inter': ['Inter', 'sans-serif'],
                    },
                    animation: {
                        'fade-in': 'fadeIn 0.8s ease-in-out',
                        'slide-up': 'slideUp 0.6s ease-out',
                    },
                    keyframes: {
                        fadeIn: {
                            '0%': {opacity: '0', transform: 'translateY(20px)'},
                            '100%': {opacity: '1', transform: 'translateY(0)'}
                        },
                        slideUp: {
                            '0%': {opacity: '0', transform: 'translateY(30px)'},
                            '100%': {opacity: '1', transform: 'translateY(0)'}
                        }
                    }
                }
            }
        }
    </script>
    {{ $script ?? '' }}


@endsection
@section('head')
    {{ $head ?? '' }}
@endsection
