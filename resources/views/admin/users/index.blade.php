@extends('layouts.admin.master')

@section('content')
<div class="bg-gradient-to-br from-indigo-50 to-sky-50 dark:from-gray-900 dark:to-slate-900 min-h-screen py-8 px-4">
<div class="max-w-6xl mx-auto space-y-8">
    <!-- Header -->
    <div class="bg-white/90 dark:bg-gray-800/90 backdrop-blur rounded-2xl shadow-xl border border-indigo-100 dark:border-gray-700 overflow-hidden">
        <div class="p-8">
            <!-- Breadcrumb -->
            <nav class="flex items-center text-sm text-gray-500 dark:text-gray-400 mb-6 gap-2" aria-label="Breadcrumb">
                <a href="/admin/home" class="hover:text-gray-700 dark:hover:text-gray-200 transition-colors">داشبورد</a>
                <span class="text-gray-300">/</span>
                <span class="text-gray-700 dark:text-gray-300 font-medium">فهرست کاربران</span>
            </nav>

            <div class="flex flex-col md:flex-row md:items-center justify-between gap-6">
                <div class="flex items-center gap-4">
                    <div class="w-16 h-16 rounded-2xl bg-gradient-to-br from-indigo-600 to-violet-600 shadow-lg flex items-center justify-center">
                        <svg class="w-8 h-8 text-white" viewBox="0 0 24 24" fill="none" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M17 20h5v-2a4 4 0 00-4-4h-1M6 20H1v-2a4 4 0 014-4h1m6-4a4 4 0 100-8 4 4 0 000 8zM16 7a4 4 0 11-8 0 4 4 0 018 0z"/>
                        </svg>
                    </div>
                    <div>
                        <h1 class="text-3xl font-extrabold text-gray-900 dark:text-white">فهرست کاربران</h1>
                        <p class="text-gray-600 dark:text-gray-300">مدیریت و مشاهده کاربران سیستم</p>
                    </div>
                </div>

               {{-- <div class="flex items-center gap-3">
                    <a href="/admin/users/create"
                       class="inline-flex items-center gap-2 px-5 py-3 rounded-xl bg-gradient-to-r from-emerald-600 to-teal-600 text-white font-semibold hover:from-emerald-700 hover:to-teal-700 hover:shadow-lg transition-all">
                        <svg class="w-5 h-5" viewBox="0 0 24 24" fill="none" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M12 6v12m6-6H6"/>
                        </svg>
                        کاربر جدید
                    </a>
                </div>--}}
            </div>
        </div>
    </div>

    <!-- Filters -->
    <div class="bg-white dark:bg-gray-800 rounded-2xl shadow-xl border border-indigo-100 dark:border-gray-700 overflow-hidden">
        <div class="p-6">
            <form method="GET" action="/admin/users" class="grid grid-cols-1 lg:grid-cols-12 gap-4">
                <div class="lg:col-span-4">
                    <label for="q" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">جستجو</label>
                    <input id="q" name="q" type="text" placeholder="نام، ایمیل یا نقش..."
                           class="w-full px-4 py-3 rounded-xl border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100 focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500"/>
                </div>
                <div>
                    <label for="role" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">نقش</label>
                    <select id="role" name="role"
                            class="w-full px-4 py-3 rounded-xl border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100 focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500">
                        <option value="">همه</option>
                        <option value="admin">مدیر</option>
                        <option value="student">دانشجو</option>
                    </select>
                </div>
                {{--<div>
                    <label for="status" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">وضعیت</label>
                    <select id="status" name="status"
                            class="w-full px-4 py-3 rounded-xl border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100 focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500">
                        <option value="">همه</option>
                        <option value="active">فعال</option>
                        <option value="suspended">مسدود</option>
                        <option value="pending">در انتظار</option>
                    </select>
                </div>--}}
                <div class="lg:col-span-2">
                    <label for="sort" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">مرتب‌سازی</label>
                    <select id="sort" name="sort"
                            class="w-full px-4 py-3 rounded-xl border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100 focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500">
                        <option value="newest">جدیدترین</option>
                        <option value="oldest">قدیمی‌ترین</option>
                        <option value="name_asc">نام (الف-ی)</option>
                        <option value="name_desc">نام (ی-الف)</option>
                    </select>
                </div>
                <div class="lg:col-span-5 flex items-center gap-3 mt-6">
                    <button type="submit"
                            class="px-6 py-3 rounded-xl bg-indigo-600 text-white font-semibold hover:bg-indigo-700 transition">
                        اعمال فیلتر
                    </button>
                    <a href="/admin/users"
                       class="px-6 py-3 rounded-xl border-2 border-gray-300 dark:border-gray-600 text-gray-700 dark:text-gray-300 font-semibold hover:bg-gray-50 dark:hover:bg-gray-700 transition">
                        پاک کردن
                    </a>
                </div>
            </form>
        </div>
    </div>

    <!-- Users List: One per row -->
    <div class="space-y-5">
        @foreach($users as $user)
        <!-- Row Card 1 -->
            <div class="bg-white dark:bg-gray-800 rounded-2xl border border-indigo-100 dark:border-gray-700 shadow-lg overflow-hidden">
            <div class="p-6">
                <div class=" flex flex-col md:flex-row md:items-center gap-4">
                    <!-- Avatar -->
                    <div class="relative shrink-0">
                        <div class="w-14 h-14 rounded-xl bg-gradient-to-br from-indigo-500 to-violet-600 text-white flex items-center justify-center font-bold text-lg">
                            م
                        </div>
                    </div>

                    <!-- Main Info -->
                    <div class="flex-1">
                        <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-3">
                            <div>
                                <h3 class="text-lg font-bold text-gray-900 dark:text-white">{{$user->name}}</h3>
                                <p class="text-sm text-gray-500 dark:text-gray-400 mt-0.5">{{$user->role == 'admin' ? 'مدیر':'دانش آموز'}} — <span class="ltr:font-mono">{{ $user->mobile }}</span></p>
                            </div>

                        </div>

                        <!-- Stats -->
                        <div class="mt-4 grid grid-cols-3 md:flex md:items-center md:gap-6">
                            <div class="rounded-xl bg-indigo-50 dark:bg-indigo-900/20 py-2.5 text-center md:px-4">
                                <div class="text-xs text-gray-500 dark:text-gray-400">لایسنس ها</div>
                                <div class="text-base font-bold text-indigo-700 dark:text-indigo-300">{{count($user->licenses()->get())}}</div>
                            </div>

                            <div class="rounded-xl bg-violet-50 dark:bg-violet-900/20 py-2.5 text-center md:px-4">
                                <div class="text-xs text-gray-500 dark:text-gray-400">عضویت</div>
                                <div class="text-base  text-violet-700 dark:text-violet-300">{{\Morilog\Jalali\Jalalian::forge($user->created_at)->ago()}}</div>
                            </div>
                        </div>
                    </div>

                    <!-- Actions -->
                    <div class="flex items-center gap-2 md:self-stretch">

                        <div class="flex items-center gap-2">
                            <a href="#" class="p-2 sm:p-3 text-blue-600 hover:bg-blue-50 dark:hover:bg-blue-900/20 rounded-xl transition-colors duration-200" title="لایسنس های کاربر">
                                <span class="fas fa-id-card  text-blue-600 group-hover:text-blue-600 transition-colors duration-200 w-5"> </span>
                            </a>
                            <a href="{{route('admin.messages.create',$user->id)}}" class="p-2 sm:p-3 text-blue-600 hover:bg-blue-50 dark:hover:bg-blue-900/20 rounded-xl transition-colors duration-200" title="ارسال پیام به کاربر">
                                <span class="fas fa-paper-plane text-amber-600   group-hover:text-blue-600 transition-colors duration-200 w-5"> </span>
                            </a>
                            <a href="{{route('admin.users.edit',$user->id)}}" class="p-2 sm:p-3 text-green-600 hover:bg-blue-50 dark:hover:bg-blue-900/20 rounded-xl transition-colors duration-200" title="ویرایش">
                                <svg class="w-4 h-4 sm:w-5 sm:h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"></path>
                                </svg>
                            </a>
                            <form action="{{ route('admin.users.destroy',$user->id) }}" class="mt-3" onsubmit="event.preventDefault();confirmDelete(event);" method="post" id="{{'delete-'.$user->id}}">@csrf @method('delete')

                                <button  class="p-2 sm:p-3 text-red-600 hover:bg-red-50 dark:hover:bg-red-900/20 rounded-xl transition-colors duration-200" title="حذف">
                                <svg class="w-4 h-4 sm:w-5 sm:h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                </svg>
                            </button>
                            </form>
                        </div> </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>

    <!-- Pagination -->
    <div class="flex items-center  justify-between bg-white dark:bg-gray-800 rounded-2xl shadow-xl border border-indigo-100 dark:border-gray-700 px-6 py-4">
        <div class="text-sm text-gray-700 dark:text-gray-300">
            نمایش ۱ تا ۱۰ از ۲۴ کاربر
        </div>
        <div class="flex items-center gap-2">
            <a href="?page=1" class="px-3 py-2 text-sm rounded-xl border border-gray-300 dark:border-gray-600 text-gray-700 dark:text-gray-300 hover:bg-gray-50 dark:hover:bg-gray-700">قبلی</a>
            <a href="?page=1" class="px-3 py-2 text-sm rounded-xl bg-indigo-600 text-white">۱</a>
            <a href="?page=2" class="px-3 py-2 text-sm rounded-xl border border-gray-300 dark:border-gray-600 text-gray-700 dark:text-gray-300 hover:bg-gray-50 dark:hover:bg-gray-700">۲</a>
            <a href="?page=3" class="px-3 py-2 text-sm rounded-xl border border-gray-300 dark:border-gray-600 text-gray-700 dark:text-gray-300 hover:bg-gray-50 dark:hover:bg-gray-700">۳</a>
            <span class="px-2 text-gray-400">...</span>
            <a href="?page=2" class="px-3 py-2 text-sm rounded-xl border border-gray-300 dark:border-gray-600 text-gray-700 dark:text-gray-300 hover:bg-gray-50 dark:hover:bg-gray-700">بعدی</a>
        </div>
    </div>
</div>
</div>
@endsection
<script src="/js/modules/sweetalert2.js"></script>
<script>

    function confirmDelete(e) {
        e.preventDefault();
        Swal.fire({
            title: 'حذف کاربر',
            text: 'آیا مطمئن هستید که می‌خواهید این کاربر را حذف کنید؟',
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
