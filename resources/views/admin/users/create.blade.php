@extends('layouts.admin.master')
@section('content')
<div class="bg-gradient-to-br from-indigo-50 to-sky-50 dark:from-gray-900 dark:to-slate-900 min-h-screen py-8 px-4">
<div class="max-w-4xl mx-auto space-y-8">
    <!-- Header -->
    <div class="bg-white/90 dark:bg-gray-800/90 backdrop-blur rounded-2xl shadow-xl border border-indigo-100 dark:border-gray-700 overflow-hidden">
        <div class="p-8">
            <!-- Breadcrumb -->
            <nav class="flex items-center text-sm text-gray-500 dark:text-gray-400 mb-6 gap-2" aria-label="Breadcrumb">
                <a href="/admin/home" class="hover:text-gray-700 dark:hover:text-gray-200 transition-colors">داشبورد</a>
                <span class="text-gray-300">/</span>
                <a href="/admin/users" class="hover:text-gray-700 dark:hover:text-gray-200 transition-colors">فهرست کاربران</a>
                <span class="text-gray-300">/</span>
                <span class="text-gray-700 dark:text-gray-300 font-medium">ایجاد کاربر جدید</span>
            </nav>

            <div class="flex items-center gap-4">
                <div class="w-16 h-16 rounded-2xl bg-gradient-to-br from-emerald-600 to-teal-600 shadow-lg flex items-center justify-center">
                    <svg class="w-8 h-8 text-white" viewBox="0 0 24 24" fill="none" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v12m6-6H6"/>
                    </svg>
                </div>
                <div>
                    <h1 class="text-3xl font-extrabold text-gray-900 dark:text-white">ایجاد کاربر جدید</h1>
                    <p class="text-gray-600 dark:text-gray-300">اطلاعات کاربر را وارد و ذخیره کنید</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Create User Form -->
    <div class="bg-white dark:bg-gray-800 rounded-2xl shadow-xl border border-indigo-100 dark:border-gray-700 overflow-hidden">
        <div class="p-8">
            <form method="POST" action="/admin/users/store" enctype="multipart/form-data" class="space-y-8">
                <!-- Basic Info -->
                <section class="space-y-6">
                    <h2 class="text-xl font-semibold text-gray-800 dark:text-white flex items-center gap-2">
                        <svg class="w-5 h-5 text-indigo-600" viewBox="0 0 24 24" fill="none" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5.121 17.804A9 9 0 1118 5.121M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                        </svg>
                        اطلاعات پایه
                    </h2>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label for="name" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                                <svg class="w-4 h-4 inline-block ml-2 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5.121 17.804A9 9 0 1118 5.121"/>
                                </svg>
                                نام و نام خانوادگی *
                            </label>
                            <input id="name" name="name" type="text" required
                                   placeholder="مثال: علی محمدی"
                                   class="w-full px-4 py-3 rounded-xl border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100 focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500"/>
                        </div>

                        <div>
                            <label for="email" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                                <svg class="w-4 h-4 inline-block ml-2 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 12H8m8 0l-4 4m4-4l-4-4M4 6h16v12a2 2 0 01-2 2H6a2 2 0 01-2-2z"/>
                                </svg>
                                ایمیل *
                            </label>
                            <input id="email" name="email" type="email" required
                                   placeholder="example@mail.com"
                                   class="w-full px-4 py-3 rounded-xl border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100 focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500"/>
                        </div>

                        <div>
                            <label for="password" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                                <svg class="w-4 h-4 inline-block ml-2 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 11c-1.657 0-3-1.343-3-3V6a3 3 0 116 0v2c0 1.657-1.343 3-3 3zM6 11h12v7a2 2 0 01-2 2H8a2 2 0 01-2-2v-7z"/>
                                </svg>
                                رمز عبور *
                            </label>
                            <input id="password" name="password" type="password" required
                                   placeholder="حداقل ۸ کاراکتر"
                                   class="w-full px-4 py-3 rounded-xl border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100 focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500"/>
                        </div>

                        <div>
                            <label for="password_confirmation" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                                <svg class="w-4 h-4 inline-block ml-2 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                                </svg>
                                تکرار رمز عبور *
                            </label>
                            <input id="password_confirmation" name="password_confirmation" type="password" required
                                   placeholder="تکرار رمز عبور"
                                   class="w-full px-4 py-3 rounded-xl border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100 focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500"/>
                        </div>

                        <div>
                            <label for="role" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                                <svg class="w-4 h-4 inline-block ml-2 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13M16.5 5c1.746 0 3.332.477 4.5 1.253v13"/>
                                </svg>
                                نقش *
                            </label>
                            <select id="role" name="role" required
                                    class="w-full px-4 py-3 rounded-xl border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100 focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500">
                                <option value="">انتخاب نقش</option>
                                <option value="admin">مدیر</option>
                                <option value="instructor">مدرس</option>
                                <option value="student">دانشجو</option>
                            </select>
                        </div>

                        <div>
                            <label for="status" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                                <svg class="w-4 h-4 inline-block ml-2 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                </svg>
                                وضعیت *
                            </label>
                            <select id="status" name="status" required
                                    class="w-full px-4 py-3 rounded-xl border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100 focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500">
                                <option value="active">فعال</option>
                                <option value="pending">در انتظار</option>
                                <option value="inactive">غیرفعال</option>
                                <option value="suspended">مسدود</option>
                            </select>
                        </div>

                        <div class="md:col-span-2">
                            <label for="bio" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                                <svg class="w-4 h-4 inline-block ml-2 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h10"/>
                                </svg>
                                بیوگرافی (اختیاری)
                            </label>
                            <textarea id="bio" name="bio" rows="4" placeholder="معرفی کوتاهی از کاربر..."
                                      class="w-full px-4 py-3 rounded-xl border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100 focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500"></textarea>
                        </div>
                    </div>
                </section>

                <!-- Avatar -->
                <section class="space-y-6">
                    <h2 class="text-xl font-semibold text-gray-800 dark:text-white flex items-center gap-2">
                        <svg class="w-5 h-5 text-amber-600" viewBox="0 0 24 24" fill="none" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5.121 17.804A9 9 0 1118 5.121M12 14a5 5 0 00-5 5h10a5 5 0 00-5-5z"/>
                        </svg>
                        تصویر نمایه (اختیاری)
                    </h2>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 items-center">
                        <div>
                            <label for="avatar" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">آپلود تصویر</label>
                            <input id="avatar" name="avatar" type="file" accept="image/*"
                                   class="w-full px-4 py-3 rounded-xl border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100 focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-indigo-50 file:text-indigo-700 hover:file:bg-indigo-100"/>
                            <p class="text-xs text-gray-500 dark:text-gray-400 mt-2">PNG یا JPG تا حداکثر 2MB</p>
                        </div>
                        <div class="flex items-center gap-4">
                            <div class="w-14 h-14 rounded-xl bg-gradient-to-br from-slate-200 to-slate-100 dark:from-gray-700 dark:to-gray-600 text-gray-500 dark:text-gray-300 flex items-center justify-center">
                                بدون تصویر
                            </div>
                            <p class="text-sm text-gray-500 dark:text-gray-400">پس از ذخیره، تصویر بارگذاری‌شده نمایش داده می‌شود.</p>
                        </div>
                    </div>
                </section>

                <!-- Actions -->
                <div class="flex items-center justify-between pt-2">
                    <a href="/admin/users"
                       class="inline-flex items-center gap-2 px-6 py-3 rounded-xl border-2 border-gray-300 dark:border-gray-600 text-gray-700 dark:text-gray-300 font-semibold hover:bg-gray-50 dark:hover:bg-gray-700 transition">
                        <svg class="w-5 h-5" viewBox="0 0 24 24" fill="none" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                        </svg>
                        بازگشت
                    </a>
                    <div class="flex items-center gap-3">
                        <button type="reset"
                                class="px-6 py-3 rounded-xl border-2 border-amber-300 text-amber-700 font-semibold hover:bg-amber-50 transition">
                            پاک کردن فرم
                        </button>
                        <button type="submit"
                                class="px-6 py-3 rounded-xl bg-gradient-to-r from-emerald-600 to-teal-600 text-white font-semibold hover:from-emerald-700 hover:to-teal-700 hover:shadow-lg transition">
                            ایجاد کاربر
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <!-- Helpful note -->
    <p class="text-xs text-gray-500 dark:text-gray-400 text-center">
        پس از ایجاد، می‌توانید نقش‌ها و دسترسی‌های پیشرفته را در صفحه ویرایش کاربر تنظیم کنید.
    </p>
</div>
</div>
@endsection
