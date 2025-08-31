@extends('layouts.admin.master')

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
                    <span class="text-gray-700 dark:text-gray-300 font-medium">مدیریت درس‌ها</span>
                </nav>

                <div class="flex flex-col lg:flex-row lg:items-center justify-between gap-6">
                    <div class="flex items-center gap-4">
                        <div class="inline-flex items-center justify-center w-16 h-16 bg-gradient-to-r from-purple-500 to-indigo-600 rounded-full shadow-lg">
                            <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.746 0 3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
                            </svg>
                        </div>
                        <div>
                            <h1 class="text-3xl font-bold text-gray-800 dark:text-white">مدیریت درس‌ها</h1>
                            <p class="text-gray-600 dark:text-gray-300">مشاهده و مدیریت تمام درس‌های آموزشی</p>
                        </div>
                    </div>

                    <!-- Action Buttons -->
                    <div class="flex items-center gap-4">
                        <a href="/admin/lessons/create"
                           class="inline-flex items-center gap-2 px-6 py-3 bg-gradient-to-r from-green-600 to-emerald-600
                                  text-white font-semibold rounded-xl hover:from-green-700 hover:to-emerald-700
                                  hover:shadow-xl hover:scale-105 transition-all duration-200">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                            </svg>
                            ایجاد درس جدید
                        </a>

                    </div>
                </div>
            </div>
        </div>

        <!-- Quick Stats -->
        <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-8">
            <div class="bg-white dark:bg-gray-800 rounded-xl shadow-lg border border-gray-200 dark:border-gray-700 p-6">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm font-medium text-gray-600 dark:text-gray-400">کل درس‌ها</p>
                        <p class="text-2xl font-bold text-gray-900 dark:text-white">{{count($lessons)}}</p>
                    </div>
                    <div class="w-12 h-12 bg-blue-100 dark:bg-blue-900 rounded-lg flex items-center justify-center">
                        <svg class="w-6 h-6 text-blue-600 dark:text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.746 0 3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
                        </svg>
                    </div>
                </div>
            </div>

            <div class="bg-white dark:bg-gray-800 rounded-xl shadow-lg border border-gray-200 dark:border-gray-700 p-6">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm font-medium text-gray-600 dark:text-gray-400">منتشر شده</p>
                        <p class="text-2xl font-bold text-gray-900 dark:text-white">{{count($publishedLessons)}}</p>
                    </div>
                    <div class="w-12 h-12 bg-green-100 dark:bg-green-900 rounded-lg flex items-center justify-center">
                        <svg class="w-6 h-6 text-green-600 dark:text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </div>
                </div>
            </div>

            <div class="bg-white dark:bg-gray-800 rounded-xl shadow-lg border border-gray-200 dark:border-gray-700 p-6">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm font-medium text-gray-600 dark:text-gray-400">پیش نویس</p>
                        <p class="text-2xl font-bold text-gray-900 dark:text-white">{{ count($draftLessons) }}</p>
                    </div>
                    <div class="w-12 h-12 bg-yellow-100 dark:bg-yellow-900 rounded-lg flex items-center justify-center">
                        <svg class="w-6 h-6 text-yellow-600 dark:text-yellow-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </div>
                </div>
            </div>

            <div class="bg-white dark:bg-gray-800 rounded-xl shadow-lg border border-gray-200 dark:border-gray-700 p-6">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm font-medium text-gray-600 dark:text-gray-400">کل بازدید</p>
                        <p class="text-2xl font-bold text-gray-900 dark:text-white">{{ $totalViews }}</p>
                    </div>
                    <div class="w-12 h-12 bg-purple-100 dark:bg-purple-900 rounded-lg flex items-center justify-center">
                        <svg class="w-6 h-6 text-purple-600 dark:text-purple-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                        </svg>
                    </div>
                </div>
            </div>
        </div>

     {{--   <!-- Filters and Search -->
        <div class="bg-white dark:bg-gray-800 rounded-2xl shadow-xl border border-gray-200 dark:border-gray-700 overflow-hidden mb-8">
            <div class="p-6">
                <form method="GET" class="space-y-6">
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                        <!-- Search -->
                        <div class="lg:col-span-2">
                            <label for="search" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                                جستجو در درس‌ها
                            </label>
                            <div class="relative">
                                <input type="text" id="search" name="search"
                                       class="w-full px-4 py-3 pr-10 rounded-lg border border-gray-300 dark:border-gray-600
                                              bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100
                                              focus:ring-2 focus:ring-purple-500 focus:border-purple-500 transition-colors duration-200"
                                       placeholder="جستجو بر اساس عنوان، توضیحات یا شناسه ویدیو...">
                                <svg class="absolute right-3 top-1/2 transform -translate-y-1/2 w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                                </svg>
                            </div>
                        </div>

                        <!-- Course Filter -->
                        <div>
                            <label for="course_filter" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                                فیلتر بر اساس دوره
                            </label>
                            <select id="course_filter" name="course_filter"
                                    class="w-full px-4 py-3 rounded-lg border border-gray-300 dark:border-gray-600
                                           bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100
                                           focus:ring-2 focus:ring-purple-500 focus:border-purple-500 transition-colors duration-200">
                                <option value="">همه دوره‌ها</option>
                                <option value="1">برنامه‌نویسی وب</option>
                                <option value="2">تحلیل داده</option>
                                <option value="3">توسعه موبایل</option>
                                <option value="4">هوش مصنوعی</option>
                                <option value="5">امنیت سایبری</option>
                                <option value="6">طراحی UI/UX</option>
                            </select>
                        </div>

                        <!-- Status Filter -->
                        <div>
                            <label for="status_filter" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                                وضعیت انتشار
                            </label>
                            <select id="status_filter" name="status_filter"
                                    class="w-full px-4 py-3 rounded-lg border border-gray-300 dark:border-gray-600
                                           bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100
                                           focus:ring-2 focus:ring-purple-500 focus:border-purple-500 transition-colors duration-200">
                                <option value="">همه وضعیت‌ها</option>
                                <option value="published">منتشر شده</option>
                                <option value="draft">پیش‌نویس</option>
                            </select>
                        </div>
                    </div>

                    <div class="flex flex-col sm:flex-row items-center gap-4">
                        <!-- Sort Options -->
                        <div class="flex items-center gap-4">
                            <label for="sort_by" class="text-sm font-medium text-gray-700 dark:text-gray-300">
                                مرتب‌سازی:
                            </label>
                            <select id="sort_by" name="sort_by"
                                    class="px-3 py-2 rounded-lg border border-gray-300 dark:border-gray-600
                                           bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100
                                           focus:ring-2 focus:ring-purple-500 focus:border-purple-500 transition-colors duration-200">
                                <option value="created_desc">جدیدترین</option>
                                <option value="created_asc">قدیمی‌ترین</option>
                                <option value="title_asc">عنوان (الف-ی)</option>
                                <option value="title_desc">عنوان (ی-الف)</option>
                                <option value="views_desc">بیشترین بازدید</option>
                                <option value="likes_desc">بیشترین لایک</option>
                            </select>
                        </div>

                        <!-- Filter Actions -->
                        <div class="flex items-center gap-3 mr-auto">
                            <button type="submit"
                                    class="px-6 py-2 bg-purple-600 text-white font-medium rounded-lg hover:bg-purple-700
                                           focus:ring-2 focus:ring-purple-500 focus:ring-offset-2 transition-colors duration-200">
                                اعمال فیلتر
                            </button>
                            <a href="/admin/lessons"
                               class="px-6 py-2 border border-gray-300 dark:border-gray-600 text-gray-700 dark:text-gray-300
                                      font-medium rounded-lg hover:bg-gray-50 dark:hover:bg-gray-700 transition-colors duration-200">
                                پاک کردن
                            </a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
--}}
        <!-- Lessons Table -->
        <div class="bg-white dark:bg-gray-800 rounded-2xl shadow-xl border border-gray-200 dark:border-gray-700 overflow-hidden">
            <!-- Bulk Actions -->

            <!-- Table -->
            <div class="overflow-x-auto">
                <table class="w-full">
                    <thead class="bg-gray-50 dark:bg-gray-700">
                    <tr>

                        <th class="px-6 py-4 text-right text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">
                            درس
                        </th>
                        <th class="px-6 py-4 text-right text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">
                            دوره
                        </th>
                        <th class="px-6 py-4 text-right text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">
                            ترتیب
                        </th>
                            <th class="px-6 py-4 text-right text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">
                            وضعیت
                        </th>
                        <th class="px-6 py-4 text-right text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">
                            تاریخ ایجاد
                        </th>
                        <th class="px-6 py-4 text-right text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">
                            عملیات
                        </th>
                    </tr>
                    </thead>
                    <tbody class="bg-white dark:bg-gray-800 divide-y divide-gray-200 dark:divide-gray-700">
                    @foreach($lessons as $lesson)
                        <tr class="hover:bg-gray-50 dark:hover:bg-gray-700 transition-colors duration-200">
                        <td class="px-6 py-4">
                            <div class="flex items-center gap-4">
                                <img src="{{ $lesson->thumbnail }}"
                                     alt="تصویر درس" class="w-15 h-11 object-cover rounded-lg border border-gray-200">
                                <div>
                                    <div class="text-sm font-medium text-gray-900 dark:text-white">
                                        {{ $lesson->title }}
                                    </div>
                                    <div class="text-sm text-gray-500 dark:text-gray-400">
                                        شناسه ویدیو: {{ $lesson->spotplayer_id }}
                                    </div>
                                </div>
                            </div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-blue-100 text-blue-800 dark:bg-blue-900 dark:text-blue-200">
                                    {{ $lesson->course->title }}
                                </span>

                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:text-white">
                            {{ $lesson->order }}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800 dark:bg-green-900 dark:text-green-200">
                                    {{$lesson->status == 'published' ? 'منتشر شده':'پیش نویس'}}
                                </span>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 dark:text-gray-400">
                            {{ $lesson->updated_at }}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                            <div class="flex items-center gap-4">
                                <a href="{{route('admin.lessons.edit',$lesson->id)}}"
                                   class="p-4 text-blue-600 hover:text-blue-900 dark:text-blue-400 dark:hover:text-blue-300">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                                    </svg>
                                </a>
                                <form method="POST" action="{{route('admin.lessons.destroy',$lesson->id)}}" onsubmit="event.preventDefault();confirmDelete(event);" class="inline">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="p-4 text-red-600 hover:text-red-900 dark:text-red-400 dark:hover:text-red-300"
                                           >
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                        </svg>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                   </tbody>
                </table>
            </div>

            <!-- Pagination -->
            <div class="px-6 py-4 border-t border-gray-200 dark:border-gray-700 bg-gray-50 dark:bg-gray-700/50">
                <div class="flex items-center justify-between">
                 {{ $lessons->render() }}
                </div>
            </div>
        </div>
    </div>
    {{-- SweetAlert Confirmation --}}
    @once
        @push('scripts')
        <script src="/js/modules/sweetalert2.js"></script>
        <script>

            function confirmDelete(e) {
                e.preventDefault();
                Swal.fire({
                    title: 'حذف درس',
                    text: 'آیا مطمئن هستید که می‌خواهید این درس را حذف کنید؟',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonText: 'بله، حذف کن',
                    cancelButtonText: 'لغو'
                }).then((result) => {
                    if (result.isConfirmed) {
                        e.target.submit();
                    }
                });
                return false;
            }
        </script>
    @endpush
    @endonce
@endsection
