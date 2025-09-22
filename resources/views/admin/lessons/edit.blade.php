@extends('layouts.admin.master')
<script>
    document.addEventListener("DOMContentLoaded", function() {

        document.getElementById('button-image').addEventListener('click', (event) => {
            event.preventDefault();

            window.open('/file-manager/fm-button', 'fm', 'width=1400,height=800');
        });
    });

    // set file link
    function fmSetLink($url) {
        document.getElementById('image_label').value = $url;
    }
</script>
@section('content')
    <div class="container mx-auto px-4 py-6" x-data>
        <!-- Header Section -->
        <div class="bg-white dark:bg-gray-800 rounded-2xl shadow-xl border border-gray-200 dark:border-gray-700 overflow-hidden mb-8">
            <div class="p-8">
                <!-- Breadcrumb -->
                <nav class="flex items-center space-x-2 rtl:space-x-reverse text-sm text-gray-500 dark:text-gray-400 mb-6" dir="rtl">
                    <a href="/admin/home" class="hover:text-gray-700 dark:hover:text-gray-200 transition-colors duration-200">
                        <svg class="w-4 h-4 inline-block mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2H5a2 2 0 00-2-2z"></path>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 21l4-4 4 4"></path>
                        </svg>
                        داشبورد
                    </a>
                    <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                    </svg>
                    <a href="{{ route('admin.lessons.index') }}" class="hover:text-gray-700 dark:hover:text-gray-200 transition-colors duration-200">
                        مدیریت درس‌ها
                    </a>
                    <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                    </svg>
                    <span class="text-gray-700 dark:text-gray-300 font-medium">ویرایش درس</span>
                </nav>

                <div class="flex items-center gap-4">
                    <div class="inline-flex items-center justify-center w-16 h-16 bg-gradient-to-r from-blue-500 to-indigo-600 rounded-full shadow-lg">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                        </svg>
                    </div>
                    <div>
                        <h1 class="text-3xl font-bold text-gray-800 dark:text-white">ویرایش درس</h1>
                        <p class="text-gray-600 dark:text-gray-300">ویرایش اطلاعات درس "{{$lesson->title}}"</p>
                    </div>
                </div>
            </div>
        </div>


        <!-- Edit Lesson Form -->
        <div class="bg-white dark:bg-gray-800 rounded-2xl shadow-xl border border-gray-200 dark:border-gray-700 overflow-hidden">
            <div class="p-8">
                @include('layouts.errors')
                <form method="POST" action="{{ route('admin.lessons.update',$lesson->id) }}" enctype="multipart/form-data" class="space-y-8">
                    @csrf
                    @method('PUT')

                    <!-- Basic Information Section -->
                    <div class="border-b border-gray-200 dark:border-gray-700 pb-8">
                        <h2 class="text-xl font-semibold text-gray-800 dark:text-white mb-6 flex items-center gap-2">
                            <svg class="w-5 h-5 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                            اطلاعات پایه
                        </h2>

                        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                            <!-- Title -->
                            <div class="lg:col-span-2">
                                <label for="title" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                                    <svg class="w-4 h-4 inline-block ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"></path>
                                    </svg>
                                    عنوان درس *
                                </label>
                                <input type="text" id="title" name="title" required
                                       value="{{old('title', $lesson->title)}}"
                                       class="w-full px-4 py-3 rounded-lg border border-gray-300 dark:border-gray-600
                                              bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100
                                              focus:ring-2 focus:ring-purple-500 focus:border-purple-500 transition-colors duration-200"
                                       placeholder="عنوان جذاب و توصیفی برای درس وارد کنید">
                            </div>

                            <!-- Course Selection -->
                            <div>
                                <label for="course_id" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                                    <svg class="w-4 h-4 inline-block ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.746 0 3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
                                    </svg>
                                    دوره مربوطه *
                                </label>
                                <select id="course_id" name="course_id" required
                                        class="w-full px-4 py-3 rounded-lg border border-gray-300 dark:border-gray-600
                                               bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100
                                               focus:ring-2 focus:ring-purple-500 focus:border-purple-500 transition-colors duration-200">
                                    <option value="">انتخاب دوره</option>
                                    @foreach(\App\Models\Course::all() as $course)
                                        <option value="{{$course->id}}" {{old('course_id', $lesson->course_id) == $course->id ? 'selected' : ''}}>
                                            {{$course->title}}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <!-- Lesson Order -->
                            <div>
                                <label for="lesson_order" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                                    <svg class="w-4 h-4 inline-block ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16V4m0 0L3 8m4-4l4 4m6 0v12m0 0l4-4m-4 4l-4-4"></path>
                                    </svg>
                                    ترتیب درس *
                                </label>
                                <input type="text" id="order" name="order" min="1"
                                       value="{{old('order', $lesson->order)}}"
                                       class="w-full px-4 py-3 rounded-lg border border-gray-300 dark:border-gray-600
                                              bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100
                                              focus:ring-2 focus:ring-purple-500 focus:border-purple-500 transition-colors duration-200"
                                       placeholder="1">
                            </div>

                            <!-- Description -->
                            <div class="lg:col-span-2">
                                <label for="description" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                                    <svg class="w-4 h-4 inline-block ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h7"></path>
                                    </svg>
                                    توضیحات درس
                                </label>
                                <textarea id="description" name="description" rows="4"
                                          class="w-full px-4 py-3 rounded-lg border border-gray-300 dark:border-gray-600
                                                 bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100
                                                 focus:ring-2 focus:ring-purple-500 focus:border-purple-500 transition-colors duration-200"
                                          placeholder="توضیح مختصری از محتوای درس و آنچه دانشجو یاد خواهد گرفت...">{{old('description', $lesson->description)}}</textarea>
                            </div>
                        </div>
                    </div>


                    <!-- Video Information Section -->
                    <div class="container mx-auto px-4 py-8">
                        <!-- Video Information Section -->
                        <div class="border-b border-gray-200 dark:border-gray-700 pb-8">
                            <h2 class="text-xl font-semibold text-gray-800 dark:text-white mb-6 flex items-center gap-2">
                                <svg class="w-5 h-5 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 10l4.553-2.276A1 1 0 0121 8.618v6.764a1 1 0 01-1.447.894L15 14M5 18h8a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v8a2 2 0 002 2z"></path>
                                </svg>
                                اطلاعات ویدیو
                            </h2>

                            <div class="grid grid-cols-2 lg:grid-cols-2 gap-6">

                                <div class="col-span-1">
                                    <!-- SpotPlayer Video ID -->
                                    <div >
                                        <label for="spotplayer_id" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                                            <svg class="w-4 h-4 inline-block ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 4V2a1 1 0 011-1h8a1 1 0 011 1v2m0 0V1a1 1 0 011-1h2a1 1 0 011 1v18a1 1 0 01-1-1H4a1 1 0 01-1-1V1a1 1 0 011-1h2a1 1 0 011 1v3"></path>
                                            </svg>
                                            شناسه ویدیو SpotPlayer
                                        </label>
                                        <input type="text" id="spotplayer_id" name="spotplayer_id" value="{{old('spotplayer_id',$lesson->spotplayer_id)}}"
                                               class="w-full px-4 py-3 rounded-lg border border-gray-300 dark:border-gray-600
                                  bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100
                                  focus:ring-2 focus:ring-purple-500 focus:border-purple-500 transition-colors duration-200"
                                               placeholder="5d2ee35bcddc092a304ae5eb">
                                    </div>
                                    <!-- Duration -->
                                    <div>
                                        <label for="duration" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                                            <svg class="w-4 h-4 inline-block ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                            </svg>
                                            مدت زمان
                                        </label>
                                        <input type="text" id="duration" name="duration" value="{{old('duration',$lesson->duration)}}"
                                               class="w-full px-4 py-3 rounded-lg border border-gray-300 dark:border-gray-600
                                  bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100
                                  focus:ring-2 focus:ring-purple-500 focus:border-purple-500 transition-colors duration-200"
                                               placeholder="10:30">
                                    </div>
                                </div>
                                <!-- Video URL -->
                                <div class="col-span-1">
                                    <label for="video_url" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                                        <svg class="w-4 h-4 inline-block ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.828 10.172a4 4 0 00-5.656 0l-4 4a4 4 0 105.656 5.656l1.102-1.101m-.758-4.899a4 4 0 005.656 0l4-4a4 4 0 00-5.656-5.656l-1.1 1.1"></path>
                                        </svg>
                                        لینک ویدیو (اختیاری)
                                    </label>
                                    <textarea id="video_url" name="video_url" rows="4"
                                              class="w-full px-4 py-3 rounded-lg border border-gray-300 dark:border-gray-600
                                  bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100
                                  focus:ring-2 focus:ring-purple-500 focus:border-purple-500 transition-colors duration-200 resize-vertical"
                                              placeholder="https://aparat.com/video.mp4">{{old('video_url',$lesson->video_url)}}</textarea>
                                </div>


                            </div>
                            <!-- Cover Image Upload -->
                            <div class="group mt-2">
                                <label class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-3">
                            <span class="flex items-center gap-2">
                                <svg class="w-4 h-4 text-indigo-500" fill="none" stroke="currentColor"
                                     viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                          d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                </svg>
                                تصویر کاور
                            </span>
                                </label>
                                <!-- Image Upload -->
                                <div class="space-y-2">

                                    <div id="dropZone"
                                         class="border-2 border-dashed border-gray-300 dark:border-gray-600 rounded-xl p-8 text-center hover:border-purple-500 transition-colors duration-200 cursor-pointer">

                                        <div class="flex items-stretch space-x-2">
                                            <input type="text" id="image_label" name="thumbnail"
                                                   class="flex-1 px-4 py-2 rounded-l-md border border-gray-300 dark:border-gray-600
                  bg-white dark:bg-gray-700 text-gray-800 dark:text-gray-100
                  focus:outline-none focus:ring-2 focus:ring-purple-500 transition"
                                                   placeholder="Image" value="{{old('thumbnail',$lesson->thumbnail)}}">

                                            <button type="button" id="button-image"
                                                    class="px-4 py-2 rounded-r-md border border-l-0 border-gray-300 dark:border-gray-600
                   bg-gray-100 dark:bg-gray-800 text-gray-800 dark:text-gray-100
                   hover:bg-gray-200 dark:hover:bg-gray-700
                   focus:outline-none focus:ring-2 focus:ring-purple-500 transition">
                                                Select
                                            </button>
                                        </div>

                                    </div>
                                    <p class="text-sm text-gray-500 dark:text-gray-400">فرمت‌های مجاز: JPG, PNG, GIF - حداکثر
                                        حجم: 100K - ابعاد پیشنهادی: 4:3 </p>
                                </div>
                                @error('cover_image')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                    </div>
                    <!-- Settings Section -->
                    <div class="border-b border-gray-200 dark:border-gray-700 pb-8">
                        <h2 class="text-xl font-semibold text-gray-800 dark:text-white mb-6 flex items-center gap-2">
                            <svg class="w-5 h-5 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"></path>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                            </svg>
                            تنظیمات
                        </h2>

                        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                            <!-- Status -->
                            <div>
                                <label for="status" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                                    <svg class="w-4 h-4 inline-block ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>
                                    وضعیت انتشار *
                                </label>
                                <select id="status" name="status" required
                                        class="w-full px-4 py-3 rounded-lg border border-gray-300 dark:border-gray-600
                                               bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100
                                               focus:ring-2 focus:ring-purple-500 focus:border-purple-500 transition-colors duration-200">
                                    <option value="draft" {{old('status', $lesson->status) == 'draft' ? 'selected' : ''}}>پیش‌نویس</option>
                                    <option value="published" {{old('status', $lesson->status) == 'published' ? 'selected' : ''}}>منتشر شده</option>
                                </select>
                            </div>

                            <!-- Is Free -->
                            <div>
                                <label for="is_free" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                                    <svg class="w-4 h-4 inline-block ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1"></path>
                                    </svg>
                                    نوع دسترسی
                                </label>
                                <select id="is_free" name="is_free"
                                        class="w-full px-4 py-3 rounded-lg border border-gray-300 dark:border-gray-600
                                               bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100
                                               focus:ring-2 focus:ring-purple-500 focus:border-purple-500 transition-colors duration-200">
                                    <option value="0" {{old('is_free', $lesson->is_free) == '0' ? 'selected' : ''}}>پولی</option>
                                    <option value="1" {{old('is_free', $lesson->is_free) == '1' ? 'selected' : ''}}>رایگان</option>
                                </select>
                            </div>

                            <!-- Tags -->
                            <div class="lg:col-span-2">
                                <label for="tags" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                                    <svg class="w-4 h-4 inline-block ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"></path>
                                    </svg>
                                    برچسب‌ها (اختیاری)
                                </label>
                                <input type="text" id="tags" name="tags"
                                       value="{{old('tags', $lesson->tags)}}"
                                       class="w-full px-4 py-3 rounded-lg border border-gray-300 dark:border-gray-600
                                              bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100
                                              focus:ring-2 focus:ring-purple-500 focus:border-purple-500 transition-colors duration-200"
                                       placeholder="Python, تحلیل داده, مبتدی (با کاما جدا کنید)">
                            </div>
                        </div>
                    </div>


                    <!-- Form Actions -->
                    <div class="flex items-center justify-between pt-6">
                        <div class="flex items-center gap-4">
                            <a href="{{ route('admin.lessons.index') }}"
                               class="inline-flex items-center gap-2 px-6 py-3 border-2 border-gray-300 dark:border-gray-600
                                      text-gray-700 dark:text-gray-300 font-semibold rounded-xl hover:bg-gray-50 dark:hover:bg-gray-700
                                      transition-all duration-200">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                                </svg>
                                بازگشت
                            </a>


                        </div>

                        <div class="flex items-center gap-4">


                            <button type="submit" name="action" value="update"
                                    class="inline-flex items-center gap-2 px-6 py-3 bg-gradient-to-r from-blue-600 to-indigo-600
                                           text-white font-semibold rounded-xl hover:from-blue-700 hover:to-indigo-700
                                           hover:shadow-xl hover:scale-105 transition-all duration-200">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0L8 8m4-4v12"></path>
                                </svg>
                                به‌روزرسانی درس
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
