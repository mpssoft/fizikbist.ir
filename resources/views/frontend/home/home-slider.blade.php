<style>
    .slide {
        transition: transform 1s ease-in-out;
    }

    .slide-enter-left {
        animation: slideInLeft 1s ease-out forwards;
    }

    .slide-enter-right {
        animation: slideInRight 1s ease-out forwards;
    }

    @keyframes slideInLeft {
        from {
            transform: translateX(-100px);
            opacity: 0;
        }
        to {
            transform: translateX(0);
            opacity: 1;
        }
    }

    @keyframes slideInRight {
        from {
            transform: translateX(100px);
            opacity: 0;
        }
        to {
            transform: translateX(0);
            opacity: 1;
        }
    }

    .slide-content {
        opacity: 0;
        transform: translateX(-100px);
    }

    .slide-image {
        opacity: 0;
        transform: translateX(100px);
    }


</style>

<div class="container mx-auto px-4 max-w-4xl">

    <!-- Slider Container -->
    <div class="mt-10 mb-10 relative bg-gradient-to-br from-white/10 via-white/5 to-transparent
                dark:!from-slate-800/20 dark:!via-slate-900/10 dark:!to-transparent
                with-blur border border-white/30 dark:border-slate-600/30
                rounded-3xl shadow-xl overflow-hidden transition-colors duration-300">

        <!-- Slides Wrapper -->
        <div class="relative h-96 md:h-[500px] overflow-hidden ">
            <!-- Slide 1 -->
            @foreach($sliders as $slider)
                <div class="slide absolute inset-0 w-full h-full" id="slide-1">
                    <div class="relative  w-full h-full">

                        <!-- Background -->
                        <div class="absolute inset-0 bg-gradient-to-br from-purple-500/10 via-blue-500/5 to-pink-500/10
                                    dark:from-purple-800/20 dark:via-blue-900/10 dark:to-pink-800/20 with-blur"></div>
                        <div class="absolute inset-0 bg-gray-600 bg-opacity-10 dark:bg-opacity-20"></div>

                        <!-- Content Grid -->
                        <div class="relative z-10 grid grid-cols-1 md:grid-cols-2 h-full md:pr-30" dir="ltr">

                            <!-- Text Section (Left) -->
                            <div dir="rtl" class="hidden md:flex text-right slide-content flex-col justify-center px-8 text-white order-2 md:order-1 z-20">
                                <h2 class="text-2xl md:text-4xl lg:text-5xl font-bold mb-4 leading-tight drop-shadow-lg">{{ $slider->title }}</h2>
                                <p class="text-base md:text-lg lg:text-xl mb-6 opacity-90 drop-shadow-md">{{ $slider->subtitle }}</p>
                                @if($slider->link)
                                    <a href="{{$slider->link}}" data-id="{{$slider->id}}" class="slider-link leading-right bg-white/90 dark:bg-slate-800/90 text-blue-600 dark:text-blue-400 px-6 py-3 rounded-full font-semibold hover:bg-white dark:hover:bg-slate-700 transition-colors duration-300 shadow-lg with-blur w-fit"> {{$slider->button_text ?? "اطلاعات بیشتر"}}</a>
                                @endif
                            </div>

                            <!-- Photo Section (Right) -->
                            <div class="slide-image flex items-center justify-center p-8 md:p-12 order-1 md:order-2 z-20 slide-enter-right">
                                <div class="w-[520px] max-w-[520px] md:w-[520px] md:h-[390px]  overflow-hidden shadow-2xl
                                            bg-white/20 dark:bg-slate-800/20 with-blur border border-white/30 dark:border-slate-600/30">
                                    <a href="{{$slider->link}}" data-id="{{$slider->id}}"  class=" slider-link block w-full h-full">
                                        <img src="{{$slider->image}}" class="w-[520px] h-full md:w-[520px] md:h-[390px] object-cover">
                                    </a>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            @endforeach

        </div>

        <!-- Navigation Arrows -->
        <button class="absolute left-4 top-1/2 transform -translate-y-1/2 bg-white/20 dark:bg-slate-800/30 hover:bg-white/30
                       dark:hover:bg-slate-700/40 text-white p-3 rounded-full transition-all duration-300 with-blur
                       border border-white/20 dark:border-slate-600/30 z-30" onclick="nextSlide()">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
            </svg>
        </button>

        <button class="absolute right-4 top-1/2 transform -translate-y-1/2 bg-white/20 dark:bg-slate-800/30 hover:bg-white/30
                       dark:hover:bg-slate-700/40 text-white p-3 rounded-full transition-all duration-300 with-blur
                       border border-white/20 dark:border-slate-600/30 z-30" onclick="previousSlide()">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
            </svg>
        </button>

        <!-- Dots Indicator -->
        <div class="absolute bottom-6 left-1/2 transform -translate-x-1/2 flex z-30">
            @php $index = 0; @endphp
            @foreach($sliders as $s)
                <button class="w-3 h-3 rounded-full bg-white/60 dark:bg-slate-400/60 hover:bg-white dark:hover:bg-slate-200
                               transition-all duration-500 hover:scale-110 active-dot ml-3 shadow-lg"
                        onclick="goToSlide({{$index++}})" id="dot-0"></button>
            @endforeach
        </div>
    </div>
</div>

<script>
    let currentSlide = 0;
    const slides = document.querySelectorAll('.slide');
    const dots = document.querySelectorAll('[id^="dot-"]');
    const totalSlides = slides.length;

    function updateSlider() {
        slides.forEach((slide, index) => {
            const slideContent = slide.querySelector('.slide-content');
            const slideImage = slide.querySelector('.slide-image');

            if (index === currentSlide) {
                slide.style.transform = 'translateX(0)';

                // Animate content and image
                setTimeout(() => {
                    slideContent.classList.add('slide-enter-left');
                    slideImage.classList.add('slide-enter-right');
                }, 100);
            } else {
                // Reset animations
                slideContent.classList.remove('slide-enter-left');
                slideImage.classList.remove('slide-enter-right');

                if (index < currentSlide) {
                    slide.style.transform = 'translateX(-100%)';
                } else {
                    slide.style.transform = 'translateX(100%)';
                }
            }
        });

        // Update dots
        dots.forEach((dot, index) => {
            if (index === currentSlide) {
                dot.classList.remove('bg-opacity-40', 'bg-opacity-60');
                dot.classList.add('active-dot');
                dot.style.transform = 'scale(1.2)';
                dot.style.backgroundColor = 'rgba(255, 255, 255, 1)';
            } else {
                dot.classList.remove('active-dot');
                dot.style.transform = 'scale(1)';
                dot.style.backgroundColor = 'rgba(255, 255, 255, 0.4)';
            }
        });
    }

    function nextSlide() {
        currentSlide = (currentSlide + 1) % totalSlides;
        updateSlider();
    }

    function previousSlide() {
        currentSlide = (currentSlide - 1 + totalSlides) % totalSlides;
        updateSlider();
    }

    function goToSlide(index) {
        currentSlide = index;
        updateSlider();
    }

    // Auto-play functionality
    setInterval(nextSlide, 5000);

    // Touch/swipe support for mobile
    let startX = 0;
    let endX = 0;


    // Use the wrapper instead of a single slide
    const sliderWrapper = document.querySelector('.relative.h-96');

    sliderWrapper.addEventListener('touchstart', (e) => {
        startX = e.touches[0].clientX;
    });

    sliderWrapper.addEventListener('touchend', (e) => {
        endX = e.changedTouches[0].clientX;
        handleSwipe();
    });

    function handleSwipe() {
        const swipeThreshold = 50;
        const diff = startX - endX;

        if (Math.abs(diff) > swipeThreshold) {
            if (diff > 0) {
                nextSlide();
            } else {
                previousSlide();
            }
        }

        // reset for the next gesture
        startX = 0;
        endX = 0;
    }


    // Dark mode toggle functionality
    function toggleDarkMode() {
        document.documentElement.classList.toggle('dark');

        // Save preference to localStorage
        if (document.documentElement.classList.contains('dark')) {
            localStorage.setItem('darkMode', 'true');
        } else {
            localStorage.setItem('darkMode', 'false');
        }
    }

    // Initialize dark mode based on user preference or system preference
    function initializeDarkMode() {
        const savedMode = localStorage.getItem('darkMode');
        const systemPrefersDark = window.matchMedia('(prefers-color-scheme: dark)').matches;

        if (savedMode === 'true' || (savedMode === null && systemPrefersDark)) {
            document.documentElement.classList.add('dark');
        }
    }

    // Initialize
    initializeDarkMode();
    updateSlider();

</script>
<script>
    document.addEventListener("DOMContentLoaded", function () {
        document.querySelectorAll(".slider-link").forEach(function (link) {
            link.addEventListener("click", function () {
                let sliderId = this.dataset.id;

                // sendBeacon requires a Blob or FormData
                const data = new FormData();
                data.append('_token', "{{ csrf_token() }}");

                navigator.sendBeacon(`/slider/click/${sliderId}`, data);
                // navigation will continue normally
            });
        });
    });

</script>
