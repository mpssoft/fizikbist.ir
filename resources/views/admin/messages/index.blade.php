@extends('layouts.admin.master')
@section('content')
<div class="bg-gradient-to-br from-indigo-50 to-sky-50 dark:from-gray-900 dark:to-slate-900 min-h-screen py-8 px-4">
<div class="max-w-6xl mx-auto space-y-8">
    <!-- Header -->
    <div class="bg-white/90 dark:bg-gray-800/90 backdrop-blur rounded-2xl shadow-xl border border-indigo-100 dark:border-gray-700 overflow-hidden">
        <div class="p-8">
            <nav class="flex items-center text-sm text-gray-500 dark:text-gray-400 mb-6 gap-2" aria-label="Breadcrumb">
                <a href="/admin/home" class="hover:text-gray-700 dark:hover:text-gray-200 transition-colors">داشبورد</a>
                <span class="text-gray-300">/</span>
                <span class="text-gray-700 dark:text-gray-300 font-medium">پیام‌های کاربران</span>
            </nav>

            <div class="flex flex-col md:flex-row md:items-center justify-between gap-6">
                <div class="flex items-center gap-4">
                    <div class="w-16 h-16 rounded-2xl bg-gradient-to-br from-indigo-600 to-violet-600 shadow-lg flex items-center justify-center">
                        <svg class="w-8 h-8 text-white" viewBox="0 0 24 24" fill="none" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M3 8l9 6 9-6m-18 0l9-6 9 6m-18 0v8a2 2 0 002 2h14a2 2 0 002-2V8"/>
                        </svg>
                    </div>
                    <div>
                        <h1 class="text-3xl font-extrabold text-gray-900 dark:text-white">پیام‌های کاربران</h1>
                        <p class="text-gray-600 dark:text-gray-300">مشاهده، پاسخ و مدیریت پیام‌ها</p>
                    </div>
                </div>

                <div class="flex items-center gap-3">

                    <a href="/admin/messages/create"
                       class="inline-flex items-center gap-2 px-5 py-3 rounded-xl bg-gradient-to-r from-emerald-600 to-teal-600 text-white font-semibold hover:from-emerald-700 hover:to-teal-700 hover:shadow-lg transition-all">
                        <svg class="w-5 h-5" viewBox="0 0 24 24" fill="none" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v12m6-6H6"/>
                        </svg>
                        پیام جدید
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- Filters -->
    <div class="bg-white dark:bg-gray-800 rounded-2xl shadow-xl border border-indigo-100 dark:border-gray-700 overflow-hidden">
        <div class="p-6">
            <form method="GET" action="/admin/messages" class="grid grid-cols-1 lg:grid-cols-12 gap-4">
                <div class="lg:col-span-5">
                    <label for="q" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">جستجو</label>
                    <input id="q" name="q" type="text" placeholder="نام، ایمیل، عنوان یا متن..."
                           class="w-full px-4 py-3 rounded-xl border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100 focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500"/>
                </div>
                <div>
                    <label for="status" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">وضعیت</label>
                    <select id="status" name="status"
                            class="w-full px-4 py-3 rounded-xl border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100 focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500">
                        <option value="">همه</option>
                        <option value="unread">خوانده‌نشده</option>
                        <option value="read">خوانده‌شده</option>
                        <option value="archived">بایگانی‌شده</option>
                    </select>
                </div>
                <div>
                    <label for="type" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">نوع</label>
                    <select id="type" name="type"
                            class="w-full px-4 py-3 rounded-xl border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100 focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500">
                        <option value="">همه</option>
                        <option value="contact">تماس</option>
                        <option value="support">پشتیبانی</option>
                        <option value="feedback">بازخورد</option>
                    </select>
                </div>
                <div class="lg:col-span-3">
                    <label for="sort" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">مرتب‌سازی</label>
                    <select id="sort" name="sort"
                            class="w-full px-4 py-3 rounded-xl border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100 focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500">
                        <option value="newest">جدیدترین</option>
                        <option value="oldest">قدیمی‌ترین</option>
                        <option value="unread_first">خوانده‌نشده‌ها</option>
                    </select>
                </div>
                <div class="lg:col-span-12 flex items-center gap-3 pt-2">
                    <button type="submit"
                            class="px-6 py-3 rounded-xl bg-indigo-600 text-white font-semibold hover:bg-indigo-700 transition">
                        اعمال فیلتر
                    </button>
                    <a href="/admin/messages"
                       class="px-6 py-3 rounded-xl border-2 border-gray-300 dark:border-gray-600 text-gray-700 dark:text-gray-300 font-semibold hover:bg-gray-50 dark:hover:bg-gray-700 transition">
                        پاک کردن
                    </a>
                </div>
            </form>
        </div>
    </div>

    <!-- Messages: one per row -->
    <div class="space-y-5">
        <!-- Message Card 1 (Unread) -->
        @foreach($messages as $message)
        <article class="bg-white dark:bg-gray-800 rounded-2xl border border-indigo-100 dark:border-gray-700 shadow-lg overflow-hidden">
            <div class="p-6">
                <div class="flex flex-col md:flex-row md:items-start gap-4">
                    <!-- Icon + from -->
                    <div class="relative shrink-0">

                        @if($message->is_read && count($message->replies()->where('is_read',0)->get()) == 0)
                        <div class="w-14 h-14 rounded-xl bg-gradient-to-br from-amber-500 to-amber-300 text-white flex items-center justify-center">
                            <i class="fas fa-envelope-open fa-2xl w-10 h-10 pt-5 pr-1"></i>
                        </div>
                        @else
                            <div class="w-14 h-14 rounded-xl bg-gradient-to-br from-indigo-500 to-violet-600 text-white flex items-center justify-center">
                                <i class="fas fa-envelope fa-2xl w-10 h-10 pt-5 pr-1"></i>
                            </div>
                        @endif

                    </div>

                    <!-- Main -->
                    <div class="flex-1 min-w-0">
                        <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-2">
                            <h3 class="text-lg md:flex  font-bold text-gray-900 dark:text-white truncate ">{{ $message->subject }}</h3>
                            <div class=" md:flex-1  ">
                                <time class="text-xs text-gray-500 dark:text-gray-400">{{ \Morilog\Jalali\Jalalian::forge($message->created_at)->ago() }}</time>
                            </div>
                        </div>
                        <p class="mt-1 text-sm text-gray-600 dark:text-gray-300 truncate w-80">{{ $message->body }}</p>
                        <div class="mt-2 text-sm text-gray-500 dark:text-gray-400 ltr:font-mono">از:
                            {{ $message->sender->mobile }} -
                            {{ $message->sender->name }}</div>
                    </div>

                    <!-- Actions -->
                    <div class="flex items-center gap-2 md:self-stretch">
                        <!-- View -->
                        <a href="{{route('admin.messages.show',$message->id)}}"
                           class="p-2 rounded-xl border-2 border-gray-200 dark:border-gray-600 text-gray-700 dark:text-gray-300 hover:bg-gray-50 dark:hover:bg-gray-700 transition"
                           title="مشاهده">
                            <i class="fas fa-eye"></i>
                        </a>

                        <!-- Mark as read -->
                        <form method="POST" action="{{route('admin.messages.mark-as-read',$message->id)}}">
                            @csrf

                            <button type="submit"
                                    class="p-2 rounded-xl bg-emerald-600 text-white hover:bg-emerald-700 transition"
                                    title="علامت خوانده">
                                <i class="fas fa-envelope-open"></i>
                            </button>
                        </form>

                        <!-- Archive -->
                     {{--   <form method="POST" action="/admin/messages/1/archive">
                            <button type="submit"
                                    class="p-2 rounded-xl border-2 border-amber-300 text-amber-700 hover:bg-amber-50
                   dark:border-amber-600 dark:text-amber-300 dark:hover:bg-amber-800 transition"
                                    title="بایگانی">
                                <i class="fas fa-archive"></i>
                            </button>
                        </form>--}}

                        <!-- Delete -->

                        <form action="{{route('admin.messages.destroy',$message->id)}}"  onsubmit="event.preventDefault();confirmDelete(event);" method="post" id="delete-1"><input type="hidden" name="_token" value="JuhfIps3d7o8cyktmXUMXsCDO4TGpNvimyGLaUcY" autocomplete="off"> <input type="hidden" name="_method" value="delete">
                            @csrf
                            @method('delete')

                            <button type="submit"
                                    class="p-2 rounded-xl border-2 border-rose-300 text-rose-700 hover:bg-rose-50
                   dark:border-rose-600 dark:text-rose-300 dark:hover:bg-rose-800 transition"
                                    title="حذف">
                                <i class="fas fa-trash-alt"></i>
                            </button>
                        </form>
                    </div>

                </div>
            </div>
        </article>
        @endforeach
    </div>


    <!-- Pagination -->
    <div class="flex items-center justify-between bg-white dark:bg-gray-800 rounded-2xl shadow-xl border border-indigo-100 dark:border-gray-700 px-6 py-4">
        {{$messages->render() }}
    </div>
</div>
</div>
{{-- SweetAlert Confirmation --}}
@push('scripts')
    <script src="/js/modules/sweetalert2.js"></script>
    <script>

        function confirmDelete(e) {
            e.preventDefault();
            Swal.fire({
                title: 'حذف پیام',
                text: 'آیا مطمئن هستید که می‌خواهید این پیام را حذف کنید؟',
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

@endsection
