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
                    <div class="bg-white rounded-xl shadow-lg overflow-hidden border border-gray-100 hover:shadow-xl transition duration-300">
                        <div class="relative">
                            <div class="h-48 bg-gradient-to-br from-blue-400 to-blue-600 flex items-center justify-center relative" style="background:url('{{$lesson->thumbnail}}');background-size: contain">
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


        </div>
    </section>

@endsection

