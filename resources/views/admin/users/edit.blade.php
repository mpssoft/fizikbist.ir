@extends('layouts.admin.master')
@push('scripts')
    <script>
        document.addEventListener("DOMContentLoaded", function () {

            document.getElementById('button-image').addEventListener('click', (event) => {
                event.preventDefault();

                window.open('/file-manager/fm-button', 'fm', 'width=1400,height=800');
            });
        });

        // set file link
        function fmSetLink($url) {
            document.getElementById('image_label').value = $url;
        }

        function removeCamas() {
            $('.format_number').each(function (index, element) {
                $(this).val($(this).val().replace(/,/g, "")); // Remove existing commas
            });
        }
    </script>
@endpush
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
                <span class="text-gray-700 dark:text-gray-300 font-medium">ویرایش کاربر</span>
            </nav>

            <div class="flex items-center gap-4">
                <div class="w-16 h-16 rounded-2xl bg-gradient-to-br from-blue-600 to-indigo-600 shadow-lg flex items-center justify-center">
                    <svg class="w-8 h-8 text-white" viewBox="0 0 24 24" fill="none" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                    </svg>
                </div>
                <div>
                    <h1 class="text-3xl font-extrabold text-gray-900 dark:text-white">ویرایش کاربر</h1>
                    <p class="text-gray-600 dark:text-gray-300">اطلاعات کاربر را ویرایش و ذخیره کنید</p>
                </div>
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
    <!-- Edit User Form -->
    <div class="bg-white dark:bg-gray-800 rounded-2xl shadow-xl border border-indigo-100 dark:border-gray-700 overflow-hidden">
        <div class="p-8">
            <form method="POST" action="{{route('admin.users.update',$user->id)}}" enctype="multipart/form-data" class="space-y-8">
                <!-- Include your CSRF/PUT in backend as needed -->
                @csrf
                @method('put')
                <!-- Profile Header -->
                <section class="flex items-center gap-4">
                    <div class="relative">
                        <div class="w-16 h-16 rounded-2xl bg-gradient-to-br from-indigo-500 to-violet-600 text-white flex items-center justify-center font-bold text-xl">
                            م
                        </div>
                        <span class="absolute -bottom-1 -left-1 inline-flex items-center justify-center w-5 h-5 rounded-full bg-emerald-500 text-white text-xs">✓</span>
                    </div>
                    <div>
                        <h2 class="text-xl font-semibold text-gray-800 dark:text-white">{{$user->name}}</h2>
                        <p class="text-sm text-gray-500 dark:text-gray-400 ltr:font-mono">{{$user->mobile}}</p>
                    </div>
                </section>

                <!-- Basic Info -->
                <section class="space-y-6">
                    <h3 class="text-lg font-semibold text-gray-800 dark:text-white flex items-center gap-2">
                        <svg class="w-5 h-5 text-indigo-600" viewBox="0 0 24 24" fill="none" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5.121 17.804A9 9 0 1118 5.121M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                        </svg>
                        اطلاعات پایه
                    </h3>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label for="name" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                                <svg class="w-4 h-4 inline-block ml-2 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5.121 17.804A9 9 0 1118 5.121"/>
                                </svg>
                                نام و نام خانوادگی *
                            </label>
                            <input id="name" name="name" type="text" required
                                   value="{{old('name',$user->name)}}"
                                   class="w-full px-4 py-3 rounded-xl border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100 focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500"/>
                        </div>

                        <div>
                            <label for="email" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                                <svg class="w-4 h-4 inline-block ml-2 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 12H8m8 0l-4 4m4-4l-4-4M4 6h16v12a2 2 0 01-2 2H6a2 2 0 01-2-2z"/>
                                </svg>
                                ایمیل *
                            </label>
                            <input id="email" name="email" type="email"
                                   value="{{old('email',$user->email)}}"
                                   class="w-full px-4 py-3 rounded-xl border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100 focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500"/>
                        </div>

                        <div>
                            <label for="role" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                                <svg class="w-4 h-4 inline-block ml-2 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13M16.5 5c1.746 0 3.332.477 4.5 1.253v13"/>
                                </svg>
                                نقش *
                            </label>
                            <select id="role" name="role"
                                    class="w-full px-4 py-3 rounded-xl border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100 focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500">
                                <option value="admin" {{$user->role=='admin'?'selected':''}}>مدیر</option>
                                <option value="user" {{$user->role !='admin'?'selected':''}}>دانش آموز</option>
                            </select>
                        </div>

                        <div>
                            <label for="mobile" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                                <svg class="w-4 h-4 inline-block ml-2 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                </svg>
                                موبایل *
                            </label>
                            <input id="mobile" name="mobile" type="text"
                                   value="{{old('mobile',$user->mobile)}}"
                                   class="w-full px-4 py-3 rounded-xl border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100 focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500"/>
                        </div>


                    </div>
                </section>


                <!-- Avatar -->
                <section class="space-y-6">
                    <h3 class="text-lg font-semibold text-gray-800 dark:text-white flex items-center gap-2">
                        <svg class="w-5 h-5 text-fuchsia-600" viewBox="0 0 24 24" fill="none" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5.121 17.804A9 9 0 1118 5.121M12 14a5 5 0 00-5 5h10a5 5 0 00-5-5z"/>
                        </svg>
                        تصویر نمایه
                    </h3>

                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 items-center">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">تصویر فعلی</label>
                            <div class="flex items-center gap-4">
                                <div class="w-16 h-16 rounded-2xl bg-gradient-to-br from-indigo-500 to-violet-600 text-white flex items-center justify-center font-bold text-xl">
                                    @if($user->image != "")
                                    <img src='{{$user->image}}' class="w-fit h-fit"/>
                                    @endif
                                </div>
                                <div class="text-sm text-gray-600 dark:text-gray-400">
                                    <p>نام فایل: avatar_mehdi.jpg</p>
                                    <p>اندازه تقریبی: 300x300</p>
                                </div>
                            </div>
                        </div>
                        <div class="md:col-span-2 grid grid-cols-5">
                            <div class="col-span-4">
                            <label for="avatar" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">جایگزینی تصویر (اختیاری)</label>
                            <input id="image_label" name="image" type="text" value="{{old('image',$user->image)}}"
                                   class="w-full px-4 py-3 rounded-xl border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100 focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-indigo-50 file:text-indigo-700 hover:file:bg-indigo-100"/>
                            </div>
                                <button type="button" id="button-image"
                                    class="  h-12 mt-7 rounded-xl border  border-gray-300 dark:border-gray-600
                   bg-gray-100 dark:bg-gray-800 text-gray-800 dark:text-gray-100
                   hover:bg-gray-200 dark:hover:bg-gray-700
                   focus:outline-none focus:ring-2 focus:ring-purple-500 transition">
                                Select
                            </button>
                            <p class="text-xs text-gray-500 dark:text-gray-400 mt-2">PNG یا JPG تا حداکثر 2MB</p>
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

                        <button type="submit"
                                class="px-6 py-3 rounded-xl bg-gradient-to-r from-blue-600 to-indigo-600 text-white font-semibold hover:from-blue-700 hover:to-indigo-700 hover:shadow-lg transition">
                            ذخیره تغییرات
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <!-- Note -->
    <p class="text-xs text-gray-500 dark:text-gray-400 text-center">
        اگر رمز عبور را خالی بگذارید، رمز فعلی بدون تغییر می‌ماند.
    </p>
</div>
</div>
@endsection
