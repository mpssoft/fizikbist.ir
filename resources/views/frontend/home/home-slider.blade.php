<style>
    .slide { transition: transform 0.6s ease-in-out, opacity 0.6s ease; }
    .hero-bg { background-size: cover; background-position: center; }
    .is-active { opacity: 1; }
    .is-inactive { opacity: 0; }
</style>
<section class="relative w-full rounded-3xl overflow-hidden mx-auto md:w-[90%] dark:md:w-[90%]">
    <!-- Slider height area 1920x450 -->
    <div class="w-full h-[450px] relative overflow-hidden">
        <!-- Slides: place your images via foreach by duplicating this block and changing the style background-image -->
        <!-- Example slide 1 -->
        <div class="slide absolute inset-0 hero-bg is-active" style="background-image: url('https://fizikbist.ir/images/-5845927777142950445_121.jpg')"></div>
        <div class="slide absolute inset-0 hero-bg is-active" style="background-image: url('https://fizikbist.ir/images/39d859d1be5fe63d61f7880278b45873.jpg')"></div>
        <div class="slide absolute inset-0 hero-bg is-active" style="background-image: url('https://parspremium.ir/uploads/image/rootimage/4961/524a26083dbd53fa8ba3d5025c00b740.jpg?w=1400&h=1000&q=90')"></div>

        <!-- Example slide 2 -->

        <!-- Example slide 3 -->
        <div class="slide absolute inset-0 hero-bg translate-x-full is-inactive" style="background-image: url('https://images.unsplash.com/photo-1496307042754-b4aa456c4a2d?q=80&w=1920&auto=format&fit=crop');"></div>

        <!-- Optional dark overlay for readability; keep or remove -->
        <div class="pointer-events-none absolute inset-0 bg-gradient-to-r from-black/30 via-black/15 to-transparent"></div>

        <!-- Arrows -->
        <button class="absolute left-4 top-1/2 -translate-y-1/2 bg-white/25 hover:bg-white/35 text-white p-3 rounded-full transition backdrop-blur-sm" onclick="previousSlide()" aria-label="Previous">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/></svg>
        </button>
        <button class="absolute right-4 top-1/2 -translate-y-1/2 bg-white/25 hover:bg-white/35 text-white p-3 rounded-full transition backdrop-blur-sm" onclick="nextSlide()" aria-label="Next">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
        </button>

        <!-- Dots -->
        <div class="absolute bottom-4 left-1/2 -translate-x-1/2 flex gap-3">
            <button class="dot w-3 h-3 rounded-full bg-white transition-all duration-500 hover:scale-110" onclick="goToSlide(0)" aria-label="Slide 1"></button>
            <button class="dot w-3 h-3 rounded-full bg-white/40 transition-all duration-500 hover:scale-110" onclick="goToSlide(1)" aria-label="Slide 2"></button>
            <button class="dot w-3 h-3 rounded-full bg-white/40 transition-all duration-500 hover:scale-110" onclick="goToSlide(2)" aria-label="Slide 3"></button>
        </div>

   </div>
</section>

<script>
    // Core slider logic without changing images in JS
    let current = 0;
    const slides = Array.from(document.querySelectorAll('.slide'));
    const dots = Array.from(document.querySelectorAll('.dot'));
    const total = slides.length;

    function applyTransforms() {
        slides.forEach((s, i) => {
            if (i === current) {
                s.classList.remove('is-inactive');
                s.classList.add('is-active');
                s.style.transform = 'translateX(0%)';
            } else if (i < current) {
                s.classList.remove('is-active');
                s.classList.add('is-inactive');
                s.style.transform = 'translateX(-100%)';
            } else {
                s.classList.remove('is-active');
                s.classList.add('is-inactive');
                s.style.transform = 'translateX(100%)';
            }
        });

        // Update dots
        dots.forEach((d, i) => {
            if (i === current) {
                d.style.transform = 'scale(1.2)';
                d.style.backgroundColor = 'rgba(255,255,255,1)';
            } else {
                d.style.transform = 'scale(1)';
                d.style.backgroundColor = 'rgba(255,255,255,0.4)';
            }
        });
    }

    function nextSlide() {
        current = (current + 1) % total;
        applyTransforms();
    }
    function previousSlide() {
        current = (current - 1 + total) % total;
        applyTransforms();
    }
    function goToSlide(i) {
        current = i;
        applyTransforms();
    }

    // Auto-play every 10 seconds
    let autoTimer = setInterval(nextSlide, 10000);

    // Pause on hover
    const container = document.querySelector('section');
    container.addEventListener('mouseenter', () => clearInterval(autoTimer));
    container.addEventListener('mouseleave', () => autoTimer = setInterval(nextSlide, 10000));

    // Touch swipe
    let startX = 0;
    container.addEventListener('touchstart', (e) => { startX = e.touches[0].clientX; }, { passive: true });
    container.addEventListener('touchend', (e) => {
        const endX = e.changedTouches[0].clientX;
        const diff = startX - endX;
        if (Math.abs(diff) > 50) diff > 0 ? nextSlide() : previousSlide();
    });

    // Dark mode
    function toggleDarkMode() {
        document.documentElement.classList.toggle('dark');
        localStorage.setItem('darkMode', document.documentElement.classList.contains('dark') ? 'true' : 'false');
    }
    (function initDark() {
        const saved = localStorage.getItem('darkMode');
        const prefers = window.matchMedia('(prefers-color-scheme: dark)').matches;
        if (saved === 'true' || (saved === null && prefers)) document.documentElement.classList.add('dark');
    })();

    // Init
    applyTransforms();
</script>
