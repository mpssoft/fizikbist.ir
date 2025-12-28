@extends('layouts.user.master')

@section('content')
<div class="bg-gradient-to-br from-indigo-50 to-sky-50 dark:from-gray-900 dark:to-slate-900 min-h-screen py-8 px-4">
<div class="max-w-4xl mx-auto space-y-8">
    <!-- Header -->
    <div class="bg-white/90 dark:bg-gray-800/90 backdrop-blur rounded-2xl shadow-xl border border-indigo-100 dark:border-gray-700 overflow-hidden">
        <div class="p-8">
            <nav class="flex items-center text-sm text-gray-500 dark:text-gray-400 mb-6 gap-2" aria-label="Breadcrumb">
                <a href="/dashboard" class="hover:text-gray-700 dark:hover:text-gray-200 transition-colors">داشبورد</a>
                <span class="text-gray-300">/</span>
                <a href="/profile" class="hover:text-gray-700 dark:hover:text-gray-200 transition-colors">پروفایل</a>
                <span class="text-gray-300">/</span>
                <span class="text-gray-700 dark:text-gray-300 font-medium">ویرایش</span>
            </nav>

            <div class="flex items-center gap-4">
                <div class="w-16 h-16 rounded-2xl bg-gradient-to-br from-purple-600 to-pink-600 shadow-lg flex items-center justify-center">
                    <i class="fas fa-user-edit text-white text-2xl"></i>
                </div>
                <div>
                    <h1 class="text-2xl md:text-3xl font-extrabold text-gray-900 dark:text-white">ویرایش پروفایل</h1>
                    <p class="text-gray-600 dark:text-gray-300">اطلاعات شخصی خود را به‌روزرسانی کنید</p>
                </div>
            </div>
        </div>
    </div>
    @include('layouts.errors')
    <!-- Profile Form -->
    <div class="bg-white dark:bg-gray-800 rounded-2xl shadow-xl border border-indigo-100 dark:border-gray-700 overflow-hidden">
        <form id="profileForm" class="p-8 space-y-8" method="post" action="{{route('user.profile.update')}}" enctype="multipart/form-data">
            @csrf
            @method('put')
            <!-- Profile Photo Section -->
            <div class="text-center">
                <div class="relative inline-block">
                    <div class="profile-photo-upload relative w-32 h-32 mx-auto mb-4 cursor-pointer group" onclick="document.getElementById('photoInput').click()">
                        @if(auth()->user()->image)
                            <img id="profileImage" src="{{\Illuminate\Support\Facades\Storage::disk('users')->url( 'thumbs/'.auth()->user()->image)}}" width="100"
                                 alt="تصویر پروفایل"
                                 class="w-32 h-32 rounded-full object-cover border-4 border-white dark:border-gray-700 shadow-lg">

                        @else
                        <img id="profileImage" src="data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 100 100'%3E%3Ccircle cx='50' cy='50' r='50' fill='%23e5e7eb'/%3E%3Cpath d='M50 45c-8.284 0-15 6.716-15 15v20h30V60c0-8.284-6.716-15-15-15z' fill='%23d1d5db'/%3E%3Ccircle cx='50' cy='30' r='12' fill='%23d1d5db'/%3E%3C/svg%3E"
                             alt="تصویر پروفایل"
                             class="w-32 h-32 rounded-full object-cover border-4 border-white dark:border-gray-700 shadow-lg">
                       @endif
                        <div class="absolute inset-0 bg-black/50 rounded-full opacity-0 group-hover:opacity-100 transition-opacity flex items-center justify-center">
                            <div class="text-white text-center">
                                <i class="fas fa-camera text-2xl mb-2"></i>
                                <div class="text-sm font-medium">تغییر عکس</div>
                            </div>
                        </div>
                    </div>
                    <input type="file" id="photoInput" name="image" accept="image/*" class="hidden" onchange="handlePhotoUpload(event)">
                </div>
                <p class="text-sm text-gray-500 dark:text-gray-400">روی تصویر کلیک کنید تا عکس جدید انتخاب کنید</p>
                <p class="text-xs text-gray-400 dark:text-gray-500 mt-1">فرمت‌های مجاز: JPG, PNG, GIF (حداکثر 5MB)</p>
            </div>

            <!-- Form Fields -->
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                <!-- Name Field -->
                <div class="form-field space-y-2">
                    <label for="name" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                        <i class="fas fa-user text-indigo-500 ml-2"></i>
                        نام و نام خانوادگی
                    </label>
                    <input type="text" id="name" name="name" value="{{auth()->user()->name}}" required
                           class="w-full px-4 py-3 rounded-xl border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100 focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition">
                    <div id="nameError" class="text-red-500 text-sm hidden">
                        <i class="fas fa-exclamation-circle ml-1"></i>
                        نام نمی‌تواند خالی باشد
                    </div>
                </div>

                <!-- Email Field -->
                <div class="form-field space-y-2">
                    <label for="email" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                        <i class="fas fa-envelope text-indigo-500 ml-2"></i>
                        آدرس ایمیل
                    </label>
                    <input type="email" id="email" name="email" value="{{auth()->user()->email}}"
                           class="w-full px-4 py-3 rounded-xl border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100 focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition">
                    <div id="emailError" class="text-red-500 text-sm hidden">
                        <i class="fas fa-exclamation-circle ml-1"></i>
                        لطفاً یک آدرس ایمیل معتبر وارد کنید
                    </div>
                </div>

                <!-- Mobile Field (Disabled) -->
                <div class="form-field space-y-2">
                    <label for="mobile" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                        <i class="fas fa-mobile-alt text-gray-400 ml-2"></i>
                        شماره موبایل
                    </label>
                    <input type="tel" id="mobile" name="mobile" value="{{auth()->user()->mobile}}" disabled
                           class="w-full px-4 py-3 rounded-xl border border-gray-300 dark:border-gray-600 bg-gray-100 dark:bg-gray-600 text-gray-500 dark:text-gray-400 cursor-not-allowed">
                    <div class="text-xs text-gray-500 dark:text-gray-400">
                        <i class="fas fa-info-circle ml-1"></i>
                        شماره موبایل قابل تغییر نیست
                    </div>
                </div>
{{--
                <!-- Additional Info -->
                <div class="form-field space-y-2">
                    <label for="bio" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                        <i class="fas fa-info-circle text-indigo-500 ml-2"></i>
                        درباره من (اختیاری)
                    </label>
                    <textarea id="bio" name="bio" rows="3" placeholder="چند کلمه درباره خودتان بنویسید..."
                              class="w-full px-4 py-3 rounded-xl border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100 focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition resize-none">توسعه‌دهنده نرم‌افزار با علاقه به یادگیری تکنولوژی‌های جدید</textarea>
                </div>--}}
            </div>

            <!-- Account Settings -->
            {{--<div class="border-t border-gray-200 dark:border-gray-700 pt-8">
                <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-6">
                    <i class="fas fa-cog text-indigo-500 ml-2"></i>
                    تنظیمات حساب
                </h3>

                <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                    <!-- Notifications -->
                    <div class="space-y-4">
                        <h4 class="font-medium text-gray-700 dark:text-gray-300">اعلان‌ها</h4>
                        <div class="space-y-3">
                            <label class="flex items-center gap-3 cursor-pointer">
                                <input type="checkbox" checked class="w-5 h-5 text-indigo-600 rounded focus:ring-indigo-500">
                                <span class="text-sm text-gray-700 dark:text-gray-300">اعلان‌های ایمیل</span>
                            </label>
                            <label class="flex items-center gap-3 cursor-pointer">
                                <input type="checkbox" checked class="w-5 h-5 text-indigo-600 rounded focus:ring-indigo-500">
                                <span class="text-sm text-gray-700 dark:text-gray-300">اعلان‌های پیامک</span>
                            </label>
                            <label class="flex items-center gap-3 cursor-pointer">
                                <input type="checkbox" class="w-5 h-5 text-indigo-600 rounded focus:ring-indigo-500">
                                <span class="text-sm text-gray-700 dark:text-gray-300">اعلان‌های بازاریابی</span>
                            </label>
                        </div>
                    </div>

                    <!-- Privacy -->
                    <div class="space-y-4">
                        <h4 class="font-medium text-gray-700 dark:text-gray-300">حریم خصوصی</h4>
                        <div class="space-y-3">
                            <label class="flex items-center gap-3 cursor-pointer">
                                <input type="checkbox" checked class="w-5 h-5 text-indigo-600 rounded focus:ring-indigo-500">
                                <span class="text-sm text-gray-700 dark:text-gray-300">نمایش پروفایل عمومی</span>
                            </label>
                            <label class="flex items-center gap-3 cursor-pointer">
                                <input type="checkbox" class="w-5 h-5 text-indigo-600 rounded focus:ring-indigo-500">
                                <span class="text-sm text-gray-700 dark:text-gray-300">نمایش فعالیت‌ها</span>
                            </label>
                        </div>
                    </div>
                </div>
            </div>--}}

            <!-- Action Buttons -->
            <div class="border-t border-gray-200 dark:border-gray-700 pt-8">
                <div class="flex flex-col sm:flex-row gap-4 justify-end">

                    <button type="submit" id="saveButton"
                            class="px-8 py-3 rounded-xl bg-gradient-to-r from-indigo-600 to-purple-600 text-white font-medium hover:from-indigo-700 hover:to-purple-700 transition shadow-lg">
                        <i class="fas fa-save ml-2"></i>
                        ذخیره تغییرات
                    </button>
                </div>
            </div>
        </form>
    </div>

    <!-- Success Message (Hidden by default) -->
    <div id="successMessage" class="hidden bg-emerald-50 dark:bg-emerald-900/20 border border-emerald-200 dark:border-emerald-700 rounded-2xl p-6">
        <div class="flex items-center gap-3">
            <div class="w-10 h-10 rounded-full bg-emerald-500 flex items-center justify-center">
                <i class="fas fa-check text-white"></i>
            </div>
            <div>
                <h3 class="font-semibold text-emerald-800 dark:text-emerald-200">تغییرات با موفقیت ذخیره شد!</h3>
                <p class="text-sm text-emerald-600 dark:text-emerald-300">اطلاعات پروفایل شما به‌روزرسانی شد.</p>
            </div>
        </div>
    </div>
</div>
</div>
@endsection
<script>
    // Handle photo upload
    function handlePhotoUpload(event) {
        const file = event.target.files[0];
        if (file) {
            // Validate file size (5MB max)
            if (file.size > 5 * 1024 * 1024) {
                alert('حجم فایل نباید بیشتر از 5 مگابایت باشد');
                return;
            }

            // Validate file type
            if (!file.type.startsWith('image/')) {
                alert('لطفاً یک فایل تصویری انتخاب کنید');
                return;
            }

            const reader = new FileReader();
            reader.onload = function(e) {
                document.getElementById('profileImage').src = e.target.result;
            };
            reader.readAsDataURL(file);
        }
    }



</script>

