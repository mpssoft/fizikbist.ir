@extends('layouts.app')

@section('style')
    <style>
        .spinner {
            border-width: 2px;
            border-style: solid;
            border-color: white transparent transparent transparent;
            border-radius: 9999px;
            width: 1.25rem;
            height: 1.25rem;
            animation: spin 0.6s linear infinite;
        }

        @keyframes spin {
            to {
                transform: rotate(360deg);
            }
        }

    </style>
@endsection
@section("content")
        <!-- Hero Slider Section -->

        <!-- Home Section -->
        <section id="homeSection" class="section">
            <!-- Hero Section -->
            <div class="gradient-bg hero-pattern text-white py-20 relative overflow-hidden">
                <div class="absolute inset-0 bg-black bg-opacity-20"></div>
                <div class=" mx-auto  text-center relative z-10">
                    <h2 class="text-4xl pt-2 font-bold mb-8 bg-gradient-to-r from-white via-yellow-200 to-pink-200 bg-clip-text text-transparent drop-shadow-2xl">
                        آموزش تخصصی فیزیک
                    </h2>
                    @include('frontend.home.home-slider', ['sliders' => $sliders])
                    <p class="text-2xl mb-10 opacity-95 font-medium drop-shadow-lg">
                        با استاد حسین نژاداسد و روش‌های نوین تدریس
                    </p>
                    <a href="#free-courses-section"
                            class="bg-gradient-to-r from-pink-500 via-purple-500 to-blue-500 text-white px-10 py-5 rounded-2xl text-xl font-bold hover:scale-105 transition-all duration-300 shadow-2xl hover:shadow-pink-500/50">
                        <i class="fas fa-rocket mr-3"></i>
                        شروع یادگیری
                    </a>
                </div>
            </div>

            <!-- Teacher Introduction -->
            <div class="  max-w-7xl mx-auto px-4 py-16">
                <div class="dark:bg-slate-400 rounded-2xl shadow-xl p-8 md:p-12">
                    <div class="grid md:grid-cols-2 gap-12 items-center">
                        <div>
                            <h2 class="text-3xl font-bold text-gray-800 mb-6">معرفی استاد</h2>
                            <p class="text-gray-600 text-lg leading-relaxed mb-6">
                                استاد حسین نژاداسد با بیش از ۱۰ سال تجربه در تدریس فیزیک و تخصص در روش‌های نوین آموزش،
                                آماده است تا شما را در مسیر تسلط بر فیزیک و کسب نتایج عالی در کنکور همراهی کند.
                            </p>
                            <div class="space-y-3">
                                <div class="flex items-center">
                                    <i class="fas fa-check-circle text-green-500 ml-3"></i>
                                    <span>کارشناسی ارشد فیزیک</span>
                                </div>
                                <div class="flex items-center">
                                    <i class="fas fa-check-circle text-green-500 ml-3"></i>
                                    <span>بیش از ۱۰ سال تجربه تدریس</span>
                                </div>
                            </div>
                        </div>
                        <div class="text-center">
                            <div
                                class="w-64 h-64 mx-auto bg-gradient-to-br from-purple-400 to-blue-500 rounded-full flex items-center justify-center text-white text-6xl">
                                <i class="fas fa-user-tie"></i>
                            </div>
                            <h3 class="text-xl font-semibold mt-4 text-gray-800">استاد حسین نژاداسد</h3>
                            <p class="text-gray-600">دبیر فیزیک</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>


        <!-- Free Lessons Section -->
        @if(count($lessons))
        <section class="py-20 bg-gray-200" id="free-courses-section">
            <div class="container mx-auto px-6">
                <div class="text-center mb-16">
                    <h2 class="text-4xl font-bold text-gray-800 mb-4">درس‌های رایگان</h2>
                    <p class="text-xl text-gray-600 max-w-2xl mx-auto">با درس‌های رایگان ما شروع کنید و کیفیت آموزش‌هایمان را تجربه کنید.</p>
                </div>

                <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                    <!-- Free Lesson Card 1 -->
                    @foreach($lessons as $lesson)
                        <div class="bg-white rounded-xl shadow-lg overflow-hidden border border-gray-100 hover:shadow-xl transition duration-300">
                        <div class="relative">
                            <div class="h-48 bg-gradient-to-br from-blue-400 to-blue-600 flex items-center justify-center relative" style="background:url('{{$lesson->thumbnail}}');background-size: contain">
                                <div class="absolute inset-0 bg-black bg-opacity-20"></div>
                                <div class="text-white text-4xl z-10">🎬</div>
                                <div class="absolute inset-0 flex items-center justify-center">
                                    <div class="w-16 h-16 bg-white bg-opacity-90 rounded-full flex items-center justify-center cursor-pointer hover:bg-opacity-100 transition duration-300">
                                        <div class="w-0 h-0 border-l-[20px] border-l-blue-600 border-t-[12px] border-t-transparent border-b-[12px] border-b-transparent mr-1"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="absolute top-4 right-4 bg-green-500 text-white px-3 py-1 rounded-full text-sm font-medium">رایگان</div>
                            <div class="absolute bottom-4 right-4 bg-black bg-opacity-70 text-white px-2 py-1 rounded text-sm">
                                {{ $lesson->duration}} </div>
                        </div>
                        <div class="p-6">
                            <h3 class="text-xl font-semibold text-gray-800 mb-2">{{ $lesson->title }}</h3>
                            <p class="text-gray-600 mb-4">{{ $lesson->description }}</p>
                            <div class="flex items-center justify-between">
                                <div class="flex items-center text-gray-500 text-sm">
                                    <span class="ml-2">👁</span>
                                    <span>{{$lesson->view}}  بازدید</span>
                                </div>
                                <a href="{{route('play',$lesson->id)}}" class="bg-blue-600 text-white px-6 py-2 rounded-lg hover:bg-blue-700 transition duration-300">تماشا کنید</a>
                            </div>
                        </div>
                    </div>
                    @endforeach
                 </div>

                <div class="text-center mt-12">
                    <button class="bg-gray-800 text-white px-8 py-3 rounded-lg font-semibold hover:bg-gray-700 transition duration-300">مشاهده همه درس‌های رایگان</button>
                </div>
            </div>
        </section>
        @endif
        <!-- Featured Courses Section -->
        <section class="py-20  dark:bg-gray-900 dark:text-white">
            <div class="container mx-auto px-6">
                <div class="text-center mb-16">
                    <h2 class="text-4xl font-bold dark:text-white mb-4">دوره‌های محبوب</h2>
                    <p class="text-xl text-gray-600 max-w-2xl mx-auto">محبوب‌ترین دوره‌های ما را کشف کنید که برای کمک به تسلط بر مهارت‌های جدید و پیشرفت شغلی شما طراحی شده‌اند.</p>
                </div>

                <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                    @foreach($courses as $course)
                        <!-- Course Card 1 -->
                        <div class="course-card bg-white rounded-xl shadow-lg overflow-hidden border border-gray-100">
                            <div class="h-60 bg-gradient-to-br from-blue-500 to-blue-600 flex items-center justify-center " style="background:url('{{$course->cover_image}}');background-size: 100% 100%">

                            </div>
                            <div class="p-6">
                                {{-- <div class="flex items-center justify-between mb-3">
                                     <span class="bg-blue-100 text-blue-800 text-sm font-medium px-3 py-1 rounded-full">برنامه‌نویسی</span>
                                     <div class="flex items-center text-yellow-500">
                                         <span class="text-sm font-medium">۴.۸</span>
                                         <span class="mr-1">⭐</span>
                                     </div>
                                 </div>--}}
                                <h3 class="text-xl font-semibold text-gray-800 mb-2">{{ $course->title }}</h3>
                                <p class="text-gray-600 mb-4">{{ $course->description }}</p>
                                <div class="flex items-center justify-between">
                                    <div class="text-1xl font-bold text-blue-600"> {{ number_format($course->price) }}تومان  </div>


                                  {{--  <a href="{{route('shop.cart.add',['model'=>'course','id'=>$course->id])}}" aria-label="Add to cart"
                                       class="group inline-flex items-center gap-2 rounded-full px-4 py-2 text-sm font-semibold tracking-wide
          bg-neutral-900 text-neutral-100 hover:bg-black active:bg-neutral-800
          shadow-sm hover:shadow-md focus:outline-none focus-visible:ring-2 focus-visible:ring-emerald-400
          dark:bg-neutral-800 dark:text-white dark:hover:bg-neutral-900">
                                        <!-- Icon placeholder (use your favorite icon font class here) -->
                                        <i class="fa-solid fa-cart-plus text-neutral-200 group-hover:text-white text-base"></i>
                                        خرید دوره
                                    </a>--}}
                                    {{--<a href="{{route('shop.cart.add',['model'=>'course','id'=>$course->id])}}" type="button" aria-label="Open cart"
                                       class="w-10 h-10 bg-gradient-to-r from-blue-100 to-purple-200 dark:from-blue-900 dark:to-purple-800 hover:from-blue-200 hover:to-purple-300 dark:hover:from-blue-800 dark:hover:to-purple-700 rounded-xl flex items-center justify-center transition-all duration-200 hover:scale-105 shadow-sm hover:shadow-md group text-black dark:!text-white">                <!-- Cart icon -->
                                        <svg class="w-5 h-5" viewBox="0 0 24 24" fill="none" aria-hidden="true">
                                            <path d="M3 3h2l2.2 10.4a2 2 0 0 0 2 1.6h7.7a2 2 0 0 0 2-1.6L21 7H6" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/>
                                            <circle cx="10" cy="20" r="1.6" fill="currentColor"/>
                                            <circle cx="17" cy="20" r="1.6" fill="currentColor"/>
                                        </svg>
                                        <span class="pointer-events-none  absolute inset-0 rounded-full bg-neutral-900/0 hover:bg-neutral-900/5 dark:bg-white/0 dark:hover:bg-white/5 transition-colors"></span>
                                    </a>--}}
                                    <a href="{{route('shop.cart.add',['model'=>'course','id'=>$course->id])}}" type="button" aria-label="Open cart"
                                       class="w-10 h-10  overflow-hidden  rounded-xl flex items-center justify-center transition-all duration-200 hover:scale-105 shadow-sm bg-black hover:shadow-md group text-black dark:!text-white">                <!-- Cart icon -->
                                        <img  src="/images/cart-image-s.jpg" class="w-7">

                                    </a>


                                </div>
                            </div>
                        </div>
                    @endforeach
              </div>

            </div>
        </section>

        <!-- Statistics Section -->
       {{-- <section class="py-20 bg-gradient-to-r from-gray-800 to-gray-900 text-white">
            <div class="container mx-auto px-6">
                <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-8 text-center">
                    <div>
                        <div class="stat-counter mb-2">+۵۰ هزار</div>
                        <h3 class="text-xl font-semibold mb-2">دانشجوی ثبت‌نام شده</h3>
                        <p class="text-gray-300">یادگیرندگان فعال در سراسر جهان</p>
                    </div>
                    <div>
                        <div class="stat-counter mb-2">+۲۰۰</div>
                        <h3 class="text-xl font-semibold mb-2">مدرس متخصص</h3>
                        <p class="text-gray-300">متخصصان صنعت</p>
                    </div>
                    <div>
                        <div class="stat-counter mb-2">+۵۰۰</div>
                        <h3 class="text-xl font-semibold mb-2">دوره موجود</h3>
                        <p class="text-gray-300">در دسته‌بندی‌های مختلف</p>
                    </div>
                    <div>
                        <div class="stat-counter mb-2">%۹۵</div>
                        <h3 class="text-xl font-semibold mb-2">نرخ موفقیت</h3>
                        <p class="text-gray-300">نرخ تکمیل دوره</p>
                    </div>
                </div>
            </div>
        </section>
--}}
        <!-- Why Choose Us Section -->
        <section class="py-20 bg-gray-50">
            <div class="container mx-auto px-6">
                <div class="text-center mb-16">
                    <h2 class="text-4xl font-bold text-gray-800 mb-4">چرا پلتفرم ما را انتخاب کنید؟</h2>
                    <p class="text-xl text-gray-600 max-w-2xl mx-auto">ما همه چیزهایی که برای موفقیت در سفر یادگیری خود نیاز دارید را فراهم می‌کنیم.</p>
                </div>

                <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                    <div class="text-center p-6">
                        <div class="w-16 h-16 bg-blue-100 rounded-full flex items-center justify-center mx-auto mb-4">
                            <span class="text-2xl">🎯</span>
                        </div>
                        <h3 class="text-xl font-semibold text-gray-800 mb-3">یادگیری شخصی‌سازی شده</h3>
                        <p class="text-gray-600">مسیرهای یادگیری تطبیقی متناسب با سرعت و سبک یادگیری شما.</p>
                    </div>

                    <div class="text-center p-6">
                        <div class="w-16 h-16 bg-green-100 rounded-full flex items-center justify-center mx-auto mb-4">
                            <span class="text-2xl">🏆</span>
                        </div>
                        <h3 class="text-xl font-semibold text-gray-800 mb-3">گواهینامه‌های صنعتی</h3>
                        <p class="text-gray-600">گواهینامه‌های معتبری کسب کنید که چشم‌انداز شغلی شما را بهبود می‌بخشد.</p>
                    </div>

                    <div class="text-center p-6">
                        <div class="w-16 h-16 bg-purple-100 rounded-full flex items-center justify-center mx-auto mb-4">
                            <span class="text-2xl">💬</span>
                        </div>
                        <h3 class="text-xl font-semibold text-gray-800 mb-3">پشتیبانی ۲۴/۷</h3>
                        <p class="text-gray-600">هر زمان که نیاز داشتید از تیم پشتیبانی اختصاصی ما کمک بگیرید.</p>
                    </div>

                    <div class="text-center p-6">
                        <div class="w-16 h-16 bg-yellow-100 rounded-full flex items-center justify-center mx-auto mb-4">
                            <span class="text-2xl">📱</span>
                        </div>
                        <h3 class="text-xl font-semibold text-gray-800 mb-3">یادگیری موبایل</h3>
                        <p class="text-gray-600">با پلتفرم بهینه‌شده برای موبایل ما، هر جا و هر زمان یاد بگیرید.</p>
                    </div>

                    <div class="text-center p-6">
                        <div class="w-16 h-16 bg-red-100 rounded-full flex items-center justify-center mx-auto mb-4">
                            <span class="text-2xl">🔄</span>
                        </div>
                        <h3 class="text-xl font-semibold text-gray-800 mb-3">دسترسی مادام‌العمر</h3>
                        <p class="text-gray-600">پس از ثبت‌نام، برای همیشه با به‌روزرسانی‌های رایگان به دوره‌هایتان دسترسی داشته باشید.</p>
                    </div>

                    <div class="text-center p-6">
                        <div class="w-16 h-16 bg-indigo-100 rounded-full flex items-center justify-center mx-auto mb-4">
                            <span class="text-2xl">👥</span>
                        </div>
                        <h3 class="text-xl font-semibold text-gray-800 mb-3">انجمن</h3>
                        <p class="text-gray-600">به انجمن پر جنب و جوش یادگیرندگان و متخصصان بپیوندید.</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- Testimonials Section -->
        <section class="py-20 bg-white">
            <div class="container mx-auto px-6">
                <div class="text-center mb-16">
                    <h2 class="text-4xl font-bold text-gray-800 mb-4">دانشجویان ما چه می‌گویند</h2>
                    <p class="text-xl text-gray-600">داستان‌های موفقیت واقعی از جامعه یادگیری ما.</p>
                </div>

                <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                    <div class="bg-gray-50 rounded-xl p-6 border border-gray-100">
                        <div class="flex items-center mb-4">
                            <div class="w-12 h-12 bg-blue-500 rounded-full flex items-center justify-center text-white font-semibold">ع.ا</div>
                            <div class="mr-4">
                                <h4 class="font-semibold text-gray-800">علی احمدی</h4>
                                <p class="text-gray-600 text-sm">توسعه‌دهنده نرم‌افزار</p>
                            </div>
                        </div>
                        <div class="flex text-yellow-500 mb-3">
                            <span>⭐⭐⭐⭐⭐</span>
                        </div>
                        <p class="text-gray-700">"دوره توسعه وب کاملاً شغل من را متحول کرد. مدرسان فوق‌العاده هستند و محتوا بی‌نظیر است!"</p>
                    </div>

                    <div class="bg-gray-50 rounded-xl p-6 border border-gray-100">
                        <div class="flex items-center mb-4">
                            <div class="w-12 h-12 bg-green-500 rounded-full flex items-center justify-center text-white font-semibold">م.ر</div>
                            <div class="mr-4">
                                <h4 class="font-semibold text-gray-800">مریم رضایی</h4>
                                <p class="text-gray-600 text-sm">تحلیلگر داده</p>
                            </div>
                        </div>
                        <div class="flex text-yellow-500 mb-3">
                            <span>⭐⭐⭐⭐⭐</span>
                        </div>
                        <p class="text-gray-700">"پس از تکمیل دوره علم داده، شغل رویایی‌ام را به عنوان تحلیلگر داده پیدا کردم. بسیار توصیه می‌کنم!"</p>
                    </div>

                    <div class="bg-gray-50 rounded-xl p-6 border border-gray-100">
                        <div class="flex items-center mb-4">
                            <div class="w-12 h-12 bg-purple-500 rounded-full flex items-center justify-center text-white font-semibold">ح.م</div>
                            <div class="mr-4">
                                <h4 class="font-semibold text-gray-800">حسن محمدی</h4>
                                <p class="text-gray-600 text-sm">طراح UX</p>
                            </div>
                        </div>
                        <div class="flex text-yellow-500 mb-3">
                            <span>⭐⭐⭐⭐⭐</span>
                        </div>
                        <p class="text-gray-700">"دوره طراحی UI/UX تمام مهارت‌هایی که برای ورود به حوزه طراحی نیاز داشتم را به من داد. پروژه‌ها فوق‌العاده کاربردی بودند!"</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- Call to Action Section -->
        <section class="h-[70vh] md:h-[100vh] py-20 bg-gradient-to-r from-blue-600 to-purple-700 text-white">
            <div class="container mx-auto px-6 text-center pt-20">
                <h2 class="text-4xl font-bold mb-6">آماده شروع سفر یادگیری خود هستید؟</h2>
                <p class="text-xl mb-8 opacity-90 max-w-2xl mx-auto">به هزاران دانشجویی بپیوندید که در حال حاضر با دوره‌های تخصصی ما شغل خود را پیش می‌برند.</p>
                <div class="space-x-4 space-x-reverse">

                    <a href="{{route('all.courses')}}" class="border-2 border-white text-white px-8 py-4 rounded-lg font-semibold text-lg hover:bg-white hover:text-blue-600 transition duration-300">مرور دوره‌ها</a>
                </div>
            </div>
        </section>

    <!-- /.content -->
    @push('scripts')
        <script type="module">


            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $(document).on('click', '.delete-action', function (e) {
                e.preventDefault();

                let id = $(this).attr('id');
                let url = $(this).attr('href');
                Swal.fire({
                    title: 'حذف',
                    text: 'آیا مطمئن هستید؟',
                    icon: 'warning',
                    cancelButtonText: 'لغو',
                    confirmButtonText: 'حذف',
                    confirmButtonColor: 'red',
                    cancelButtonColor: 'blue',
                    showCancelButton: true
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            url: url,
                            method: 'DELETE',
                            success: function (response) {
                                Swal.fire({
                                    text: response.data.message,
                                    showConfirmButton: false,
                                    color: '#fff',
                                    background: '#28a745',
                                    icon: 'success',
                                    toast: true,
                                    timer: 1000
                                });
                                $(`tr[data='${id}']`).remove();
                            },
                            error: function (response) {

                            }
                        });
                    }
                });
            });

        </script>

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

    @endpush
@endsection
@section('script')

    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        'inter': ['Inter', 'sans-serif'],
                    },
                    animation: {
                        'fade-in': 'fadeIn 0.8s ease-in-out',
                        'slide-up': 'slideUp 0.6s ease-out',
                    },
                    keyframes: {
                        fadeIn: {
                            '0%': {opacity: '0', transform: 'translateY(20px)'},
                            '100%': {opacity: '1', transform: 'translateY(0)'}
                        },
                        slideUp: {
                            '0%': {opacity: '0', transform: 'translateY(30px)'},
                            '100%': {opacity: '1', transform: 'translateY(0)'}
                        }
                    }
                }
            }
        }
    </script>
    {{ $script ?? '' }}


@endsection
@section('head')
    {{ $head ?? '' }}
@endsection
