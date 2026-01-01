@extends('layouts.app')
@section('content')
<div class="    bg-gray-300 dark:bg-gray-900 text-gray-900 dark:text-gray-300  min-h-screen">

    <!-- Hero Section -->
    <section class="py-20  bg-gray-50 dark:bg-gray-800">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <div class="mb-8 ">
                <img src="/big_logo.png" class="w-[100px] mx-auto" >

            </div>
            <h2 class="text-3xl font-bold  mb-6">درباره فیزیک بیست</h2>
            <p class=" max-w-3xl mx-auto leading-relaxed">
                ما متخصصان آموزش فیزیک هستیم که به کمک دانش‌آموزان دبیرستان برای موفقیت در کنکور و درک عمیق‌تر فیزیک اختصاص داریم. هدف ما تبدیل فیزیک از درس سخت به علم جذاب و قابل فهم است.
            </p>
        </div>
    </section>

    <!-- Mission & Vision -->
    <section class="py-16 m-10 rounded-3xl bg-gray-50 dark:bg-gray-800">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid md:grid-cols-2 gap-12">
                <div class="text-center">
                    <div class="bg-indigo-100 w-20 h-20 rounded-full flex items-center justify-center mx-auto mb-6">
                        <i class="fas fa-graduation-cap text-3xl text-indigo-600"></i>
                    </div>
                    <h3 class="text-3xl font-bold  mb-4">ماموریت ما</h3>
                    <p class="dark:text-gray-400 leading-relaxed">
                        آموزش فیزیک به شیوه‌ای ساده، جذاب و کاربردی که دانش‌آموزان را برای موفقیت در کنکور و ادامه تحصیل در رشته‌های مهندسی و علوم پایه آماده کند. ما معتقدیم هر دانش‌آموزی می‌تواند فیزیک را بیاموزد.
                    </p>
                </div>
                <div class="text-center">
                    <div class="bg-purple-100 w-20 h-20 rounded-full flex items-center justify-center mx-auto mb-6">
                        <i class="fas fa-atom text-3xl text-purple-600"></i>
                    </div>
                    <h3 class="text-3xl font-bold  mb-4">چشم‌انداز ما</h3>
                    <p class="dark:text-gray-400 leading-relaxed">
                        تبدیل شدن به مرجع اصلی آموزش فیزیک دبیرستان در کشور و کمک به هزاران دانش‌آموز برای کسب رتبه‌های برتر در کنکور و ورود به دانشگاه‌های معتبر.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- Values Section -->
    <section class="py-16 m-10 bg-gray-50 dark:bg-gray-800 rounded-3xl ">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <h3 class="text-4xl font-bold text-center  mb-12">ارزش‌های آموزشی ما</h3>
            <div class="grid md:grid-cols-3 gap-8">
                <div class="bg-gray-200 dark:bg-gray-700 rounded-lg p-8 shadow-lg hover:shadow-xl transition-shadow">
                    <div class="bg-green-100 w-16 h-16 rounded-full flex items-center justify-center mb-6">
                        <i class="fas fa-book-open text-2xl text-green-600"></i>
                    </div>
                    <h4 class="text-xl font-bold  mb-4">آموزش ساده</h4>
                    <p class="dark:text-gray-400">پیچیده‌ترین مفاهیم فیزیک را به زبان ساده و با مثال‌های کاربردی آموزش می‌دهیم تا همه دانش‌آموزان بتوانند درک کنند.</p>
                </div>
                <div class="bg-gray-200 dark:bg-gray-700 rounded-lg p-8 shadow-lg hover:shadow-xl transition-shadow">
                    <div class="bg-blue-100 w-16 h-16 rounded-full flex items-center justify-center mb-6">
                        <i class="fas fa-trophy text-2xl text-blue-600"></i>
                    </div>
                    <h4 class="text-xl font-bold  mb-4">موفقیت در کنکور</h4>
                    <p class="dark:text-gray-400">تمرکز اصلی ما بر روی آمادگی دانش‌آموزان برای کنکور و کسب بهترین نتایج در آزمون سراسری است.</p>
                </div>
                <div class="bg-gray-200 dark:bg-gray-700 rounded-lg p-8 shadow-lg hover:shadow-xl transition-shadow">
                    <div class="bg-orange-100 w-16 h-16 rounded-full flex items-center justify-center mb-6">
                        <i class="fas fa-chalkboard-teacher text-2xl text-orange-600"></i>
                    </div>
                    <h4 class="text-xl font-bold  mb-4">پشتیبانی مستمر</h4>
                    <p class="dark:text-gray-400">همیشه در کنار دانش‌آموزان هستیم و سوالات آنها را پاسخ می‌دهیم تا مسیر یادگیری آنها هموار باشد.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Team Section -->
    <section class="py-16  bg-gray-50 dark:bg-gray-800">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <h3 class="text-4xl font-bold text-center  mb-8">مدرس </h3>
            <div class="flex justify-center">
                <div class="text-center">

                        <div class="w-56 h-56 pt-6 overflow-hidden mx-auto bg-gradient-to-br from-purple-400 via-blue-500 to-indigo-600 dark:from-purple-500 dark:via-blue-600 dark:to-indigo-700 rounded-full flex items-center justify-center text-white text-6xl tv-optimized-text-shadow shadow-2xl transition-all duration-300 hover:scale-105">
                            <a href="{{asset('/images/users/admin/hossein_nezhad_asad.png')}}" target="_blank">
                                <img src="{{asset('/images/users/admin/file_small_fizikbist.png')}}" alt="حسین نژاداسد">
                            </a>
                        </div>

                    <h4 class="text-xl font-bold  mb-2">حسین نژاداسد</h4>
                    <p class=" font-semibold mb-3">کارشناسی ارشد فیزیک</p>
                    <p class=" text-sm">مدرس مجرب فیزیک دبیرستان با سال‌ها تجربه در آمادگی دانش‌آموزان برای کنکور و کسب رتبه‌های برتر در شهرستان سلماس.</p>
                </div>
            </div>
        </div>
    </section>



    <!-- Contact CTA -->
    {{--<section class="py-20 bg-gray-900 m-10 rounded-3xl">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h3 class="text-4xl font-bold text-white mb-6">آماده شروع یادگیری هستید؟</h3>
            <p class="text-xl text-gray-300 mb-8">
                همین امروز به جمع هزاران دانش‌آموز موفق بپیوندید و مسیر خود را به سوی قبولی در کنکور آغاز کنید.
            </p>
            <div class="flex flex-col sm:flex-row gap-4 justify-center">
                <a href="#" class="bg-indigo-600 hover:bg-indigo-700 text-white px-8 py-4 rounded-lg font-semibold transition-colors inline-flex items-center justify-center">
                    <i class="fas fa-play mr-2"></i>
                    شروع دوره‌ها
                </a>
                <a href="#" class="border-2 border-white text-white hover:bg-white hover:text-gray-900 px-8 py-4 rounded-lg font-semibold transition-colors inline-flex items-center justify-center">
                    <i class="fas fa-phone mr-2"></i>
                    مشاوره رایگان
                </a>
            </div>
        </div>
    </section>
--}}
</div>
@endsection
