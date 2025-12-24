
@extends('layouts.admin.master')

@section('content')
<div class="min-h-screen bg-gray-50 dark:bg-gray-900 text-gray-900 dark:text-gray-100 transition-colors duration-300">

<!-- Sidebar -->
<div class="fixed inset-y-0 right-0 z-50 w-64 bg-white dark:bg-gray-800 shadow-lg transform translate-x-full lg:translate-x-0 transition-transform duration-300" id="sidebar">
    <div class="flex items-center justify-center h-16 bg-blue-600 dark:bg-blue-700">
        <div class="flex items-center gap-2">
            <div class="w-8 h-8 bg-white rounded-lg flex items-center justify-center">
                <i class="fas fa-cog text-blue-600"></i>
            </div>
            <span class="text-white font-bold text-lg">پنل مدیریت</span>
        </div>
    </div>


</div>

<!-- Main Content -->
<div class="lg:mr-64">
    <!-- Main Content Area -->
    <main class="p-6">
        <div class="max-w-4xl mx-auto">
            <!-- Header Card -->
            <div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm border border-gray-200 dark:border-gray-700 mb-6">
                <div class="flex items-center justify-between p-6">
                    <div class="flex items-center gap-4">
                        <button onclick="toggleSidebar()" class="lg:hidden p-2 rounded-lg hover:bg-gray-100 dark:hover:bg-gray-700 transition-colors">
                            <i class="fas fa-bars text-lg"></i>
                        </button>

                        <div>
                            <h1 class="text-2xl font-bold text-gray-900 dark:text-gray-100 flex items-center gap-3">
                                <i class="fas fa-plus-circle text-blue-600 dark:text-blue-400"></i>
                                ایجاد دسته‌بندی جدید
                            </h1>
                            <p class="text-sm text-gray-600 dark:text-gray-400 mt-1">دسته‌بندی جدیدی برای سازماندهی محتوا اضافه کنید</p>
                        </div>
                    </div>

                    <div class="flex items-center gap-4">
                        <button onclick="toggleDarkMode()" class="p-2 rounded-lg hover:bg-gray-100 dark:hover:bg-gray-700 transition-colors">
                            <i id="sun-icon" class="fas fa-sun hidden dark:block"></i>
                            <i id="moon-icon" class="fas fa-moon block dark:hidden"></i>
                        </button>

                        <div class="flex items-center gap-3">
                            <img src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?w=40&h=40&fit=crop&crop=face&auto=format"
                                 alt="مدیر" class="w-10 h-10 rounded-full object-cover">
                            <div class="hidden sm:block">
                                <div class="text-sm font-medium text-gray-900 dark:text-gray-100">علی احمدی</div>
                                <div class="text-xs text-gray-600 dark:text-gray-400">مدیر سیستم</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Form Card -->
            <div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm border border-gray-200 dark:border-gray-700">
                <div class="p-6 border-b border-gray-200 dark:border-gray-700">
                    <h2 class="text-xl font-semibold text-gray-900 dark:text-gray-100 flex items-center gap-2">
                        <i class="fas fa-info-circle text-blue-600 dark:text-blue-400"></i>
                        اطلاعات دسته‌بندی
                    </h2>
                    <p class="text-sm text-gray-600 dark:text-gray-400 mt-1">فرم زیر را برای ایجاد دسته‌بندی جدید تکمیل کنید</p>
                </div>

                <form onsubmit="handleSubmit(event)" class="p-6 space-y-6">
                    <!-- Category Name -->
                    <div>
                        <label for="categoryName" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2 flex items-center gap-2">
                            <i class="fas fa-tag text-blue-600 dark:text-blue-400"></i>
                            نام دسته‌بندی *
                        </label>
                        <input
                            type="text"
                            id="categoryName"
                            name="categoryName"
                            required
                            class="w-full px-4 py-3 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:text-gray-100 transition-colors"
                            placeholder="نام دسته‌بندی را وارد کنید"
                        >
                        <p class="text-xs text-gray-500 dark:text-gray-400 mt-1">این نام به عنوان عنوان دسته‌بندی نمایش داده می‌شود</p>
                    </div>

                    <!-- Description -->
                    <div>
                        <label for="categoryDescription" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2 flex items-center gap-2">
                            <i class="fas fa-align-left text-purple-600 dark:text-purple-400"></i>
                            توضیحات
                        </label>
                        <textarea
                            id="categoryDescription"
                            name="categoryDescription"
                            rows="4"
                            class="w-full px-4 py-3 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:text-gray-100 transition-colors resize-none"
                            placeholder="توضیح مختصری از این دسته‌بندی وارد کنید"
                        ></textarea>
                        <p class="text-xs text-gray-500 dark:text-gray-400 mt-1">توضیحات اختیاری برای کمک به کاربران در درک این دسته‌بندی</p>
                    </div>

                    <!-- Form Actions -->
                    <div class="flex justify-center pt-6 border-t border-gray-200 dark:border-gray-700">
                        <button
                            type="submit"
                            class="px-8 py-3 bg-blue-600 hover:bg-blue-700 text-white rounded-lg font-medium transition-colors flex items-center gap-2"
                        >
                            <i class="fas fa-plus"></i>
                            ایجاد دسته‌بندی
                        </button>
                    </div>
                </form>
            </div>


        </div>
    </main>
</div>

<!-- Success Modal -->
<div id="successModal" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50 hidden">
    <div class="bg-white dark:bg-gray-800 rounded-xl p-6 max-w-md mx-4 shadow-xl">
        <div class="text-center">
            <div class="w-16 h-16 bg-green-100 dark:bg-green-900/30 rounded-full flex items-center justify-center mx-auto mb-4">
                <i class="fas fa-check-circle text-3xl text-green-600 dark:text-green-400"></i>
            </div>
            <h3 class="text-lg font-semibold text-gray-900 dark:text-gray-100 mb-2">دسته‌بندی با موفقیت ایجاد شد!</h3>
            <p class="text-gray-600 dark:text-gray-400 mb-6">دسته‌بندی جدید شما ایجاد شده و اکنون در دسترس است.</p>
            <div class="flex gap-3 justify-center">
                <button onclick="closeModal()" class="px-4 py-2 border border-gray-300 dark:border-gray-600 text-gray-700 dark:text-gray-300 rounded-lg hover:bg-gray-50 dark:hover:bg-gray-700 transition-colors flex items-center gap-2">
                    <i class="fas fa-plus"></i>
                    ایجاد دسته‌بندی دیگر
                </button>
                <button onclick="viewCategories()" class="px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white rounded-lg transition-colors flex items-center gap-2">
                    <i class="fas fa-list"></i>
                    مشاهده همه دسته‌بندی‌ها
                </button>
            </div>
        </div>
    </div>
</div>

</div>
@endsection
