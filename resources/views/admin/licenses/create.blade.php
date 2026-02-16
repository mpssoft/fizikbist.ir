@extends('layouts.admin.master')

@section('content')
<div class="bg-gradient-to-br from-indigo-50 to-sky-50 dark:from-gray-900 dark:to-slate-900 min-h-screen py-8 px-4">
<div class="max-w-7xl mx-auto space-y-8">
    <!-- Header -->
    <div class="bg-white/90 dark:bg-gray-800/90 backdrop-blur rounded-2xl shadow-xl border border-indigo-100 dark:border-gray-700 overflow-hidden">
        <div class="p-8">
            <nav class="flex items-center text-sm text-gray-500 dark:text-gray-400 mb-6 gap-2" aria-label="Breadcrumb">
                <a href="/admin/home" class="hover:text-gray-700 dark:hover:text-gray-200 transition-colors">داشبورد</a>
                <span class="text-gray-300">/</span>
                <a href="/admin/licenses" class="hover:text-gray-700 dark:hover:text-gray-200 transition-colors">مجوزها</a>
                <span class="text-gray-300">/</span>
                <span class="text-gray-700 dark:text-gray-300 font-medium">ایجاد جدید</span>
            </nav>

            <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4">
                <div class="flex items-center gap-4">
                    <div class="w-16 h-16 rounded-2xl bg-gradient-to-br from-emerald-600 to-teal-600 shadow-lg flex items-center justify-center">
                        <i class="fas fa-plus text-white text-2xl"></i>
                    </div>
                    <div>
                        <h1 class="text-2xl md:text-3xl font-extrabold text-gray-900 dark:text-white">ایجاد مجوز جدید</h1>
                        <p class="text-gray-600 dark:text-gray-300">ایجاد مجوز SpotPlayer برای کاربر</p>
                    </div>
                </div>

                <div class="flex items-center gap-2">
                    <a href="/admin/licenses"
                       class="px-4 py-2 rounded-xl border-2 border-gray-300 dark:border-gray-600 text-gray-700 dark:text-gray-300 font-semibold hover:bg-gray-50 dark:hover:bg-gray-700 transition">
                        بازگشت
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- Create Form -->
    <form method="post" action="{{route('admin.licenses.store')}}" class="space-y-8">
        <input type="hidden" name="order_id" value="1">
        @csrf
        <!-- Main Form -->
        <div class="bg-white dark:bg-gray-800 rounded-2xl shadow-xl border border-indigo-100 dark:border-gray-700 overflow-hidden">
            <div class="p-8 space-y-8">
                <div class="flex items-center gap-3">
                    <div class="w-10 h-10 rounded-xl bg-gradient-to-br from-blue-600 to-indigo-600 text-white flex items-center justify-center font-bold">📝</div>
                    <h2 class="text-xl font-semibold text-gray-800 dark:text-white">اطلاعات مجوز</h2>
                </div>

                <div class="space-y-8">
                    <!-- User Selection -->
                    <div class="space-y-4">
                        <label for="user_id" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                            انتخاب کاربر *
                        </label>
                        <div class="relative">
                            <select id="user_id" name="user_id" required
                                    class="w-full px-4 py-4 rounded-xl border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100 focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 text-lg">
                                <option value="">انتخاب کاربر...</option>
                                @foreach(\App\Models\User::all() as $user)
                                    <option value="{{$user->id}}">{{$user->name}}</option>
                                @endforeach
                            </select>
                            <div class="absolute inset-y-0 left-0 flex items-center pl-4 pointer-events-none">
                                <i class="fas fa-chevron-down text-gray-400"></i>
                            </div>
                        </div>
                        <div class="text-sm text-gray-500 dark:text-gray-400">
                            <i class="fas fa-info-circle ml-1"></i>
                            کاربری که مجوز برای او صادر می‌شود
                        </div>
                    </div>

                    <!-- Course Selection -->
                    <div class="space-y-4">
                        <label for="course_id" class="block text-sm font-medium text-gray-700 dark:text-gray-300">

                        </label>
                        <div class="relative">
                            <select id="course_id" name="course_id" required
                                    class="w-full px-4 py-4 rounded-xl border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100 focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 text-lg">
                                <option value="">انتخاب دوره...</option>
                                @foreach(\App\Models\Course::all() as $course)
                                    <option value="{{$course->id}}">{{$course->title}}</option>
                                @endforeach
                            </select>
                            <div class="absolute inset-y-0 left-0 flex items-center pl-4 pointer-events-none">
                                <i class="fas fa-chevron-down text-gray-400"></i>
                            </div>
                        </div>
                        <div class="text-sm text-gray-500 dark:text-gray-400">
                            <i class="fas fa-info-circle ml-1"></i>
                            دوره‌ای که کاربر به آن دسترسی خواهد داشت
                        </div>
                    </div>

                    <!-- License Key -->
                    <div class="space-y-4">

                        <label for="license_key" class="flex text-sm font-medium text-gray-700 dark:text-gray-300">
                              <i class="fas fa-key w-5 h-5 flex text-gray-400"></i> License Key *
                        </label>

                        <div class="relative">
                            <textarea  id="spotplayer_key" name="spotplayer_key" required

                                       rows="5"
                                      class="w-full px-4 py-4 pl-12 rounded-xl border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100 focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 font-mono text-sm"></textarea>

                            <button type="button"
                                    class="absolute inset-y-0 left-0 flex items-center pl-4 text-indigo-600 hover:text-indigo-800 transition">

                            </button>
                        </div>
                        <div class="flex items-center justify-between text-sm">
                            <div class="text-gray-500 dark:text-gray-400">
                                <i class="fas fa-info-circle ml-1"></i>
                                کلید منحصر به فرد برای احراز هویت در SpotPlayer
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>


        <!-- Form Actions -->
        <div class="bg-white dark:bg-gray-800 rounded-2xl shadow-xl border border-indigo-100 dark:border-gray-700 px-8 py-6">
            <div class="flex flex-col md:flex-row items-start md:items-center justify-between gap-4">

                <div class="flex items-center gap-3">
                    <button type="submit"
                            class="px-6 py-3 rounded-xl bg-gradient-to-r from-emerald-600 to-teal-600 text-white font-semibold hover:from-emerald-700 hover:to-teal-700 hover:shadow-lg transition-all disabled:opacity-50 disabled:cursor-not-allowed"
                            id="submit-btn" >
                        <i class="fas fa-plus ml-2"></i>
                        ایجاد مجوز
                    </button>
                    <a href="/admin/licenses"
                       class="px-6 py-3 rounded-xl border-2 border-gray-300 dark:border-gray-600 text-gray-700 dark:text-gray-300 font-semibold hover:bg-gray-50 dark:hover:bg-gray-700 transition">
                        لغو
                    </a>

                </div>
            </div>
        </div>
    </form>
</div>
</div>
@endsection

