@extends('layouts.app')

@section('content')
<div class="bg-gray-50 dark:bg-gray-900 text-gray-900 dark:text-gray-100">

<!-- Hero Section -->
<section class="gradient-bg hero-pattern py-20">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <div class="floating">
            <i class="fas fa-newspaper text-6xl text-white mb-6 opacity-80"></i>
        </div>
        <h1 class="text-4xl md:text-6xl font-bold text-white mb-6">
             مقالات فیزیک بیست
        </h1>
        <p class="text-xl md:text-2xl text-white opacity-90 mb-8 max-w-3xl mx-auto">
            مجموعه‌ای از بهترین مقالات علمی، تکنولوژی، آموزش و سلامت
        </p>
        <div class="flex flex-col sm:flex-row items-center justify-center gap-4">
            <a href="#articles" class="px-8 py-4 bg-white text-purple-600 rounded-lg hover:bg-gray-100 transition font-medium text-lg">
                <i class="fas fa-arrow-down ml-2"></i>
                مشاهده مقالات
            </a>

        </div>
    </div>
</section>

<!-- last Tricks -->
<section class="py-16 bg-gray-50 dark:bg-gray-900" id="articles">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12">
            <h2 class="text-3xl md:text-4xl font-bold text-gray-900 dark:text-white mb-4">
                <i class="fas fa-star text-yellow-500 ml-3"></i>
                آخرین مقالات
            </h2>
            <p class="text-lg text-gray-600 dark:text-gray-400 max-w-2xl mx-auto">
                محبوب‌ترین و کاربردی‌ترین مقالاتی در فیزیک بیست بیابید
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 mb-12">

            @foreach($blogs as $blog)
            <!-- Featured Trick 1 -->
            <article class="bg-white  dark:bg-gray-800 rounded-2xl shadow-lg border border-gray-200 dark:border-gray-700 overflow-hidden ">
                <div class="relative">
                    <div style="background:url('{{$blog->cover_image}}');background-size: 100%" class="h-48 bg-gradient-to-br from-blue-400 to-purple-500 flex items-center justify-center">

                    </div>

                    <div class="absolute bottom-3 right-3">
                        @foreach($blog->categories as $category)
                        <span class="category-badge bg-blue-100 text-blue-800 px-3 rounded-2xl">{{$category->name}}</span>
                        @endforeach
                    </div>
                </div>
                <div class="p-6">
                    <h3 class="text-xl font-bold text-gray-900 dark:text-white mb-3 line-clamp-2">
                        {{$blog->title}}
                    </h3>
                    <p class="text-gray-600 dark:text-gray-400 mb-4 line-clamp-3">
                        {{$blog->description}}
                    </p>
                    {{--<div class="flex items-center justify-between mb-4">
                        <div class="flex items-center gap-4 text-sm text-gray-500">
                            <span><i class="fas fa-eye ml-1"></i>1.2k</span>
                            <span><i class="fas fa-heart ml-1"></i>89</span>
                            <span><i class="fas fa-comment ml-1"></i>23</span>
                        </div>
                        <div class="text-sm text-gray-500">
                            <i class="fas fa-calendar ml-1"></i>
                            ۲ روز پیش
                        </div>
                    </div>--}}
                    <a href="{{route('article.show',$blog->id)}}" class="block w-full text-center px-6 py-3 bg-purple-600 text-white rounded-lg hover:bg-purple-700 transition font-medium">
                        مطالعه مقاله
                        <i class="fas fa-arrow-left mr-2"></i>
                    </a>
                </div>
            </article>
            @endforeach

        </div>

     {{--   <div class="text-center">
            <a href="/tricks" class="inline-flex items-center px-8 py-3 bg-white dark:bg-gray-800 border-2 border-purple-600 text-purple-600 dark:text-purple-400 rounded-lg hover:bg-purple-50 dark:hover:bg-gray-700 transition font-medium">
                مشاهده همه مقالات
                <i class="fas fa-arrow-left mr-3"></i>
            </a>
        </div>--}}
    </div>
</section>

<!-- Categories Section -->
<section class="py-16 bg-white dark:bg-gray-800">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12">
            <h2 class="text-3xl md:text-4xl font-bold text-gray-900 dark:text-white mb-4">
                <i class="fas fa-th-large text-purple-600 ml-3"></i>
                دسته‌بندی‌ها
            </h2>
            <p class="text-lg text-gray-600 dark:text-gray-400 max-w-2xl mx-auto">
                مقالات را بر اساس موضوع مورد علاقه‌تان کشف کنید
            </p>
        </div>

        <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-6 gap-6">

            @foreach(\Modules\Blog\Models\Category::all() as $category)
            <a href="/articles?category={{$category->name}}" class="group bg-gradient-to-br from-{{$category->color}}-50 to-{{$category->color}}-100 dark:from-{{$category->color}}-900 dark:to-{{$category->color}}-800 p-6 rounded-2xl text-center hover:shadow-lg transition ">
                <div class="w-16 h-16 bg-{{$category->color}}-600 rounded-2xl flex items-center justify-center mx-auto mb-4 group-hover:scale-110 transition">
                    <i class="fas fa-{{$category->icon}} text-white text-2xl"></i>
                </div>
                <h3 class="font-bold text-gray-900 dark:text-white mb-2">{{$category->name}}</h3>
                <p class="text-sm text-gray-600 dark:text-gray-400">{{$category->blogs()->count() ?? 0}} مقاله</p>
            </a>
            @endforeach

        </div>
    </div>
</section>

{{--
<!-- Recent Tricks -->
<section class="py-16 bg-gray-50 dark:bg-gray-900">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12">
            <h2 class="text-3xl md:text-4xl font-bold text-gray-900 dark:text-white mb-4">
                <i class="fas fa-clock text-green-600 ml-3"></i>
                جدیدترین مقالات
            </h2>
            <p class="text-lg text-gray-600 dark:text-gray-400 max-w-2xl mx-auto">
                آخرین مقالاتی که به مجموعه ما اضافه شده‌اند
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">

            <!-- Recent Trick 1 -->
            <article class="bg-white dark:bg-gray-800 rounded-2xl shadow-lg border border-gray-200 dark:border-gray-700 overflow-hidden ">
                <div class="md:flex">
                    <div class="md:w-1/3">
                        <div class="h-48 md:h-full bg-gradient-to-br from-orange-400 to-red-500 flex items-center justify-center">
                            <i class="fas fa-home text-white text-3xl"></i>
                        </div>
                    </div>
                    <div class="md:w-2/3 p-6">
                        <div class="flex items-center gap-2 mb-3">
                            <span class="category-badge bg-orange-100 text-orange-800">خانه‌داری</span>
                            <span class="text-xs text-green-600 bg-green-100 px-2 py-1 rounded-full">جدید</span>
                        </div>
                        <h3 class="text-lg font-bold text-gray-900 dark:text-white mb-2 line-clamp-2">
                            نحوه تمیز کردن فرش بدون شستشو
                        </h3>
                        <p class="text-gray-600 dark:text-gray-400 text-sm mb-4 line-clamp-2">
                            روش‌های خانگی و طبیعی برای تمیز کردن فرش و موکت بدون نیاز به شستشو.
                        </p>
                        <div class="flex items-center justify-between">
                            <div class="flex items-center gap-3 text-sm text-gray-500">
                                <span><i class="fas fa-eye ml-1"></i>234</span>
                                <span><i class="fas fa-heart ml-1"></i>12</span>
                            </div>
                            <a href="/tricks/4" class="text-purple-600 hover:text-purple-700 font-medium text-sm">
                                مطالعه <i class="fas fa-arrow-left mr-1"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </article>

            <!-- Recent Trick 2 -->
            <article class="bg-white dark:bg-gray-800 rounded-2xl shadow-lg border border-gray-200 dark:border-gray-700 overflow-hidden ">
                <div class="md:flex">
                    <div class="md:w-1/3">
                        <div class="h-48 md:h-full bg-gradient-to-br from-indigo-400 to-purple-500 flex items-center justify-center">
                            <i class="fas fa-coins text-white text-3xl"></i>
                        </div>
                    </div>
                    <div class="md:w-2/3 p-6">
                        <div class="flex items-center gap-2 mb-3">
                            <span class="category-badge bg-indigo-100 text-indigo-800">مالی</span>
                            <span class="text-xs text-green-600 bg-green-100 px-2 py-1 rounded-full">جدید</span>
                        </div>
                        <h3 class="text-lg font-bold text-gray-900 dark:text-white mb-2 line-clamp-2">
                            روش‌های ساده صرفه‌جویی در خرید
                        </h3>
                        <p class="text-gray-600 dark:text-gray-400 text-sm mb-4 line-clamp-2">
                            مقالات هوشمندانه برای کاهش هزینه‌های خرید و صرفه‌جویی در بودجه خانواده.
                        </p>
                        <div class="flex items-center justify-between">
                            <div class="flex items-center gap-3 text-sm text-gray-500">
                                <span><i class="fas fa-eye ml-1"></i>189</span>
                                <span><i class="fas fa-heart ml-1"></i>8</span>
                            </div>
                            <a href="/tricks/5" class="text-purple-600 hover:text-purple-700 font-medium text-sm">
                                مطالعه <i class="fas fa-arrow-left mr-1"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </article>

        </div>

        <div class="text-center mt-8">
            <a href="/tricks?sort=newest" class="inline-flex items-center px-6 py-3 bg-green-600 text-white rounded-lg hover:bg-green-700 transition font-medium">
                مشاهده همه مقالات جدید
                <i class="fas fa-arrow-left mr-3"></i>
            </a>
        </div>
    </div>
</section>
--}}


</div>
@endsection
@push('scripts')
<script>
    // Smooth scrolling for anchor links
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function (e) {
            e.preventDefault();
            const target = document.querySelector(this.getAttribute('href'));
            if (target) {
                target.scrollIntoView({
                    behavior: 'smooth',
                    block: 'start'
                });
            }
        });
    });

    // Stats counter animation
    function animateCounter(element, target) {
        let current = 0;
        const increment = target / 100;
        const timer = setInterval(() => {
            current += increment;
            if (current >= target) {
                current = target;
                clearInterval(timer);
            }
            element.textContent = Math.floor(current).toLocaleString('fa-IR');
        }, 20);
    }

    // Trigger counter animation when in viewport
    const observerOptions = {
        threshold: 0.5,
        rootMargin: '0px 0px -100px 0px'
    };

    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                const counters = entry.target.querySelectorAll('.stats-counter');
                counters.forEach(counter => {
                    const target = parseInt(counter.textContent.replace(/[^\d]/g, ''));
                    animateCounter(counter, target);
                });
                observer.unobserve(entry.target);
            }
        });
    }, observerOptions);

    // Observe stats section
    const statsSection = document.querySelector('.stats-counter').closest('section');
    if (statsSection) {
        observer.observe(statsSection);
    }

    // Mobile menu toggle (if needed)
    const mobileMenuBtn = document.querySelector('.md\\:hidden button');
    if (mobileMenuBtn) {
        mobileMenuBtn.addEventListener('click', function() {
            // Toggle mobile menu logic would go here
            console.log('Mobile menu toggled');
        });
    }

    // Newsletter form submission
    const newsletterForm = document.querySelector('form');
    if (newsletterForm) {
        newsletterForm.addEventListener('submit', function(e) {
            e.preventDefault();
            const email = this.querySelector('input[type="email"]').value;
            if (email) {
                alert('ممنون! ایمیل شما با موفقیت ثبت شد.');
                this.querySelector('input[type="email"]').value = '';
            }
        });
    }
</script>
@endpush
