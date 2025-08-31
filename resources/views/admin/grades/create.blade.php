@extends('layouts.admin.master')

@section('content')
<div class="bg-gray-50 dark:bg-gray-900 min-h-screen transition-colors duration-300">
<!-- Header -->
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
    <div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm border border-gray-200 dark:border-gray-700 p-6">
        <div class="flex justify-between items-center">
            <div>
                <div class="flex items-center text-sm text-gray-500 dark:text-gray-400 mb-2">
                    <a href="{{route('admin.grades.index')}}" class="hover:text-blue-600 dark:hover:text-blue-400 transition-colors duration-200">مدیریت پایه‌های تحصیلی</a>
                    <svg class="w-4 h-4 mx-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                    </svg>
                    <span>افزودن پایه جدید</span>
                </div>
                <div class="flex">
                <div class="w-10 h-10 bg-blue-100 dark:bg-blue-900 rounded-lg flex items-center justify-center ml-4">
                    <svg class="w-6 h-6 text-blue-600 dark:text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                    </svg>
                </div>
                <h1 class="text-3xl font-bold text-gray-900 dark:text-white">افزودن (پایه|مقطع|دسته) جدید</h1>
                </div>
                <p class=" text-gray-600 dark:text-gray-400 mt-1">مقطع تحصیلی جدید را به سیستم اضافه کنید</p>
            </div>

        </div>
    </div>
</div>

<!-- Main Content -->
<main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pb-8">
    <!-- Form Card -->
    <div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm border border-gray-200 dark:border-gray-700">
        <div class="px-6 py-4 border-b border-gray-200 dark:border-gray-700">
            <div class="flex items-center">

                <div>
                    <h2 class="text-xl font-semibold text-gray-900 dark:text-white">اطلاعات پایه تحصیلی</h2>
                    <p class="text-sm text-gray-600 dark:text-gray-400">فیلدهای مشخص شده با * اجباری هستند</p>
                </div>
            </div>
        </div>

        <form class="p-6" method="post" action="{{route('admin.grades.store')}}">
            @csrf
            <!-- Grade Name -->
            <div class="mb-6">
                <label for="gradeName" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                    نام پایه *
                </label>
                <input
                    type="text"
                    id="gradeName"
                    name="name"
                    placeholder="مثال: دهم، یازدهم، دوازدهم، کنکور"
                    class="w-full px-4 py-3 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent bg-white dark:bg-gray-700 text-gray-900 dark:text-white placeholder-gray-500 dark:placeholder-gray-400 transition-colors duration-200"
                    required
                >
                <p class="mt-2 text-sm text-gray-500 dark:text-gray-400">نام پایه تحصیلی را به فارسی وارد کنید</p>
            </div>

            <!-- Description -->
            <div class="mb-8">
                <label for="gradeDescription" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                    توضیحات
                </label>
                <textarea
                    id="gradeDescription"
                    name="description"
                    rows="4"
                    placeholder="توضیحات تکمیلی در مورد این پایه تحصیلی..."
                    class="w-full px-4 py-3 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent bg-white dark:bg-gray-700 text-gray-900 dark:text-white placeholder-gray-500 dark:placeholder-gray-400 resize-none transition-colors duration-200"
                ></textarea>
                <p class="mt-2 text-sm text-gray-500 dark:text-gray-400">اطلاعات اضافی که می‌تواند برای این پایه مفید باشد (اختیاری)</p>
            </div>

            <!-- Form Actions -->
            <div class="flex justify-end space-x-4 space-x-reverse pt-4 border-t border-gray-200 dark:border-gray-700">
                <button
                    type="button"
                    class="px-6 py-3 text-gray-700 dark:text-gray-300 bg-gray-100 dark:bg-gray-700 hover:bg-gray-200 dark:hover:bg-gray-600 rounded-lg font-medium transition-colors duration-200 flex items-center"
                >
                    <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                    لغو
                </button>
                <button
                    type="submit"
                    class="px-6 py-3 bg-blue-600 hover:bg-blue-700 dark:bg-blue-500 dark:hover:bg-blue-600 text-white rounded-lg font-medium transition-colors duration-200 flex items-center"
                >
                    <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                    </svg>
                    ایجاد پایه
                </button>
            </div>
        </form>
    </div>


</main>
</div>
@endsection
