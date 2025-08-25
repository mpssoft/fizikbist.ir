@extends('layouts.user.master')

@section('content')
<div class="bg-gradient-to-br from-indigo-50 to-sky-50 dark:from-gray-900 dark:to-slate-900 min-h-screen py-8 px-4">
<div class="max-w-4xl mx-auto space-y-8">
    <!-- Header -->
    <div class="bg-white/90 dark:bg-gray-800/90 backdrop-blur rounded-2xl shadow-xl border border-indigo-100 dark:border-gray-700 overflow-hidden">
        <div class="p-8">
            <nav class="flex items-center text-sm text-gray-500 dark:text-gray-400 mb-6 gap-2" aria-label="Breadcrumb">
                <a href="{{route('user.home')}}" class="hover:text-gray-700 dark:hover:text-gray-200 transition-colors">داشبورد</a>
                <span class="text-gray-300">/</span>
                <a href="{{route('user.messages.index')}}" class="hover:text-gray-700 dark:hover:text-gray-200 transition-colors">پیام‌ها</a>
                <span class="text-gray-300">/</span>
                <span class="text-gray-700 dark:text-gray-300 font-medium">نمایش پیام</span>
            </nav>

            <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4">
                <div class="flex items-start gap-4">
                    <div class="w-16 h-16 rounded-2xl bg-gradient-to-br from-indigo-600 to-violet-600 shadow-lg flex items-center justify-center">
                        <svg class="w-8 h-8 text-white" viewBox="0 0 24 24" fill="none" stroke="currentColor" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M3 8l9 6 9-6m-18 0l9-6 9 6m-18 0v8a2 2 0 002 2h14a2 2 0 002-2V8"/>
                        </svg>
                    </div>
                    <div class="min-w-0">
                        <h1 class="text-2xl md:text-3xl font-extrabold text-gray-900 dark:text-white truncate">{{ $message->subject }}</h1>
                        <div class="mt-2 flex flex-wrap items-center gap-2 text-xs">

                            <time class="text-gray-500 dark:text-gray-400">{{\Morilog\Jalali\Jalalian::forge($message->created_at)->ago()}}</time>
                        </div>
                    </div>
                </div>


            </div>
        </div>
    </div>
    @include('layouts.user.messages',['messages'=> $message->replies()->where('parent_id',$message->id)->OrderBy('created_at','desc')->get()])
    <!-- Message Meta + Body -->
    <div class="bg-white dark:bg-gray-800 rounded-2xl shadow-xl border border-indigo-100 dark:border-gray-700 overflow-hidden">
        <div class="p-8 space-y-8">
            <!-- From/To -->
            <section class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div class="rounded-xl col-span-2 border border-gray-200 dark:border-gray-700 p-4 bg-gray-50/50 dark:bg-gray-900/30">
                    <div class="text-sm text-gray-500 dark:text-gray-400 mb-1">موضوع</div>
                    <div class="text-gray-900 dark:text-gray-100 font-semibold">{{$message->subject}}</div>

                </div>
            </section>

            <!-- Message Body -->
            <section class="space-y-4">

                <div class="rounded-2xl border border-gray-200 dark:border-gray-700 p-6 bg-white dark:bg-gray-900/30 leading-8 text-gray-800 dark:text-gray-100">
                    <div class="text-sm text-gray-500 dark:text-gray-400 mb-1">متن پیام</div>
                    {{ $message->body }}
                </div>
            </section>

            <!-- Attachments -->
           {{-- <section class="space-y-4">
                <h2 class="text-lg font-semibold text-gray-800 dark:text-white">پیوست‌ها</h2>
                <div class="rounded-2xl border border-gray-200 dark:border-gray-700 p-4 bg-gray-50/50 dark:bg-gray-900/30">
                    <ul class="space-y-2">
                        <li class="flex items-center justify-between gap-3">
                            <div class="flex items-center gap-3">
                                <span class="inline-flex items-center justify-center w-9 h-9 rounded-xl bg-indigo-100 text-indigo-700 dark:bg-indigo-900/40 dark:text-indigo-200 font-bold">PDF</span>
                                <div>
                                    <div class="text-sm font-medium text-gray-800 dark:text-gray-100">error-screenshot.pdf</div>
                                    <div class="text-xs text-gray-500 dark:text-gray-400">245KB</div>
                                </div>
                            </div>
                            <a href="/storage/messages/1/error-screenshot.pdf" download
                               class="px-3 py-2 rounded-lg border-2 border-indigo-200 text-indigo-700 dark:text-indigo-300 dark:border-indigo-700 hover:bg-indigo-50 dark:hover:bg-indigo-900/20 text-sm font-semibold">
                                دانلود
                            </a>
                        </li>
                    </ul>
                </div>
            </section>--}}

            <!-- Status Actions -->
          {{--  <section class="flex flex-wrap items-center gap-3">
                <form method="POST" action="/admin/messages/1/mark-read">
                    <button type="submit" class="px-4 py-2 rounded-xl bg-emerald-600 text-white font-semibold hover:bg-emerald-700">علامت خوانده</button>
                </form>
                <form method="POST" action="/admin/messages/1/mark-unread">
                    <button type="submit" class="px-4 py-2 rounded-xl border-2 border-indigo-300 text-indigo-700 font-semibold hover:bg-indigo-50">علامت نخوانده</button>
                </form>
                <form method="POST" action="/admin/messages/1/archive">
                    <button type="submit" class="px-4 py-2 rounded-xl border-2 border-amber-300 text-amber-700 font-semibold hover:bg-amber-50">بایگانی</button>
                </form>
                <form method="POST" action="/admin/messages/1/delete">
                    <button type="submit" class="px-4 py-2 rounded-xl border-2 border-rose-300 text-rose-700 font-semibold hover:bg-rose-50">حذف</button>
                </form>
            </section>--}}
        </div>
    </div>

    @include('layouts.errors')
    <!-- Inline Reply Panel -->
    <div id="reply" class="bg-white dark:bg-gray-800 rounded-2xl shadow-xl border border-emerald-200 dark:border-emerald-800 overflow-hidden">
        <div class="p-8 space-y-6">
            <div class="flex items-center gap-3">
                <div class="w-10 h-10 rounded-xl bg-gradient-to-br from-emerald-600 to-teal-600 text-white flex items-center justify-center font-bold">✉️</div>
                <div>
                    <h2 class="text-xl font-semibold text-gray-800 dark:text-white">پاسخ به پیام</h2>
                    <p class="text-sm text-gray-500 dark:text-gray-400">به فرستنده پاسخ دهید </p>
                </div>
            </div>

            <form method="POST" action="{{route('user.messages.reply',$message->id)}}"  class="space-y-6">
                @csrf
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                   {{-- <div class="md:col-span-2">
                        <label for="reply_subject" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">عنوان</label>
                        <input id="reply_subject" name="subject" type="text" value="پاسخ: "
                               class="w-full px-4 py-3 rounded-xl border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100 focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500"/>
                    </div>--}}
                  {{--  <div>
                        <label for="reply_priority" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">اولویت</label>
                        <select id="reply_priority" name="priority"
                                class="w-full px-4 py-3 rounded-xl border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100 focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500">
                            <option value="normal" selected>عادی</option>
                            <option value="high">بالا</option>
                            <option value="low">کم</option>
                        </select>
                    </div>--}}
                </div>

                <div>
                    <label for="reply_body" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">متن پاسخ *</label>
                    <textarea id="reply_body" name="body" rows="6" required placeholder="پاسخ خود را اینجا بنویسید..."
                              class="w-full px-4 py-3 rounded-2xl border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100 focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 leading-8"></textarea>
                    <p class="mt-2 text-xs text-gray-500 dark:text-gray-400">می‌توانید لینک و متن ساده وارد کنید.</p>
                </div>

              {{--  <div>
                    <label for="reply_attachments" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">پیوست‌ها (اختیاری)</label>
                    <input id="reply_attachments" name="attachments[]" type="file" multiple
                           class="w-full px-4 py-3 rounded-xl border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100 focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-emerald-50 file:text-emerald-700 hover:file:bg-emerald-100"/>
                    <p class="text-xs text-gray-500 dark:text-gray-400 mt-2">PDF، JPG، PNG یا ZIP تا 5MB.</p>
                </div>--}}

                <div class="flex items-center justify-between">
                    <div class="flex items-center gap-3">
                        <button type="submit"
                                class="px-5 py-2.5 rounded-xl bg-gradient-to-r from-emerald-600 to-teal-600 text-white font-semibold hover:from-emerald-700 hover:to-teal-700 transition">
                            ارسال پاسخ
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <!-- Footer note -->
    <p class="text-xs text-gray-500 dark:text-gray-400 text-center">
        پاسخ شما بلافاصله ذخیره و برای کاربر ارسال خواهد شد.
    </p>
</div>
</div>


@endsection
