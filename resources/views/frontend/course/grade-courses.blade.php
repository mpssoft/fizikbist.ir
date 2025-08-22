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
                        <div class="p-6">
                            {{-- <div class="flex items-center justify-between mb-3">
                                 <span class="bg-blue-100 text-blue-800 text-sm font-medium px-3 py-1 rounded-full">برنامه‌نویسی</span>
                                 <div class="flex items-center text-yellow-500">
                                     <span class="text-sm font-medium">۴.۸</span>
                                     <span class="mr-1">⭐</span>
                                 </div>
                             </div>--}}
                            <h3 class="text-xl font-semibold text-gray-800 mb-2">{{ $course->title }}</h3>
                            <p class="text-gray-600 mb-4">{{ $course->description }}</p>
                            <div class="flex items-center justify-between">
                                <div class="text-1xl font-bold text-blue-600"> {{ number_format($course->price) }}تومان  </div>


                             {{--   <a href="{{route('shop.cart.add',['model'=>'course','id'=>$course->id])}}" aria-label="Add to cart"
                                   class="group inline-flex items-center gap-2 rounded-full px-4 py-2 text-sm font-semibold tracking-wide
          bg-neutral-900 text-neutral-100 hover:bg-black active:bg-neutral-800
          shadow-sm hover:shadow-md focus:outline-none focus-visible:ring-2 focus-visible:ring-emerald-400
          dark:bg-neutral-800 dark:text-white dark:hover:bg-neutral-900">
                                    <!-- Icon placeholder (use your favorite icon font class here) -->
                                    <i class="fa-solid fa-cart-plus text-neutral-200 group-hover:text-white text-base"></i>
                                    خرید دوره
                                </a>--}}
                                <a href="{{route('shop.cart.add',['model'=>'course','id'=>$course->id])}}" type="button" aria-label="Open cart"
                                   class="w-10 h-10  overflow-hidden  rounded-xl flex items-center justify-center transition-all duration-200 hover:scale-105 shadow-sm bg-black hover:shadow-md group text-black dark:!text-white">                <!-- Cart icon -->
                                    <img  src="/images/cart-image-s.jpg" class="w-7">

                                </a>


                            </div>
                        </div>
                    </div>
                @endforeach

            </div>

        </div>
    </section>

@endsection

