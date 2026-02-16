@extends('layouts.admin.master')
@push('scripts')
    <script>
        document.addEventListener("DOMContentLoaded", function () {

            document.getElementById('button-image').addEventListener('click', (event) => {
                event.preventDefault();

                window.open('/file-manager/fm-button', 'fm', 'width=1400,height=800');
            });
        });

        // set file link
        function fmSetLink($url) {
            document.getElementById('image_label').value = $url;
        }

        function removeCamas() {
            $('.format_number').each(function (index, element) {
                $(this).val($(this).val().replace(/,/g, "")); // Remove existing commas
            });
        }
    </script>
@endpush
@section('content')
    <div class="container max-w-7xl mx-auto px-4 py-6" x-data>
        <!-- Header Section -->
        <div
            class="bg-white dark:bg-gray-800 rounded-2xl shadow-xl border border-gray-200 dark:border-gray-700 overflow-hidden mb-5">
            <div class="p-8">
                <!-- Breadcrumb -->
                <nav
                    class="flex items-center space-x-2 rtl:space-x-reverse text-sm text-gray-500 dark:text-gray-400 mb-6"
                    dir="rtl">
                    <a href="/admin/home"
                       class="hover:text-gray-700 dark:hover:text-gray-200 transition-colors duration-200">
                        <svg class="w-4 h-4 inline-block mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2H5a2 2 0 00-2-2z"></path>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M8 21l4-4 4 4"></path>
                        </svg>
                        داشبورد
                    </a>

                    <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                    </svg>

                    <a href="/admin/courses"
                       class="hover:text-gray-700 dark:hover:text-gray-200 transition-colors duration-200">
                        دوره‌ها
                    </a>

                    <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                    </svg>

                    <span class="text-gray-700 dark:text-gray-300 font-medium">ایجاد دوره جدید</span>
                </nav>

                <div class="flex items-center justify-between">
                    <div class="flex items-center gap-4">
                        <h1 class="text-3xl font-bold text-gray-800 dark:text-white">ایجاد دوره جدید</h1>
                        <p class="text-gray-600 dark:text-gray-300">ایجاد و تنظیم دوره آموزشی جدید</p>
                    </div>
                    <div class="flex items-center gap-4">
                        <div
                            class="inline-flex items-center justify-center w-16 h-16 bg-gradient-to-r from-green-500 to-blue-600 rounded-full shadow-lg">
                            <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                      d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                            </svg>
                        </div>

                    </div>
                </div>
            </div>
        </div>

        <!-- Main Form Container -->
        <div
            class="bg-white dark:bg-gray-800 rounded-2xl shadow-xl border border-gray-200 dark:border-gray-700 overflow-hidden">
            <div class="p-4">
                <form method="POST" action="{{route('admin.courses.store')}}" onsubmit="removeCamas()"
                      enctype="multipart/form-data" class="space-y-8">
                    @csrf
                    <!-- Grade Selection -->
                    <div class="group">
                        <label class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-3">
                            <span class="flex items-center gap-2">



                                <svg class="w-4 h-4 text-orange-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="m12 4 9 5-9 5-9-5 5-2.8M21 9v6m0 0a2 2 0 1 1-4 0v-3" />
                                </svg>

                                پایه | مقطع | دسته
                            </span>
                        </label>
                        <select name="grade_id"
                                class="w-full px-4 py-3 rounded-xl border-2 border-gray-200 dark:border-gray-600
                                       bg-gray-50 dark:bg-gray-700 text-gray-800 dark:text-gray-100
                                       focus:border-purple-500 focus:bg-white dark:focus:bg-gray-600
                                       focus:ring-4 focus:ring-purple-500/20 transition-all duration-200">
                            <option value="">-- انتخاب نوع --</option>
                            @foreach(App\Models\Grade::all() as $grade)
                                <option value="{{$grade->id}}"> {{ $grade->name }}</option>
                            @endforeach
                        </select>
                        @error('grade_id')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <!-- Course Title -->
                    <div class="group">
                        <label class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-3">
                            <span class="flex items-center gap-2">
                                <svg class="w-4 h-4 text-blue-500" fill="none" stroke="currentColor"
                                     viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                          d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"></path>
                                </svg>
                                عنوان دوره
                            </span>
                        </label>
                        <input type="text" name="title"
                               class="w-full px-4 py-3 rounded-xl border-2 border-gray-200 dark:border-gray-600
                                      bg-gray-50 dark:bg-gray-700 text-gray-800 dark:text-gray-100
                                      focus:border-blue-500 focus:bg-white dark:focus:bg-gray-600
                                      focus:ring-4 focus:ring-blue-500/20 transition-all duration-200
                                      placeholder-gray-400 dark:placeholder-gray-500"
                               value="{{ old('title') }}"
                               placeholder="نام دوره را وارد کنید..."
                               required>
                        @error('title')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Pricing Section -->
                    <div class=" gap-6">
                        <!-- Regular Price -->
                        <div class="group">
                            <label class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-3">
                                <span class="flex items-center gap-2">
                                    <svg class="w-4 h-4 text-green-500" fill="none" stroke="currentColor"
                                         viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                              d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1"></path>
                                    </svg>
                                    قیمت (تومان)
                                </span>
                            </label>
                            <input type="text" name="price"
                                   class="w-full px-4 py-3 rounded-xl border-2 border-gray-200 dark:border-gray-600
                                          bg-gray-50 dark:bg-gray-700 text-gray-800 dark:text-gray-100
                                          focus:border-green-500 focus:bg-white dark:focus:bg-gray-600
                                          focus:ring-4 focus:ring-green-500/20 transition-all duration-200 format_number"
                                   value="{{ old('price') }}"
                                   placeholder="قیمت دوره به تومان"
                                   required>
                            @error('price')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>


                    </div>


                    <!-- Teacher Selection -->
                    <div class="group">
                        <label class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-3">
                            <span class="flex items-center gap-2">
                                <svg class="w-4 h-4 text-purple-500" fill="none" stroke="currentColor"
                                     viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                          d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                </svg>
                                مدرس
                            </span>
                        </label>
                        <select name="teacher_id"
                                class="w-full px-4 py-3 rounded-xl border-2 border-gray-200 dark:border-gray-600
                                       bg-gray-50 dark:bg-gray-700 text-gray-800 dark:text-gray-100
                                       focus:border-purple-500 focus:bg-white dark:focus:bg-gray-600
                                       focus:ring-4 focus:ring-purple-500/20 transition-all duration-200">
                            <option value="">-- انتخاب مدرس --</option>
                            @foreach(App\Models\User::where('role','admin')->get() as $teacher)
                                <option value="{{$teacher->id}}"> {{ $teacher->name }}</option>
                            @endforeach
                        </select>
                        @error('teacher_id')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <!-- Language Selection -->
                    <div class="group">
                        <label class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-3">
                            <span class="flex items-center gap-2">
                                <span class="fas fa-language"> </span>
                                زبان
                            </span>
                        </label>
                        <select name="lang"
                                class="w-full px-4 py-3 rounded-xl border-2 border-gray-200 dark:border-gray-600
                                       bg-gray-50 dark:bg-gray-700 text-gray-800 dark:text-gray-100
                                       focus:border-purple-500 focus:bg-white dark:focus:bg-gray-600
                                       focus:ring-4 focus:ring-purple-500/20 transition-all duration-200">
                            <option value="">-- انتخاب زبان --</option>
                            <option value="tr" selected>ترکی</option>
                            <option value="fa">فارسی</option>

                        </select>
                        @error('lang')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Status  -->

                    <div class="group">
                        <label class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-3">
                            <span class="flex items-center gap-2">
                                <svg class="w-4 h-4 text-purple-500" fill="none" stroke="currentColor"
                                     viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                          d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                </svg>
                                وضعیت دوره
                            </span>
                        </label>
                        <select name="status"
                                class="w-full px-4 py-3 rounded-xl border-2 border-gray-200 dark:border-gray-600
                                       bg-gray-50 dark:bg-gray-700 text-gray-800 dark:text-gray-100
                                       focus:border-purple-500 focus:bg-white dark:focus:bg-gray-600
                                       focus:ring-4 focus:ring-purple-500/20 transition-all duration-200">
                            <option value="">-- انتخاب وضعیت --</option>

                            @php
                                $statuses = ['active' => 'فعال', 'in_progress' => 'در حال برگزاری', 'inactive' => 'غیرفعال'];
                            @endphp

                            @foreach($statuses as $key => $label)
                                <option value=" {{ old('status', $key ) }} "
                                    {{ old('status', $key ) == 'active'? 'selected':'' }}>
                                    {{ $label }}
                                </option>
                            @endforeach

                        </select>
                        @error('teacher_id')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <!-- Course Time -->
                    <div class="group">
                        <label class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-3">
                            <span class="flex items-center gap-2">
                                <svg class="w-4 h-4 text-blue-500" fill="none" stroke="currentColor"
                                     viewBox="0 0 24 24">
                        <circle cx="12" cy="12" r="10" stroke-width="2"/>
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6l4 2"/>
                    </svg>
                                طول دوره
                            </span>
                        </label>
                        <input type="text" name="time"
                               class="w-full px-4 py-3 rounded-xl border-2 border-gray-200 dark:border-gray-600
                                      bg-gray-50 dark:bg-gray-700 text-gray-800 dark:text-gray-100
                                      focus:border-blue-500 focus:bg-white dark:focus:bg-gray-600
                                      focus:ring-4 focus:ring-blue-500/20 transition-all duration-200
                                      placeholder-gray-400 dark:placeholder-gray-500"
                               value="{{ old('time') }}"
                               placeholder="مدت زمان دوره به ساعت ..."
                               >
                        @error('time')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <!-- Cover Image Upload -->
                    <div class="group">
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

                                <div class="flex items-stretch space-x-2 gap-2">
                                    <input type="text" id="image_label" name="cover_image"
                                           class="flex-1 px-4 py-2 rounded-md border border-gray-300 dark:border-gray-600
                  bg-white dark:bg-gray-700 text-gray-800 dark:text-gray-100
                  focus:outline-none focus:ring-2 focus:ring-purple-500 transition"
                                           placeholder="Image">

                                    <button type="button" id="button-image"
                                            class=" py-2 rounded-md border  border-gray-300 dark:border-gray-600
                   bg-gray-100 dark:bg-gray-800 text-gray-800 dark:text-gray-100
                   hover:bg-gray-200 dark:hover:bg-gray-700
                   focus:outline-none focus:ring-2 focus:ring-purple-500 transition">
                                        Select
                                    </button>
                                </div>

                            </div>
                            <p class="text-sm text-gray-500 dark:text-gray-400">فرمت‌های مجاز: JPG, PNG, GIF - حداکثر
                                حجم: 2MB - ابعاد پیشنهادی: 1920x800 پیکسل</p>
                        </div>
                        @error('cover_image')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <!-- SpotPlayer Course Id -->
                    <div class="group">
                        <label class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-3">
                            <span class="flex items-center gap-2">
                                <svg class="w-4 h-4 text-blue-500" fill="none" stroke="currentColor"
                                     viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                          d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"></path>
                                </svg>
                               کد(شناسه) درس در اسپات پلیر
                            </span>
                        </label>
                        <input type="text" name="spotplayer_id"
                               class="w-full px-4 py-3 rounded-xl border-2 border-gray-200 dark:border-gray-600
                                      bg-gray-50 dark:bg-gray-700 text-gray-800 dark:text-gray-100
                                      focus:border-blue-500 focus:bg-white dark:focus:bg-gray-600
                                      focus:ring-4 focus:ring-blue-500/20 transition-all duration-200
                                      placeholder-gray-400 dark:placeholder-gray-500"
                               value="{{ old('spotplayer_id') }}"
                               placeholder="5d2ee35bcddc092a304ae5eb"
                               >
                        @error('spotplayer_id')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <!-- Description -->
                    <div class="group">
                        <label class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-3">
                            <span class="flex items-center gap-2">
                                <svg class="w-4 h-4 text-teal-500" fill="none" stroke="currentColor"
                                     viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                          d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                                </svg>
                                توضیحات
                            </span>
                        </label>
                        <textarea name="description" rows="5"
                                  class="w-full px-4 py-3 rounded-xl border-2 border-gray-200 dark:border-gray-600
                                         bg-gray-50 dark:bg-gray-700 text-gray-800 dark:text-gray-100
                                         focus:border-teal-500 focus:bg-white dark:focus:bg-gray-600
                                         focus:ring-4 focus:ring-teal-500/20 transition-all duration-200
                                         placeholder-gray-400 dark:placeholder-gray-500 resize-none"
                                  placeholder="توضیحات کاملی از دوره ارائه دهید...">{{ old('description') }}</textarea>
                        @error('description')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <!-- Video -->
                    <div class="group">
                        <label class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-3">
                            <span class="flex items-center gap-2">
                                <svg class="w-4 h-4 text-teal-500" fill="none" stroke="currentColor"
                                     viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                          d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                                </svg>
                                ویدیوی معرفی دوره
                            </span>
                        </label>
                        <textarea name="video" rows="5"
                                  class="w-full px-4 py-3 rounded-xl border-2 border-gray-200 dark:border-gray-600
                                         bg-gray-50 dark:bg-gray-700 text-gray-800 dark:text-gray-100
                                         focus:border-teal-500 focus:bg-white dark:focus:bg-gray-600
                                         focus:ring-4 focus:ring-teal-500/20 transition-all duration-200
                                         placeholder-gray-400 dark:placeholder-gray-500 resize-none"
                                  placeholder="از آیارات کد iframe استفاده شود">{{ old('video') }}</textarea>
                        @error('video')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
  <!-- Long  text -->
                    <div class="group">
                        <label class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-3">
                            <span class="flex items-center gap-2">
                                <svg class="w-4 h-4 text-teal-500" fill="none" stroke="currentColor"
                                     viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                          d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                                </svg>
                                توضیح محتویات
                            </span>
                        </label>
                        <!-- TinyMCE Content Editor -->
                        <div class="bg-white dark:bg-gray-800 rounded-2xl shadow-lg border border-gray-200 dark:border-gray-700 p-6">
                            <div class="flex items-center gap-3 mb-6">
                                <div class="w-8 h-8 bg-green-100 dark:bg-green-900 rounded-lg flex items-center justify-center">
                                    <i class="fas fa-edit text-green-600 dark:text-green-400"></i>
                                </div>
                                <h2 class="text-xl font-bold text-gray-900 dark:text-white">محتوای درس</h2>

                            </div>

                            <div class="form-group">
                                <label for="content" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-3">
                                    <i class="fas fa-paragraph ml-2 text-purple-600"></i>
                                    شرح کامل درس *
                                </label>

                                <!-- TinyMCE Editor -->
                                <textarea id="content" name="content" class="tinymce-editor">
            <p>شرح کامل و سرفصل های درس را اینجا بنویسید...</p>
            <p><br></p>
            <p><strong>مثال:</strong></p>
            <ol>
              <li>فصل اول: ...</li>
              <li>فصل دوم: ...</li>
              <li>فصل سوم: ...</li>
            </ol>
            <p><br></p>
            <p><strong>نکته مهم:</strong> ...</p>
          </textarea>

                                <div class="mt-2 text-sm text-gray-500 dark:text-gray-400">
                                    <i class="fas fa-info-circle ml-1"></i>
                                    از ابزارهای ویرایشگر برای قالب‌بندی متن، افزودن تصاویر، جداول و لینک استفاده کنید
                                </div>
                            </div>
                        </div>

                        @error('content')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <!-- Tags -->
                    <div class="lg:col-span-2 ">
                        <label for="tags" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                            <svg class="w-4 h-4 inline-block ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"></path>
                            </svg>
                            برچسب‌ها (اختیاری)
                        </label>
                        <input type="text" id="tags" name="tags"
                               class="w-full px-4 py-3 rounded-lg border border-gray-300 dark:border-gray-600
                                              bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100
                                              focus:ring-2 focus:ring-purple-500 focus:border-purple-500 transition-colors duration-200"
                               placeholder="Python, تحلیل داده, مبتدی (با کاما جدا کنید)">
                    </div>
                    <!-- Submit Button -->
                    <div class="pt-6 border-t border-gray-200 dark:border-gray-700">
                        <div class="flex flex-col sm:flex-row gap-4 justify-end">
                            <a href="/admin/courses"
                               class="px-6 py-3 rounded-xl border-2 border-gray-300 dark:border-gray-600
                                      text-gray-700 dark:text-gray-300 font-semibold text-center
                                      hover:bg-gray-50 dark:hover:bg-gray-700
                                      transition-all duration-200 order-2 sm:order-1">
                                انصراف
                            </a>
                            <button type="submit"
                                    class="px-8 py-3 bg-gradient-to-r from-green-600 to-blue-600
                                           text-white font-semibold rounded-xl shadow-lg
                                           hover:from-green-700 hover:to-blue-700
                                           hover:shadow-xl hover:scale-105
                                           focus:ring-4 focus:ring-green-500/50
                                           transition-all duration-200 order-1 sm:order-2">
                                <span class="flex items-center justify-center gap-2">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                              d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                                    </svg>
                                    ایجاد دوره
                                </span>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>


    </div>
@endsection
@push('scripts')
    <script src="https://cdn.tiny.cloud/1/{{env('TINYMC_API_KEY')}}/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>


    <script>
        // Initialize TinyMCE with Laravel File Manager
        tinymce.init({
            selector: '.tinymce-editor',
            height: 400,
            language: 'fa',
            directionality: 'rtl',
            plugins: [
                'advlist', 'autolink', 'lists', 'link', 'image', 'charmap', 'preview',
                'anchor', 'searchreplace', 'visualblocks', 'code', 'fullscreen',
                'insertdatetime', 'media', 'table', 'help', 'wordcount', 'emoticons'
            ],
            toolbar: 'undo redo | blocks | bold italic underline strikethrough | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | removeformat | help | link image media | table | emoticons | code fullscreen preview',
            content_style: 'body { font-family: "Segoe UI", Tahoma, Geneva, Verdana, sans-serif; font-size: 14px; direction: rtl; text-align: right; }',

            // Laravel File Manager Integration
            file_picker_callback (callback, value, meta) {
                let x = window.innerWidth || document.documentElement.clientWidth || document.getElementsByTagName('body')[0].clientWidth
                let y = window.innerHeight|| document.documentElement.clientHeight|| document.getElementsByTagName('body')[0].clientHeight

                tinymce.activeEditor.windowManager.openUrl({
                    url : '/file-manager/tinymce5',
                    title : 'Laravel File manager',
                    width : x * 0.8,
                    height : y * 0.8,
                    onMessage: (api, message) => {
                        callback(message.content, { text: message.text })
                    }
                })
            },

            // Additional settings
            relative_urls: false,
            remove_script_host: false,
            convert_urls: true,
            branding: false,
            menubar: false,
            statusbar: true,
            resize: true,

            // Image settings
            image_advtab: true,
            image_caption: true,
            image_title: true,

            // Table settings
            table_default_attributes: {
                'class': 'table table-bordered'
            },
            table_default_styles: {
                'border-collapse': 'collapse',
                'width': '100%'
            },

            // Setup callback
            setup: function(editor) {
                editor.on('change', function() {
                    editor.save();
                });
            }
        });
    </script>

@endpush
