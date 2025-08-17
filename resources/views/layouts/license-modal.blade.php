  @push('scripts')
    <script>
        tailwind.config = {
            darkMode: 'class',
            theme: {
                extend: {
                    colors: {
                        primary: {
                            50: '#eef9ff',
                            100: '#d8f0ff',
                            200: '#b6e1ff',
                            300: '#84ccff',
                            400: '#4db4ff',
                            500: '#1d9bff',
                            600: '#0b80e6',
                            700: '#0966b8',
                            800: '#084f8f',
                            900: '#073f73'
                        },
                        ink: {
                            50: '#f7f7fb',
                            100: '#eeeff6',
                            200: '#d9dbea',
                            300: '#b7bad3',
                            400: '#8f93b0',
                            500: '#6c7191',
                            600: '#535874',
                            700: '#42465c',
                            800: '#35384a',
                            900: '#242634'
                        }
                    },
                    boxShadow: {
                        glass: '0 10px 30px rgba(7,63,115,0.25)'
                    },
                    fontFamily: {
                        sans: ['IRANSans', 'Vazirmatn', 'Tahoma', 'sans-serif']
                    }
                }
            }
        }
    </script>
  @endpush
    <style>
        @font-face {
            font-family: "IRANSans";
            src: local("IRANSans");
            font-display: swap;
        }
        /* Subtle backdrop blur for nicer feel on modern browsers */
        .backdrop-blur-md { backdrop-filter: blur(10px); }
    </style>

<div class="min-h-screen font-sans p-6 transition-colors duration-300 bg-white text-ink-900 dark:bg-gradient-to-br dark:from-primary-900 dark:via-ink-900 dark:to-primary-800 dark:text-ink-50 flex items-center justify-center">

<!-- Modal Backdrop -->
<div id="licenseModal" class="fixed inset-0 z-50 hidden opacity-0 transition-opacity duration-300 bg-black/80 dark:bg-black/85 backdrop-blur-md overflow-y-auto overscroll-contain ">


    <!-- Modal Panel -->
    <div class="relative z-10 mx-auto  translate-y-6  w-full sm:w-full md:w-[700px] max-w-full opacity-0 transition-all  duration-1000" id="licensePanel">
        <div class="mt-10 sm:mt-14 rounded-2xl bg-white text-ink-900 dark:bg-ink-800 dark:text-ink-50 shadow-glass overflow-hidden">

            <!-- Header -->
            <div class="flex items-center justify-between px-6 py-4 bg-gradient-to-l from-primary-600 to-primary-500 text-white">
                <div class="flex items-center gap-3">
                    <div class="w-9 h-9 rounded-xl bg-white/15 flex items-center justify-center">
                        <!-- Simple key icon -->
                        🔑
                    </div>
                    <div>
                        <h2 class="text-lg font-bold">لایسنس دوره ثبت شد</h2>
                        <p class="text-white/80 text-sm">جزئیات خرید و کد لایسنس شما</p>
                    </div>
                </div>
                <button id="closeModalBtn" class="p-2 rounded-lg hover:bg-white/10 focus:outline-none focus:ring-2 focus:ring-white/40" aria-label="بستن">✕</button>
            </div>

            <!-- Body -->
            <div class="px-6 py-6 space-y-5">

                <!-- توضیح ساده پرداخت موفق -->
                <div class="flex items-start gap-3 bg-green-50 border border-green-200 text-green-800 rounded-xl p-4">
                    <div class="w-6 h-6 rounded-full bg-green-600 text-white flex items-center justify-center mt-0.5">
                        ✓
                    </div>
                    <div>
                        <p class="font-semibold">پرداخت موفق بود</p>
                        <p class="text-sm mt-1">کد لایسنس شما ثبت و فعال شد.</p>
                    </div>
                </div>
                    @foreach(session('licenses') as $item)
                     <!-- License code -->
                <div data-license-item class="bg-white dark:bg-ink-900 rounded-xl border border-ink-100 dark:border-ink-700 p-4 sm:p-5">
                    <div class="flex items-center justify-between gap-4">
                        <div>
                            <p class="text-sm text-ink-600 dark:text-ink-300">کد لایسنس</p>
                            <p id="licenseCode" class="license-code text-sm sm:text-base md:text-sm tracking-wide select-all break-all overflow-hidden text-ellipsis whitespace-pre-wrap">{{ $item['license'] }}</p>
                        </div>
                        <button id="copyBtn" class="copy-btn p-2 rounded-lg bg-primary-600 hover:bg-primary-700 text-white" aria-label="کپی کد">
                            📋
                        </button>
                    </div>
                </div>

                <!-- اطلاعات دوره -->
                <div class="bg-white dark:bg-ink-900 rounded-xl border border-ink-100 dark:border-ink-700 p-4 sm:p-5 space-y-3">
                    <div class="flex items-center justify-between gap-3">
                        <div>
                            <p class="text-sm text-ink-600 dark:text-ink-300">نام دوره</p>
                            <p class="font-semibold text-ink-900 dark:text-white">{{ $item['course'] }}</p>
                        </div>
                        <span class="inline-flex items-center bg-primary-50 text-primary-700 dark:bg-primary-600/20 dark:text-primary-200 px-3 py-1.5 rounded-lg text-sm">
                فعال
              </span>
                    </div>
                    <div class="grid grid-cols-2 gap-3">
                        <div class="bg-ink-50 dark:bg-ink-800 rounded-lg p-3">
                            <p class="text-xs text-ink-600 dark:text-ink-300">مدرس</p>
                            <p class="font-medium">{{ $item['teacher'] }}</p>
                        </div>
                        <div class="bg-ink-50 dark:bg-ink-800 rounded-lg p-3">
                            <p class="text-xs text-ink-600 dark:text-ink-300">تاریخ خرید</p>
                            <p class="font-medium">{{ \Morilog\Jalali\Jalalian::now() }}</p>
                        </div>
                    </div>
                </div>
                @endforeach
                <!-- Persistent message -->
                <div class="rounded-xl bg-ink-900 text-ink-50 dark:bg-ink-800 dark:text-ink-50 p-4 sm:p-5">
                    <div class="flex items-start gap-3">
                        <div class="w-8 h-8 rounded-lg bg-white/15 flex items-center justify-center">ℹ️</div>
                        <p class="leading-7">
                            می‌توانید این کد لایسنس را بعداً در پنل کاربری خود مشاهده کنید. همچنین جزئیات خرید همیشه در دسترس شماست.
                        </p>
                    </div>
                </div>

            </div>

            <!-- Footer actions -->
            <div class="px-6 py-4 bg-ink-50/70 dark:bg-ink-900/50 border-t border-ink-100 dark:border-ink-700 flex items-center justify-end">
                <span class="text-xs text-ink-600 dark:text-ink-300">برای بستن از گوشه بالا استفاده کنید ✕</span>
            </div>

        </div>
    </div>
</div>
@push('scripts')
<script>
    // Elements
    const modal = document.getElementById('licenseModal');
    const closeBtn = document.getElementById('closeModalBtn');
    const copyBtn = document.getElementById('copyBtn');
    const licenseCodeEl = document.getElementById('licenseCode');
    const panel = document.getElementById('licensePanel');

    function openModalSmooth() {
        modal.classList.remove('hidden');
        requestAnimationFrame(() => {
            modal.classList.add('opacity-100');
            panel.classList.remove('translate-y-6', 'opacity-0');
        });
        closeBtn.focus();
    }

    function closeModal() {
        modal.classList.remove('opacity-100');
        panel.classList.add('translate-y-6', 'opacity-0');
        setTimeout(() => modal.classList.add('hidden'), 300);
    }

    // Close controls
    closeBtn.addEventListener('click', closeModal);

    window.addEventListener('keydown', (e) => {
        if (!modal.classList.contains('hidden') && e.key === 'Escape') closeModal();
    });

    // Copy license
    document.addEventListener('click', async (e) => {
        const btn = e.target.closest('.copy-btn');
        if (!btn) return;

        const container = btn.closest('[data-license-item]');
        const codeEl = container?.querySelector('.license-code');
        if (!codeEl) return;

        const code = codeEl.textContent.trim();
        try {
            await navigator.clipboard.writeText(code);
            const original = btn.textContent;
            btn.textContent = '✅';
            setTimeout(() => (btn.textContent = original || '📋'), 1200);
        } catch {
            alert('کپی کردن انجام نشد. لطفاً دستی انتخاب و کپی کنید.');
        }
    });

   setTimeout(function(){
       openModalSmooth();
   },2000)


</script>
    @endpush
</div>
