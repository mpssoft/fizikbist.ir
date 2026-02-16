@extends('layouts.admin.master')

@section('content')
<div class="bg-gradient-to-br from-indigo-50 to-sky-50 dark:from-gray-900 dark:to-slate-900 min-h-screen py-8 px-4">
<div class="max-w-5xl mx-auto space-y-8">
    <!-- Header -->
    <div class="bg-white/90 dark:bg-gray-800/90 backdrop-blur rounded-2xl shadow-xl border border-indigo-100 dark:border-gray-700 overflow-hidden">
        <div class="p-8">
            <nav class="flex items-center text-sm text-gray-500 dark:text-gray-400 mb-6 gap-2" aria-label="Breadcrumb">
                <a href="/admin/home" class="hover:text-gray-700 dark:hover:text-gray-200 transition-colors">داشبورد</a>
                <span class="text-gray-300">/</span>
                <a href="/admin/licenses" class="hover:text-gray-700 dark:hover:text-gray-200 transition-colors">مجوزها</a>
                <span class="text-gray-300">/</span>
                <a href="/admin/licenses/1" class="hover:text-gray-700 dark:hover:text-gray-200 transition-colors">مجوز #1</a>
                <span class="text-gray-300">/</span>
                <span class="text-gray-700 dark:text-gray-300 font-medium">ویرایش</span>
            </nav>

            <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4">
                <div class="flex items-center gap-4">
                    <div class="w-16 h-16 rounded-2xl bg-gradient-to-br from-blue-600 to-indigo-600 shadow-lg flex items-center justify-center">
                        <i class="fas fa-edit text-white text-2xl"></i>
                    </div>
                    <div>
                        <h1 class="text-2xl md:text-3xl font-extrabold text-gray-900 dark:text-white">ویرایش مجوز</h1>
                        <p class="text-gray-600 dark:text-gray-300">ویرایش اطلاعات و تنظیمات مجوز SpotPlayer</p>
                    </div>
                </div>

                <div class="flex items-center gap-2">
                    <a href="/admin/licenses/1"
                       class="px-4 py-2 rounded-xl border-2 border-gray-300 dark:border-gray-600 text-gray-700 dark:text-gray-300 font-semibold hover:bg-gray-50 dark:hover:bg-gray-700 transition">
                        لغو
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- Edit Form -->
    <form method="POST" action="/admin/licenses/1/update" class="space-y-8">
        <!-- User & Course Selection -->
        <div class="bg-white dark:bg-gray-800 rounded-2xl shadow-xl border border-indigo-100 dark:border-gray-700 overflow-hidden">
            <div class="p-8 space-y-8">
                <div class="flex items-center gap-3">
                    <div class="w-10 h-10 rounded-xl bg-gradient-to-br from-emerald-500 to-teal-600 text-white flex items-center justify-center font-bold">👤</div>
                    <h2 class="text-xl font-semibold text-gray-800 dark:text-white">کاربر و دوره</h2>
                </div>

                <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                    <!-- User Selection -->
                    <div class="space-y-4">
                        <label for="user_id" class="block text-sm font-medium text-gray-700 dark:text-gray-300">انتخاب کاربر *</label>
                        <div class="relative">
                            <select id="user_id" name="user_id" required
                                    class="w-full px-4 py-3 rounded-xl border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100 focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500">
                                <option value="">انتخاب کاربر...</option>
                               @foreach(\App\Models\User::all() as $user)
                                    <option value="{{$user->id}}" {{$license->user_id==$user->id? 'selected':''}}>{{$user->name}}</option>

                               @endforeach
                            </select>
                            <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                <i class="fas fa-chevron-down text-gray-400"></i>
                            </div>
                        </div>
                        <div class="text-xs text-gray-500 dark:text-gray-400">
                            کاربر فعلی: {{$license->user->name}} (ID: {{$license->user->id}})
                        </div>
                    </div>

                    <!-- Order Selection -->
                  {{--  <div class="space-y-4">
                        <label for="order_id" class="block text-sm font-medium text-gray-700 dark:text-gray-300">سفارش مرتبط *</label>
                        <div class="relative">
                            <select id="order_id" name="order_id" required
                                    class="w-full px-4 py-3 rounded-xl border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100 focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500">
                                <option value="">انتخاب سفارش...</option>
                                <option value="1001" selected>سفارش #1001 - ۲,۵۰۰,۰۰۰ تومان</option>
                                <option value="1002">سفارش #1002 - ۱,۸۰۰,۰۰۰ تومان</option>
                                <option value="1003">سفارش #1003 - ۳,۲۰۰,۰۰۰ تومان</option>
                            </select>
                            <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                <i class="fas fa-chevron-down text-gray-400"></i>
                            </div>
                        </div>
                    </div>--}}

                    <!-- Course Selection -->
                    <div class="space-y-4">
                        <label for="course_id" class="block text-sm font-medium text-gray-700 dark:text-gray-300">دوره اصلی *</label>
                        <div class="relative">
                            <select id="course_id" name="course_id" required
                                    class="w-full px-4 py-3 rounded-xl border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100 focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500">
                                <option value="">انتخاب دوره...</option>
                               @foreach(\App\Models\Course::all() as $course)
                                    <option value="{{$course->id}}">{{$course->title}}</option>
                               @endforeach
                            </select>
                            <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                <i class="fas fa-chevron-down text-gray-400"></i>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <!-- SpotPlayer Configuration -->
        <div class="bg-white dark:bg-gray-800 rounded-2xl shadow-xl border border-indigo-100 dark:border-gray-700 overflow-hidden">
            <div class="p-8 space-y-8">
                <div class="flex items-center gap-3">
                    <div class="w-10 h-10 rounded-xl bg-gradient-to-br from-purple-600 to-pink-600 text-white flex items-center justify-center font-bold">🎬</div>
                    <h2 class="text-xl font-semibold text-gray-800 dark:text-white">تنظیمات SpotPlayer</h2>
                </div>

                <!-- Device Permissions -->
                <div class="space-y-6">
                    <div class="text-lg font-semibold text-gray-800 dark:text-white mb-4">مجوزهای دستگاه (Device Permissions)</div>

                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                        <!-- All Devices (p0) -->
                        <div class="bg-gradient-to-br from-indigo-50 to-blue-50 dark:from-indigo-900/20 dark:to-blue-900/20 rounded-xl p-6 border border-indigo-200 dark:border-indigo-700">
                            <div class="flex items-center gap-3 mb-4">
                                <div class="w-10 h-10 rounded-lg bg-indigo-600 text-white flex items-center justify-center">
                                    <i class="fas fa-devices"></i>
                                </div>
                                <div>
                                    <div class="font-semibold text-gray-900 dark:text-white">همه دستگاه‌ها</div>
                                    <div class="text-xs text-gray-500 dark:text-gray-400">All Devices (p0)</div>
                                </div>
                            </div>
                            <div class="space-y-3">
                                <label for="p0" class="block text-sm font-medium text-gray-700 dark:text-gray-300">تعداد مجاز (1-99)</label>
                                <input type="number" id="p0" name="device[p0]" value="1" min="0" max="99"
                                       class="w-full px-3 py-2 rounded-lg border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100 focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500">
                            </div>
                        </div>

                        <!-- Windows (p1) -->
                        <div class="bg-gradient-to-br from-blue-50 to-cyan-50 dark:from-blue-900/20 dark:to-cyan-900/20 rounded-xl p-6 border border-blue-200 dark:border-blue-700">
                            <div class="flex items-center gap-3 mb-4">
                                <div class="w-10 h-10 rounded-lg bg-blue-600 text-white flex items-center justify-center">
                                    <i class="fab fa-windows"></i>
                                </div>
                                <div>
                                    <div class="font-semibold text-gray-900 dark:text-white">ویندوز</div>
                                    <div class="text-xs text-gray-500 dark:text-gray-400">Windows (p1)</div>
                                </div>
                            </div>
                            <div class="space-y-3">
                                <label for="p1" class="block text-sm font-medium text-gray-700 dark:text-gray-300">تعداد مجاز (0-99)</label>
                                <input type="number" id="p1" name="device[p1]" value="1" min="0" max="99"
                                       class="w-full px-3 py-2 rounded-lg border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100 focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                            </div>
                        </div>

                        <!-- MacOS (p2) -->
                        <div class="bg-gradient-to-br from-gray-50 to-slate-50 dark:from-gray-900/20 dark:to-slate-900/20 rounded-xl p-6 border border-gray-200 dark:border-gray-700">
                            <div class="flex items-center gap-3 mb-4">
                                <div class="w-10 h-10 rounded-lg bg-gray-600 text-white flex items-center justify-center">
                                    <i class="fab fa-apple"></i>
                                </div>
                                <div>
                                    <div class="font-semibold text-gray-900 dark:text-white">مک‌اواس</div>
                                    <div class="text-xs text-gray-500 dark:text-gray-400">MacOS (p2)</div>
                                </div>
                            </div>
                            <div class="space-y-3">
                                <label for="p2" class="block text-sm font-medium text-gray-700 dark:text-gray-300">تعداد مجاز (0-99)</label>
                                <input type="number" id="p2" name="device[p2]" value="0" min="0" max="99"
                                       class="w-full px-3 py-2 rounded-lg border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100 focus:ring-2 focus:ring-gray-500 focus:border-gray-500">
                            </div>
                        </div>

                        <!-- Ubuntu (p3) -->
                        <div class="bg-gradient-to-br from-orange-50 to-red-50 dark:from-orange-900/20 dark:to-red-900/20 rounded-xl p-6 border border-orange-200 dark:border-orange-700">
                            <div class="flex items-center gap-3 mb-4">
                                <div class="w-10 h-10 rounded-lg bg-orange-600 text-white flex items-center justify-center">
                                    <i class="fab fa-ubuntu"></i>
                                </div>
                                <div>
                                    <div class="font-semibold text-gray-900 dark:text-white">اوبونتو</div>
                                    <div class="text-xs text-gray-500 dark:text-gray-400">Ubuntu (p3)</div>
                                </div>
                            </div>
                            <div class="space-y-3">
                                <label for="p3" class="block text-sm font-medium text-gray-700 dark:text-gray-300">تعداد مجاز (0-99)</label>
                                <input type="number" id="p3" name="device[p3]" value="0" min="0" max="99"
                                       class="w-full px-3 py-2 rounded-lg border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100 focus:ring-2 focus:ring-orange-500 focus:border-orange-500">
                            </div>
                        </div>

                        <!-- Android (p4) -->
                        <div class="bg-gradient-to-br from-green-50 to-emerald-50 dark:from-green-900/20 dark:to-emerald-900/20 rounded-xl p-6 border border-green-200 dark:border-green-700">
                            <div class="flex items-center gap-3 mb-4">
                                <div class="w-10 h-10 rounded-lg bg-green-600 text-white flex items-center justify-center">
                                    <i class="fab fa-android"></i>
                                </div>
                                <div>
                                    <div class="font-semibold text-gray-900 dark:text-white">اندروید</div>
                                    <div class="text-xs text-gray-500 dark:text-gray-400">Android (p4)</div>
                                </div>
                            </div>
                            <div class="space-y-3">
                                <label for="p4" class="block text-sm font-medium text-gray-700 dark:text-gray-300">تعداد مجاز (0-99)</label>
                                <input type="number" id="p4" name="device[p4]" value="0" min="0" max="99"
                                       class="w-full px-3 py-2 rounded-lg border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100 focus:ring-2 focus:ring-green-500 focus:border-green-500">
                            </div>
                        </div>

                        <!-- iOS (p5) -->
                        <div class="bg-gradient-to-br from-blue-50 to-indigo-50 dark:from-blue-900/20 dark:to-indigo-900/20 rounded-xl p-6 border border-blue-200 dark:border-blue-700">
                            <div class="flex items-center gap-3 mb-4">
                                <div class="w-10 h-10 rounded-lg bg-blue-500 text-white flex items-center justify-center">
                                    <i class="fab fa-apple"></i>
                                </div>
                                <div>
                                    <div class="font-semibold text-gray-900 dark:text-white">آی‌اواس</div>
                                    <div class="text-xs text-gray-500 dark:text-gray-400">iOS (p5)</div>
                                </div>
                            </div>
                            <div class="space-y-3">
                                <label for="p5" class="block text-sm font-medium text-gray-700 dark:text-gray-300">تعداد مجاز (0-99)</label>
                                <input type="number" id="p5" name="device[p5]" value="0" min="0" max="99"
                                       class="w-full px-3 py-2 rounded-lg border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100 focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                            </div>
                        </div>

                        <!-- WebApp (p6) -->
                        <div class="bg-gradient-to-br from-purple-50 to-pink-50 dark:from-purple-900/20 dark:to-pink-900/20 rounded-xl p-6 border border-purple-200 dark:border-purple-700">
                            <div class="flex items-center gap-3 mb-4">
                                <div class="w-10 h-10 rounded-lg bg-purple-600 text-white flex items-center justify-center">
                                    <i class="fas fa-globe"></i>
                                </div>
                                <div>
                                    <div class="font-semibold text-gray-900 dark:text-white">وب‌اپ</div>
                                    <div class="text-xs text-gray-500 dark:text-gray-400">WebApp (p6)</div>
                                </div>
                            </div>
                            <div class="space-y-3">
                                <label for="p6" class="block text-sm font-medium text-gray-700 dark:text-gray-300">تعداد مجاز (0-99)</label>
                                <input type="number" id="p6" name="device[p6]" value="0" min="0" max="99"
                                       class="w-full px-3 py-2 rounded-lg border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100 focus:ring-2 focus:ring-purple-500 focus:border-purple-500">
                            </div>
                        </div>
                    </div>

                    <div class="bg-amber-50 dark:bg-amber-900/20 border border-amber-200 dark:border-amber-700 rounded-xl p-4">
                        <div class="flex items-start gap-3">
                            <i class="fas fa-info-circle text-amber-600 dark:text-amber-400 mt-0.5"></i>
                            <div class="text-sm text-amber-800 dark:text-amber-200">
                                <div class="font-medium mb-1">نکات مهم:</div>
                                <ul class="space-y-1 text-xs">
                                    <li>• p0 (همه دستگاه‌ها) کنترل کلی تعداد دستگاه‌های مجاز است</li>
                                    <li>• مقدار 0 به معنای عدم دسترسی برای آن پلتفرم است</li>
                                    <li>• مقادیر بین 1 تا 99 تعداد دستگاه‌های مجاز را مشخص می‌کند</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Data Limits -->
        <div class="bg-white dark:bg-gray-800 rounded-2xl shadow-xl border border-indigo-100 dark:border-gray-700 overflow-hidden">
            <div class="p-8 space-y-8">
                <div class="flex items-center gap-3">
                    <div class="w-10 h-10 rounded-xl bg-gradient-to-br from-red-500 to-pink-600 text-white flex items-center justify-center font-bold">📊</div>
                    <h2 class="text-xl font-semibold text-gray-800 dark:text-white">محدودیت‌های داده (Data Limits)</h2>
                </div>

                <div class="space-y-6">
                    <div class="bg-blue-50 dark:bg-blue-900/20 border border-blue-200 dark:border-blue-700 rounded-xl p-4">
                        <div class="flex items-start gap-3">
                            <i class="fas fa-info-circle text-blue-600 dark:text-blue-400 mt-0.5"></i>
                            <div class="text-sm text-blue-800 dark:text-blue-200">
                                <div class="font-medium mb-1">فرمت محدودیت داده:</div>
                                <div class="text-xs">
                                    برای هر Course ID، محدودیت را به فرمت "شروع-پایان" وارد کنید. مثال: "0-" (بدون محدودیت) یا "0-100" (محدود به 100 واحد)
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                        <!-- Course ID 1 -->
                        <div class="bg-gradient-to-br from-indigo-50 to-blue-50 dark:from-indigo-900/20 dark:to-blue-900/20 rounded-xl p-6 border border-indigo-200 dark:border-indigo-700">
                            <div class="space-y-4">
                                <div class="flex items-center gap-3">
                                    <div class="w-8 h-8 rounded-lg bg-indigo-600 text-white flex items-center justify-center text-sm font-bold">15</div>
                                    <div>
                                        <div class="font-semibold text-gray-900 dark:text-white">دوره پایتون پیشرفته</div>
                                        <div class="text-xs text-gray-500 dark:text-gray-400">Course ID: 15</div>
                                    </div>
                                </div>
                                <div class="space-y-2">
                                    <label for="limit_15" class="block text-sm font-medium text-gray-700 dark:text-gray-300">محدودیت داده</label>
                                    <input type="text" id="limit_15" name="data[limit][15]" value="0-" placeholder="0- یا 0-100"
                                           class="w-full px-3 py-2 rounded-lg border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100 focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 font-mono">
                                    <div class="text-xs text-gray-500 dark:text-gray-400">فعلی: بدون محدودیت</div>
                                </div>
                            </div>
                        </div>

                        <!-- Course ID 2 -->
                        <div class="bg-gradient-to-br from-emerald-50 to-teal-50 dark:from-emerald-900/20 dark:to-teal-900/20 rounded-xl p-6 border border-emerald-200 dark:border-emerald-700">
                            <div class="space-y-4">
                                <div class="flex items-center gap-3">
                                    <div class="w-8 h-8 rounded-lg bg-emerald-600 text-white flex items-center justify-center text-sm font-bold">16</div>
                                    <div>
                                        <div class="font-semibold text-gray-900 dark:text-white">پروژه عملی پایتون</div>
                                        <div class="text-xs text-gray-500 dark:text-gray-400">Course ID: 16</div>
                                    </div>
                                </div>
                                <div class="space-y-2">
                                    <label for="limit_16" class="block text-sm font-medium text-gray-700 dark:text-gray-300">محدودیت داده</label>
                                    <input type="text" id="limit_16" name="data[limit][16]" value="0-50" placeholder="0- یا 0-100"
                                           class="w-full px-3 py-2 rounded-lg border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100 focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 font-mono">
                                    <div class="text-xs text-gray-500 dark:text-gray-400">فعلی: محدود به 50 واحد</div>
                                </div>
                            </div>
                        </div>

                        <!-- Course ID 3 -->
                        <div class="bg-gradient-to-br from-amber-50 to-orange-50 dark:from-amber-900/20 dark:to-orange-900/20 rounded-xl p-6 border border-amber-200 dark:border-amber-700">
                            <div class="space-y-4">
                                <div class="flex items-center gap-3">
                                    <div class="w-8 h-8 rounded-lg bg-amber-600 text-white flex items-center justify-center text-sm font-bold">17</div>
                                    <div>
                                        <div class="font-semibold text-gray-900 dark:text-white">منابع اضافی</div>
                                        <div class="text-xs text-gray-500 dark:text-gray-400">Course ID: 17</div>
                                    </div>
                                </div>
                                <div class="space-y-2">
                                    <label for="limit_17" class="block text-sm font-medium text-gray-700 dark:text-gray-300">محدودیت داده</label>
                                    <input type="text" id="limit_17" name="data[limit][17]" value="0-" placeholder="0- یا 0-100"
                                           class="w-full px-3 py-2 rounded-lg border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100 focus:ring-2 focus:ring-amber-500 focus:border-amber-500 font-mono">
                                    <div class="text-xs text-gray-500 dark:text-gray-400">فعلی: بدون محدودیت</div>
                                </div>
                            </div>
                        </div>

                        <!-- Add New Course Limit -->
                        <div class="bg-gradient-to-br from-gray-50 to-slate-50 dark:from-gray-900/20 dark:to-slate-900/20 rounded-xl p-6 border-2 border-dashed border-gray-300 dark:border-gray-600">
                            <div class="space-y-4">
                                <div class="flex items-center gap-3">
                                    <div class="w-8 h-8 rounded-lg bg-gray-400 text-white flex items-center justify-center">
                                        <i class="fas fa-plus text-sm"></i>
                                    </div>
                                    <div>
                                        <div class="font-semibold text-gray-700 dark:text-gray-300">افزودن محدودیت جدید</div>
                                        <div class="text-xs text-gray-500 dark:text-gray-400">برای Course ID جدید</div>
                                    </div>
                                </div>
                                <div class="grid grid-cols-2 gap-3">
                                    <div class="space-y-2">
                                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Course ID</label>
                                        <input type="text" id="new_course_id" placeholder="مثال: 18"
                                               class="w-full px-3 py-2 rounded-lg border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100 focus:ring-2 focus:ring-gray-500 focus:border-gray-500">
                                    </div>
                                    <div class="space-y-2">
                                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">محدودیت</label>
                                        <input type="text" id="new_course_limit" placeholder="0- یا 0-100"
                                               class="w-full px-3 py-2 rounded-lg border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100 focus:ring-2 focus:ring-gray-500 focus:border-gray-500 font-mono">
                                    </div>
                                </div>
                                <button type="button" onclick="addNewCourseLimit()"
                                        class="w-full px-4 py-2 rounded-lg border-2 border-gray-300 text-gray-700 hover:bg-gray-50 transition text-sm">
                                    <i class="fas fa-plus ml-1"></i>
                                    افزودن
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- License Settings -->
        <div class="bg-white dark:bg-gray-800 rounded-2xl shadow-xl border border-indigo-100 dark:border-gray-700 overflow-hidden">
            <div class="p-8 space-y-8">
                <div class="flex items-center gap-3">
                    <div class="w-10 h-10 rounded-xl bg-gradient-to-br from-amber-500 to-orange-600 text-white flex items-center justify-center font-bold">⚙️</div>
                    <h2 class="text-xl font-semibold text-gray-800 dark:text-white">تنظیمات مجوز</h2>
                </div>

                <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                    <!-- Status -->
                    <div class="space-y-4">
                        <label for="status" class="block text-sm font-medium text-gray-700 dark:text-gray-300">وضعیت مجوز *</label>
                        <div class="relative">
                            <select id="status" name="status" required
                                    class="w-full px-4 py-3 rounded-xl border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100 focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500">
                                <option value="active" selected>فعال</option>
                                <option value="inactive">غیرفعال</option>
                                <option value="expired">منقضی</option>
                                <option value="suspended">معلق</option>
                            </select>
                            <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                <i class="fas fa-chevron-down text-gray-400"></i>
                            </div>
                        </div>
                    </div>

                    <!-- Expiry Date -->
                    <div class="space-y-4">
                        <label for="expires_at" class="block text-sm font-medium text-gray-700 dark:text-gray-300">تاریخ انقضا</label>
                        <input type="date" id="expires_at" name="expires_at" value="2025-09-05"
                               class="w-full px-4 py-3 rounded-xl border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100 focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500">
                        <div class="text-xs text-gray-500 dark:text-gray-400">
                            خالی بگذارید برای مجوز بدون انقضا
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Advanced Settings (Collapsible) -->
        <div class="bg-white dark:bg-gray-800 rounded-2xl shadow-xl border border-indigo-100 dark:border-gray-700 overflow-hidden">
            <div class="form-section expanded" id="advancedSection">
                <div class="p-6 border-b border-gray-200 dark:border-gray-700 cursor-pointer" onclick="toggleSection('advancedSection')">
                    <div class="flex items-center justify-between">
                        <div class="flex items-center gap-3">
                            <div class="w-10 h-10 rounded-xl bg-gradient-to-br from-slate-600 to-gray-700 text-white flex items-center justify-center font-bold">🔧</div>
                            <h2 class="text-xl font-semibold text-gray-800 dark:text-white">تنظیمات پیشرفته</h2>
                        </div>
                        <i class="fas fa-chevron-down text-gray-400 transition-transform" id="advancedChevron"></i>
                    </div>
                </div>

                <div class="p-8 space-y-6">
                    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                        <!-- Custom Notes -->
                        <div class="space-y-4 lg:col-span-2">
                            <label for="notes" class="block text-sm font-medium text-gray-700 dark:text-gray-300">یادداشت‌های اضافی</label>
                            <textarea id="notes" name="notes" rows="4" placeholder="یادداشت‌های مربوط به این مجوز..."
                                      class="w-full px-4 py-3 rounded-xl border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100 focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 resize-none">مجوز ویژه برای کاربر VIP - دسترسی کامل به تمام محتوا</textarea>
                        </div>

                        <!-- Auto Renewal -->
                        <div class="space-y-4">
                            <label class="flex items-center gap-3">
                                <input type="checkbox" name="auto_renewal" value="1"
                                       class="w-4 h-4 text-indigo-600 border-gray-300 rounded focus:ring-indigo-500">
                                <div>
                                    <div class="text-sm font-medium text-gray-900 dark:text-white">تمدید خودکار</div>
                                    <div class="text-xs text-gray-500 dark:text-gray-400">تمدید خودکار در صورت پرداخت</div>
                                </div>
                            </label>
                        </div>

                        <!-- Send Notifications -->
                        <div class="space-y-4">
                            <label class="flex items-center gap-3">
                                <input type="checkbox" name="send_notifications" value="1" checked
                                       class="w-4 h-4 text-indigo-600 border-gray-300 rounded focus:ring-indigo-500">
                                <div>
                                    <div class="text-sm font-medium text-gray-900 dark:text-white">ارسال اعلان‌ها</div>
                                    <div class="text-xs text-gray-500 dark:text-gray-400">اعلان انقضا و تغییرات</div>
                                </div>
                            </label>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Form Actions -->
        <div class="bg-white dark:bg-gray-800 rounded-2xl shadow-xl border border-indigo-100 dark:border-gray-700 px-8 py-6">
            <div class="flex flex-col md:flex-row items-start md:items-center justify-between gap-4">
                <div class="text-sm text-gray-600 dark:text-gray-300">
                    <i class="fas fa-info-circle ml-1"></i>
                    تغییرات پس از ذخیره به SpotPlayer ارسال خواهد شد
                </div>
                <div class="flex items-center gap-3">
                    <a href="/admin/licenses/1"
                       class="px-6 py-3 rounded-xl border-2 border-gray-300 dark:border-gray-600 text-gray-700 dark:text-gray-300 font-semibold hover:bg-gray-50 dark:hover:bg-gray-700 transition">
                        لغو
                    </a>
                    <button type="submit"
                            class="px-6 py-3 rounded-xl bg-gradient-to-r from-emerald-600 to-teal-600 text-white font-semibold hover:from-emerald-700 hover:to-teal-700 hover:shadow-lg transition-all">
                        <i class="fas fa-save ml-2"></i>
                        ذخیره تغییرات
                    </button>
                </div>
            </div>
        </div>
    </form>
</div>
</div>
@endsection
@push('scripts')
<script>
    function copyToClipboard(text) {
        navigator.clipboard.writeText(text).then(function() {
            // Show success feedback
            const button = event.target.closest('button');
            const icon = button.querySelector('i');
            const originalClass = icon.className;

            icon.className = 'fas fa-check text-emerald-500';

            setTimeout(() => {
                icon.className = originalClass;
            }, 2000);
        });
    }

    function toggleSection(sectionId) {
        const section = document.getElementById(sectionId);
        const chevron = document.getElementById(sectionId.replace('Section', 'Chevron'));

        if (section.classList.contains('expanded')) {
            section.classList.remove('expanded');
            section.classList.add('collapsed');
            chevron.style.transform = 'rotate(-90deg)';
        } else {
            section.classList.remove('collapsed');
            section.classList.add('expanded');
            chevron.style.transform = 'rotate(0deg)';
        }
    }

    // Form validation
    document.querySelector('form').addEventListener('submit', function(e) {
        const requiredFields = ['user_id', 'order_id', 'course_id', 'status'];
        let isValid = true;

        requiredFields.forEach(fieldName => {
            const field = document.querySelector(`[name="${fieldName}"]`);
            if (!field.value.trim()) {
                isValid = false;
                field.classList.add('border-red-500');
                field.focus();
            } else {
                field.classList.remove('border-red-500');
            }
        });

        if (!isValid) {
            e.preventDefault();
            alert('لطفاً تمام فیلدهای ضروری را پر کنید');
        }
    });

    // Add new course limit functionality
    function addNewCourseLimit() {
        const courseId = document.getElementById('new_course_id').value.trim();
        const courseLimit = document.getElementById('new_course_limit').value.trim();

        if (!courseId || !courseLimit) {
            alert('لطفاً هر دو فیلد Course ID و محدودیت را پر کنید');
            return;
        }

        // Check if course ID already exists
        if (document.querySelector(`input[name="data[limit][${courseId}]"]`)) {
            alert('این Course ID قبلاً اضافه شده است');
            return;
        }

        // Create new course limit card
        const newCourseCard = document.createElement('div');
        newCourseCard.className = 'bg-gradient-to-br from-violet-50 to-purple-50 dark:from-violet-900/20 dark:to-purple-900/20 rounded-xl p-6 border border-violet-200 dark:border-violet-700';
        newCourseCard.innerHTML = `
        <div class="space-y-4">
          <div class="flex items-center justify-between">
            <div class="flex items-center gap-3">
              <div class="w-8 h-8 rounded-lg bg-violet-600 text-white flex items-center justify-center text-sm font-bold">${courseId}</div>
              <div>
                <div class="font-semibold text-gray-900 dark:text-white">دوره جدید</div>
                <div class="text-xs text-gray-500 dark:text-gray-400">Course ID: ${courseId}</div>
              </div>
            </div>
            <button type="button" onclick="this.closest('.bg-gradient-to-br').remove()"
                    class="text-red-500 hover:text-red-700 transition">
              <i class="fas fa-times"></i>
            </button>
          </div>
          <div class="space-y-2">
            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">محدودیت داده</label>
            <input type="text" name="data[limit][${courseId}]" value="${courseLimit}"
                   class="w-full px-3 py-2 rounded-lg border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100 focus:ring-2 focus:ring-violet-500 focus:border-violet-500 font-mono">
            <div class="text-xs text-gray-500 dark:text-gray-400">جدید: ${courseLimit}</div>
          </div>
        </div>
      `;

        // Insert before the "Add New" card
        const addNewCard = document.querySelector('.border-dashed').parentElement;
        addNewCard.parentElement.insertBefore(newCourseCard, addNewCard);

        // Clear the input fields
        document.getElementById('new_course_id').value = '';
        document.getElementById('new_course_limit').value = '';

        // Show success message
        const button = document.querySelector('button[onclick="addNewCourseLimit()"]');
        const originalText = button.innerHTML;
        button.innerHTML = '<i class="fas fa-check ml-1"></i>اضافه شد!';
        button.classList.add('bg-emerald-50', 'border-emerald-300', 'text-emerald-700');

        setTimeout(() => {
            button.innerHTML = originalText;
            button.classList.remove('bg-emerald-50', 'border-emerald-300', 'text-emerald-700');
        }, 2000);
    }

    // Auto-save draft (optional)
    let saveTimeout;
    document.querySelectorAll('input, select, textarea').forEach(field => {
        field.addEventListener('input', function() {
            clearTimeout(saveTimeout);
            saveTimeout = setTimeout(() => {
                // Auto-save logic here
                console.log('Auto-saving draft...');
            }, 2000);
        });
    });
</script>
@endpush
