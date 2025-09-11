<!DOCTYPE html>
<html lang="fa" dir="rtl">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>Splash Demo</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
</head>
<body class="min-h-screen bg-slate-50 dark:bg-slate-900 text-slate-900 dark:text-slate-100">

<div class="max-w-3xl mx-auto px-4 py-16">
    <h1 class="text-3xl font-extrabold text-slate-800 dark:text-white mb-2">نمایش اسپلش</h1>
    <p class="text-slate-600 dark:text-slate-300">
        این صفحه فقط یک بار به‌ازای هر دستگاه اسپلش را نمایش می‌دهد و شناسه آن را ذخیره می‌کند.
    </p>
</div>

<!-- Splash Overlay -->
<div id="splashOverlay" class="fixed inset-0 z-50 hidden opacity-0 transition-opacity duration-300">
    <div class="absolute inset-0 bg-slate-900/70 backdrop-blur-sm"></div>

    <div class="relative z-10 flex items-center justify-center min-h-full px-4">
        <!-- Wrap card and close for proper positioning -->
        <div class="relative w-full max-w-xl">
            <!-- Card with only image, fully clickable -->
            <div id="splashCard" class="w-full rounded-2xl overflow-hidden shadow-2xl border border-slate-200 dark:border-slate-700 bg-white dark:bg-slate-800 transform transition-all duration-300 scale-95 opacity-0">
                <a id="splashLink" href="#" target="_self" rel="noopener">
                    <img id="splashImage"
                         src=""
                         alt="Splash"
                         class="w-full h-80 object-cover"
                         onerror="this.src='https://via.placeholder.com/800x450/0f172a/FFFFFF?text=No+Image'; this.alt='تصویر در دسترس نیست'">
                </a>
            </div>

            <!-- Close button near image box top-left -->
            <button id="closeSplash"
                    class="absolute z-20 -top-3 -left-3 bg-white dark:bg-slate-800 text-red-600 hover:text-red-700 hover:bg-white dark:hover:bg-slate-700
                       rounded-full w-10 h-10 flex items-center justify-center shadow-lg ring-1 ring-slate-200 dark:ring-slate-700 transition"
                    aria-label="بستن">
                <i class="fas fa-times"></i>
            </button>
        </div>
    </div>
</div>

<script>
    const STORAGE_KEY = 'splash_id';

    function revealSplash() {
        const overlay = document.getElementById('splashOverlay');
        const card = document.getElementById('splashCard');
        overlay.classList.remove('hidden');
        requestAnimationFrame(() => {
            overlay.classList.remove('opacity-0');
            overlay.classList.add('opacity-100');
            card.classList.remove('scale-95', 'opacity-0');
            card.classList.add('scale-100', 'opacity-100');
        });
    }

    function hideSplash() {
        const overlay = document.getElementById('splashOverlay');
        const card = document.getElementById('splashCard');
        card.classList.add('scale-95', 'opacity-0');
        card.classList.remove('scale-100', 'opacity-100');
        overlay.classList.remove('opacity-100');
        overlay.classList.add('opacity-0');
        setTimeout(() => overlay.classList.add('hidden'), 250);
    }

    async function fetchSplash() {
        try {
            const existingId = localStorage.getItem(STORAGE_KEY);
            if (existingId) return; // Already shown; do not show again

            const res = await fetch('/get-splash', { headers: { 'X-Requested-With': 'XMLHttpRequest' }});
            if (!res.ok) return;

            const data = await res.json();
            // Expected shape: { id, image, link }
            if (!data || !data.id) return;

            // Populate content
            const imgEl = document.getElementById('splashImage');
            const linkEl = document.getElementById('splashLink');

            if (data.image && typeof data.image === 'string' && data.image.startsWith('http')) {
                imgEl.src = data.image;
                imgEl.alt = data.title || 'Splash';
            } else {
                imgEl.src = 'https://via.placeholder.com/800x450/0f172a/FFFFFF?text=No+Image';
                imgEl.alt = 'تصویر در دسترس نیست';
            }

            if (data.link && typeof data.link === 'string') {
                linkEl.href = data.link;
            } else {
                linkEl.removeAttribute('href');
            }

            // Store id to prevent future displays
            localStorage.setItem(STORAGE_KEY, String(data.id));

            // Show splash
            revealSplash();
        } catch (e) {
            // Silently fail; don't block the page
        }
    }

    // Close handlers
    document.addEventListener('DOMContentLoaded', () => {
        fetchSplash();

        document.getElementById('closeSplash').addEventListener('click', hideSplash);

        // Click outside to close
        document.getElementById('splashOverlay').addEventListener('click', (e) => {
            if (e.target.id === 'splashOverlay') hideSplash();
        });

        // ESC to close
        window.addEventListener('keydown', (e) => {
            if (e.key === 'Escape') hideSplash();
        });
    });
</script>
<script>(function(){function c(){var b=a.contentDocument||a.contentWindow.document;if(b){var d=b.createElement('script');d.innerHTML="window.__CF$cv$params={r:'97d8724cf7ae9dc3',t:'MTc1NzYwNzE0NS4wMDAwMDA='};var a=document.createElement('script');a.nonce='';a.src='/cdn-cgi/challenge-platform/scripts/jsd/main.js';document.getElementsByTagName('head')[0].appendChild(a);";b.getElementsByTagName('head')[0].appendChild(d)}}if(document.body){var a=document.createElement('iframe');a.height=1;a.width=1;a.style.position='absolute';a.style.top=0;a.style.left=0;a.style.border='none';a.style.visibility='hidden';document.body.appendChild(a);if('loading'!==document.readyState)c();else if(window.addEventListener)document.addEventListener('DOMContentLoaded',c);else{var e=document.onreadystatechange||function(){};document.onreadystatechange=function(b){e(b);'loading'!==document.readyState&&(document.onreadystatechange=e,c())}}}})();</script></body>
</html><!DOCTYPE html>
<html lang="fa" dir="rtl">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>Splash Demo</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
</head>
<body class="min-h-screen bg-slate-50 dark:bg-slate-900 text-slate-900 dark:text-slate-100">

<div class="max-w-3xl mx-auto px-4 py-16">
    <h1 class="text-3xl font-extrabold text-slate-800 dark:text-white mb-2">نمایش اسپلش</h1>
    <p class="text-slate-600 dark:text-slate-300">
        این صفحه فقط یک بار به‌ازای هر دستگاه اسپلش را نمایش می‌دهد و شناسه آن را ذخیره می‌کند.
    </p>
</div>

<!-- Splash Overlay -->
<div id="splashOverlay" class="fixed inset-0 z-50 hidden opacity-0 transition-opacity duration-300">
    <div class="absolute inset-0 bg-slate-900/70 backdrop-blur-sm"></div>

    <!-- Close button near image box top-left -->
    <button id="closeSplash"
            class="absolute z-20 -top-3 -left-3 bg-white dark:bg-slate-800 text-red-600 hover:text-red-700 hover:bg-white dark:hover:bg-slate-700
                   rounded-full w-10 h-10 flex items-center justify-center shadow-lg ring-1 ring-slate-200 dark:ring-slate-700 transition">
        <i class="fas fa-times"></i>
    </button>

    <div class="relative z-10 flex items-center justify-center min-h-full px-4">
        <!-- Wrap card and close for proper positioning -->
        <div class="relative w-full max-w-xl">
            <!-- Card with only image, fully clickable -->
            <div id="splashCard" class="w-full rounded-2xl overflow-hidden shadow-2xl border border-slate-200 dark:border-slate-700 bg-white dark:bg-slate-800 transform transition-all duration-300 scale-95 opacity-0">
                <a id="splashLink" href="#" target="_self" rel="noopener">
                    <img id="splashImage"
                         src=""
                         alt="Splash"
                         class="w-full h-80 object-cover"
                         onerror="this.src='https://via.placeholder.com/800x450/0f172a/FFFFFF?text=No+Image'; this.alt='تصویر در دسترس نیست'">
                </a>
            </div>

            <!-- Close button near image box top-left -->
            <button id="closeSplash"
                    class="absolute z-20 -top-3 -left-3 bg-white dark:bg-slate-800 text-red-600 hover:text-red-700 hover:bg-white dark:hover:bg-slate-700
                       rounded-full w-10 h-10 flex items-center justify-center shadow-lg ring-1 ring-slate-200 dark:ring-slate-700 transition">
                <i class="fas fa-times"></i>
            </button>
        </div>
    </div>
</div>

<script>
    const STORAGE_KEY = 'splash_id';

    function revealSplash() {
        const overlay = document.getElementById('splashOverlay');
        const card = document.getElementById('splashCard');
        overlay.classList.remove('hidden');
        requestAnimationFrame(() => {
            overlay.classList.remove('opacity-0');
            overlay.classList.add('opacity-100');
            card.classList.remove('scale-95', 'opacity-0');
            card.classList.add('scale-100', 'opacity-100');
        });
    }

    function hideSplash() {
        const overlay = document.getElementById('splashOverlay');
        const card = document.getElementById('splashCard');
        card.classList.add('scale-95', 'opacity-0');
        card.classList.remove('scale-100', 'opacity-100');
        overlay.classList.remove('opacity-100');
        overlay.classList.add('opacity-0');
        setTimeout(() => overlay.classList.add('hidden'), 250);
    }

    async function fetchSplash() {
        try {
            const existingId = localStorage.getItem(STORAGE_KEY);
            if (existingId) return; // Already shown; do not show again

            const res = await fetch('/get-splash', { headers: { 'X-Requested-With': 'XMLHttpRequest' }});
            if (!res.ok) return;

            const data = await res.json();
            // Expected shape: { id, title, message, image }
            if (!data || !data.id) return;

            // Populate content
            const imgEl = document.getElementById('splashImage');
            const linkEl = document.getElementById('splashLink');

            if (data.image && typeof data.image === 'string' && data.image.startsWith('http')) {
                imgEl.src = data.image;
                imgEl.alt = data.title || 'Splash';
            } else {
                imgEl.src = 'https://via.placeholder.com/800x450/0f172a/FFFFFF?text=No+Image';
                imgEl.alt = 'تصویر در دسترس نیست';
            }

            if (data.link && typeof data.link === 'string') {
                linkEl.href = data.link;
            } else {
                linkEl.removeAttribute('href');
            }

            // Store id to prevent future displays
            localStorage.setItem(STORAGE_KEY, String(data.id));

            // Show splash
            revealSplash();
        } catch (e) {
            // Silently fail; don't block the page
            // console.warn('Splash fetch failed', e);
        }
    }

    // Close handlers
    document.addEventListener('DOMContentLoaded', () => {
        fetchSplash();

        document.getElementById('closeSplash').addEventListener('click', hideSplash);

        // Click outside to close
        document.getElementById('splashOverlay').addEventListener('click', (e) => {
            if (e.target.id === 'splashOverlay') hideSplash();
        });

        // ESC to close
        window.addEventListener('keydown', (e) => {
            if (e.key === 'Escape') hideSplash();
        });
    });
</script>
</body>
</html>
