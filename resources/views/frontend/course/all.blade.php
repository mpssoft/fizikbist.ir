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
                        <div class="h-48 bg-gradient-to-br from-blue-500 to-blue-600 flex items-center justify-center " style="background:url('{{$course->cover_image}}');background-size: contain">

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
                                <a href="{{route('user.create.order',$course->id)}}" class="bg-blue-600 text-white px-6 py-2 rounded-lg hover:bg-blue-700 transition duration-300">خرید دوره </a>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>

        </div>
    </section>

@endsection

