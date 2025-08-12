<style>
    .slide {
        transition: transform 0.5s ease-in-out;
    }

    .slide-enter-left {
        animation: slideInLeft 0.8s ease-out forwards;
    }

    .slide-enter-right {
        animation: slideInRight 0.8s ease-out forwards;
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
<div class="container mx-auto px-4 max-w-4xl" >


    <!-- Slider Container -->
    <div class="mt-10 mb-10 relative bg-white dark:bg-gray-800 rounded-2xl shadow-2xl dark:shadow-gray-900/50 overflow-hidden transition-colors duration-300">
        <!-- Slides Wrapper -->
        <div class="relative h-96 md:h-[500px] overflow-hidden ">
            <!-- Slide 1 -->
            @foreach($sliders as $slider)
                <div class="slide absolute inset-0 w-full h-full" id="slide-1">
                <div class="relative w-full h-full">
                    <!-- Background -->
                    <div class="absolute inset-0 bg-gradient-to-r from-blue-600 to-purple-600"></div>
                    <div class="absolute inset-0 bg-black bg-opacity-20"></div>

                    <!-- Content Grid -->
                    <div class="relative z-10 grid grid-cols-1 md:grid-cols-2 h-full md:pr-30" dir="ltr">

                        <!-- Text Section (Left) -->
                        <div dir="rtl" class="text-right slide-content flex flex-col justify-center p-8 md:p-12  text-white order-2 md:order-1">
                            <h2 class="text-2xl md:text-4xl lg:text-5xl font-bold mb-4 leading-tight">{{ $slider->title }}</h2>
                            <p class="text-base md:text-lg lg:text-xl mb-6 opacity-90">{{ $slider->subtitle }}</p>
                            @if($slider->link)
                                <a href="#" class="leading-right bg-white text-blue-600 px-6 py-3 rounded-full font-semibold hover:bg-blue-50 transition-colors duration-300 shadow-lg w-fit">اطلاعات بیشتر</a>
                            @endif
                        </div>
                        <!-- Photo Section (Right) -->
                        <div class="  hidden md:block slide-image  items-center justify-center p-8 md:p-12 order-1 md:order-2">
                            <div style="background:url('{{$slider->image}}');background-size:contain ;" class="w-80 h-80 md:w-full md:h-full rounded-3xl overflow-hidden shadow-2xl bg-white/10 backdrop-blur-sm shadow-amber-500 border-white/20">

                            </div>
                        </div>

                    </div>
                </div>
            </div>
            @endforeach

        </div>

        <!-- Navigation Arrows -->
        <button class="absolute left-4 top-1/2 transform -translate-y-1/2 bg-white bg-opacity-20 hover:bg-opacity-30 text-white p-3 rounded-full transition-all duration-300 backdrop-blur-sm" onclick="previousSlide()">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
            </svg>
        </button>

        <button class="absolute right-4 top-1/2 transform -translate-y-1/2 bg-white bg-opacity-20 hover:bg-opacity-30 text-white p-3 rounded-full transition-all duration-300 backdrop-blur-sm" onclick="nextSlide()">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
            </svg>
        </button>

        <!-- Dots Indicator -->
        <div class="absolute bottom-6 left-1/2 transform -translate-x-1/2 flex ">
            <button class="w-3 h-3 rounded-full bg-white transition-all duration-500 hover:scale-110 active-dot ml-3" onclick="goToSlide(0)" id="dot-0"></button>
            <button class="w-3 h-3 rounded-full bg-white bg-opacity-40 transition-all duration-500 hover:scale-110 ml-3" onclick="goToSlide(1)" id="dot-1"></button>
            <button class="w-3 h-3 rounded-full bg-white bg-opacity-40 transition-all duration-500 hover:scale-110 ml-3" onclick="goToSlide(2)" id="dot-2"></button>
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
    setInterval(nextSlide, 10000);

    // Touch/swipe support for mobile
    let startX = 0;
    let endX = 0;

    document.querySelector('.relative.bg-white').addEventListener('touchstart', (e) => {
        startX = e.touches[0].clientX;
    });

    document.querySelector('.relative.bg-white').addEventListener('touchend', (e) => {
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
