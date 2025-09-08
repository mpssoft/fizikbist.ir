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

@endpush
  @endsection
@section('script')
    {{ $script ?? '' }}
@endsection
@section('head')
    {{ $head ?? '' }}
@endsection
