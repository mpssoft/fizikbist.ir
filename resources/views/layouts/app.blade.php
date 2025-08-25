<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" x-data="{dark: true}" :class="{ 'dark': dark, 'transition-colors duration-300': true }">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <link rel="icon" type="image/x-icon" href="{{ asset('favicon.png') }}">
        {!! SEO::generate() !!}
        <script src="https://cdn.tailwindcss.com"></script>
        <script>
            window.tailwind = {
                config: {
                    darkMode: 'class',
                }
            }
        </script>


{{--        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">--}}
        <link href="/fontawesome-6.0.0-web/css/all.min.css" rel="stylesheet">
        <link href="/css/fizik_styles.css" rel="stylesheet">
        <!-- Scripts -->
        @yield('style')
        @stack('styles')
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

        <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
        @stack('scripts')
        @if(!auth()->check())
            @include('layouts.login-lightbox')
            <script>

                function showMobileSection(){
                    $('#mobileSection').fadeIn();
                    $('#otpCodeBox').fadeOut();

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
    </body>
</html>
@include('sweetalert::alert')
@yield('script')

