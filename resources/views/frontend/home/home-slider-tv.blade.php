<style>
    .slide {
        transition: opacity 0.5s ease;
    }

    .slide-active {
        opacity: 1;
    }

    .slide-hidden {
        opacity: 0;
    }
</style>

<div class="container mx-auto px-4 max-w-4xl">
    <!-- Slider Container -->
    <div class="mt-10 mb-10 relative bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-700 rounded-2xl shadow-lg overflow-hidden transition-colors duration-300">

        <!-- Slides Wrapper -->
        <div class="relative h-96 md:h-[500px] overflow-hidden">
            @foreach($sliders as $index => $slider)
                <div class="slide {{ $index === 0 ? 'slide-active' : 'slide-hidden' }} absolute inset-0 w-full h-full" data-slide="{{ $index }}">
                    <div class="relative w-full h-full">

                        <!-- Background -->
                        <div class="absolute inset-0 bg-gray-50 dark:bg-gray-700"></div>

                        <!-- Content Grid -->
                        <div class="relative z-10 grid grid-cols-1 md:grid-cols-2 h-full md:pr-30" dir="ltr">

                            <!-- Text Section (Left) -->
                            <div dir="rtl" class="hidden md:flex text-right flex-col justify-center px-8 text-gray-800 dark:text-white order-2 md:order-1 z-20">
                                <h2 class="text-2xl md:text-4xl lg:text-5xl font-bold mb-4 leading-tight">{{ $slider->title }}</h2>
                                <p class="text-base md:text-lg lg:text-xl mb-6">{{ $slider->subtitle }}</p>
                                @if($slider->link)
                                    <a href="{{$slider->link}}" class="bg-blue-600 dark:bg-blue-500 text-white px-6 py-3 rounded-lg font-semibold hover:bg-blue-700 dark:hover:bg-blue-600 transition-colors duration-300 w-fit">اطلاعات بیشتر</a>
                                @endif
                            </div>

                            <!-- Photo Section (Right) -->
                            <div class="flex items-center justify-center p-8 md:p-12 order-1 md:order-2 z-20">
                                <div class="w-[520px] max-w-[520px] md:w-[520px] md:h-[390px] rounded-2xl overflow-hidden shadow-lg bg-gray-200 dark:bg-gray-600">
                                    <a href="{{$slider->link}}" class="block w-full h-full">
                                        <img src="{{$slider->image}}" alt="{{ $slider->title }}" class="w-[520px] h-full md:w-[520px] md:h-[390px] object-cover">
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <!-- Navigation Dots -->
        <div class="absolute bottom-4 left-1/2 transform -translate-x-1/2 flex space-x-2">
            @foreach($sliders as $index => $slider)
                <button class="dot w-3 h-3 rounded-full {{ $index === 0 ? 'bg-blue-600 dark:bg-blue-400' : 'bg-gray-400 dark:bg-gray-500' }}" data-slide="{{ $index }}"></button>
            @endforeach
        </div>

        <!-- Navigation Arrows -->
        <button id="prevBtn" class="absolute left-4 top-1/2 transform -translate-y-1/2 bg-white dark:bg-gray-800 text-gray-800 dark:text-white p-2 rounded-full shadow-lg hover:bg-gray-50 dark:hover:bg-gray-700 transition-colors">
            ←
        </button>
        <button id="nextBtn" class="absolute right-4 top-1/2 transform -translate-y-1/2 bg-white dark:bg-gray-800 text-gray-800 dark:text-white p-2 rounded-full shadow-lg hover:bg-gray-50 dark:hover:bg-gray-700 transition-colors">
            →
        </button>
    </div>
</div>

<script>
    // Simple slider functionality optimized for TV devices
    let currentSlide = 0;
    const slides = document.querySelectorAll('.slide');
    const dots = document.querySelectorAll('.dot');
    const totalSlides = slides.length;

    function showSlide(index) {
        // Hide all slides
        slides.forEach(slide => {
            slide.classList.remove('slide-active');
            slide.classList.add('slide-hidden');
        });

        // Show current slide
        if (slides[index]) {
            slides[index].classList.remove('slide-hidden');
            slides[index].classList.add('slide-active');
        }

        // Update dots
        dots.forEach((dot, i) => {
            if (i === index) {
                dot.classList.remove('bg-gray-400', 'dark:bg-gray-500');
                dot.classList.add('bg-blue-600', 'dark:bg-blue-400');
            } else {
                dot.classList.remove('bg-blue-600', 'dark:bg-blue-400');
                dot.classList.add('bg-gray-400', 'dark:bg-gray-500');
            }
        });
    }

    function nextSlide() {
        currentSlide = (currentSlide + 1) % totalSlides;
        showSlide(currentSlide);
    }

    function prevSlide() {
        currentSlide = (currentSlide - 1 + totalSlides) % totalSlides;
        showSlide(currentSlide);
    }

    // Event listeners
    const nextBtn = document.getElementById('nextBtn');
    const prevBtn = document.getElementById('prevBtn');

    if (nextBtn) nextBtn.addEventListener('click', nextSlide);
    if (prevBtn) prevBtn.addEventListener('click', prevSlide);

    // Dot navigation
    dots.forEach((dot, index) => {
        dot.addEventListener('click', () => {
            currentSlide = index;
            showSlide(currentSlide);
        });
    });

    // Auto-play (5 seconds interval)
    if (totalSlides > 1) {
        setInterval(nextSlide, 5000);
    }
</script>
