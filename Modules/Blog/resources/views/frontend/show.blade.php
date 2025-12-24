@extends('layouts.app')

@section('content')

<div class="min-h-screen bg-white dark:bg-slate-950 text-slate-900 dark:text-slate-100 transition-colors duration-300">


<!-- Hero Section - Full Width -->
<section class="bg-gradient-to-br relative from-slate-800  to-slate-950 p-10 pb-20">

    <div class="max-w-6xl mx-auto px-4 sm:px-6">
        <div class=" mb-12">
            <h1 class="text-2xl md:text-4xl border font-bold leading-tight mb-8 text-slate-900 dark:text-slate-100  mx-auto">
                نظریه ریسمان: سفری به قلب واقعیت و جستجوی نظریه همه‌چیز
            </h1>

            <div class="flex items-center  gap-6 text-sm text-slate-600 dark:text-slate-400 mb-12">
                <div class="flex items-center gap-3">
                    <img src="https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?w=48&h=48&fit=crop&crop=face&auto=format"
                         alt="نویسنده" class="w-12 h-12 rounded-full object-cover">
                    <div class="text-right">
                        <div class="font-medium text-slate-900 dark:text-slate-100">دکتر علی محمدی</div>
                        <div class="text-xs">استاد فیزیک نظری</div>
                    </div>
                </div>
                <span class="hidden sm:block">•</span>
                <time datetime="2024-01-20" class="hidden sm:block">۳۰ دی ۱۴۰۲</time>
                <span class="hidden sm:block">•</span>
                <span class="hidden sm:block">۱۲ دقیقه مطالعه</span>
                <span class="px-3 py-1.5 rounded-full bg-purple-100 dark:bg-purple-900/30">فیزیک نظری</span>
                <span class="px-3 py-1.5 rounded-full bg-pink-100 dark:bg-pink-900/30 text-pink-600 dark:text-pink-400">کیهان‌شناسی</span>
            </div>

        </div>

        <!-- Featured Image -->
        <div class="max-w-4xl mx-auto">
            <div class="rounded-3xl overflow-hidden bg-gradient-to-br from-purple-200 to-pink-200 dark:from-purple-800/30 dark:to-pink-800/30 p-12 shadow-2xl">
                <div class="flex items-center justify-center h-80">
                    <svg viewBox="0 0 24 24" class="w-32 h-32 text-purple-600 dark:text-purple-400 fill-current">
                        <path d="M12,2C13.1,2 14,2.9 14,4C14,5.1 13.1,6 12,6C10.9,6 10,5.1 10,4C10,2.9 10.9,2 12,2M21,9V7L15,1L9,7V9H21M12,10A5,5 0 0,0 7,15A5,5 0 0,0 12,20A5,5 0 0,0 17,15A5,5 0 0,0 12,10M12,12A3,3 0 0,1 15,15A3,3 0 0,1 12,18A3,3 0 0,1 9,15A3,3 0 0,1 12,12Z"/>
                    </svg>
                </div>
            </div>
        </div>

    </div>
    <div class="absolute -bottom-1 left-0 right-0 h-[60px] text-white">
        <svg viewBox="0 0 1440 60" class="w-full h-full" preserveAspectRatio="none">
            <path fill="currentColor" d="M0,20 C240,60 480,0 720,30 C960,60 1200,10 1440,40 L1440,60 L0,60 Z" opacity="0.25"></path>
            <path fill="currentColor" d="M0,30 C240,60 480,10 720,40 C960,60 1200,0 1440,30 L1440,60 L0,60 Z" opacity="0.35"></path>
            <path fill="#020617" d="M0,40 C240,60 480,20 720,50 C960,60 1200,10 1440,20 L1440,60 L0,60 Z"></path>
        </svg>
    </div>
</section>

<!-- Main Content -->
<main class="max-w-6xl mx-auto px-4 sm:px-6 py-12">
    <!-- Article Content Container -->
    <div class="bg-white dark:bg-slate-900 rounded-3xl shadow-xl border border-slate-200 dark:border-slate-800 p-8 md:p-12 mb-12">
        <article class="prose prose-slate dark:prose-invert max-w-none">

            <!-- Article Body -->
            <div class="space-y-6 text-lg leading-relaxed text-slate-700 dark:text-slate-300">

                <p class="text-xl leading-relaxed text-slate-800 dark:text-slate-200 font-medium">
                    در اعماق واقعیت، در کوچک‌ترین مقیاس‌های قابل تصور، ریسمان‌های کوچکی می‌لرزند که ممکن است کلید درک کل کیهان باشند. نظریه ریسمان، یکی از عمیق‌ترین و پیچیده‌ترین نظریه‌های فیزیک مدرن، ادعا می‌کند که همه چیز در جهان از این ریسمان‌های بنیادی ساخته شده است.
                </p>

                <h2 class="text-3xl font-bold mt-12 mb-6 text-slate-900 dark:text-slate-100">آغاز داستان: از ذرات تا ریسمان‌ها</h2>

                <p>
                    برای قرن‌ها، دانشمندان بر این باور بودند که ماده از اتم‌های غیرقابل تقسیم ساخته شده است. اما با پیشرفت علم، کشف کردیم که اتم‌ها خود از ذرات کوچک‌تری مانند پروتون، نوترون و الکترون تشکیل شده‌اند. سپس فهمیدیم که حتی این ذرات نیز از اجزای بنیادی‌تری به نام کوارک‌ها و لپتون‌ها ساخته شده‌اند.
                </p>

                <p>
                    اما نظریه ریسمان گام بعدی را برمی‌دارد. این نظریه پیشنهاد می‌کند که در عمیق‌ترین سطح، همه این ذرات بنیادی در واقع حالت‌های مختلف ارتعاش ریسمان‌های یک‌بعدی کوچک هستند.
                </p>

                <!-- Quote Block -->
                <blockquote class="border-r-4 border-purple-500 dark:border-purple-400 pr-6 py-4 my-8 bg-purple-50 dark:bg-purple-900/20 rounded-l-lg">
                    <p class="text-xl italic text-purple-900 dark:text-purple-100 mb-2">
                        «اگر بتوانید یک اتم را به اندازه منظومه شمسی بزرگ کنید، یک ریسمان به اندازه یک درخت خواهد بود.»
                    </p>
                    <cite class="text-sm font-medium text-purple-700 dark:text-purple-300">— برایان گرین، فیزیکدان نظری</cite>
                </blockquote>

                <h2 class="text-3xl font-bold mt-12 mb-6 text-slate-900 dark:text-slate-100">ابعاد اضافی: جهانی فراتر از تصور</h2>

                <p>
                    یکی از جنجالی‌ترین پیش‌بینی‌های نظریه ریسمان، وجود ابعاد اضافی فضا-زمان است. در حالی که ما تنها سه بعد فضایی و یک بعد زمانی را تجربه می‌کنیم، نظریه ریسمان نیاز به ۱۰ یا حتی ۱۱ بعد دارد تا به درستی کار کند.
                </p>

                <!-- Info Box -->
                <div class="bg-blue-50 dark:bg-blue-900/20 border border-blue-200 dark:border-blue-800 rounded-xl p-6 my-8">
                    <div class="flex items-start gap-3">
                        <div class="w-8 h-8 rounded-lg bg-blue-100 dark:bg-blue-900/40 flex items-center justify-center flex-shrink-0 mt-1">
                            <svg viewBox="0 0 24 24" class="w-4 h-4 text-blue-600 dark:text-blue-400 fill-current">
                                <path d="M11,9H13V7H11M12,20C7.59,20 4,16.41 4,12C4,7.59 7.59,4 12,4C16.41,4 20,7.59 20,12C20,16.41 16.41,20 12,20M12,2A10,10 0 0,0 2,12A10,10 0 0,0 12,22A10,10 0 0,0 22,12A10,10 0 0,0 12,2M11,17H13V11H11V17Z"/>
                            </svg>
                        </div>
                        <div>
                            <h4 class="font-semibold text-blue-900 dark:text-blue-100 mb-2">چرا ابعاد اضافی را نمی‌بینیم؟</h4>
                            <p class="text-blue-800 dark:text-blue-200">
                                طبق نظریه، ابعاد اضافی به شدت «فشرده» شده‌اند - آن‌قدر کوچک که حتی با قدرتمندترین ابزارهای ما قابل مشاهده نیستند. مانند یک شلنگ باغ که از دور مانند یک خط یک‌بعدی به نظر می‌رسد، اما از نزدیک ساختار سه‌بعدی دارد.
                            </p>
                        </div>
                    </div>
                </div>

                <h2 class="text-3xl font-bold mt-12 mb-6 text-slate-900 dark:text-slate-100">انواع مختلف نظریه ریسمان</h2>

                <p>
                    نظریه ریسمان در واقع یک نظریه واحد نیست، بلکه خانواده‌ای از نظریه‌های مرتبط است. در دهه ۱۹۹۰، پنج نسخه مختلف از نظریه ریسمان وجود داشت که هر کدام ویژگی‌های منحصر به فردی داشتند.
                </p>

                <h3 class="text-2xl font-semibold mt-8 mb-4 text-slate-900 dark:text-slate-100">انقلاب دوم ریسمان</h3>

                <p>
                    در سال ۱۹۹۵، ادوارد ویتن کشف کرد که این پنج نظریه در واقع جنبه‌های مختلف یک نظریه واحد هستند که M-نظریه نامیده می‌شود. این کشف، که به «انقلاب دوم ریسمان» معروف است، نشان داد که همه این نظریه‌ها از طریق تبدیلات ریاضی پیچیده به یکدیگر مرتبط هستند.
                </p>

                <!-- Statistics -->
                <div class="grid md:grid-cols-3 gap-6 my-12">
                    <div class="text-center p-6 bg-slate-50 dark:bg-slate-800 rounded-xl">
                        <div class="text-3xl font-bold text-purple-600 dark:text-purple-400 mb-2">۱۰⁻³⁵</div>
                        <div class="text-sm text-slate-600 dark:text-slate-400">متر - طول پلانک، کوچک‌ترین مقیاس معنادار</div>
                    </div>
                    <div class="text-center p-6 bg-slate-50 dark:bg-slate-800 rounded-xl">
                        <div class="text-3xl font-bold text-blue-600 dark:text-blue-400 mb-2">۱۱</div>
                        <div class="text-sm text-slate-600 dark:text-slate-400">بعد فضا-زمان در M-نظریه</div>
                    </div>
                    <div class="text-center p-6 bg-slate-50 dark:bg-slate-800 rounded-xl">
                        <div class="text-3xl font-bold text-pink-600 dark:text-pink-400 mb-2">۱۰⁵⁰⁰</div>
                        <div class="text-sm text-slate-600 dark:text-slate-400">تعداد تقریبی راه‌حل‌های ممکن</div>
                    </div>
                </div>

                <h2 class="text-3xl font-bold mt-12 mb-6 text-slate-900 dark:text-slate-100">کاربردها و پیامدها</h2>

                <h3 class="text-2xl font-semibold mt-8 mb-4 text-slate-900 dark:text-slate-100">وحدت نیروها</h3>

                <p>
                    یکی از بزرگ‌ترین امیدهای نظریه ریسمان، توانایی آن در وحدت بخشیدن به چهار نیروی بنیادی طبیعت است: نیروی الکترومغناطیسی، نیروی هسته‌ای قوی، نیروی هسته‌ای ضعیف، و گرانش. این «نظریه همه‌چیز» می‌تواند درک ما از کیهان را به طور کامل متحول کند.
                </p>

                <h3 class="text-2xl font-semibold mt-8 mb-4 text-slate-900 dark:text-slate-100">سیاه‌چاله‌ها و اطلاعات</h3>

                <p>
                    نظریه ریسمان بینش‌های جدیدی درباره ماهیت سیاه‌چاله‌ها ارائه می‌دهد. یکی از مهم‌ترین کشفیات، حل «پارادوکس اطلاعات سیاه‌چاله» است که نشان می‌دهد اطلاعات در سیاه‌چاله‌ها از بین نمی‌رود، بلکه به شکل پیچیده‌ای حفظ می‌شود.
                </p>

                <!-- Warning Box -->
                <div class="bg-amber-50 dark:bg-amber-900/20 border border-amber-200 dark:border-amber-800 rounded-xl p-6 my-8">
                    <div class="flex items-start gap-3">
                        <div class="w-8 h-8 rounded-lg bg-amber-100 dark:bg-amber-900/40 flex items-center justify-center flex-shrink-0 mt-1">
                            <svg viewBox="0 0 24 24" class="w-4 h-4 text-amber-600 dark:text-amber-400 fill-current">
                                <path d="M13,14H11V10H13M13,18H11V16H13M1,21H23L12,2L1,21Z"/>
                            </svg>
                        </div>
                        <div>
                            <h4 class="font-semibold text-amber-900 dark:text-amber-100 mb-2">چالش‌های آزمایشی</h4>
                            <p class="text-amber-800 dark:text-amber-200">
                                یکی از بزرگ‌ترین مشکلات نظریه ریسمان، عدم قابلیت آزمایش مستقیم آن است. انرژی مورد نیاز برای آزمایش مستقیم این نظریه بسیار فراتر از توانایی‌های فعلی ما است.
                            </p>
                        </div>
                    </div>
                </div>

                <h2 class="text-3xl font-bold mt-12 mb-6 text-slate-900 dark:text-slate-100">چشم‌انداز آینده</h2>

                <p>
                    علی‌رغم چالش‌های موجود، نظریه ریسمان همچنان یکی از فعال‌ترین حوزه‌های تحقیق در فیزیک نظری باقی مانده است. پیشرفت‌های اخیر در ریاضیات و فیزیک محاسباتی، امیدهای تازه‌ای برای درک بهتر این نظریه پیچیده ایجاد کرده است.
                </p>

                <p>
                    شاید روزی بتوانیم آزمایش‌هایی طراحی کنیم که شواهد غیرمستقیم از وجود ریسمان‌ها ارائه دهند. تا آن زمان، این نظریه زیبا و پیچیده همچنان الهام‌بخش نسل‌های جدید فیزیکدانان خواهد بود.
                </p>

                <!-- Call to Action -->
                <div class="bg-gradient-to-r from-purple-50 to-pink-50 dark:from-purple-900/20 dark:to-pink-900/20 border border-purple-200 dark:border-purple-800 rounded-xl p-8 my-12 text-center">
                    <h3 class="text-2xl font-bold text-slate-900 dark:text-slate-100 mb-4">به گفتگو بپیوندید</h3>
                    <p class="text-slate-700 dark:text-slate-300 mb-6">
                        نظر شما درباره نظریه ریسمان چیست؟ آیا فکر می‌کنید این نظریه کلید درک کیهان است؟
                    </p>
                    <div class="flex flex-col sm:flex-row gap-3 justify-center">
                        <button onclick="shareArticle()" class="px-6 py-3 bg-purple-600 hover:bg-purple-700 text-white rounded-lg font-medium transition-colors">
                            اشتراک‌گذاری مقاله
                        </button>
                        <button onclick="leaveComment()" class="px-6 py-3 border border-slate-300 dark:border-slate-600 hover:bg-slate-50 dark:hover:bg-slate-800 rounded-lg font-medium transition-colors">
                            ثبت نظر
                        </button>
                    </div>
                </div>

            </div>
        </article>
    </div>

    <!-- Author Bio -->
    <div class="bg-white dark:bg-slate-900 rounded-3xl shadow-xl border border-slate-200 dark:border-slate-800 p-8 md:p-12 mb-12">
        <div class="flex items-start gap-4">
            <img src="https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?w=80&h=80&fit=crop&crop=face&auto=format"
                 alt="دکتر علی محمدی" class="w-16 h-16 rounded-full object-cover">
            <div>
                <h3 class="text-xl font-bold text-slate-900 dark:text-slate-100 mb-2">دکتر علی محمدی</h3>
                <p class="text-slate-600 dark:text-slate-400 mb-3">
                    دکتر محمدی استاد فیزیک نظری در دانشگاه تهران و محقق برجسته در زمینه نظریه ریسمان است. وی دارای دکترای فیزیک از دانشگاه MIT و نویسنده بیش از ۸۰ مقاله علمی در زمینه فیزیک ذرات بنیادی است.
                </p>
                <div class="flex items-center gap-3">
                    <button class="text-purple-600 dark:text-purple-400 hover:underline text-sm font-medium">دنبال کردن</button>
                    <span class="text-slate-400">•</span>
                    <button class="text-purple-600 dark:text-purple-400 hover:underline text-sm font-medium">مقالات بیشتر</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Related Articles -->
    <div class="bg-white dark:bg-slate-900 rounded-3xl shadow-xl border border-slate-200 dark:border-slate-800 p-8 md:p-12">
        <h2 class="text-2xl font-bold text-slate-900 dark:text-slate-100 mb-8">مقالات مرتبط</h2>
        <div class="grid md:grid-cols-2 gap-6">
            <article class="group cursor-pointer">
                <div class="bg-slate-50 dark:bg-slate-800 rounded-xl p-6 h-full hover:bg-slate-100 dark:hover:bg-slate-700 transition-colors">
                    <div class="flex items-center gap-2 text-sm text-blue-600 dark:text-blue-400 font-medium mb-3">
                        <span class="px-2 py-1 rounded-full bg-blue-100 dark:bg-blue-900/30">مکانیک کوانتوم</span>
                    </div>
                    <h3 class="text-xl font-bold text-slate-900 dark:text-slate-100 mb-3 group-hover:text-purple-600 dark:group-hover:text-purple-400 transition-colors">
                        درهم‌تنیدگی کوانتومی: پدیده‌ای عجیب در قلب واقعیت
                    </h3>
                    <p class="text-slate-600 dark:text-slate-400 text-sm mb-4">
                        کشف رازهای درهم‌تنیدگی کوانتومی و تأثیر آن بر درک ما از طبیعت واقعیت و ارتباطات فوری در فضا.
                    </p>
                    <div class="text-xs text-slate-500 dark:text-slate-500">
                        ۲۵ دی ۱۴۰۲ • ۹ دقیقه مطالعه
                    </div>
                </div>
            </article>

            <article class="group cursor-pointer">
                <div class="bg-slate-50 dark:bg-slate-800 rounded-xl p-6 h-full hover:bg-slate-100 dark:hover:bg-slate-700 transition-colors">
                    <div class="flex items-center gap-2 text-sm text-emerald-600 dark:text-emerald-400 font-medium mb-3">
                        <span class="px-2 py-1 rounded-full bg-emerald-100 dark:bg-emerald-900/30">کیهان‌شناسی</span>
                    </div>
                    <h3 class="text-xl font-bold text-slate-900 dark:text-slate-100 mb-3 group-hover:text-purple-600 dark:group-hover:text-purple-400 transition-colors">
                        ماده تاریک و انرژی تاریک: راز ۹۵ درصد کیهان
                    </h3>
                    <p class="text-slate-600 dark:text-slate-400 text-sm mb-4">
                        سفری به اعماق کیهان برای کشف ماهیت مرموز ماده تاریک و انرژی تاریک که بیشتر کیهان را تشکیل می‌دهند.
                    </p>
                    <div class="text-xs text-slate-500 dark:text-slate-500">
                        ۲۰ دی ۱۴۰۲ • ۱۱ دقیقه مطالعه
                    </div>
                </div>
            </article>
        </div>
    </div>
</main>



</div>
@endsection
