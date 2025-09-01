@extends('layouts.admin.master')
@push('scripts')
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
    @endpush
@section('content')
    <div class="max-w-4xl mx-auto mt-5">
        <!-- Header Section -->
        <div class="bg-white dark:bg-gray-800 rounded-2xl shadow-xl border border-gray-200 dark:border-gray-700 overflow-hidden mb-5">
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
                    <a href="/admin/sliders" class="hover:text-gray-700 dark:hover:text-gray-200 transition-colors duration-200">اسلایدرها</a>
                    <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                    </svg>
                    <span class="text-gray-700 dark:text-gray-300 font-medium">ایجاد اسلایدر جدید</span>
                </nav>

                <div class="flex flex-col lg:flex-row lg:items-center justify-between gap-6">
                    <div class="flex items-center gap-4">
                        <div class="inline-flex items-center justify-center w-16 h-16 bg-gradient-to-r from-green-500 to-blue-600 rounded-full shadow-lg">
                            <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                            </svg>
                        </div>
                        <div>
                            <h1 class="text-3xl font-bold text-gray-800 dark:text-white">ایجاد اسلایدر جدید</h1>
                            <p class="text-gray-600 dark:text-gray-300">اسلایدر جدید برای صفحه اصلی ایجاد کنید</p>
                        </div>
                    </div>

                    <!-- Action Buttons -->
                    <div class="flex items-center gap-4">
                        <a href="/admin/sliders"
                           class="inline-flex items-center gap-2 px-6 py-3 border-2 border-gray-300 dark:border-gray-600
                                  text-gray-700 dark:text-gray-300 font-semibold rounded-xl hover:bg-gray-50 dark:hover:bg-gray-700
                                  hover:shadow-lg transition-all duration-200">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                            </svg>

                        </a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Main Form -->
        <div class="bg-white dark:bg-gray-800 rounded-2xl shadow-xl border border-gray-200 dark:border-gray-700 overflow-hidden">
            <div class="p-8">
                @include('layouts.errors')
                <form id="sliderForm" class="space-y-8" action="{{route('admin.sliders.store')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('post')
                    <!-- Title Field -->
                    <div class="space-y-2">
                        <label for="title" class="block text-lg font-semibold text-gray-700 dark:text-gray-300">
                            عنوان اسلایدر *
                        </label>
                        <input type="text" id="title" name="title" required
                               class="w-full px-4 py-4 text-lg rounded-xl border-2 border-gray-200 dark:border-gray-600
                                      bg-gray-50 dark:bg-gray-700 text-gray-800 dark:text-gray-100
                                      focus:border-purple-500 focus:bg-white dark:focus:bg-gray-600
                                      focus:ring-4 focus:ring-purple-500/20 transition-all duration-200"
                               placeholder="عنوان جذاب برای اسلایدر وارد کنید">
                        <p class="text-sm text-gray-500 dark:text-gray-400">این عنوان به عنوان تیتر اصلی اسلایدر نمایش داده می‌شود</p>
                    </div>

                    <!-- Subtitle Field -->
                    <div class="space-y-2">
                        <label for="subtitle" class="block text-lg font-semibold text-gray-700 dark:text-gray-300">
                            زیرعنوان
                        </label>
                        <textarea id="subtitle" name="subtitle" rows="4"
                                  class="w-full px-4 py-4 text-lg rounded-xl border-2 border-gray-200 dark:border-gray-600
                                         bg-gray-50 dark:bg-gray-700 text-gray-800 dark:text-gray-100
                                         focus:border-purple-500 focus:bg-white dark:focus:bg-gray-600
                                         focus:ring-4 focus:ring-purple-500/20 transition-all duration-200 resize-none"
                                  placeholder="توضیح کوتاه و جذاب درباره محتوای اسلایدر"></textarea>
                        <p class="text-sm text-gray-500 dark:text-gray-400">توضیح کوتاهی که زیر عنوان اصلی نمایش داده می‌شود</p>
                    </div>

                    <!-- Image Upload -->
                    <div class="space-y-2">
                        <label for="image" class="block text-lg font-semibold text-gray-700 dark:text-gray-300">
                            تصویر اسلایدر *
                        </label>
                        <div id="dropZone" class="border-2 border-dashed border-gray-300 dark:border-gray-600 rounded-xl p-8 text-center hover:border-purple-500 transition-colors duration-200 cursor-pointer">
                            <input type="file" id="image" name="image" accept="image/*" class="hidden" onchange="previewImage(this)">
                            <div id="imagePreview" class="mb-6">
                                <svg class="w-16 h-16 text-gray-400 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                </svg>
                                <p class="text-xl text-gray-500 dark:text-gray-400 mb-2">تصویر اسلایدر را انتخاب کنید</p>
                                <p class="text-sm text-gray-400">یا فایل را اینجا بکشید و رها کنید</p>
                            </div>
                            <div class="flex items-stretch space-x-2">
                                <input type="text" id="image_label" name="image"
                                       class="flex-1 px-4 py-2 rounded-l-md border border-gray-300 dark:border-gray-600
                  bg-white dark:bg-gray-700 text-gray-800 dark:text-gray-100
                  focus:outline-none focus:ring-2 focus:ring-purple-500 transition"
                                       placeholder="Image">

                                <button type="button" id="button-image"
                                        class="px-4 py-2 rounded-r-md border border-l-0 border-gray-300 dark:border-gray-600
                   bg-gray-100 dark:bg-gray-800 text-gray-800 dark:text-gray-100
                   hover:bg-gray-200 dark:hover:bg-gray-700
                   focus:outline-none focus:ring-2 focus:ring-purple-500 transition">
                                    Select
                                </button>
                            </div>

                        </div>
                        <p class="text-sm text-gray-500 dark:text-gray-400">فرمت‌های مجاز: JPG, PNG, GIF - حداکثر حجم: 2MB - ابعاد پیشنهادی: 1920x800 پیکسل</p>
                    </div>

                    <div id="dropZone" class="border-2 border-dashed border-gray-300 dark:border-gray-600 rounded-xl p-8  ">
                    <!-- Link Field -->
                        <div class="space-y-2">
                            <label for="link" class="block text-lg font-semibold text-gray-700 dark:text-gray-300">
                                لینک اسلایدر
                            </label>
                        <div class="relative">
                            <input type="url" dir="ltr" id="link" name="link" value="{{old('link')}}"
                                   class="w-full px-4 py-4 text-lg rounded-xl border-2 border-gray-200 dark:border-gray-600
                                          bg-gray-50 dark:bg-gray-700 text-gray-800 dark:text-gray-100
                                          focus:border-purple-500 focus:bg-white dark:focus:bg-gray-600
                                          focus:ring-4 focus:ring-purple-500/20 transition-all duration-200 pl-12"
                                   placeholder="https://example.com یا /internal-page">
                            <svg class="absolute left-4 top-1/2 transform -translate-y-1/2 w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.828 10.172a4 4 0 00-5.656 0l-4 4a4 4 0 105.656 5.656l1.102-1.101m-.758-4.899a4 4 0 005.656 0l4-4a4 4 0 00-5.656-5.656l-1.1 1.1"></path>
                            </svg>
                        </div>
                        <p class="text-sm text-gray-500 dark:text-gray-400">لینکی که کاربر پس از کلیک روی اسلایدر به آن هدایت می‌شود (اختیاری)</p>
                    </div>
                    <!-- Button Text Field -->
                    <div class="space-y-2">
                        <label for="title" class="block text-lg font-semibold text-gray-700 dark:text-gray-300">
                             متن روی دکمه اسلایدر
                        </label>
                        <input type="text" id="button_text" name="button_text" value=" {{old('button_text','اطلاعات بیشتر')}}"
                               class="w-full px-4 py-4 text-lg rounded-xl border-2 border-gray-200 dark:border-gray-600
                                      bg-gray-50 dark:bg-gray-700 text-gray-800 dark:text-gray-100
                                      focus:border-purple-500 focus:bg-white dark:focus:bg-gray-600
                                      focus:ring-4 focus:ring-purple-500/20 transition-all duration-200"
                               placeholder="اطلاعات بیشتر | خرید سریع">
                        <p class="text-sm text-gray-500 dark:text-gray-400">این متن برای سفارشی کردن متن دکمه اسلایدر استفاده می شود</p>
                    </div>
                    </div>
                    <!-- Display Order -->
                    <div class="space-y-2">
                        <label for="order" class="block text-lg font-semibold text-gray-700 dark:text-gray-300">
                            ترتیب نمایش
                        </label>
                        <input type="text" id="order" name="order"  value="{{old('order',1)}}"
                               class="w-full px-4 py-4 text-lg rounded-xl border-2 border-gray-200 dark:border-gray-600
                                      bg-gray-50 dark:bg-gray-700 text-gray-800 dark:text-gray-100
                                      focus:border-purple-500 focus:bg-white dark:focus:bg-gray-600
                                      focus:ring-4 focus:ring-purple-500/20 transition-all duration-200">
                        <p class="text-sm text-gray-500 dark:text-gray-400">عدد کمتر = نمایش زودتر در اسلایدر</p>
                    </div>

                    <!-- Active Status -->
                    <div class="space-y-4">
                        <label class="block text-lg font-semibold text-gray-700 dark:text-gray-300">
                            وضعیت نمایش
                        </label>
                        <div class="bg-gray-50 dark:bg-gray-700 rounded-xl p-6">
                            <label class="flex items-center gap-4 cursor-pointer">
                                <input type="checkbox" id="is_active" name="is_active" checked
                                       class="w-6 h-6 text-purple-600 bg-gray-100 border-gray-300 rounded focus:ring-purple-500 focus:ring-2">
                                <div>
                                    <span class="text-lg font-semibold text-gray-700 dark:text-gray-300">نمایش اسلایدر در صفحه اصلی</span>
                                    <p class="text-sm text-gray-500 dark:text-gray-400 mt-1">با فعال کردن این گزینه، اسلایدر در صفحه اصلی نمایش داده می‌شود</p>
                                </div>
                            </label>
                        </div>
                    </div>

                    <!-- Form Actions -->
                    <div class="flex flex-col md:flex-row items-center gap-4 pt-8 border-t border-gray-200 dark:border-gray-700">
                        <button type="submit"
                                class="w-full md:w-auto  px-8 py-4 bg-gradient-to-r from-green-600 to-blue-600 text-white text-lg font-semibold rounded-xl
                                       hover:from-green-700 hover:to-blue-700 hover:shadow-xl hover:scale-105 transition-all duration-200
                                       focus:ring-4 focus:ring-green-500/20">
                            <svg class="w-6 h-6 inline-block ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                            </svg>
                            ایجاد اسلایدر
                        </button>

                        <a href="{{route('admin.sliders.index')}}"
                           class="w-full md:w-auto px-8 py-4 border-2 border-gray-300 dark:border-gray-600 text-gray-700 dark:text-gray-300
                                  text-lg font-semibold rounded-xl hover:bg-gray-50 dark:hover:bg-gray-700 transition-all duration-200 text-center">
                            انصراف
                        </a>
                    </div>
                </form>
            </div>
        </div>

       </div>

@endsection
