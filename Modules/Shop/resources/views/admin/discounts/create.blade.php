@extends('layouts.admin.master')
@section('content')

    <div class="h-full bg-gradient-to-b from-slate-50 to-white text-slate-800 dark:from-slate-900 dark:to-slate-950 dark:text-slate-100 antialiased">
        <div class="min-h-full">
            <div class="max-w-5xl mx-auto px-4 sm:px-4 lg:px-5 py-5">
                <!-- Header card (lighter in dark mode) -->
                <header class="mb-4">
                    <div class="w-full rounded-2xl border border-slate-200 dark:border-slate-600 bg-white/80 dark:bg-slate-600/70 backdrop-blur p-4 sm:p-5 shadow-soft">
                        <div class="flex items-center justify-between gap-4">
                            <div class="flex items-center gap-3">
                                <!-- Discount icon -->
                                <div class="inline-flex items-center justify-center w-12 h-12 bg-gradient-to-r from-blue-500 to-purple-600 rounded-full shadow-lg">
                                    <svg class="w-6 h-6 text-white" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M7 7h.01M3 10.5l6.8 6.8a2 2 0 0 0 2.83 0L21 9.93V3H14.07L3 10.5z"/>
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 15l6-6"/>
                                        <circle cx="8" cy="8" r="1.1" fill="currentColor"/>
                                        <circle cx="16" cy="16" r="1.1" fill="currentColor"/>
                                    </svg>
                                </div>
                                <div>
                                    <h1 class="text-2xl sm:text-3xl font-extrabold tracking-tight text-slate-900 dark:text-white">ایجاد تخفیف جدید</h1>
                                    <p class="mt-1 text-slate-600 dark:text-slate-300">فیلدهای زیر را پر کنید و تخفیف را ذخیره کنید.</p>
                                </div>
                            </div>
                            <a href="#"
                               class="hidden sm:inline-flex items-center justify-center gap-2 rounded-xl bg-slate-100 hover:bg-slate-200 text-slate-800 dark:bg-slate-700 dark:hover:bg-slate-600 dark:text-slate-100 px-4 py-2 font-semibold focus-ring transition">
                                بازگشت
                            </a>
                        </div>
                    </div>
                </header>
                <!-- Alerts (validation errors) -->
                @if ($errors->any())
                    <div class="mb-6 rounded-xl border border-rose-300/60 bg-rose-50/80 text-rose-700 dark:border-rose-500/40 dark:bg-rose-900/30 dark:text-rose-200 p-4">
                        <div class="font-semibold mb-1">خطا در اعتبارسنجی</div>
                        <ul class="list-disc pr-5 text-sm space-y-1">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <!-- Form card (lighter in dark mode: dark:bg-slate-600/70, dark:border-slate-600) -->
                <section class="rounded-2xl border border-slate-200 dark:border-slate-600 bg-white/90 dark:bg-slate-600/70 backdrop-blur p-5 sm:p-6 shadow-soft">
                    <form action="{{route('shop.admin.discounts.store')}}" method="post" class="space-y-6">
                        @csrf
                        @method('POST')
                        <!-- Code -->
                        <div>
                            <label class="block text-sm font-medium text-slate-700 dark:text-slate-200 mb-1">کد</label>
                            <input name="code" type="text" placeholder="مثال: WELCOME10" class="w-full rounded-lg border border-slate-300 dark:border-slate-500 bg-white dark:bg-slate-700/60 text-slate-800 dark:text-slate-100 placeholder:text-slate-400 dark:placeholder:text-slate-400 px-3 py-2 focus-ring">

                        </div>

                        <!-- Type and Value -->
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                            <div>
                                <label class="block text-sm font-medium text-slate-700 dark:text-slate-200 mb-1">نوع</label>
                                <select name="type" class="w-full rounded-lg border border-slate-300 dark:border-slate-500 bg-white dark:bg-slate-700/60 text-slate-800 dark:text-slate-100 px-3 py-2 focus-ring">
                                    <option value="percent">درصدی</option>
                                    <option value="fixed">ثابت</option>
                                </select>
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-slate-700 dark:text-slate-200 mb-1">مقدار</label>
                                <input name="value" type="number" step="0.01" placeholder="مثال: 10 یا 25.00" class="w-full rounded-lg border border-slate-300 dark:border-slate-500 bg-white dark:bg-slate-700/60 text-slate-800 dark:text-slate-100 placeholder:text-slate-400 dark:placeholder:text-slate-400 px-3 py-2 focus-ring">
                                <p class="mt-1 text-xs text-slate-500 dark:text-slate-300">برای نوع درصدی عدد 10 یعنی 10٪. برای نوع ثابت، مبلغ را وارد کنید.</p>
                            </div>
                        </div>

                        <!-- Dates -->
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                            <div>
                                <label class="block text-sm font-medium text-slate-700 dark:text-slate-200 mb-1">تاریخ شروع</label>
                                <input name="start_at" type="datetime-local" class="w-full rounded-lg border border-slate-300 dark:border-slate-500 bg-white dark:bg-slate-700/60 text-slate-800 dark:text-slate-100 px-3 py-2 focus-ring">
                                <p class="mt-1 text-xs text-slate-500 dark:text-slate-300">اختیاری</p>
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-slate-700 dark:text-slate-200 mb-1">تاریخ پایان</label>
                                <input name="end_at" type="datetime-local" class="w-full rounded-lg border border-slate-300 dark:border-slate-500 bg-white dark:bg-slate-700/60 text-slate-800 dark:text-slate-100 px-3 py-2 focus-ring">
                                <p class="mt-1 text-xs text-slate-500 dark:text-slate-300">اختیاری</p>
                            </div>
                        </div>
                        <!-- NEW: Attach to Courses (multiple selection) -->
                        <div>
                            <label for="courses" class="block text-sm font-medium text-slate-700 dark:text-slate-200 mb-1">به کدام دوره(دوره ها) اعمال شود؟</label>
                            <select id="courses" name="courses[]" multiple
                                    class="w-full min-h-[9rem] rounded-lg border border-slate-300 dark:border-slate-500 bg-white dark:bg-slate-700/60 text-slate-800 dark:text-slate-100 px-3 py-2 focus-ring">
                                <!-- Sample options; replace with your data -->
                                @foreach(\App\Models\Course::all() as $course)
                                    <option value="{{$course->id}}">{{$course->title}}</option>
                                @endforeach
                            </select>
                            <p class="mt-1 text-xs text-slate-500 dark:text-slate-300">کلید کنترل/کامند را نگه دارید و چند مورد را انتخاب کنید.</p>
                        </div>

                        <!-- Active -->
                        <div class="flex items-center gap-3">
                            <input id="is_active" name="is_active" type="checkbox" checked class="h-4 w-4 rounded border-slate-300 dark:border-slate-500 text-brand-600 focus-ring">
                            <label for="is_active" class="text-sm font-medium text-slate-700 dark:text-slate-200">فعال باشد</label>
                        </div>

                        <!-- Submit row -->
                        <div class="flex items-center justify-between pt-2">
                            <a href="#" class="inline-flex items-center justify-center gap-2 rounded-lg bg-slate-100 hover:bg-slate-200 text-slate-800 dark:bg-slate-700 dark:hover:bg-slate-600 dark:text-slate-100 px-4 py-2 font-semibold focus-ring transition">
                                انصراف
                            </a>
                            <button type="submit" class="inline-flex items-center justify-center gap-2 rounded-lg bg-brand-600 hover:bg-brand-700 active:bg-brand-800 text-white px-5 py-2.5 font-semibold shadow-soft focus-ring transition">

                                ذخیره تخفیف
                            </button>
                        </div>
                    </form>
                </section>

                <!-- Helper tips (lighter in dark mode) -->
                <section class="mt-6 rounded-2xl border border-slate-200 dark:border-slate-600 bg-white/70 dark:bg-slate-600/60 p-4 sm:p-5">
                    <h3 class="text-base font-semibold text-slate-800 dark:text-slate-100 mb-2">راهنما</h3>
                    <ul class="list-disc pr-5 text-sm text-slate-600 dark:text-slate-300 space-y-1">
                        <li>برای نوع «درصدی»، مقدار باید بین 0 تا 100 باشد.</li>
                        <li>برای نوع «ثابت»، مقدار برحسب واحد پول  است.</li>
                    </ul>
                </section>


            </div>
        </div>
    </div>

@endsection
