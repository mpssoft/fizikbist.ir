
<video
    class=" inset-0 w-full h-full object-contain"
    autoplay
    muted
    loop
    playsinline
    aria-label="Background motion graphics video"
    id="motion-video"
>

    <source src="{{$motion->video_url}}" type="video/mp4">

</video>

@push('scripts')
    <script>
        (function () {
            const video = document.getElementById('motion-video');
            let lastY = window.scrollY;
            let isVisible = false;

            // رصد دیده‌شدن ویدیو
            const io = new IntersectionObserver((entries) => {
                entries.forEach((entry) => {
                    isVisible = entry.isIntersecting && entry.intersectionRatio > 0.1;

                    // اگر از دید خارج شد، متوقف شود
                    if (!isVisible && !video.paused) {
                        try { video.pause(); } catch(e) {}
                    }
                });
            }, { threshold: [0, 0.1, 0.25, 0.5, 0.75, 1] });

            io.observe(video);

            // کنترل بر اساس جهت اسکرول
            window.addEventListener('scroll', () => {
                const y = window.scrollY;
                const scrollingDown = y > lastY + 1; // آستانه کوچک برای جلوگیری از نوسان

                if (scrollingDown) {
                    // اسکرول به پایین → توقف
                    if (!video.paused) {
                        try { video.pause(); } catch(e) {}
                    }
                } else {
                    // اسکرول به بالا → اگر ویدیو دیده می‌شود پخش شود
                    if (isVisible) {
                        const p = video.play();
                        if (p && typeof p.catch === 'function') { p.catch(()=>{}); }
                    }
                }
                lastY = y;
            }, { passive: true });

            // در شروع: اگر دیده نمی‌شود، پخش نکند
            window.addEventListener('load', () => {
                if (!isVisible && !video.paused) {
                    try { video.pause(); } catch(e) {}
                }
            });
        })();
    </script>
@endpush
