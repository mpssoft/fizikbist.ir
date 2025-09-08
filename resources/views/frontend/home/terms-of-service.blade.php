@extends('layouts.app')

@section('content')
<div class="bg-gray-50 dark:bg-gray-900 text-gray-900 dark:text-gray-100 min-h-screen">

<!-- Header -->
<div class="bg-gradient-to-r from-blue-600 to-purple-600 text-white py-12">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center">
            <div class="w-20 h-20 bg-white bg-opacity-20 rounded-full flex items-center justify-center mx-auto mb-6">
                <i class="fas fa-file-contract text-3xl"></i>
            </div>
            <h1 class="text-4xl font-bold mb-4">شرایط و ضوابط</h1>
            <p class="text-xl opacity-90">وب‌سایت فیزیک بیست</p>
            <div class="mt-6 text-sm opacity-80">
                <i class="fas fa-globe ml-2"></i>
                www.fizikbist.ir
            </div>
        </div>
    </div>
</div>

<!-- Main Content -->
<div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-12">

    <!-- Introduction -->
    <div class="bg-white dark:bg-gray-800 rounded-2xl shadow-lg border border-gray-200 dark:border-gray-700 p-8 mb-8">
        <div class="bg-blue-50 dark:bg-blue-900/20 rounded-lg p-6 mb-8">
            <div class="flex items-start gap-4">
                <i class="fas fa-info-circle text-blue-600 text-2xl mt-1"></i>
                <div>
                    <h2 class="text-xl font-bold text-blue-800 dark:text-blue-200 mb-3">مقدمه</h2>
                    <p class="text-blue-700 dark:text-blue-300 leading-relaxed">
                        با تشکر از شما برای انتخاب وب‌سایت فیزیک بیست (www.fizikbist.ir). استفاده از خدمات و دوره‌های آموزشی ارائه شده در این سایت مشروط به پذیرش کامل و بی‌قید و شرط شرایط و ضوابط زیر است. با کلیک روی دکمه «قبول شرایط و ضوابط»، شما تأیید می‌کنید که این موارد را مطالعه کرده و با آن‌ها موافقت دارید.
                    </p>
                </div>
            </div>
        </div>

        <!-- Table of Contents -->
        <div class="bg-gray-50 dark:bg-gray-700 rounded-lg p-6 mb-8">
            <h3 class="font-bold text-gray-900 dark:text-white mb-4">
                <i class="fas fa-list ml-2"></i>
                فهرست مطالب
            </h3>
            <div class="grid md:grid-cols-2 gap-3">
                <a href="#section1" class="flex items-center gap-3 p-3 bg-white dark:bg-gray-600 rounded-lg hover:bg-blue-50 dark:hover:bg-blue-900/20 transition-colors group">
                    <span class="w-8 h-8 bg-blue-100 dark:bg-blue-900 text-blue-600 dark:text-blue-300 rounded-full flex items-center justify-center text-sm font-bold">۱</span>
                    <span class="text-gray-700 dark:text-gray-300 group-hover:text-blue-600 dark:group-hover:text-blue-300">مالکیت فکری و حق کپی‌رایت</span>
                </a>
                <a href="#section2" class="flex items-center gap-3 p-3 bg-white dark:bg-gray-600 rounded-lg hover:bg-blue-50 dark:hover:bg-blue-900/20 transition-colors group">
                    <span class="w-8 h-8 bg-blue-100 dark:bg-blue-900 text-blue-600 dark:text-blue-300 rounded-full flex items-center justify-center text-sm font-bold">۲</span>
                    <span class="text-gray-700 dark:text-gray-300 group-hover:text-blue-600 dark:group-hover:text-blue-300">شرایط خرید و بازگشت وجه</span>
                </a>
                <a href="#section3" class="flex items-center gap-3 p-3 bg-white dark:bg-gray-600 rounded-lg hover:bg-blue-50 dark:hover:bg-blue-900/20 transition-colors group">
                    <span class="w-8 h-8 bg-blue-100 dark:bg-blue-900 text-blue-600 dark:text-blue-300 rounded-full flex items-center justify-center text-sm font-bold">۳</span>
                    <span class="text-gray-700 dark:text-gray-300 group-hover:text-blue-600 dark:group-hover:text-blue-300">حریم خصوصی</span>
                </a>
                <a href="#section4" class="flex items-center gap-3 p-3 bg-white dark:bg-gray-600 rounded-lg hover:bg-blue-50 dark:hover:bg-blue-900/20 transition-colors group">
                    <span class="w-8 h-8 bg-blue-100 dark:bg-blue-900 text-blue-600 dark:text-blue-300 rounded-full flex items-center justify-center text-sm font-bold">۴</span>
                    <span class="text-gray-700 dark:text-gray-300 group-hover:text-blue-600 dark:group-hover:text-blue-300">محدودیت‌ها و مسئولیت‌ها</span>
                </a>
                <a href="#section5" class="flex items-center gap-3 p-3 bg-white dark:bg-gray-600 rounded-lg hover:bg-blue-50 dark:hover:bg-blue-900/20 transition-colors group">
                    <span class="w-8 h-8 bg-blue-100 dark:bg-blue-900 text-blue-600 dark:text-blue-300 rounded-full flex items-center justify-center text-sm font-bold">۵</span>
                    <span class="text-gray-700 dark:text-gray-300 group-hover:text-blue-600 dark:group-hover:text-blue-300">قبول شرایط</span>
                </a>
            </div>
        </div>
    </div>

    <!-- Section 1: Intellectual Property -->
    <div id="section1" class="bg-white dark:bg-gray-800 rounded-2xl shadow-lg border border-gray-200 dark:border-gray-700 p-8 mb-8">
        <div class="flex items-center gap-4 mb-6">
            <div class="w-12 h-12 bg-gradient-to-br from-purple-500 to-purple-600 rounded-full flex items-center justify-center">
                <span class="text-white font-bold text-lg">۱</span>
            </div>
            <h2 class="text-2xl font-bold text-gray-900 dark:text-white">مالکیت فکری و حق کپی‌رایت</h2>
        </div>

        <div class="space-y-6">
            <div class="border-r-4 border-purple-500 pr-6">
                <h3 class="font-bold text-gray-900 dark:text-white mb-3 flex items-center gap-2">
                    <i class="fas fa-copyright text-purple-500"></i>
                    مالکیت محتوا
                </h3>
                <p class="text-gray-600 dark:text-gray-400 leading-relaxed">
                    تمام محتوای آموزشی شامل ویدئوها، فایل‌های PDF، اسلایدها، تمرین‌ها و هر گونه اطلاعاتی که در دوره‌ها ارائه می‌شود، دارای حق کپی‌رایت است و منحصراً متعلق به این وب‌سایت و سازنده آن <strong class="text-purple-600 dark:text-purple-400">(حسین نژاداسد)</strong> می‌باشد.
                </p>
            </div>

            <div class="border-r-4 border-blue-500 pr-6">
                <h3 class="font-bold text-gray-900 dark:text-white mb-3 flex items-center gap-2">
                    <i class="fas fa-user-shield text-blue-500"></i>
                    استفاده شخصی
                </h3>
                <p class="text-gray-600 dark:text-gray-400 leading-relaxed">
                    شما مجاز به استفاده از این محتوا تنها برای اهداف آموزشی و شخصی خود هستید. هرگونه تکثیر، انتشار، بازنشر، فروش، اجاره، یا اشتراک‌گذاری عمومی این محتوا در هر پلتفرمی، چه رایگان و چه پولی، اکیداً ممنوع است.
                </p>
            </div>

            <div class="bg-red-50 dark:bg-red-900/20 border border-red-200 dark:border-red-800 rounded-lg p-4">
                <h3 class="font-bold text-red-800 dark:text-red-200 mb-3 flex items-center gap-2">
                    <i class="fas fa-gavel text-red-600"></i>
                    پیگرد قانونی
                </h3>
                <p class="text-red-700 dark:text-red-300 leading-relaxed">
                    در صورت نقض این بند، وب‌سایت حق پیگیری قانونی و مطالبه خسارت را برای خود محفوظ می‌دارد.
                </p>
            </div>
        </div>
    </div>

    <!-- Section 2: Purchase Terms -->
    <div id="section2" class="bg-white dark:bg-gray-800 rounded-2xl shadow-lg border border-gray-200 dark:border-gray-700 p-8 mb-8">
        <div class="flex items-center gap-4 mb-6">
            <div class="w-12 h-12 bg-gradient-to-br from-green-500 to-green-600 rounded-full flex items-center justify-center">
                <span class="text-white font-bold text-lg">۲</span>
            </div>
            <h2 class="text-2xl font-bold text-gray-900 dark:text-white">شرایط خرید و بازگشت وجه</h2>
        </div>

        <div class="space-y-6">
            <div class="border-r-4 border-green-500 pr-6">
                <h3 class="font-bold text-gray-900 dark:text-white mb-3 flex items-center gap-2">
                    <i class="fas fa-check-circle text-green-500"></i>
                    تأیید خرید
                </h3>
                <p class="text-gray-600 dark:text-gray-400 leading-relaxed">
                    پس از تکمیل فرآیند خرید، دسترسی به دوره خریداری شده برای شما فراهم می‌شود. تمامی پرداخت‌ها از طریق درگاه‌های امن بانکی انجام می‌گیرد.
                </p>
            </div>

            <div class="bg-red-50 dark:bg-red-900/20 border-2 border-red-300 dark:border-red-700 rounded-lg p-6">
                <h3 class="font-bold text-red-800 dark:text-red-200 mb-4 flex items-center gap-2">
                    <i class="fas fa-exclamation-triangle text-red-600 text-xl"></i>
                    سیاست بازگشت وجه - مهم
                </h3>
                <div class="bg-red-100 dark:bg-red-900/40 rounded-lg p-4 mb-4">
                    <p class="text-red-800 dark:text-red-200 font-semibold leading-relaxed">
                        با توجه به ماهیت دیجیتال دوره‌ها و دسترسی فوری به محتوا پس از خرید، امکان بازگشت وجه (Refund) وجود ندارد.
                    </p>
                </div>
                <p class="text-red-700 dark:text-red-300 leading-relaxed">
                    لطفاً قبل از خرید، توضیحات دوره، سرفصل‌ها و نمونه‌های احتمالی را به دقت بررسی کنید تا از تصمیم خود اطمینان حاصل نمایید.
                </p>
            </div>

            <div class="border-r-4 border-orange-500 pr-6">
                <h3 class="font-bold text-gray-900 dark:text-white mb-3 flex items-center gap-2">
                    <i class="fas fa-user-check text-orange-500"></i>
                    مسئولیت کاربر
                </h3>
                <p class="text-gray-600 dark:text-gray-400 leading-relaxed">
                    مسئولیت انتخاب دوره مناسب بر عهده کاربر است. در صورت خرید اشتباه، امکان تعویض یا بازگشت وجه وجود ندارد.
                </p>
            </div>
        </div>
    </div>

    <!-- Section 3: Privacy -->
    <div id="section3" class="bg-white dark:bg-gray-800 rounded-2xl shadow-lg border border-gray-200 dark:border-gray-700 p-8 mb-8">
        <div class="flex items-center gap-4 mb-6">
            <div class="w-12 h-12 bg-gradient-to-br from-blue-500 to-blue-600 rounded-full flex items-center justify-center">
                <span class="text-white font-bold text-lg">۳</span>
            </div>
            <h2 class="text-2xl font-bold text-gray-900 dark:text-white">حریم خصوصی</h2>
        </div>

        <div class="space-y-6">
            <div class="border-r-4 border-blue-500 pr-6">
                <h3 class="font-bold text-gray-900 dark:text-white mb-3 flex items-center gap-2">
                    <i class="fas fa-database text-blue-500"></i>
                    جمع‌آوری اطلاعات
                </h3>
                <p class="text-gray-600 dark:text-gray-400 leading-relaxed">
                    این وب‌سایت اطلاعات شخصی شما مانند نام، ایمیل، و اطلاعات پرداخت را صرفاً برای تکمیل فرآیند خرید و ارائه خدمات جمع‌آوری می‌کند.
                </p>
            </div>

            <div class="bg-green-50 dark:bg-green-900/20 border border-green-200 dark:border-green-800 rounded-lg p-4">
                <h3 class="font-bold text-green-800 dark:text-green-200 mb-3 flex items-center gap-2">
                    <i class="fas fa-shield-alt text-green-600"></i>
                    حفظ اطلاعات
                </h3>
                <p class="text-green-700 dark:text-green-300 leading-relaxed">
                    ما متعهد به حفظ حریم خصوصی شما هستیم. اطلاعات جمع‌آوری شده محرمانه تلقی می‌شود و بدون رضایت شما به هیچ شخص یا سازمان ثالثی فروخته، اجاره یا به اشتراک گذاشته نخواهد شد، مگر در مواردی که طبق قانون الزامی باشد.
                </p>
            </div>
        </div>
    </div>

    <!-- Section 4: Limitations -->
    <div id="section4" class="bg-white dark:bg-gray-800 rounded-2xl shadow-lg border border-gray-200 dark:border-gray-700 p-8 mb-8">
        <div class="flex items-center gap-4 mb-6">
            <div class="w-12 h-12 bg-gradient-to-br from-orange-500 to-orange-600 rounded-full flex items-center justify-center">
                <span class="text-white font-bold text-lg">۴</span>
            </div>
            <h2 class="text-2xl font-bold text-gray-900 dark:text-white">محدودیت‌ها و مسئولیت‌ها</h2>
        </div>

        <div class="space-y-6">
            <div class="border-r-4 border-orange-500 pr-6">
                <h3 class="font-bold text-gray-900 dark:text-white mb-3 flex items-center gap-2">
                    <i class="fas fa-graduation-cap text-orange-500"></i>
                    مسئولیت محتوا
                </h3>
                <p class="text-gray-600 dark:text-gray-400 leading-relaxed">
                    محتوای آموزشی ارائه شده بر اساس دانش و تجربه معلم تهیه شده است. با این حال، وب‌سایت هیچگونه تضمینی مبنی بر کسب نمره یا موفقیت قطعی دانش‌آموزان در امتحانات یا رقابت‌ها ارائه نمی‌دهد.
                </p>
            </div>

            <div class="border-r-4 border-yellow-500 pr-6">
                <h3 class="font-bold text-gray-900 dark:text-white mb-3 flex items-center gap-2">
                    <i class="fas fa-exclamation-circle text-yellow-500"></i>
                    خطای کاربری
                </h3>
                <p class="text-gray-600 dark:text-gray-400 leading-relaxed">
                    وب‌سایت در قبال هرگونه مشکل فنی یا خطایی که به دلیل اتصال اینترنت ضعیف یا مشکلات نرم‌افزاری در سیستم کاربر رخ دهد، مسئولیتی ندارد.
                </p>
            </div>

            <div class="border-r-4 border-purple-500 pr-6">
                <h3 class="font-bold text-gray-900 dark:text-white mb-3 flex items-center gap-2">
                    <i class="fas fa-edit text-purple-500"></i>
                    تغییرات
                </h3>
                <p class="text-gray-600 dark:text-gray-400 leading-relaxed">
                    وب‌سایت حق دارد در هر زمان و بدون اطلاع قبلی، شرایط و ضوابط را تغییر دهد. تغییرات جدید در همین صفحه منتشر خواهد شد و از تاریخ انتشار معتبر است.
                </p>
            </div>
        </div>
    </div>

    <!-- Section 5: Acceptance -->
    <div id="section5" class="bg-white dark:bg-gray-800 rounded-2xl shadow-lg border border-gray-200 dark:border-gray-700 p-8 mb-8">
        <div class="flex items-center gap-4 mb-6">
            <div class="w-12 h-12 bg-gradient-to-br from-indigo-500 to-indigo-600 rounded-full flex items-center justify-center">
                <span class="text-white font-bold text-lg">۵</span>
            </div>
            <h2 class="text-2xl font-bold text-gray-900 dark:text-white">قبول شرایط</h2>
        </div>

        <div class="bg-gradient-to-r from-indigo-50 to-purple-50 dark:from-indigo-900/20 dark:to-purple-900/20 border border-indigo-200 dark:border-indigo-800 rounded-lg p-6">
            <div class="flex items-start gap-4">
                <i class="fas fa-hand-paper text-indigo-600 text-2xl mt-1"></i>
                <div>
                    <h3 class="font-bold text-indigo-800 dark:text-indigo-200 mb-3">تأیید و پذیرش</h3>
                    <p class="text-indigo-700 dark:text-indigo-300 leading-relaxed mb-4">
                        با کلیک روی دکمه «قبول شرایط و ضوابط»، شما تأیید می‌کنید که تمامی بندهای فوق را مطالعه کرده، فهمیده‌اید و با آن‌ها موافق هستید. استفاده شما از خدمات وب‌سایت به منزله پذیرش کامل و بی‌قید و شرط این شرایط است.
                    </p>
                    <div class="bg-yellow-100 dark:bg-yellow-900/30 border border-yellow-300 dark:border-yellow-700 rounded-lg p-4">
                        <p class="text-yellow-800 dark:text-yellow-200 font-semibold">
                            <i class="fas fa-info-circle ml-2"></i>
                            عدم موافقت: در صورت عدم موافقت با این شرایط، لطفاً از ادامه فرآیند خرید صرف‌نظر کنید.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Contact Section -->
    <div class="bg-gradient-to-r from-blue-600 to-purple-600 rounded-2xl shadow-lg text-white p-8 text-center">
        <div class="w-16 h-16 bg-white bg-opacity-20 rounded-full flex items-center justify-center mx-auto mb-6">
            <i class="fas fa-headset text-2xl"></i>
        </div>
        <h2 class="text-2xl font-bold mb-4">تماس با ما</h2>
        <p class="text-lg opacity-90 mb-6">
            در صورت داشتن هرگونه سؤال یا ابهام، می‌توانید از طریق بخش تماس با ما با تیم پشتیبانی در ارتباط باشید.
        </p>
        <div class="flex items-center justify-center gap-6 text-sm">
            <div class="flex items-center gap-2">
                <i class="fas fa-phone"></i>
                <span>۰۹۱۴۱۸۷۹۷۶۷</span>
            </div>
            <div class="flex items-center gap-2">
                <i class="fas fa-globe"></i>
                <span>www.fizikbist.ir</span>
            </div>
        </div>
    </div>

    <!-- Back to Top Button -->
    <div class="fixed bottom-8 left-8">
        <button onclick="scrollToTop()" class="bg-blue-600 hover:bg-blue-700 text-white w-12 h-12 rounded-full shadow-lg transition-all duration-300 transform hover:scale-110">
            <i class="fas fa-arrow-up"></i>
        </button>
    </div>

</div>
</div>

@endsection

@push('scripts')

@endpush
