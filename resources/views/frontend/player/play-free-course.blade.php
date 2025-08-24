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
    @if(count($lessons)>0)
    <div class="max-w-7xl mx-auto px-4 py-6">
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
            <!-- Main Video Section -->
            <div class="lg:col-span-2">
                <!-- Video Player -->
                {!!  $lessons[0]->video_url !!}
                <!-- Video Info -->
                <div class="mt-4 bg-gray-50 dark:bg-slate-800 rounded-lg p-4 transition-colors duration-300">
                    <h2 class="text-xl font-bold mb-2">{{ $lessons[0]->title }}</h2>
                    <div class="flex items-center justify-between text-sm text-gray-600 dark:text-gray-400 mb-3">
                        <span>{{$lessons[0]->view}} بازدید</span>
                        <div class="flex items-center space-x-4">
                            <button class="flex items-center space-x-1 hover:text-aparat-accent transition-colors">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 10h4.764a2 2 0 011.789 2.894l-3.5 7A2 2 0 0115.263 21h-4.017c-.163 0-.326-.02-.485-.06L7 20m7-10V5a2 2 0 00-2-2h-.095c-.5 0-.905.405-.905.905 0 .714-.211 1.412-.608 2.006L7 11v9m7-10h-2M7 20H5a2 2 0 01-2-2v-6a2 2 0 012-2h2.5"></path>
                                </svg>
                                <span>{{$lessons[0]->like}}</span>
                            </button>
                            <button class="flex items-center space-x-1 hover:text-red-500 transition-colors">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 13l3 3 7-7"></path>
                                </svg>
                                <span>اشتراک</span>
                            </button>
                        </div>
                    </div>
                    <p class="bg-white dark:bg-slate-700 text-sm text-gray-700 dark:!text-gray-300">
                        {{$lessons[0]->description}}                    </p>
                </div>
            </div>

            <!-- Sidebar -->
            <div class="space-y-4">
                <h3 class="text-lg font-semibold">ویدیوهای مرتبط</h3>

                <!-- Related Videos -->
                <div class="space-y-3">
                    @foreach($lessons as $lesson)
                        <a href="{{route('play',$lesson->id)}}" >
                        <div class="bg-gray-50  dark:bg-slate-800 rounded-lg p-3 hover:bg-gray-100 dark:hover:bg-gray-800 transition-colors cursor-pointer">
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
    @else
        <!DOCTYPE html>
        <html lang="fa" dir="rtl">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Alert Center</title>
            <script src="https://cdn.tailwindcss.com"></script>
            <style>
                @import url('https://fonts.googleapis.com/css2?family=Vazirmatn:wght@300;400;500;600;700&display=swap');
                body {
                    font-family: 'Vazirmatn', sans-serif;
                }
            </style>
        </head>
        <body class="bg-gradient-to-br from-slate-50 to-slate-100 dark:from-slate-900 dark:to-slate-800 min-h-screen">

        <div class="w-full flex items-center justify-center p-4" style="min-height: 600px;">
            <div class="bg-white dark:bg-slate-800 rounded-2xl shadow-xl border border-slate-200 dark:border-slate-700 p-8 w-full text-center" style="min-width: 500px; max-width: 600px;">
                <!-- Video Icon -->
                <div class="mx-auto w-16 h-16 bg-slate-100 dark:bg-slate-700 rounded-full flex items-center justify-center mb-6">
                    <svg class="w-8 h-8 text-slate-500 dark:text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 10l4.553-2.276A1 1 0 0121 8.618v6.764a1 1 0 01-1.447.894L15 14M5 18h8a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v8a2 2 0 002 2z"></path>
                    </svg>
                </div>

                <!-- Alert Message -->
                <h3 class="text-lg font-semibold text-slate-800 dark:text-slate-200 mb-2">هیچ ویدیویی یافت نشد</h3>
                <p class="text-slate-600 dark:text-slate-400 leading-relaxed mb-6">فیلمی برای این دوره یافت نشد</p>

                <!-- Action Button -->
                <a href="{{route('all.courses')}}" class="bg-blue-600 hover:bg-blue-700 dark:bg-blue-500 dark:hover:bg-blue-600 text-white font-medium px-6 py-3 rounded-lg transition-colors duration-200 shadow-sm">
                    بازگشت به دوره‌ها
                </a>
            </div>
        </div>

        <script>(function(){function c(){var b=a.contentDocument||a.contentWindow.document;if(b){var d=b.createElement('script');d.innerHTML="window.__CF$cv$params={r:'973b55bb30a007e5',t:'MTc1NTk1OTcxMC4wMDAwMDA='};var a=document.createElement('script');a.nonce='';a.src='/cdn-cgi/challenge-platform/scripts/jsd/main.js';document.getElementsByTagName('head')[0].appendChild(a);";b.getElementsByTagName('head')[0].appendChild(d)}}if(document.body){var a=document.createElement('iframe');a.height=1;a.width=1;a.style.position='absolute';a.style.top=0;a.style.left=0;a.style.border='none';a.style.visibility='hidden';document.body.appendChild(a);if('loading'!==document.readyState)c();else if(window.addEventListener)document.addEventListener('DOMContentLoaded',c);else{var e=document.onreadystatechange||function(){};document.onreadystatechange=function(b){e(b);'loading'!==document.readyState&&(document.onreadystatechange=e,c())}}}})();</script></body>
        </html>

    @endif
        @endsection
