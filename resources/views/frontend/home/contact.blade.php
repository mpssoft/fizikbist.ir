@extends('layouts.app')

@section('content')
<div class="bg-gradient-to-br from-blue-50 to-indigo-100 min-h-screen">
<!-- Hero Section -->
<section class="py-20">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <div class="mb-8">
            <i class="fas fa-atom text-6xl text-indigo-600 mb-4"></i>
            <h1 class="text-2xl font-bold text-indigo-600">فیزیک بیست</h1>
        </div>
        <h2 class="text-5xl font-bold text-gray-900 mb-6">تماس با ما</h2>
        <p class="text-xl text-gray-600 max-w-3xl mx-auto leading-relaxed">
            برای دریافت مشاوره رایگان، ثبت‌نام در دوره‌ها یا پاسخ به سوالات خود با ما در تماس باشید. ما همیشه آماده کمک به شما هستیم.
        </p>
    </div>
</section>

<!-- Contact Info & Form Section -->
<section class="py-16">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid lg:grid-cols-2 gap-12">
            <!-- Contact Information -->
            <div class="bg-white rounded-2xl shadow-xl p-8">
                <h3 class="text-3xl font-bold text-gray-900 mb-8 text-center">اطلاعات تماس</h3>

                <div class="space-y-8">
                    <!-- Phone -->
                    <div class="flex items-center space-x-4 space-x-reverse">
                        <div class="bg-green-100 w-16 h-16 rounded-full flex items-center justify-center">
                            <i class="fas fa-mobile-alt text-2xl text-green-600"></i>
                        </div>
                        <div>
                            <h4 class="text-lg font-bold text-gray-900 mb-1">شماره تماس</h4>
                            <p class="text-gray-600 text-lg" dir="ltr">09141879767</p>
                            <p class="text-sm text-gray-500">پاسخگویی: شنبه تا پنج‌شنبه، ۹ تا ۲۱</p>
                        </div>
                    </div>

                    <!-- Email -->
                    <div class="flex items-center space-x-4 space-x-reverse">
                        <div class="bg-blue-100 w-16 h-16 rounded-full flex items-center justify-center">
                            <i class="fas fa-envelope text-2xl text-blue-600"></i>
                        </div>
                        <div>
                            <h4 class="text-lg font-bold text-gray-900 mb-1">ایمیل</h4>
                            <p class="text-gray-600 text-lg" dir="ltr">hosseinssp@gmail.com</p>
                            <p class="text-sm text-gray-500">پاسخ در کمتر از ۲۴ ساعت</p>
                        </div>
                    </div>

                    <!-- Address -->
                    <div class="flex items-center space-x-4 space-x-reverse">
                        <div class="bg-purple-100 w-16 h-16 rounded-full flex items-center justify-center">
                            <i class="fas fa-map-marker-alt text-2xl text-purple-600"></i>
                        </div>
                        <div>
                            <h4 class="text-lg font-bold text-gray-900 mb-1">آدرس</h4>
                            <p class="text-gray-600">کلاس‌های حضوری و آنلاین</p>
                            <p class="text-sm text-gray-500">امکان برگزاری کلاس در محل</p>
                        </div>
                    </div>

                    <!-- Working Hours -->
                    <div class="flex items-center space-x-4 space-x-reverse">
                        <div class="bg-orange-100 w-16 h-16 rounded-full flex items-center justify-center">
                            <i class="fas fa-clock text-2xl text-orange-600"></i>
                        </div>
                        <div>
                            <h4 class="text-lg font-bold text-gray-900 mb-1">ساعات کاری</h4>
                            <p class="text-gray-600">شنبه تا پنج‌شنبه: ۹:۰۰ - ۲۱:۰۰</p>
                            <p class="text-sm text-gray-500">جمعه‌ها: ۱۴:۰۰ - ۱۸:۰۰</p>
                        </div>
                    </div>
                </div>

                <!-- Quick Contact Buttons -->
                <div class="mt-8 grid grid-cols-2 gap-4">
                    <a href="tel:09141879767" class="bg-green-600 hover:bg-green-700 text-white px-6 py-3 rounded-lg font-semibold transition-colors text-center">
                        <i class="fas fa-phone mr-2"></i>
                        تماس مستقیم
                    </a>
                    <a href="mailto:hosseinssp@gmail.com" class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-3 rounded-lg font-semibold transition-colors text-center">
                        <i class="fas fa-envelope mr-2"></i>
                        ارسال ایمیل
                    </a>
                </div>
            </div>

            <!-- Contact Form -->
            <div class="bg-white rounded-2xl shadow-xl p-8">
                <h3 class="text-3xl font-bold text-gray-900 mb-8 text-center">ارسال پیام</h3>

                <form id="contactForm" class="space-y-6" >
                    <!-- Name -->
                    <div>
                        <label for="name" class="block text-sm font-bold text-gray-700 mb-2">نام و نام خانوادگی *</label>
                        <input type="text" id="name" name="name" required
                               class="w-full text-gray-800 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition-colors"
                               placeholder="نام کامل خود را وارد کنید">
                    </div>

                    <!-- Phone -->
                    <div>
                        <label for="phone" class="block text-sm font-bold text-gray-700 mb-2">شماره تماس *</label>
                        <input type="tel" id="phone" name="phone" required
                               class="w-full text-gray-800 px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition-colors"
                               placeholder="09xxxxxxxxx" dir="ltr">
                    </div>

                    <!-- Email -->
                    <div>
                        <label for="email" class="block text-sm font-bold text-gray-700 mb-2">ایمیل</label>
                        <input type="email" id="email" name="email"
                               class="w-full text-gray-800 px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition-colors"
                               placeholder="example@email.com" dir="ltr">
                    </div>

                    <!-- Grade -->
                    <div>
                        <label for="grade" class="block text-sm font-bold text-gray-700 mb-2">پایه تحصیلی</label>
                        <select id="grade" name="grade"
                                class="w-full text-gray-800 px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition-colors">
                            <option value="">انتخاب کنید</option>
                            <option value="10">دهم</option>
                            <option value="11">یازدهم</option>
                            <option value="12">دوازدهم</option>
                            <option value="graduate">فارغ‌التحصیل</option>
                        </select>
                    </div>

                    <!-- Subject -->
                    <div>
                        <label for="subject" class="block text-sm font-bold text-gray-700 mb-2">موضوع پیام *</label>
                        <select id="subject" name="subject" required
                                class="w-full px-4 text-gray-800 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition-colors">
                            <option value="">انتخاب کنید</option>
                            <option value="consultation">مشاوره رایگان</option>
                            <option value="registration">ثبت‌نام در دوره</option>
                            <option value="question">سوال درسی</option>
                            <option value="schedule">برنامه‌ریزی کلاس</option>
                            <option value="other">سایر موارد</option>
                        </select>
                    </div>

                    <!-- Message -->
                    <div>
                        <label for="message" class="block text-sm font-bold text-gray-700 mb-2">پیام شما *</label>
                        <textarea id="message" name="message" rows="5" required
                                  class="w-full px-4 py-3 text-gray-800 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition-colors resize-none"
                                  placeholder="پیام خود را اینجا بنویسید..."></textarea>
                    </div>

                    <!-- Submit Button -->
                    <button type="submit"
                            class="w-full bg-indigo-600 hover:bg-indigo-700 text-white px-8 py-4 rounded-lg font-bold text-lg transition-colors">
                        <i class="fas fa-paper-plane mr-2"></i>
                        ارسال پیام
                    </button>
                </form>

                <!-- Success Message -->
                <div id="successMessage" class="hidden mt-6 p-4  bg-green-100 border border-green-400 text-green-700 rounded-lg">
                    <i class="fas fa-check-circle mr-2"></i>
                    پیام شما با موفقیت ارسال شد! در اسرع وقت با شما تماس خواهیم گرفت.
                </div>
            </div>
        </div>
    </div>
</section>


</div>
@endsection

@push('scripts')
    <script src="/js/modules/sweetalert2.js"></script>
    <script src="/js/jquery/jquery.min.js"></script>
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $('#contactForm').on('submit', function (e) {
            e.preventDefault();

            var formData = new FormData(this);

            $.ajax({
                url: '/contact', // آدرس روت ذخیره فرم
                type: 'POST',
                data: formData,
                processData: false,
                contentType: false,
                success: function (response) {
                    Swal.fire({
                        icon: 'success',
                        title: 'موفق!',
                        text: response.message || 'پیام شما با موفقیت ارسال شد.',
                        confirmButtonText: 'باشه'
                    });
                    $('#contactForm')[0].reset();
                },
                error: function (xhr) {
                    let errorMessage = 'خطایی در ارسال داده رخ داد.';

                    if (xhr.status === 422) {
                        // خطای ولیدیشن لاراول
                        let errors = xhr.responseJSON.errors;
                        errorMessage = Object.values(errors).map(err => err.join(', ')).join('\n');
                    } else {
                        // خطاهای غیر ولیدیشن
                        if (xhr.responseJSON && xhr.responseJSON.message) {
                            errorMessage = xhr.responseJSON.message;
                        } else {
                            console.error("Server Response:", xhr.responseText);
                        }
                    }

                    Swal.fire({
                        icon: 'error',
                        title: 'خطا',
                        text: errorMessage,
                        confirmButtonText: 'باشه'
                    });
                }
            });
        });

    </script>

@endpush
