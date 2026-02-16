@extends('layouts.user.master')
@section('content')
<div class="bg-gradient-to-br from-indigo-50 to-sky-50 dark:from-gray-900 dark:to-slate-900 min-h-screen py-8 px-4">
<div class="max-w-5xl mx-auto space-y-8">
    <!-- Header -->
    <div class="bg-white/90 dark:bg-gray-800/90 backdrop-blur rounded-2xl shadow-xl border border-indigo-100 dark:border-gray-700 overflow-hidden">
        <div class="p-8">
            <nav class="flex items-center text-sm text-gray-500 dark:text-gray-400 mb-6 gap-2" aria-label="Breadcrumb">
                <a href="{{route('user.home')}}" class="hover:text-gray-700 dark:hover:text-gray-200 transition-colors">داشبورد</a>
                <span class="text-gray-300">/</span>
                <a href="{{route('user.messages.index')}}" class="hover:text-gray-700 dark:hover:text-gray-200 transition-colors">پیام‌ها</a>
                <span class="text-gray-300">/</span>
                <span class="text-gray-700 dark:text-gray-300 font-medium">ارسال پیام به مدیریت سایت</span>
            </nav>

            <div class="flex items-center gap-4">
                <div class="w-16 h-16 rounded-2xl bg-gradient-to-br from-emerald-600 to-teal-600 shadow-lg flex items-center justify-center">
                    <svg class="w-8 h-8 text-white" viewBox="0 0 24 24" fill="none" stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M22 2L11 13M22 2l-7 20-4-9-9-4 20-7z"/>
                    </svg>
                </div>
                <div>
                    <h1 class="text-3xl font-extrabold text-gray-900 dark:text-white">ارسال پیام </h1>
                    {{--<p class="text-gray-600 dark:text-gray-300">برای یک کاربر، چند کاربر، یک نقش، یا همه کاربران ارسال کنید</p>--}}
                </div>
            </div>
        </div>
    </div>
    @include('layouts.errors')
    <!-- Send Message Form -->
    <div class="bg-white dark:bg-gray-800 rounded-2xl shadow-xl border border-indigo-100 dark:border-gray-700 overflow-hidden">
        <div class="p-8">
            <form method="POST" action="{{route('user.messages.send')}}"  class="space-y-10">
                @csrf


                <!-- Meta -->
                <section class="space-y-6">

                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                        <div class="md:col-span-2">
                            <label for="subject" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">عنوان *</label>
                            <input id="subject" name="subject" value="{{old('subject')}}" type="text" required placeholder="موضوع پیام"
                                   class="w-full px-4 py-3 rounded-xl border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100 focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500"/>
                        </div>
                     {{--   <div>
                            <label for="priority" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">اولویت</label>
                            <select id="priority" name="priority"
                                    class="w-full px-4 py-3 rounded-xl border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100 focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500">
                                <option value="normal">عادی</option>
                                <option value="high">بالا</option>
                                <option value="low">کم</option>
                            </select>
                        </div>--}}
                    </div>

                   {{-- <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                        <div>
                            <label for="type" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">نوع پیام</label>
                            <select id="type" name="type"
                                    class="w-full px-4 py-3 rounded-xl border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100 focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500">
                                <option value="announcement">اعلان</option>
                                <option value="update">به‌روزرسانی</option>
                                <option value="support">پشتیبانی</option>
                                <option value="reminder">یادآوری</option>
                            </select>
                        </div>
                        <div>
                            <label for="send_as" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">حالت ارسال</label>
                            <select id="send_as" name="send_as"
                                    class="w-full px-4 py-3 rounded-xl border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100 focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500">
                                <option value="inbox">پیام داخلی</option>
                                <option value="email">ایمیل</option>
                                <option value="both">هر دو</option>
                            </select>
                        </div>
                        <div>
                            <label for="schedule" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">زمان‌بندی (اختیاری)</label>
                            <input id="schedule" name="schedule" type="datetime-local"
                                   class="w-full px-4 py-3 rounded-xl border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100 focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500"/>
                            <p class="text-xs text-gray-500 dark:text-gray-400 mt-2">اگر خالی بماند، بلافاصله ارسال می‌شود.</p>
                        </div>
                    </div>--}}
                </section>

                <!-- Body -->
                <section class="space-y-6">
                    <h2 class="text-xl font-semibold text-gray-800 dark:text-white"> متن پیام * </h2>
                    <textarea id="body" name="body" rows="8" required placeholder="اینجا بنویسید..."
                              class="w-full px-4 py-3 rounded-2xl border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100 focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 leading-8">{{old('body')}}</textarea>
                   {{-- <div class="flex flex-wrap items-center gap-2 text-xs text-gray-500 dark:text-gray-400">
                        <span class="px-2.5 py-1 rounded-full bg-indigo-50 text-indigo-700 dark:bg-indigo-900/40 dark:text-indigo-200">پشتیبانی از متن ساده</span>
                        <span class="px-2.5 py-1 rounded-full bg-sky-50 text-sky-700 dark:bg-sky-900/40 dark:text-sky-200">می‌توانید لینک درج کنید</span>
                        <span class="px-2.5 py-1 rounded-full bg-emerald-50 text-emerald-700 dark:bg-emerald-900/40 dark:text-emerald-200">امکان زمان‌بندی</span>
                    </div>--}}
                </section>

               {{-- <!-- Attachments -->
                <section class="space-y-6">
                    <h2 class="text-xl font-semibold text-gray-800 dark:text-white">پیوست‌ها (اختیاری)</h2>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label for="attachments" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">انتخاب فایل</label>
                            <input id="attachments" name="attachments[]" type="file" multiple
                                   class="w-full px-4 py-3 rounded-xl border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100 focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-indigo-50 file:text-indigo-700 hover:file:bg-indigo-100"/>
                            <p class="text-xs text-gray-500 dark:text-gray-400 mt-2">PDF، JPG، PNG یا ZIP تا 5MB هرکدام.</p>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">راهنما</label>
                            <div class="rounded-xl border border-dashed border-gray-300 dark:border-gray-600 p-4 text-sm text-gray-600 dark:text-gray-300">
                                اگر گیرندگان را خالی بگذارید، با توجه به نقش/گستره انتخاب‌شده ارسال می‌شود.
                            </div>
                        </div>
                    </div>
                </section>
--}}
                <!-- Actions -->
                <div class="flex items-center justify-between pt-2">
                    <a href="{{route('user.messages.index')}}"
                       class="inline-flex items-center gap-2 px-6 py-3 rounded-xl border-2 border-gray-300 dark:border-gray-600 text-gray-700 dark:text-gray-300 font-semibold hover:bg-gray-50 dark:hover:bg-gray-700 transition">
                        بازگشت
                    </a>
                    <div class="flex items-center gap-3">

                        <button type="submit"
                                class="px-6 py-3 rounded-xl bg-gradient-to-r from-emerald-600 to-teal-600 text-white font-semibold hover:from-emerald-700 hover:to-teal-700 hover:shadow-lg transition">
                            ارسال پیام
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <!-- Footer note -->
    <p class="text-xs text-gray-500 dark:text-gray-400 text-center">
        پس از ارسال، پیام‌ها در صندوق پیام کاربران قابل مشاهده خواهند بود.
    </p>
</div>
</div>
@endsection
