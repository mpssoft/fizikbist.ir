@extends('layouts.admin.master')

@section('content')
<div class="bg-gray-50 dark:bg-gray-900 min-h-screen transition-colors duration-300">
<!-- Header -->
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
    <div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm border border-gray-200 dark:border-gray-700 p-6">
        <div class="flex justify-between items-center">
            <div>
                <div class="flex items-center text-sm text-gray-500 dark:text-gray-400 mb-2">
                    <a href="#" class="hover:text-blue-600 dark:hover:text-blue-400 transition-colors duration-200">مدیریت پایه‌های تحصیلی</a>
                    <svg class="w-4 h-4 mx-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                    </svg>
                    <span>ویرایش پایه</span>
                </div>
                <div class="flex">
                    <div class="w-10  h-10 bg-amber-100 dark:bg-amber-900 rounded-lg flex items-center justify-center ml-4">
                        <svg class="w-6 h-6 text-amber-600 dark:text-amber-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                        </svg>
                    </div>

                    <h1 class="text-3xl font-bold text-gray-900 dark:text-white">ویرایش (پایه|مقطع|دسته) </h1>
                </div>
                <p class="text-gray-600 dark:text-gray-400 mt-1">اطلاعات پایه تحصیلی را ویرایش کنید</p>
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
                    <h2 class="text-xl font-semibold text-gray-900 dark:text-white">ویرایش اطلاعات پایه تحصیلی</h2>
                    <p class="text-sm text-gray-600 dark:text-gray-400">فیلدهای مشخص شده با * اجباری هستند</p>
                </div>
            </div>
        </div>

        <!-- Display Validation Errors -->
        @if ($errors->any())
            <div class="mx-6 mt-6 bg-red-50 dark:bg-red-900/20 border border-red-200 dark:border-red-800 rounded-lg p-4">
                <div class="flex items-center mb-2">
                    <svg class="w-5 h-5 text-red-600 dark:text-red-400 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                    <h3 class="text-sm font-medium text-red-800 dark:text-red-200">خطاهای اعتبارسنجی:</h3>
                </div>
                <ul class="text-sm text-red-700 dark:text-red-300 list-disc list-inside space-y-1">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <!-- Display Success Message -->
        @if (session('success'))
            <div class="mx-6 mt-6 bg-green-50 dark:bg-green-900/20 border border-green-200 dark:border-green-800 rounded-lg p-4">
                <div class="flex items-center">
                    <svg class="w-5 h-5 text-green-600 dark:text-green-400 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                    </svg>
                    <p class="text-sm text-green-800 dark:text-green-200">{{ session('success') }}</p>
                </div>
            </div>
        @endif

        <form method="POST" action="{{ route('admin.grades.update', $grade->id) }}" class="p-6">
            @csrf
            @method('PUT')

            <!-- Grade Name -->
            <div class="mb-6">
                <label for="gradeName" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                    نام پایه *
                </label>
                <input
                    type="text"
                    id="gradeName"
                    name="name"
                    value="{{ old('name', $grade->name ?? '') }}"
                    placeholder="مثال: دهم، یازدهم، دوازدهم"
                    class="w-full px-4 py-3 border @error('name') border-red-300 @else border-gray-300 dark:border-gray-600 @enderror rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent bg-white dark:bg-gray-700 text-gray-900 dark:text-white placeholder-gray-500 dark:placeholder-gray-400 transition-colors duration-200"
                    required
                >
                @error('name')
                <p class="mt-2 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                @else
                    <p class="mt-2 text-sm text-gray-500 dark:text-gray-400">نام پایه تحصیلی را به فارسی وارد کنید</p>
                    @enderror
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
                    class="w-full px-4 py-3 border @error('description') border-red-300 @else border-gray-300 dark:border-gray-600 @enderror rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent bg-white dark:bg-gray-700 text-gray-900 dark:text-white placeholder-gray-500 dark:placeholder-gray-400 resize-none transition-colors duration-200"
                >{{ old('description', $grade->description ?? '') }}</textarea>
                @error('description')
                <p class="mt-2 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>

                    @enderror
            </div>


            <!-- Form Actions -->
            <div class="flex justify-end space-x-4 space-x-reverse pt-4 border-t border-gray-200 dark:border-gray-700">
                <a
                    href="{{ route('admin.grades.index') }}"
                    class="px-6 py-3 text-gray-700 dark:text-gray-300 bg-gray-100 dark:bg-gray-700 hover:bg-gray-200 dark:hover:bg-gray-600 rounded-lg font-medium transition-colors duration-200 flex items-center"
                >
                    <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                    لغو
                </a>
                <button
                    type="submit"
                    class="px-6 py-3 bg-amber-600 hover:bg-amber-700 dark:bg-amber-500 dark:hover:bg-amber-600 text-white rounded-lg font-medium transition-colors duration-200 flex items-center"
                >
                    <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                    </svg>
                    به‌روزرسانی پایه
                </button>
            </div>
        </form>
    </div>


</main>
</div>
@endsection
