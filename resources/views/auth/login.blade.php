@extends("layouts.app")

@section("content")
    <!-- Lightbox Overlay -->
    <div id="lightboxOverlay" class="p-10 inset-0  bg-black/50 lightbox-overlay  z-50" >
        <!-- Lightbox Content -->
        <div class="lightbox-content   mx-auto gradient-bg rounded-2xl shadow-2xl w-full max-w-md mx-4" onclick="event.stopPropagation()">
            <!-- Header -->
            <div class="p-8 pb-6">
                <div class="flex justify-end mb-4">
                </div>
                <div class="text-center mb-6">
                    <div
                        class="w-20 h-20 mx-auto mb-4 bg-gradient-to-br from-cyan-400 to-blue-500 rounded-full flex items-center justify-center">
                        <i class="fas fa-atom text-white text-2xl"></i>
                    </div>
                    <h2 class="text-3xl font-bold text-white"> ورود با موبایل</h2>
                </div>
                <p class="text-gray-300 mb-8 text-center">شماره موبایل خود را برای دریافت کد تایید وارد کنید</p>
                <div id="errorBox" class="text-red-400 text-sm mb-4 hidden"></div>
                <form id="otpForm" class="space-y-6">
                    @csrf
                    <!-- Mobile Step -->
                    <div id="mobileStep" class="space-y-6">
                        <div id="mobileSection">
                            <label for="mobile" class="block text-sm font-medium text-gray-400 mb-2">شماره موبایل</label>
                            <input
                                type="tel"
                                id="mobile"
                                name="mobile"
                                required
                                class="w-full text-gray-600 px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent input-focus transition-all duration-200"
                                placeholder="شماره موبایل را وارد کنید"
                                maxlength="11"
                            >
                        </div>
                        <!-- OTP Code Input (hidden initially) -->
                        <div id="otpCodeBox" class="hidden">
                            <a onclick="event.preventDefault();showMobileSection()">تغییر شماره</a>
                            <label class="block text-gray-300 text-sm font-medium mb-2">
                                <i class="fas fa-key mr-2"></i> کد تأیید
                            </label>

                            <div id="otpInputs" class="flex gap-3 justify-center rtl flex-row-reverse">
                                <input type="text" maxlength="1"
                                       class="otp-digit w-14 h-14 text-center text-white text-2xl bg-white/10 border border-white/20 rounded-xl input-glow outline-none"
                                       inputmode="numeric"/>
                                <input type="text" maxlength="1"
                                       class="otp-digit w-14 h-14 text-center text-white text-2xl bg-white/10 border border-white/20 rounded-xl input-glow outline-none"
                                       inputmode="numeric"/>
                                <input type="text" maxlength="1"
                                       class="otp-digit w-14 h-14 text-center text-white text-2xl bg-white/10 border border-white/20 rounded-xl input-glow outline-none"
                                       inputmode="numeric"/>
                                <input type="text" maxlength="1"
                                       class="otp-digit w-14 h-14 text-center text-white text-2xl bg-white/10 border border-white/20 rounded-xl input-glow outline-none"
                                       inputmode="numeric"/>
                            </div>

                        </div>
                        <div class="flex items-center">
                            <input id="remember" name="remember" type="checkbox"
                                   class="h-4 w-4 mr-2 text-blue-300 focus:ring-blue-500 border-gray-200 rounded">
                            <label for="remember" class="ml-2 block text-gray-500 text-sm mr-4 ">
                                مرا به خاطر بسپار
                            </label>
                        </div>
                        <button type="submit"
                                id="sendOtpBtn"
                                class="w-full btn-primary text-white py-3 rounded-xl font-semibold text-lg flex items-center justify-center gap-2">
                            <span class="btn-text">ارسال کد تأیید</span>
                            <span
                                class="spinner hidden w-5 h-5 border-2 border-white border-t-transparent rounded-full animate-spin"></span>
                        </button>



                        <div id="timerBox" class="text-center text-cyan-300 mt-4 hidden">
                            لطفاً <span id="timer">60</span> ثانیه صبر کنید...
                        </div>
                    </div>


                </form>

            </div>
        </div>
    </div>

@push('scripts')
    <script>
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
@endpush
  @endsection
@section('script')
    {{ $script ?? '' }}
@endsection
@section('head')
    {{ $head ?? '' }}
@endsection
