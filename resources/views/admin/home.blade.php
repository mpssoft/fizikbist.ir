@extends('layouts.admin.master')

@section('content')
    <!-- Main Content -->
    <div class="pt-5">
        <!-- Beautiful Stats Cards -->
        <!-- Stats Cards -->
        <div class="grid grid-cols-1 md:grid-cols-2 px-5 lg:grid-cols-4 gap-6 mb-8">
            <div class="bg-gradient-to-r from-blue-500 to-blue-600 rounded-2xl p-6 text-white shadow-lg">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-blue-100 text-sm font-medium">کل دوره‌ها</p>
                        <p class="text-3xl font-bold">{{ count($courses) }}</p>
                    </div>
                    <div class="p-3 bg-white/20 rounded-full">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
                        </svg>
                    </div>
                </div>
            </div>

            <div class="bg-gradient-to-r from-green-500 to-green-600 rounded-2xl p-6 text-white shadow-lg">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-green-100 text-sm font-medium">دوره‌های فعال</p>
                        <p class="text-3xl font-bold"> {{count($activeCourses)}}</p>
                    </div>
                    <div class="p-3 bg-white/20 rounded-full">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </div>
                </div>
            </div>

            <div class="bg-gradient-to-r from-orange-500 to-orange-600 rounded-2xl p-6 text-white shadow-lg">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-orange-100 text-sm font-medium">کل دانشجویان</p>
                        <p class="text-3xl font-bold">{{ $courses->students_count ?? 0 }}</p>
                    </div>
                    <div class="p-3 bg-white/20 rounded-full">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197m13.5-9a2.5 2.5 0 11-5 0 2.5 2.5 0 015 0z"></path>
                        </svg>
                    </div>
                </div>
            </div>

            <div class="bg-gradient-to-r from-purple-500 to-purple-600 rounded-2xl p-6 text-white shadow-lg">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-purple-100 text-sm font-medium">درآمد کل</p>
                        <p class="text-3xl font-bold"> ?</p>
                    </div>
                    <div class="p-3 bg-white/20 rounded-full">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1"></path>
                        </svg>
                    </div>
                </div>
            </div>
        </div>

        <!-- Beautiful Filter Tabs -->
      <br>
        <!-- Beautiful Course Cards -->
        <section class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 px-6 pb-8">
            @foreach($courses as $course)
            <div class="group bg-gradient-to-br from-white via-slate-50 to-slate-100 dark:from-slate-800 dark:via-slate-700 dark:to-slate-600 rounded-2xl shadow-[0_8px_24px_rgba(0,0,0,0.1)] dark:shadow-[0_8px_24px_rgba(0,0,0,0.3)] hover:shadow-[0_12px_32px_rgba(0,0,0,0.15)] dark:hover:shadow-[0_12px_32px_rgba(0,0,0,0.4)] transition-all duration-300 hover:-translate-y-2 border border-white/20 dark:border-slate-600/20 overflow-hidden">
                <div class="relative">
                    <div style="background:url('{{$course->cover_image}}');background-size: 100%;" class="w-full h-48 bg-gradient-to-br from-blue-400 via-purple-500 to-pink-500 flex items-center justify-center relative overflow-hidden">
                        <div class="absolute inset-0 bg-gradient-to-br from-blue-600/20 to-purple-600/20"></div>
                        <i class="fas fa-search text-white text-4xl relative z-10 group-hover:scale-110 transition-transform duration-300"></i>
                        <div class="absolute top-3 right-3 bg-white/20 backdrop-blur-sm rounded-full px-3 py-1">
                            <span class="text-white text-xs font-medium">{{$course->status}}</span>
                        </div>
                    </div>
                    <div class="absolute bottom-0 left-0 right-0 h-1 bg-gradient-to-r from-blue-500 to-purple-500"></div>
                </div>
                <div class="p-6">
                    <h3 class="font-bold text-lg text-gray-800 dark:text-white mb-2 group-hover:text-purple-600 dark:group-hover:text-purple-400 transition-colors duration-200">
                        {{$course->title}}</h3>
                    <p class="text-sm text-gray-600 dark:text-gray-300 mb-4">{{$course->description}}</p>
                    <div class="flex items-center justify-between">
                        <div class="flex items-center gap-2">
                            <div class="w-8 h-1 bg-gradient-to-r from-blue-500 to-purple-500 rounded-full"></div>

                        </div>

                    </div>
                </div>
            </div>
            @endforeach
        </section>
    </div>
@endsection
