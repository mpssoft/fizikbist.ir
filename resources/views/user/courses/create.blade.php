@extends('layouts.user.master')
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
      function removeCamas(){
          $('.format_number').each(function(index, element) {
              $(this).val($(this).val().replace(/,/g, "")); // Remove existing commas
          });
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

                    <a href="/admin/courses" class="hover:text-gray-700 dark:hover:text-gray-200 transition-colors duration-200">
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
                        <div class="inline-flex items-center justify-center w-16 h-16 bg-gradient-to-r from-green-500 to-blue-600 rounded-full shadow-lg">
                            <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                            </svg>
                        </div>
                        <a href="/admin/courses" class="p-3 rounded-full bg-gray-100 dark:bg-gray-700 hover:bg-gray-200 dark:hover:bg-gray-600 transition-all duration-300 text-gray-600 dark:text-gray-300">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                            </svg>
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Main Form Container -->
        <div class="bg-white dark:bg-gray-800 rounded-2xl shadow-xl border border-gray-200 dark:border-gray-700 overflow-hidden">
            <div class="p-8">
                <form method="POST" action="{{route('admin.courses.store')}}" onsubmit="removeCamas()" enctype="multipart/form-data" class="space-y-8">
                    @csrf

                    <!-- Course Title -->
                    <div class="group">
                        <label class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-3">
                            <span class="flex items-center gap-2">
                                <svg class="w-4 h-4 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"></path>
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
                    <div class="grid md:grid-cols-2 gap-6">
                        <!-- Regular Price -->
                        <div class="group">
                            <label class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-3">
                                <span class="flex items-center gap-2">
                                    <svg class="w-4 h-4 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1"></path>
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

                        <!-- Discount Price -->
                        <div class="group">
                            <label class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-3">
                                <span class="flex items-center gap-2">
                                    <svg class="w-4 h-4 text-orange-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"></path>
                                    </svg>
                                    قیمت با تخفیف
                                </span>
                            </label>
                            <input type="text" name="discount_price"
                                   class="w-full px-4 py-3 rounded-xl border-2 border-gray-200 dark:border-gray-600
                                          bg-gray-50 dark:bg-gray-700 text-gray-800 dark:text-gray-100
                                          focus:border-orange-500 focus:bg-white dark:focus:bg-gray-600
                                          focus:ring-4 focus:ring-orange-500/20 transition-all duration-200 format_number"
                                   value="{{ old('discount_price') }}"
                                   placeholder="قیمت با تخفیف (اختیاری)">
                            @error('discount_price')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <!-- Discount Expiry -->
                    <div class="group">
                        <label class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-3">
                            <span class="flex items-center gap-2">
                                <svg class="w-4 h-4 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3a2 2 0 012-2h4a2 2 0 012 2v4m-6 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M3 7h18M5 7h14l-1 10a1 1 0 01-1 1H7a1 1 0 01-1-1L5 7z"></path>
                                </svg>
                                تاریخ انقضای تخفیف
                            </span>
                        </label>
                        <input type="datetime-local" name="discount_expires_at"
                               class="w-full px-4 py-3 rounded-xl border-2 border-gray-200 dark:border-gray-600
                                      bg-gray-50 dark:bg-gray-700 text-gray-800 dark:text-gray-100
                                      focus:border-red-500 focus:bg-white dark:focus:bg-gray-600
                                      focus:ring-4 focus:ring-red-500/20 transition-all duration-200"
                               value="{{ old('discount_expires_at') }}">
                        @error('discount_expires_at')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Teacher Selection -->
                    <div class="group">
                        <label class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-3">
                            <span class="flex items-center gap-2">
                                <svg class="w-4 h-4 text-purple-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
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
                    <!-- Status  -->

                    <div class="group">
                        <label class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-3">
                            <span class="flex items-center gap-2">
                                <svg class="w-4 h-4 text-purple-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
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
                    <!-- Cover Image Upload -->
                    <div class="group">
                        <label class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-3">
                            <span class="flex items-center gap-2">
                                <svg class="w-4 h-4 text-indigo-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                </svg>
                                تصویر کاور
                            </span>
                        </label>
                        <!-- Image Upload -->
                        <div class="space-y-2">

                            <div id="dropZone" class="border-2 border-dashed border-gray-300 dark:border-gray-600 rounded-xl p-8 text-center hover:border-purple-500 transition-colors duration-200 cursor-pointer">

                                <div class="flex items-stretch space-x-2">
                                    <input type="text" id="image_label" name="cover_image"
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
                        @error('cover_image')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <!-- SpotPlayer Course Id -->
                    <div class="group">
                        <label class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-3">
                            <span class="flex items-center gap-2">
                                <svg class="w-4 h-4 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"></path>
                                </svg>
                               کد درس در اسپات پلیر
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
                               required>
                        @error('title')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <!-- Description -->
                    <div class="group">
                        <label class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-3">
                            <span class="flex items-center gap-2">
                                <svg class="w-4 h-4 text-teal-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
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
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                                    </svg>
                                    ایجاد دوره
                                </span>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <!-- Footer Info -->
        <div class="text-center mt-8">
            <p class="text-sm text-gray-500 dark:text-gray-400">
                پس از ایجاد، می‌توانید محتوای دوره را اضافه کنید
            </p>
        </div>
    </div>
@endsection
