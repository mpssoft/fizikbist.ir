@extends('layouts.app')

@section('content')

    <!-- Featured Courses Section -->
    <section class="py-20  dark:bg-gray-600 dark:text-white">
        <div class="container mx-auto px-6">
            <div class="text-center mb-16">
                <h2 class="text-4xl font-bold dark:text-white mb-4">دوره‌های آموزشی</h2>

            </div>

            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach($courses as $course)
                    <!-- Course Card 1 -->
                    <div class="course-card bg-white rounded-xl shadow-lg overflow-hidden border border-gray-100">
                        <div class="h-60 bg-gradient-to-br from-blue-500 to-blue-600 flex items-center justify-center " style="background:url('{{$course->cover_image}}');background-size: 100% 100%">

                        </div>
                        <div class="relative p-6 flex flex-col h-64 bg-gray-100">
                            {{-- <div class="flex items-center justify-between mb-3">
                                 <span class="bg-blue-100 text-blue-800 text-sm font-medium px-3 py-1 rounded-full">برنامه‌نویسی</span>
                                 <div class="flex items-center text-yellow-500">
                                     <span class="text-sm font-medium">۴.۸</span>
                                     <span class="mr-1">⭐</span>
                                 </div>
                             </div>--}}
                            <h3 class="text-xl font-semibold text-gray-800 mb-2">{{ $course->title }}</h3>
                            <p class="text-gray-600 mb-4">{{ $course->description }}</p>
                            <div class="relative p-6 flex flex-col h-80 bg-gray-100 rounded-lg ">
                        <div class="absolute bottom-4 left-5 right-5 flex justify-between items-center">
                                    @if($course->price > 0)
                                        <div class="text-lg font-bold text-blue-600">
                                            {{ number_format($course->price) }} تومان
                                        </div>
                                        {{--<a href="{{route('shop.cart.add',['model'=>'course','id'=>$course->id])}}"
                                           class="group inline-flex items-center gap-2 rounded-full px-4 py-2 text-sm font-semibold tracking-wide
                      bg-neutral-900 text-neutral-100 hover:bg-black active:bg-neutral-800
                      shadow-sm hover:shadow-md focus:outline-none focus-visible:ring-2 focus-visible:ring-emerald-400
                      dark:bg-neutral-800 dark:text-white dark:hover:bg-neutral-900">
                                            <i class="fa-solid fa-cart-plus text-neutral-200 group-hover:text-white text-base"></i>
                                            خرید دوره
                                        </a>--}}
                              {{--  <a href="{{route('shop.cart.add',['model'=>'course','id'=>$course->id])}}" type="button" aria-label="Open cart"
                                   class="w-10 h-10 bg-gradient-to-r from-blue-100 to-purple-200 dark:from-blue-900/30 dark:to-purple-800/30 hover:from-blue-200 hover:to-purple-300 dark:hover:from-blue-800/40 dark:hover:to-purple-700/40 rounded-xl flex items-center justify-center transition-all duration-200 hover:scale-105 shadow-sm hover:shadow-md group text-black dark:!text-white">                <!-- Cart icon -->
                                    <svg class="w-5 h-5" viewBox="0 0 24 24" fill="none" aria-hidden="true">
                                        <path d="M3 3h2l2.2 10.4a2 2 0 0 0 2 1.6h7.7a2 2 0 0 0 2-1.6L21 7H6" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/>
                                        <circle cx="10" cy="20" r="1.6" fill="currentColor"/>
                                        <circle cx="17" cy="20" r="1.6" fill="currentColor"/>
                                    </svg>
                                    <span class="pointer-events-none  absolute inset-0 rounded-full bg-neutral-900/0 hover:bg-neutral-900/5 dark:bg-white/0 dark:hover:bg-white/5 transition-colors"></span>
                                </a>--}}

                                <a href="{{route('shop.cart.add',['model'=>'course','id'=>$course->id])}}" type="button" aria-label="Open cart"
                                   class="w-10 h-10  overflow-hidden  rounded-xl flex items-center justify-center transition-all duration-200 hover:scale-105 shadow-sm bg-black hover:shadow-md group text-black dark:!text-white">                <!-- Cart icon -->
                                    <img  src="/images/cart-image-s.jpg" class="w-7">

                                </a>
                                    @else
                                        <a href="{{route('playFreeCourse',$course->id)}}"
                                           class="bg-blue-600 float-left text-white px-6 py-2  rounded-lg hover:bg-blue-700 transition duration-300 ">
                                            مرور دوره
                                        </a>
                                    @endif
                                </div>
                            </div>

                        </div>
                    </div>
                @endforeach

            </div>

        </div>
    </section>

@endsection

