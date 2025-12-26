@extends('layouts.app')

@section('content')

    <!-- Featured Courses Section -->
    <section class="py-20  dark:bg-gray-600 dark:text-white">
        <div class="container mx-auto px-6">
            <div class="text-center mb-16">
                <h2 class="text-4xl font-bold dark:text-white mb-4">دوره‌های آموزشی</h2>

            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                @include('frontend.course.course-card')
        </div>
        </div>
    </section>

@endsection

