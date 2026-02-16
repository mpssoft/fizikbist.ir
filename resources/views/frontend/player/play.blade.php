@extends('layouts.app')
@once
    @push('scripts')
        <script>
            tailwind.config = {
                darkMode: 'class',
                theme: {
                    extend: {
                        colors: {
                            'aparat-dark': '#1a1a1a',
                            'aparat-darker': '#0f0f0f',
                            'aparat-accent': '#ff6b35',
                            'aparat-light': '#f8f9fa',
                            'aparat-lighter': '#ffffff'
                        }
                    }
                }
            }
        </script>
    @endpush
@endonce
@section('content')

    <div class="max-w-7xl mx-auto px-4 py-6">
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
            <!-- Main Video Section -->
            <div class="lg:col-span-2">
                <!-- Video Player -->
                {!!  $lesson->video_url !!}
                <!-- Video Info -->

                <div class="mt-4 bg-gray-50 dark:bg-slate-800 rounded-lg p-4 transition-colors duration-300">
                    <h2 class="text-xl font-bold mb-2">{{ $lesson->title }}</h2>

                    <p class="text-gray-700 dark:text-gray-300 text-sm leading-relaxed">
                        {{$lesson->description}}                    </p>
                </div>
                @include('like::partials.like-view',['model'=>$lesson])
            </div>

            <!-- Sidebar -->
            <div class="space-y-4">
                <h3 class="text-lg font-semibold">ویدیوهای مرتبط</h3>

                <!-- Related Videos -->
                <div class="space-y-3">
                    @foreach(\App\Models\Lesson::whereNot('id',$lesson->id)->latest()->take(6)->get() as $lesson)
                        <a href="{{route('play',$lesson->id)}}" >
                        <div class="bg-gray-50  dark:bg-slate-800 rounded-lg p-3 hover:bg-gray-100 dark:hover:bg-gray-700 transition-colors cursor-pointer">
                        <div class="flex space-x-3">
                            <div class="w-24 h-16 ml-5 bg-gray-300 dark:bg-gray-700 rounded flex-shrink-0 flex items-center justify-center transition-colors duration-300">
                                <svg class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M8 5v14l11-7z"/>
                                </svg>
                            </div>
                            <div class="flex-1 min-w-0">
                                <h4 class="text-sm font-medium text-gray-900 dark:text-white truncate">{{ $lesson->title }}</h4>
                                <p class="text-xs text-gray-600 dark:text-gray-400 mt-1">{{ $lesson->course->title}}</p>
                                <p class="text-xs text-gray-600 dark:text-gray-400">{{ $lesson->view }}</p>
                            </div>
                        </div>
                    </div>
                        </a>
                    @endforeach

                  </div>
            </div>
        </div>
    </div>

@endsection
@push('scripts')
    @include('like::partials.like-script')
@endpush
