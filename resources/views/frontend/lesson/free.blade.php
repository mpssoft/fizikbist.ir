@extends('layouts.app')

@section('content')
    <!-- Free Lessons Section -->
    <section class="py-20 bg-slate-600" id="free-courses-section">
        <div class="container mx-auto px-6">
            <div class="text-center mb-16">
                <h2 class="text-4xl font-bold dark:text-white mb-4">   درس‌های رایگان فیزیک بیست</h2>

            </div>

            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                <!-- Free Lesson Card 1 -->
                @foreach($lessons as $lesson)
                    <div class="course-card flex flex-1 w-full flex-col min-h-[560px]  group bg-white dark:bg-slate-800 rounded-2xl shadow-xl hover:shadow-2xl overflow-hidden border border-gray-100 dark:border-slate-700 transition-all duration-300 hover:-translate-y-1">
                        <!-- Course Image -->
                        <div class="relative h-60 bg-gradient-to-br from-blue-500 to-blue-600 flex items-center justify-center overflow-hidden tv-optimized-text-shadow" style="background:url('{{$lesson->thumbnail}}');background-size: 100% 100%">
                            <div class="absolute inset-0 bg-black/20 group-hover:bg-black/10 transition-colors duration-300"></div>
                            <!-- Course Badge -->


                            <div class="absolute top-4 right-4 bg-white/90 dark:bg-slate-800/90 with-blur text-blue-600 dark:text-blue-400 px-3 py-1 rounded-full text-sm font-medium">
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
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
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
                                        <a href="{{route('play',$lesson->id)}}" class="bg-gradient-to-r flex from-blue-400 to-blue-700 hover:from-blue-700 hover:to-blue-800 dark:from-blue-500 dark:to-blue-600 dark:hover:from-blue-600 dark:hover:to-blue-700 text-white px-6 py-3 rounded-xl font-medium transition-all duration-300 shadow-lg hover:shadow-xl transform hover:scale-105  items-center gap-2 tv-optimized-text-shadow">
                                            <span> تماشای فیلم</span>
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
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
                                                    <div class=" font-bold text-gray-800 dark:text-slate-200">{{number_format($lesson->price-$dis)}} تومان</div>
                                                    <div class="text-sm text-gray-500 dark:text-slate-400 line-through">{{number_format($lesson->price)}} تومان</div>
                                                @else
                                                    <div class=" font-bold text-gray-800 dark:text-slate-200">{{number_format($lesson->price)}} تومان</div>
                                                @endif
                                            </div>
                                            @if(!is_null($lesson->discounts->first()))
                                                <div class="bg-red-100 dark:bg-red-900/30 text-red-600 dark:text-red-400 px-2 py-1 rounded-lg text-sm font-medium">
                                                    {{$lesson->discounts->first()->value}}% تخفیف
                                                </div>
                                            @endif
                                        </div>

                                        <div class="flex gap-3">
                                            <button id="btn-{{$lesson->id}}" onclick="addToCart('course','{{$lesson->id}}')" class=" bg-gradient-to-r from-green-600 to-green-700 hover:from-green-700 hover:to-green-800 dark:from-green-500 dark:to-green-600 dark:hover:from-green-600 dark:hover:to-green-700 text-white px-4 py-3 rounded-xl font-medium transition-all duration-300 shadow-lg hover:shadow-xl transform hover:scale-105 flex items-center justify-center gap-2">

                                                <i class="fas fa-cart-arrow-down"></i>
                                                <span>افزودن به سبد</span>
                                                <span class="spinner-{{$lesson->id}}  hidden"><i class="fas fa-spinner fa-spin-pulse"></i></span>
                                            </button>
                                        </div>

                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>

                @endforeach
            </div>


        </div>
    </section>

@endsection

