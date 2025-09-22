<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}"

      x-data="{ dark: (localStorage.getItem('dark') ?? 'true') === 'true', cart: false, open: false }"
      x-init="$watch('dark', value => localStorage.setItem('dark', value))"
      :class="{ 'dark': dark, 'transition-colors duration-300': true }"
>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <link rel="icon" type="image/x-icon" href="{{ asset('favicon.png') }}">
        {!! SEO::generate() !!}
        <script src="https://cdn.tailwindcss.com"></script>
        <!-- Typography plugin CSS (jsDelivr) -->

        <script>
            window.tailwind = {
                config: {

                    darkMode: 'class',
                    theme: {
                        extend: {},
                    },
                }
            }
        </script>

    </head>
    <body class=" transition-colors duration-1000 bg-white text-black dark:bg-slate-900  dark:text-white" dir="rtl">
        <div class="min-h-screen ">
            @include('layouts.frontend.navigation')

            <!-- Page Heading -->
            @isset($header)
                <header class=" shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endisset



            <!-- Page Content -->
            <main>
                @yield('content')
                {{ $slot ?? '' }}
            </main>

            @include("layouts.frontend.footer")
        </div>
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        <script src="/js/jquery/jquery.min.js"> </script>
        <script src="/js/modules/sweetalert2.js" ></script>
        <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
        @stack('scripts')
        @if(!auth()->check())
            @include('layouts.login-lightbox')
            <script>

                function showMobileSection(){
                    $('#mobileSection').fadeIn();
                    $('#otpCodeBox').fadeOut();
                    clearInterval(timerInterval);
                    $('#timerBox').addClass('hidden');
                    $('#sendOtpBtn').prop('disabled', false);
                    $('#otpCodeBox').addClass('hidden');

                    $('#sendOtpBtn .spinner').addClass('hidden');
                    $('#sendOtpBtn').text('ارسال کد تایید');

                    otpPhase = false;
                    $('.otp-digit').val('');
                }
                let resendTimer = 30;
                let timerInterval;



                    $(document).ready(function () {
                    let otpPhase = false;
                    let otpAttempts = 0;
                    const MAX_ATTEMPTS = 3;
                    $('#otpForm').on('submit', function (e) {
                    e.preventDefault();

                    const mobile = $('#mobile').val();
                    const otp = $('.otp-digit').map((i, el) => el.value).get().join('');
                    const token = $('input[name="_token"]').val();
                    const remember = $('#remember').is(':checked');

                    $('#errorBox').addClass('hidden').text('');
                    $('#sendOtpBtn').prop('disabled', true);
                    $('#sendOtpBtn .spinner').removeClass('hidden');

                    if (!otpPhase) {
                    // Step 1: Send OTP to mobile
                    $.ajax({
                    url: '{{ route('otp.send') }}',
                    type: 'POST',
                    data: {
                    _token: token,
                    mobile: mobile
                },
                    success: function (response) {
                    if (response.status === 'ok') {
                    $('#otpCodeBox').removeClass('hidden');
                    $('#otpCodeBox').fadeIn();
                    $('#timerBox').removeClass('hidden');
                    $('#sendOtpBtn .spinner').addClass('hidden');
                    $('#sendOtpBtn').text('ورود').prop('disabled', false);

                    startTimer();
                    otpPhase = true;
                    $('.otp-digit').val('');
                    $('.otp-digit').first().focus();
                } else {
                    showError('ارسال کد با خطا مواجه شد');
                    $('#sendOtpBtn').prop('disabled', false);
                    $('#sendOtpBtn .spinner').addClass('hidden');
                }
                },

                    error: function (xhr) {
                    let message = 'خطایی رخ داده است';
                    if (xhr.responseJSON?.message) message = xhr.responseJSON.message;
                    showError(message);
                    $('#sendOtpBtn').prop('disabled', false);
                    $('#sendOtpBtn .spinner').addClass('hidden');


                }
                });
                } else {
                    // Step 2: Verify OTP
                    $.ajax({
                    url: '{{ route('otp.verify') }}',
                    type: 'POST',
                    data: {
                    _token: token,
                    mobile: mobile,
                    otp: otp,
                    remember: remember ? 1 : 0
                },
                    success: function (response) {
                    if (response.status === 'ok') {
                    $('#timerBox').addClass('hidden'); // ✅ hide timer

                    if (response.role == 'user')
                    window.location.href = '{{ route('user.home') }}'; // ✅ redirect
                    else
                    window.location.href = '{{ route('admin.home') }}'; // ✅ redirect

                    otpAttempts = 0;
                } else {
                    otpAttempts++;

                    if (otpAttempts >= MAX_ATTEMPTS) {
                    // hide OTP input
                    $('#otpCodeBox').addClass('hidden');
                    $('#timerBox').addClass('hidden');

                    // clear digit inputs
                    $('.otp-digit').val('');

                    // reset OTP phase
                    otpPhase = false;

                    // show message and reset button text
                    showError('تعداد تلاش‌های شما به پایان رسید. لطفاً شماره موبایل را دوباره وارد کنید.');
                    $('#sendOtpBtn .btn-text').text('ارسال کد تأیید');
                } else {
                    showError(response.message || 'کد وارد شده اشتباه است');
                }

                    $('#sendOtpBtn .spinner').addClass('hidden');
                    $('#sendOtpBtn').prop('disabled', false);

                }
                },

                    error: function (xhr) {
                    showError('خطا در بررسی کد تأیید');
                    $('#sendOtpBtn').prop('disabled', false);
                }
                });
                }
                });

                    function showError(message) {
                    $('#errorBox').removeClass('hidden').text(message);
                }

                    function startTimer() {
                    let seconds = 120;
                    $('#timerBox').removeClass('hidden');
                    $('#timer').text(seconds);

                    const timerInterval = setInterval(function () {
                    seconds--;
                    $('#timer').text(seconds);

                    if (seconds <= 0) {
                    clearInterval(timerInterval);
                    $('#timerBox').addClass('hidden');
                    $('#sendOtpBtn').prop('disabled', false);
                    $('#otpCodeBox').addClass('hidden');

                    $('#sendOtpBtn .spinner').addClass('hidden');
                    $('#sendOtpBtn').text('ارسال کد تایید');

                    otpPhase = false;
                    $('.otp-digit').val('');

                }
                }, 1000);
                }

                    // Handle OTP auto-focus and submission
                    $(document).on('input', '.otp-digit', function () {
                    const inputs = $('.otp-digit');
                    const index = inputs.index(this);

                    // Move to next input if value entered
                    if (this.value.length === 1 && index < inputs.length - 1) {
                    inputs.eq(index + 1).focus();
                }

                    // Move to previous if backspace
                    if (this.value.length === 0 && index > 0) {
                    inputs.eq(index - 1).focus();
                }

                    // If all filled, auto-submit
                    const otp = inputs.map((i, el) => el.value).get().join('');
                    if (otp.length === 4) {
                    $('#otpForm').trigger('submit');
                }
                });

                });


            </script>
        @endif
        <link href="/css/fizik_styles.css?n=2" rel="stylesheet">
        <style>
            /* ✅ Blur utility (enabled by default) */
            .with-blur {
                backdrop-filter: blur(8px);
                -webkit-backdrop-filter: blur(8px);
            }
            .hero-pattern {
                background-image:
                    radial-gradient(circle at 20% 20%, rgba(255, 0, 110, 0.4) 0%, transparent 50%),
                    radial-gradient(circle at 80% 20%, rgba(131, 56, 236, 0.4) 0%, transparent 50%),
                    radial-gradient(circle at 40% 80%, rgba(58, 134, 255, 0.4) 0%, transparent 50%),
                    radial-gradient(circle at 80% 80%, rgba(6, 255, 165, 0.4) 0%, transparent 50%),
                    radial-gradient(circle at 60% 40%, rgba(255, 190, 11, 0.3) 0%, transparent 50%);
            }

            /* ✅ Disable blur on TV/extra large screens */
            @media screen and (min-width: 1920px) {
                .with-blur {
                    backdrop-filter: none !important;
                    -webkit-backdrop-filter: none !important;
                    background-color: rgba(0, 0, 0, 0.3); /* fallback */
                }
                .tv-optimized-text-shadow {
                    filter: none !important;
                    text-shadow: none !important;
                }

                .hero-pattern {
                    background-image:
                        radial-gradient(circle at 30% 30%, rgba(255, 0, 110, 0.2) 0%, transparent 50%),
                        radial-gradient(circle at 70% 30%, rgba(131, 56, 236, 0.2) 0%, transparent 50%);
                }
            }

             .prose ul { list-style-type: disc; padding-left: 1.5rem; }
            .prose ol { list-style-type: decimal; padding-left: 1.5rem; }
            .prose p  { margin-top: 1em; margin-bottom: 1em; line-height: 1.7; }
            .prose h1 { font-size: 2em; font-weight: bold; margin: 1em 0; }
            .prose h2 { font-size: 1.5em; font-weight: bold; margin: 1em 0; }

        </style>
        <link rel="stylesheet" href="/fontawesome-6.0.0-web/css/all.css"/>
        <!-- Scripts -->
        @yield('style')
        @stack('styles')



        <!-- Splash Overlay -->
        <div id="splashOverlay" class="fixed inset-0 z-50 hidden">
            <div class="absolute inset-0 bg-slate-900/70 backdrop-blur-sm"></div>



            <div class="relative z-10 flex items-center justify-center min-h-full px-4"

            >
                <!-- Wrap card and close for proper positioning -->
                <div class="relative w-full max-w-2xl">
                    <!-- Card with only image, fully clickable -->
                    <div id="splashCard" class="w-full rounded-2xl overflow-hidden shadow-2xl border border-slate-200 dark:border-slate-700 bg-white dark:bg-slate-800 transform transition-all duration-300 scale-95 opacity-0">
                        <a id="splashLink" href="#" target="_blank" rel="noopener">
                            <img id="splashImage"
                                 src=""
                                 alt="Splash"
                                 class="w-full h-full object-cover"
                                 >
                        </a>
                    </div>

                    <!-- Close button near image box top-left -->
                    <button id="closeSplash"
                            class="absolute z-20 -top-3 -left-3 bg-white  text-red-600 hover:text-xl
                       rounded-full w-10 h-10 flex items-center justify-center shadow-lg ring-1 ring-slate-200 dark:ring-slate-700 transition">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
            </div>
        </div>

        <script>
            function fetchCart() {
                fetch("{{ route('shop.cart.items') }}")
                    .then(res => res.text()) // 👈 since response is HTML
                    .then(html => {
                        document.getElementById('cartItems').innerHTML = html;
                        $("#itemsCount").html($("#count").val());
                    });
            }
            $(document).ready(function(){
            fetchCart();
        });
            function addToCart(model,id,cart=false)
            {
                let btn = document.getElementById('btn-'+id);
                let spinner = btn.querySelector('.spinner-'+id);

                spinner.classList.remove('hidden');


                url = "/cart/add/"+model+"/"+id;
            fetch(url, {
                method: "GET",
                headers: {
                    "Content-Type": "application/json",
                    "X-CSRF-TOKEN": "{{ csrf_token() }}"
                },

            })
                .then(res => res.json())
                .then(data => {
                    if (window.location.pathname === "/cart") {
                        window.location.reload();
                    }
                    if (cart) {
                        window.location.href = "/cart";
                    }
                    if (data.success) {

                        Swal.fire({
                            toast: true,
                            position: 'top-end',
                            icon: 'success',
                            title: data.message,
                            showConfirmButton: false,
                            timer: 3000,
                            timerProgressBar: true
                        });

                        fetchCart();
                        $("#itemsCount").html(data.count).fadeOut('slow').fadeIn('slow');

                    } else {

                        Swal.fire({
                            toast: true,
                            position: 'top-end',
                            icon: 'error',
                            title:data.message ?? "Something went wrong!",
                            showConfirmButton: false,
                            timer: 3000
                        });
                    }
                })
                .catch((data) => {

                    Swal.fire({
                        toast: true,
                        position: 'top-end',
                        icon: 'error',
                        title: "Server error!",
                        showConfirmButton: false,
                        timer: 3000
                    });
                })
                .finally(() => spinner.classList.add('hidden'));
        }
            function removeItem(model,id)
            {

                Swal.fire({
                    title: 'حذف !',
                    text: 'آیا این آیتم از سبد خرید حذف شود؟',
                    icon: 'warning',
                    showCancelButton: true,

                    confirmButtonText: 'بله، حذف کن',
                    cancelButtonText: 'لغو'
                }).then((result) => {
                    if (result.isConfirmed) {

                url = "/cart/remove/";
                $("#spin-"+id).removeClass('!hidden');

                fetch(url, {
                method: "DELETE",
                headers: {
                    "Content-Type": "application/json",
                    "X-CSRF-TOKEN": "{{ csrf_token() }}"
                },
                body: JSON.stringify({ _method: 'DELETE', type: model ,id : id})

            })
                .then(res => res.json())
                .then(data => {
                    if (window.location.pathname === "/cart") {
                        window.location.reload();
                    }
                    if (data.success) {

                        Swal.fire({
                            toast: true,
                            position: 'top-end',
                            icon: 'success',
                            title: data.message,
                            showConfirmButton: false,
                            timer: 3000,
                            timerProgressBar: true
                        });
                        fetchCart();
                        $("#itemsCount").html(data.count).fadeOut('slow').fadeIn('slow');
                    } else {

                        Swal.fire({
                            toast: true,
                            position: 'top-end',
                            icon: 'error',
                            title: "Something went wrong!",
                            showConfirmButton: false,
                            timer: 3000
                        });
                    }
                })
                .catch((data) => {

                    Swal.fire({
                        toast: true,
                        position: 'top-end',
                        icon: 'error',
                        title: "Server error!",
                        showConfirmButton: false,
                        timer: 3000
                    });
                }).finally(()=>{
                    $("#spin-"+id).addClass('!hidden');
                });

                    }
                });
        }

        </script>
        <script>
            document.querySelectorAll('[data-expire]').forEach(function (el) {
                let expireDate = new Date(el.getAttribute('data-expire')).getTime();

                let timer = setInterval(function () {
                    let now = new Date().getTime();
                    let distance = expireDate - now;

                    if (distance < 0) {
                        clearInterval(timer);
                        el.innerHTML = "Expired";
                        el.classList.remove("text-red-600");
                        el.classList.add("text-gray-500");
                        return;
                    }

                    let days    = Math.floor(distance / (1000 * 60 * 60 * 24));
                    let hours   = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                    let minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
                    let seconds = Math.floor((distance % (1000 * 60)) / 1000);

                    // Pad single digits with leading zeros
                    hours   = hours.toString().padStart(2, '0');
                    minutes = minutes.toString().padStart(2, '0');
                    seconds = seconds.toString().padStart(2, '0');

                    el.innerHTML = ` ${days}d ${hours}h ${minutes}m ${seconds}s`;
                    el.innerHTML = `
                    <div class="text-center">
                        <div class="bg-gradient-to-br from-slate-200/30 to-slate-300/10 overflow-hidden w-[40px] dark:from-slate-400/30 dark:to-slate-500/10 backdrop-blur-sm border border-slate-300/20 dark:border-slate-400/20 px-3 py-2 rounded-lg  font-bold mb-1 shadow-lg">${seconds.toString().padStart(2, '0')}</div>
                        <div class="text-xs opacity-80">ثانیه</div>
                    </div>
                    <div class="text-center">
                        <div class="bg-gradient-to-br from-slate-200/30 to-slate-300/10 dark:from-slate-400/30 dark:to-slate-500/10 backdrop-blur-sm border border-slate-300/20 dark:border-slate-400/20 px-3 py-2 rounded-lg  font-bold mb-1 shadow-lg">${minutes.toString().padStart(2, '0')}</div>
                        <div class="text-xs opacity-80">دقیقه</div>
                    </div>
                    <div class="text-center">
                        <div class="bg-gradient-to-br from-slate-200/30 to-slate-300/10 dark:from-slate-400/30 dark:to-slate-500/10 backdrop-blur-sm border border-slate-300/20 dark:border-slate-400/20 px-3 py-2 rounded-lg  font-bold mb-1 shadow-lg">${hours.toString().padStart(2, '0')}</div>
                        <div class="text-xs opacity-80">ساعت</div>
                    </div>

                   <div class="text-center">
                        <div class="bg-gradient-to-br from-slate-200/30 to-slate-300/10 dark:from-slate-400/30 dark:to-slate-500/10 backdrop-blur-sm border border-slate-300/20 dark:border-slate-400/20 px-3 py-2 rounded-lg  font-bold mb-1 shadow-lg">${days.toString().padStart(2, '0')}</div>
                        <div class="text-xs opacity-80">روز</div>
                    </div>
                `;
                }, 1000);
            });
        </script>


        <script>
            const STORAGE_KEY = 'splash_id';

            function revealSplash() {
                const overlay = document.getElementById('splashOverlay');
                const card = document.getElementById('splashCard');
                overlay.classList.remove('hidden');
                requestAnimationFrame(() => {
                    card.classList.remove('scale-95', 'opacity-0');
                    card.classList.add('scale-100', 'opacity-100');
                });
            }

            function hideSplash() {
                const overlay = document.getElementById('splashOverlay');
                const card = document.getElementById('splashCard');
                card.classList.add('scale-95', 'opacity-0');
                card.classList.remove('scale-100', 'opacity-100');
                setTimeout(() => overlay.classList.add('hidden'), 200);
            }

            async function fetchSplash() {
                try {

                    const res = await fetch('/get-splash', { headers: { 'X-Requested-With': 'XMLHttpRequest' }});
                    if (!res.ok) return;

                    const data = await res.json();
                    // Expected shape: { id, title, message, image }
                    if (!data || !data.splash.id) return;

                    // Populate content
                    const imgEl = document.getElementById('splashImage');
                    const linkEl = document.getElementById('splashLink');

                    if (data.splash.image) {
                        imgEl.src = data.splash.image;
                        imgEl.alt = data.splash.title || 'Splash';
                    } else {
                        imgEl.src = '';
                        imgEl.alt = 'تصویر در دسترس نیست';
                    }

                    if (data.splash.link && typeof data.splash.link === 'string') {
                        linkEl.href = data.splash.link;
                    } else {
                        linkEl.removeAttribute('href');
                    }
                    const existingId = localStorage.getItem(STORAGE_KEY);
                    if (existingId == data.splash.id ) return; // Already shown; do not show again

                    // Store id to prevent future displays
                    localStorage.setItem(STORAGE_KEY, String(data.splash.id));

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

@include('sweetalert::alert')
@yield('script')

