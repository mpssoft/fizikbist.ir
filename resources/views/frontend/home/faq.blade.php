@extends('layouts.app')
@push('styles')
    <style>
        body { font-family: 'Tahoma', sans-serif; }
        .faq-answer {
            max-height: 0;
            overflow: hidden;
            transition: max-height 0.3s ease-out;
        }
        .faq-answer.active {
            max-height: 500px;
            transition: max-height 0.3s ease-in;
        }
    </style>
    @endpush
 @section('content')

<div class="bg-gradient-to-br from-blue-50 to-indigo-100 min-h-screen">
<!-- Hero Section -->
<section class="py-20">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <div class="mb-8">
            <i class="fas fa-atom text-6xl text-indigo-600 mb-4"></i>
            <h1 class="text-2xl font-bold text-indigo-600">فیزیک بیست</h1>
        </div>
        <h2 class="text-5xl font-bold text-gray-900 mb-6">سوالات متداول</h2>
        <p class="text-xl text-gray-600 max-w-3xl mx-auto leading-relaxed">
            پاسخ سوالات رایج دانش‌آموزان و اولیای محترم درباره دوره‌های فیزیک و آمادگی برای کنکور
        </p>
    </div>
</section>

<!-- Search Box -->
<section class="pb-8">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="bg-white rounded-lg shadow-lg p-6">
            <div class="relative">
                <input type="text" id="searchInput" placeholder="جستجو در سوالات..."
                       class="w-full text-gray-500 px-10 py-3  border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500">
                <i class="fas fa-search absolute right-4 top-4 text-gray-400"></i>
            </div>
        </div>
    </div>
</section>

<!-- FAQ Categories -->
<section class="pb-16">
    <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid md:grid-cols-4 gap-4 mb-8">
            <button onclick="filterFAQ('all')" class="filter-btn bg-indigo-600 text-white px-4 py-2 rounded-lg font-semibold transition-colors">
                همه سوالات
            </button>
            <button onclick="filterFAQ('courses')" class="filter-btn bg-gray-200 text-gray-700 hover:bg-gray-300 px-4 py-2 rounded-lg font-semibold transition-colors">
                دوره‌ها
            </button>
            <button onclick="filterFAQ('konkur')" class="filter-btn bg-gray-200 text-gray-700 hover:bg-gray-300 px-4 py-2 rounded-lg font-semibold transition-colors">
                کنکور
            </button>
            <button onclick="filterFAQ('technical')" class="filter-btn bg-gray-200 text-gray-700 hover:bg-gray-300 px-4 py-2 rounded-lg font-semibold transition-colors">
                فنی
            </button>
        </div>
    </div>
</section>

<!-- FAQ Content -->
<section class="pb-16">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="space-y-4" id="faqContainer">

            <!-- General Questions -->
            <div class="faq-item bg-white rounded-lg shadow-lg" data-category="courses">
                <button class="faq-question w-full text-right p-6 focus:outline-none" onclick="toggleFAQ(this)">
                    <div class="flex items-center justify-between">
                        <h3 class="text-lg font-bold text-gray-900">
                            <i class="fas fa-graduation-cap text-indigo-600 ml-3"></i>
                            دوره‌های فیزیک بیست شامل چه مطالبی است؟
                        </h3>
                        <i class="fas fa-chevron-down text-gray-400 transform transition-transform"></i>
                    </div>
                </button>
                <div class="faq-answer px-6 pb-6">
                    <p class="text-gray-600 leading-relaxed">
                        دوره‌های ما شامل تمام مباحث فیزیک دبیرستان (دهم، یازدهم و دوازدهم) است. هر دوره شامل:
                    </p>
                    <ul class="mt-3 mr-4 space-y-2 text-gray-600">
                        <li>• آموزش کامل مفاهیم با مثال‌های کاربردی</li>
                        <li>• حل تمرین‌های متنوع و تست‌های کنکوری</li>
                        <li>• جزوات و نمونه سوالات</li>
                        <li>• آزمون‌های دوره‌ای و ارزیابی پیشرفت</li>
                        <li>• پشتیبانی و پاسخ به سوالات</li>
                    </ul>
                </div>
            </div>

            <div class="faq-item bg-white rounded-lg shadow-lg" data-category="courses">
                <button class="faq-question w-full text-right p-6 focus:outline-none" onclick="toggleFAQ(this)">
                    <div class="flex items-center justify-between">
                        <h3 class="text-lg font-bold text-gray-900">
                            <i class="fas fa-clock text-indigo-600 ml-3"></i>
                            مدت زمان هر دوره چقدر است؟
                        </h3>
                        <i class="fas fa-chevron-down text-gray-400 transform transition-transform"></i>
                    </div>
                </button>
                <div class="faq-answer px-6 pb-6">
                    <p class="text-gray-600 leading-relaxed">
                        مدت زمان دوره‌ها بسته به نوع دوره متفاوت است:
                    </p>
                    <ul class="mt-3 mr-4 space-y-2 text-gray-600">
                        <li>• دوره پایه (هر پایه): ۴-۶ ماه</li>
                        <li>• دوره جامع کنکور: ۸-۱۰ ماه</li>
                        <li>• دوره فشرده کنکور: ۳-۴ ماه</li>
                        <li>• کلاس‌های تقویتی: بر اساس نیاز</li>
                    </ul>
                    <p class="mt-3 text-gray-600">
                        هر جلسه ۲ ساعت و هفته‌ای ۲-۳ جلسه برگزار می‌شود.
                    </p>
                </div>
            </div>

            <div class="faq-item bg-white rounded-lg shadow-lg" data-category="courses">
                <button class="faq-question w-full text-right p-6 focus:outline-none" onclick="toggleFAQ(this)">
                    <div class="flex items-center justify-between">
                        <h3 class="text-lg font-bold text-gray-900">
                            <i class="fas fa-users text-indigo-600 ml-3"></i>
                            کلاس‌ها به صورت گروهی یا خصوصی برگزار می‌شود؟
                        </h3>
                        <i class="fas fa-chevron-down text-gray-400 transform transition-transform"></i>
                    </div>
                </button>
                <div class="faq-answer px-6 pb-6">
                    <p class="text-gray-600 leading-relaxed">
                        ما هر دو نوع کلاس را ارائه می‌دهیم:
                    </p>
                    <div class="mt-4 grid md:grid-cols-2 gap-4">
                        <div class="bg-blue-50 p-4 rounded-lg">
                            <h4 class="font-bold text-blue-900 mb-2">کلاس گروهی</h4>
                            <ul class="text-sm text-blue-800 space-y-1">
                                <li>• حداکثر ۸ نفر در هر کلاس</li>
                                <li>• تعامل بیشتر با سایر دانش‌آموزان</li>
                                <li>• هزینه مقرون‌به‌صرفه‌تر</li>
                            </ul>
                        </div>
                        <div class="bg-green-50 p-4 rounded-lg">
                            <h4 class="font-bold text-green-900 mb-2">کلاس خصوصی</h4>
                            <ul class="text-sm text-green-800 space-y-1">
                                <li>• توجه کامل به دانش‌آموز</li>
                                <li>• برنامه‌ریزی اختصاصی</li>
                                <li>• انعطاف در زمان‌بندی</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Konkur Questions -->
            <div class="faq-item bg-white rounded-lg shadow-lg" data-category="konkur">
                <button class="faq-question w-full text-right p-6 focus:outline-none" onclick="toggleFAQ(this)">
                    <div class="flex items-center justify-between">
                        <h3 class="text-lg font-bold text-gray-900">
                            <i class="fas fa-trophy text-indigo-600 ml-3"></i>
                            چه درصد از دانش‌آموزان شما در کنکور قبول می‌شوند؟
                        </h3>
                        <i class="fas fa-chevron-down text-gray-400 transform transition-transform"></i>
                    </div>
                </button>
                <div class="faq-answer px-6 pb-6">
                    <p class="text-gray-600 leading-relaxed">
                        آمار موفقیت دانش‌آموزان ما در کنکور:
                    </p>
                    <div class="mt-4 grid md:grid-cols-3 gap-4">
                        <div class="bg-green-100 p-4 rounded-lg text-center">
                            <div class="text-2xl font-bold text-green-600">95%</div>
                            <div class="text-sm text-green-800">نرخ کل قبولی</div>
                        </div>
                        <div class="bg-blue-100 p-4 rounded-lg text-center">
                            <div class="text-2xl font-bold text-blue-600">78%</div>
                            <div class="text-sm text-blue-800">دانشگاه‌های برتر</div>
                        </div>
                        <div class="bg-purple-100 p-4 rounded-lg text-center">
                            <div class="text-2xl font-bold text-purple-600">45%</div>
                            <div class="text-sm text-purple-800">رتبه زیر ۱۰۰۰</div>
                        </div>
                    </div>
                    <p class="mt-4 text-gray-600">
                        این آمار مربوط به دانش‌آموزانی است که دوره کامل را گذرانده‌اند.
                    </p>
                </div>
            </div>

            <div class="faq-item bg-white rounded-lg shadow-lg" data-category="konkur">
                <button class="faq-question w-full text-right p-6 focus:outline-none" onclick="toggleFAQ(this)">
                    <div class="flex items-center justify-between">
                        <h3 class="text-lg font-bold text-gray-900">
                            <i class="fas fa-calendar-alt text-indigo-600 ml-3"></i>
                            چه زمانی باید برای کنکور شروع کنم؟
                        </h3>
                        <i class="fas fa-chevron-down text-gray-400 transform transition-transform"></i>
                    </div>
                </button>
                <div class="faq-answer px-6 pb-6">
                    <p class="text-gray-600 leading-relaxed">
                        بهترین زمان شروع بسته به وضعیت شما:
                    </p>
                    <ul class="mt-3 mr-4 space-y-3 text-gray-600">
                        <li>
                            <strong class="text-gray-900">دانش‌آموزان دهم:</strong>
                            از همین الان! پایه‌ریزی قوی کلید موفقیت است.
                        </li>
                        <li>
                            <strong class="text-gray-900">دانش‌آموزان یازدهم:</strong>
                            حداکثر تا پایان سال یازدهم برای شروع دوره جامع.
                        </li>
                        <li>
                            <strong class="text-gray-900">دانش‌آموزان دوازدهم:</strong>
                            هر چه زودتر! دوره‌های فشرده در دسترس است.
                        </li>
                        <li>
                            <strong class="text-gray-900">فارغ‌التحصیلان:</strong>
                            در هر زمان از سال می‌توانید شروع کنید.
                        </li>
                    </ul>
                </div>
            </div>

            <div class="faq-item bg-white rounded-lg shadow-lg" data-category="konkur">
                <button class="faq-question w-full text-right p-6 focus:outline-none" onclick="toggleFAQ(this)">
                    <div class="flex items-center justify-between">
                        <h3 class="text-lg font-bold text-gray-900">
                            <i class="fas fa-book text-indigo-600 ml-3"></i>
                            آیا منابع و جزوات ارائه می‌دهید؟
                        </h3>
                        <i class="fas fa-chevron-down text-gray-400 transform transition-transform"></i>
                    </div>
                </button>
                <div class="faq-answer px-6 pb-6">
                    <p class="text-gray-600 leading-relaxed">
                        بله، منابع کاملی در اختیار دانش‌آموزان قرار می‌دهیم:
                    </p>
                    <ul class="mt-3 mr-4 space-y-2 text-gray-600">
                        <li>• جزوات اختصاصی تهیه شده توسط استاد</li>
                        <li>• مجموعه تست‌های طبقه‌بندی شده</li>
                        <li>• نمونه سوالات کنکورهای سال‌های قبل</li>
                        <li>• فرمول‌نامه و خلاصه مطالب</li>
                        <li>• ویدیوهای آموزشی تکمیلی</li>
                        <li>• نرم‌افزار تست‌زنی آنلاین</li>
                    </ul>
                    <p class="mt-3 text-gray-600">
                        تمام منابع به صورت رایگان در اختیار دانش‌آموزان قرار می‌گیرد.
                    </p>
                </div>
            </div>

            <!-- Technical Questions -->
            <div class="faq-item bg-white rounded-lg shadow-lg" data-category="technical">
                <button class="faq-question w-full text-right p-6 focus:outline-none" onclick="toggleFAQ(this)">
                    <div class="flex items-center justify-between">
                        <h3 class="text-lg font-bold text-gray-900">
                            <i class="fas fa-laptop text-indigo-600 ml-3"></i>
                            برای کلاس‌های آنلاین چه تجهیزاتی نیاز دارم؟
                        </h3>
                        <i class="fas fa-chevron-down text-gray-400 transform transition-transform"></i>
                    </div>
                </button>
                <div class="faq-answer px-6 pb-6">
                    <p class="text-gray-600 leading-relaxed">
                        تجهیزات مورد نیاز برای کلاس‌های آنلاین:
                    </p>
                    <div class="mt-4 grid md:grid-cols-2 gap-4">
                        <div>
                            <h4 class="font-bold text-gray-900 mb-2">ضروری:</h4>
                            <ul class="mr-4 space-y-1 text-gray-600">
                                <li>• کامپیوتر، لپ‌تاپ یا تبلت</li>
                                <li>• اتصال اینترنت پایدار</li>
                                <li>• هدفون یا اسپیکر</li>
                            </ul>
                        </div>
                        <div>
                            <h4 class="font-bold text-gray-900 mb-2">پیشنهادی:</h4>
                            <ul class="mr-4 space-y-1 text-gray-600">
                                <li>• وب‌کم برای تعامل بهتر</li>
                                <li>• میکروفون برای پرسش سوال</li>
                                <li>• دفتر و خودکار</li>
                            </ul>
                        </div>
                    </div>
                    <p class="mt-3 text-gray-600">
                        راهنمای کامل نصب و استفاده از نرم‌افزار ارائه می‌شود.
                    </p>
                </div>
            </div>

            <div class="faq-item bg-white rounded-lg shadow-lg" data-category="technical">
                <button class="faq-question w-full text-right p-6 focus:outline-none" onclick="toggleFAQ(this)">
                    <div class="flex items-center justify-between">
                        <h3 class="text-lg font-bold text-gray-900">
                            <i class="fas fa-video text-indigo-600 ml-3"></i>
                            آیا کلاس‌ها ضبط می‌شود؟
                        </h3>
                        <i class="fas fa-chevron-down text-gray-400 transform transition-transform"></i>
                    </div>
                </button>
                <div class="faq-answer px-6 pb-6">
                    <p class="text-gray-600 leading-relaxed">
                        بله، تمام کلاس‌های آنلاین ضبط و در اختیار دانش‌آموزان قرار می‌گیرد:
                    </p>
                    <ul class="mt-3 mr-4 space-y-2 text-gray-600">
                        <li>• دسترسی به ضبط کلاس تا ۶ ماه پس از پایان دوره</li>
                        <li>• امکان مشاهده مجدد مطالب</li>
                        <li>• دانلود ویدیوها برای مشاهده آفلاین</li>
                        <li>• کیفیت HD برای وضوح بهتر</li>
                    </ul>
                    <p class="mt-3 text-gray-600">
                        در صورت غیبت از کلاس، می‌توانید از ضبط استفاده کنید.
                    </p>
                </div>
            </div>

            <!-- Pricing Questions -->
            <div class="faq-item bg-white rounded-lg shadow-lg" data-category="courses">
                <button class="faq-question w-full text-right p-6 focus:outline-none" onclick="toggleFAQ(this)">
                    <div class="flex items-center justify-between">
                        <h3 class="text-lg font-bold text-gray-900">
                            <i class="fas fa-money-bill-wave text-indigo-600 ml-3"></i>
                            هزینه دوره‌ها چقدر است؟
                        </h3>
                        <i class="fas fa-chevron-down text-gray-400 transform transition-transform"></i>
                    </div>
                </button>
                <div class="faq-answer px-6 pb-6">
                    <p class="text-gray-600 leading-relaxed">
                        هزینه‌ها بسته به نوع دوره متفاوت است:
                    </p>
                    <div class="mt-4 space-y-3">
                        <div class="bg-blue-50 p-4 rounded-lg">
                            <h4 class="font-bold text-blue-900">کلاس گروهی آنلاین</h4>
                            <p class="text-blue-800">۸۰۰,۰۰۰ تومان در ماه</p>
                        </div>
                        <div class="bg-green-50 p-4 rounded-lg">
                            <h4 class="font-bold text-green-900">کلاس گروهی حضوری</h4>
                            <p class="text-green-800">۱,۲۰۰,۰۰۰ تومان در ماه</p>
                        </div>
                        <div class="bg-purple-50 p-4 rounded-lg">
                            <h4 class="font-bold text-purple-900">کلاس خصوصی</h4>
                            <p class="text-purple-800">۲,۵۰۰,۰۰۰ تومان در ماه</p>
                        </div>
                    </div>
                    <p class="mt-3 text-gray-600">
                        تخفیف‌های ویژه برای ثبت‌نام زودهنگام و دانش‌آموزان ممتاز.
                    </p>
                </div>
            </div>

            <div class="faq-item bg-white rounded-lg shadow-lg" data-category="courses">
                <button class="faq-question w-full text-right p-6 focus:outline-none" onclick="toggleFAQ(this)">
                    <div class="flex items-center justify-between">
                        <h3 class="text-lg font-bold text-gray-900">
                            <i class="fas fa-phone text-indigo-600 ml-3"></i>
                            چگونه می‌توانم ثبت‌نام کنم؟
                        </h3>
                        <i class="fas fa-chevron-down text-gray-400 transform transition-transform"></i>
                    </div>
                </button>
                <div class="faq-answer px-6 pb-6">
                    <p class="text-gray-600 leading-relaxed">
                        راه‌های ثبت‌نام:
                    </p>
                    <ul class="mt-3 mr-4 space-y-2 text-gray-600">
                        <li>• تماس تلفنی: ۰۹۱۴۱۸۷۹۷۶۷</li>
                        <li>• ارسال ایمیل: hosseinssp@gmail.com</li>
                        <li>• پر کردن فرم تماس در سایت</li>
                        <li>• مراجعه حضوری (با هماهنگی قبلی)</li>
                    </ul>
                    <p class="mt-3 text-gray-600">
                        ابتدا جلسه مشاوره رایگان دریافت کنید تا بهترین دوره را انتخاب کنید.
                    </p>
                </div>
            </div>

        </div>
    </div>
</section>

<!-- Contact CTA -->
<section class="py-16 bg-indigo-600">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <h3 class="text-3xl font-bold text-white mb-4">سوال شما پاسخ داده نشد؟</h3>
        <p class="text-xl text-indigo-200 mb-8">
            با ما تماس بگیرید تا پاسخ سوال خود را دریافت کنید
        </p>
        <div class="flex flex-col sm:flex-row gap-4 justify-center">
            <a href="tel:09141879767" class="bg-white text-indigo-600 hover:bg-gray-100 px-8 py-3 rounded-lg font-semibold transition-colors">
                <i class="fas fa-phone mr-2"></i>
                تماس مستقیم
            </a>
            <a href="mailto:hosseinssp@gmail.com" class="border-2 border-white text-white hover:bg-white hover:text-indigo-600 px-8 py-3 rounded-lg font-semibold transition-colors">
                <i class="fas fa-envelope mr-2"></i>
                ارسال ایمیل
            </a>
        </div>
    </div>
</section>

</div>
 @endsection
@push('scripts')
    <script>
        function toggleFAQ(button) {
            const answer = button.nextElementSibling;
            const icon = button.querySelector('.fa-chevron-down');

            // Close all other FAQs
            document.querySelectorAll('.faq-answer').forEach(item => {
                if (item !== answer) {
                    item.classList.remove('active');
                    item.previousElementSibling.querySelector('.fa-chevron-down').style.transform = 'rotate(0deg)';
                }
            });

            // Toggle current FAQ
            answer.classList.toggle('active');

            if (answer.classList.contains('active')) {
                icon.style.transform = 'rotate(180deg)';
            } else {
                icon.style.transform = 'rotate(0deg)';
            }
        }

        function filterFAQ(category) {
            const items = document.querySelectorAll('.faq-item');
            const buttons = document.querySelectorAll('.filter-btn');

            // Update button styles
            buttons.forEach(btn => {
                btn.classList.remove('bg-indigo-600', 'text-white');
                btn.classList.add('bg-gray-200', 'text-gray-700');
            });

            event.target.classList.remove('bg-gray-200', 'text-gray-700');
            event.target.classList.add('bg-indigo-600', 'text-white');

            // Filter items
            items.forEach(item => {
                if (category === 'all' || item.dataset.category === category) {
                    item.style.display = 'block';
                } else {
                    item.style.display = 'none';
                }
            });
        }

        // Search functionality
        document.getElementById('searchInput').addEventListener('input', function(e) {
            const searchTerm = e.target.value.toLowerCase();
            const items = document.querySelectorAll('.faq-item');

            items.forEach(item => {
                const question = item.querySelector('.faq-question h3').textContent.toLowerCase();
                const answer = item.querySelector('.faq-answer').textContent.toLowerCase();

                if (question.includes(searchTerm) || answer.includes(searchTerm)) {
                    item.style.display = 'block';
                } else {
                    item.style.display = 'none';
                }
            });
        });
    </script>

@endpush
