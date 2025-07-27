@extends('layouts.app')

@section("content")
    <main>
        <!-- Home Section -->
        <section id="homeSection" class="section">
            <!-- Hero Section -->
            <div class="gradient-bg hero-pattern text-white py-24 relative overflow-hidden">
                <div class="absolute inset-0 bg-black bg-opacity-20"></div>
                <div class="max-w-7xl mx-auto px-4 text-center relative z-10">
                    <h1 class="text-6xl font-bold mb-8 bg-gradient-to-r from-white via-yellow-200 to-pink-200 bg-clip-text text-transparent drop-shadow-2xl">
                        آموزش تخصصی فیزیک
                    </h1>
                    <p class="text-2xl mb-10 opacity-95 font-medium drop-shadow-lg">
                        با استاد حسین نژاداسد و روش‌های نوین تدریس
                    </p>
                    <button onclick="showSection('courses')" class="bg-gradient-to-r from-pink-500 via-purple-500 to-blue-500 text-white px-10 py-5 rounded-2xl text-xl font-bold hover:scale-105 transition-all duration-300 shadow-2xl hover:shadow-pink-500/50">
                        <i class="fas fa-rocket mr-3"></i>
                        شروع یادگیری
                    </button>
                </div>
            </div>

            <!-- Teacher Introduction -->
            <div class="max-w-7xl mx-auto px-4 py-16">
                <div class="bg-white rounded-2xl shadow-xl p-8 md:p-12">
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
                            <div class="w-64 h-64 mx-auto bg-gradient-to-br from-purple-400 to-blue-500 rounded-full flex items-center justify-center text-white text-6xl">
                                <i class="fas fa-user-tie"></i>
                            </div>
                            <h3 class="text-xl font-semibold mt-4 text-gray-800">استاد حسین نژاداسد</h3>
                            <p class="text-gray-600">دبیر فیزیک</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Courses Section -->
        <section id="coursesSection" class="section hidden">
            <div class="max-w-7xl mx-auto px-4 py-16">
                <h2 class="text-4xl font-bold text-center text-white mb-12">دوره‌های آموزشی</h2>

                <!-- Course Filter -->
                <div class="flex justify-center mb-8">
                    <div class="glass-effect rounded-lg shadow-md p-2 flex space-x-2 space-x-reverse">
                        <button onclick="showCourses('all')" class="course-filter-btn active px-4 py-2 rounded-md transition">همه</button>
                        <button onclick="showCourses('grade10')" class="course-filter-btn px-4 py-2 rounded-md transition">پایه دهم</button>
                        <button onclick="showCourses('grade11')" class="course-filter-btn px-4 py-2 rounded-md transition">پایه یازدهم</button>
                        <button onclick="showCourses('grade12')" class="course-filter-btn px-4 py-2 rounded-md transition">پایه دوازدهم</button>
                        <button onclick="showCourses('konkur')" class="course-filter-btn px-4 py-2 rounded-md transition">کنکور</button>
                    </div>
                </div>

                <!-- Courses Grid -->
                <div id="coursesGrid" class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                    <!-- Courses will be populated by JavaScript -->
                </div>
            </div>
        </section>

        <!-- Login/Register Section -->
        <section id="loginSection" class="section hidden">
            <div class="min-h-screen flex items-center justify-center px-4 py-16 gradient-bg hero-pattern">
                <div class="max-w-md w-full">
                    <div class="auth-container rounded-3xl shadow-2xl p-8 neon-glow">
                        <div class="text-center mb-8">
                            <div class="w-20 h-20 mx-auto mb-4 bg-gradient-to-br from-cyan-400 to-blue-500 rounded-full flex items-center justify-center">
                                <i class="fas fa-atom text-white text-2xl"></i>
                            </div>
                            <h2 class="text-3xl font-bold text-white mb-2">ورود به سیستم</h2>
                            <p class="text-gray-300">به دنیای فیزیک خوش آمدید</p>
                        </div>

                        <!-- Login Form -->
                        <div id="loginForm">
                            <form onsubmit="handleLogin(event)" class="space-y-6">
                                <div>
                                    <label class="block text-gray-300 text-sm font-medium mb-2">
                                        <i class="fas fa-user mr-2"></i>نام کاربری
                                    </label>
                                    <input type="text" id="loginUsername" class="w-full px-4 py-3 bg-white/10 border border-white/20 rounded-xl text-white placeholder-gray-400 focus:outline-none input-glow transition-all" placeholder="نام کاربری خود را وارد کنید" required>
                                </div>
                                <div>
                                    <label class="block text-gray-300 text-sm font-medium mb-2">
                                        <i class="fas fa-lock mr-2"></i>رمز عبور
                                    </label>
                                    <input type="password" id="loginPassword" class="w-full px-4 py-3 bg-white/10 border border-white/20 rounded-xl text-white placeholder-gray-400 focus:outline-none input-glow transition-all" placeholder="رمز عبور خود را وارد کنید" required>
                                </div>
                                <button type="submit" class="w-full btn-primary text-white py-3 rounded-xl font-semibold text-lg">
                                    <i class="fas fa-sign-in-alt mr-2"></i>ورود
                                </button>
                            </form>
                            <div class="text-center mt-6">
                                <p class="text-gray-300">
                                    حساب کاربری ندارید؟
                                    <button onclick="showRegister()" class="text-cyan-400 hover:text-cyan-300 font-medium transition-colors">ثبت نام کنید</button>
                                </p>
                            </div>
                        </div>

                        <!-- Register Form -->
                        <div id="registerForm" class="hidden">
                            <div class="text-center mb-6">
                                <h2 class="text-3xl font-bold text-white mb-2">ثبت نام</h2>
                                <p class="text-gray-300">حساب کاربری جدید بسازید</p>
                            </div>
                            <form onsubmit="handleRegister(event)" class="space-y-4">
                                <div>
                                    <label class="block text-gray-300 text-sm font-medium mb-2">
                                        <i class="fas fa-id-card mr-2"></i>نام و نام خانوادگی
                                    </label>
                                    <input type="text" id="registerName" class="w-full px-4 py-3 bg-white/10 border border-white/20 rounded-xl text-white placeholder-gray-400 focus:outline-none input-glow transition-all" placeholder="نام کامل خود را وارد کنید" required>
                                </div>
                                <div>
                                    <label class="block text-gray-300 text-sm font-medium mb-2">
                                        <i class="fas fa-user mr-2"></i>نام کاربری
                                    </label>
                                    <input type="text" id="registerUsername" class="w-full px-4 py-3 bg-white/10 border border-white/20 rounded-xl text-white placeholder-gray-400 focus:outline-none input-glow transition-all" placeholder="نام کاربری دلخواه" required>
                                </div>
                                <div>
                                    <label class="block text-gray-300 text-sm font-medium mb-2">
                                        <i class="fas fa-lock mr-2"></i>رمز عبور
                                    </label>
                                    <input type="password" id="registerPassword" class="w-full px-4 py-3 bg-white/10 border border-white/20 rounded-xl text-white placeholder-gray-400 focus:outline-none input-glow transition-all" placeholder="رمز عبور قوی انتخاب کنید" required>
                                </div>
                                <div>
                                    <label class="block text-gray-300 text-sm font-medium mb-2">
                                        <i class="fas fa-phone mr-2"></i>شماره تماس
                                    </label>
                                    <input type="tel" id="registerPhone" class="w-full px-4 py-3 bg-white/10 border border-white/20 rounded-xl text-white placeholder-gray-400 focus:outline-none input-glow transition-all" placeholder="09123456789" required>
                                </div>
                                <button type="submit" class="w-full btn-success text-white py-3 rounded-xl font-semibold text-lg">
                                    <i class="fas fa-user-plus mr-2"></i>ثبت نام
                                </button>
                            </form>
                            <div class="text-center mt-6">
                                <p class="text-gray-300">
                                    قبلاً ثبت نام کرده‌اید؟
                                    <button onclick="showLogin()" class="text-cyan-400 hover:text-cyan-300 font-medium transition-colors">وارد شوید</button>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Admin Panel -->
        <section id="adminSection" class="section hidden">
            <div class="max-w-7xl mx-auto px-4 py-16">
                <div class="bg-white rounded-2xl shadow-xl p-8">
                    <div class="flex justify-between items-center mb-8">
                        <h2 class="text-3xl font-bold text-gray-800">پنل مدیریت</h2>
                        <button onclick="logout()" class="bg-red-500 text-white px-4 py-2 rounded-lg hover:bg-red-600 transition">
                            خروج
                        </button>
                    </div>

                    <!-- Add Course Form -->
                    <div class="mb-12">
                        <h3 class="text-2xl font-semibold mb-6">افزودن دوره جدید</h3>
                        <form onsubmit="addCourse(event)" class="grid md:grid-cols-2 gap-6">
                            <div>
                                <label class="block text-gray-700 text-sm font-bold mb-2">نام دوره</label>
                                <input type="text" id="courseName" class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:border-cyan-500" required>
                            </div>
                            <div>
                                <label class="block text-gray-700 text-sm font-bold mb-2">پایه تحصیلی</label>
                                <select id="courseGrade" class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:border-cyan-500" required>
                                    <option value="">انتخاب کنید</option>
                                    <option value="grade10">پایه دهم</option>
                                    <option value="grade11">پایه یازدهم</option>
                                    <option value="grade12">پایه دوازدهم</option>
                                    <option value="konkur">کنکور</option>
                                </select>
                            </div>
                            <div>
                                <label class="block text-gray-700 text-sm font-bold mb-2">قیمت (تومان)</label>
                                <input type="number" id="coursePrice" class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:border-cyan-500" required>
                            </div>
                            <div>
                                <label class="block text-gray-700 text-sm font-bold mb-2">تخفیف (درصد)</label>
                                <input type="number" id="courseDiscount" min="0" max="100" class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:border-cyan-500">
                            </div>
                            <div class="md:col-span-2">
                                <label class="block text-gray-700 text-sm font-bold mb-2">عکس دوره (اختیاری)</label>
                                <input type="file" id="courseImage" accept="image/*" class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:border-cyan-500">
                                <div id="courseImagePreview" class="mt-2 hidden">
                                    <img id="coursePreviewImg" class="w-32 h-32 object-cover rounded-lg border">
                                </div>
                            </div>
                            <div class="md:col-span-2">
                                <label class="block text-gray-700 text-sm font-bold mb-2">توضیحات</label>
                                <textarea id="courseDescription" rows="4" class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:border-cyan-500" required></textarea>
                            </div>
                            <div class="md:col-span-2">
                                <button type="submit" class="btn-primary text-white px-6 py-3 rounded-lg font-medium">
                                    <i class="fas fa-plus mr-2"></i>افزودن دوره
                                </button>
                            </div>
                        </form>
                    </div>

                    <!-- Courses Management -->
                    <div class="mb-12">
                        <h3 class="text-2xl font-semibold mb-6">مدیریت دوره‌ها</h3>
                        <div id="coursesManagement" class="space-y-4">
                            <!-- Courses will be populated by JavaScript -->
                        </div>
                    </div>

                    <!-- Pending Purchases -->
                    <div class="mb-12">
                        <h3 class="text-2xl font-semibold mb-6">خریدهای در انتظار تایید</h3>
                        <div id="pendingPurchases" class="space-y-4">
                            <!-- Pending purchases will be populated by JavaScript -->
                        </div>
                    </div>

                    <!-- Users List -->
                    <div>
                        <h3 class="text-2xl font-semibold mb-6">کاربران ثبت نام شده</h3>
                        <div id="usersList" class="overflow-x-auto">
                            <table class="w-full bg-gray-50 rounded-lg">
                                <thead class="bg-gray-200">
                                <tr>
                                    <th class="px-4 py-3 text-right">نام</th>
                                    <th class="px-4 py-3 text-right">نام کاربری</th>
                                    <th class="px-4 py-3 text-right">شماره تماس</th>
                                    <th class="px-4 py-3 text-right">دوره‌های خریداری شده</th>
                                </tr>
                                </thead>
                                <tbody id="usersTableBody">
                                <!-- Users will be populated by JavaScript -->
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Purchase Form -->
        <section id="purchaseSection" class="section hidden">
            <div class="max-w-2xl mx-auto px-4 py-16">
                <div class="bg-white rounded-2xl shadow-xl p-8">
                    <h2 class="text-3xl font-bold text-center text-gray-800 mb-8">تکمیل خرید</h2>

                    <div id="courseDetails" class="mb-8">
                        <!-- Course details will be populated by JavaScript -->
                    </div>

                    <div class="bg-yellow-50 border border-yellow-200 rounded-lg p-4 mb-6">
                        <div class="flex items-center mb-2">
                            <i class="fas fa-info-circle text-yellow-600 ml-2"></i>
                            <span class="font-semibold text-yellow-800">اطلاعات پرداخت</span>
                        </div>
                        <p class="text-yellow-700 text-sm">درگاه پرداخت آنلاین غیرفعال است. لطفاً مبلغ را به شماره کارت زیر واریز کنید:</p>
                    </div>

                    <div class="bg-blue-50 border border-blue-200 rounded-lg p-6 mb-6">
                        <div class="text-center">
                            <h3 class="font-semibold text-blue-800 mb-2">شماره کارت</h3>
                            <p class="text-2xl font-mono text-blue-900 mb-2">6037-9919-1234-5678</p>
                            <p class="text-blue-700">به نام: حسین نژاداسد</p>
                        </div>
                    </div>

                    <div class="space-y-4">
                        <div>
                            <label class="block text-gray-700 text-sm font-bold mb-2">آپلود فیش واریزی</label>
                            <input type="file" id="receiptFile" accept="image/*" class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:border-purple-500">
                        </div>

                        <div id="receiptPreview" class="hidden">
                            <img id="previewImage" class="max-w-full h-48 object-contain border rounded-lg">
                        </div>

                        <button onclick="submitPurchase()" class="w-full bg-green-600 text-white py-3 rounded-lg hover:bg-green-700 transition font-semibold">
                            تایید پرداخت
                        </button>

                        <button onclick="showSection('courses')" class="w-full bg-gray-500 text-white py-2 rounded-lg hover:bg-gray-600 transition">
                            بازگشت
                        </button>
                    </div>
                </div>
            </div>
        </section>

        <!-- User Dashboard -->
        <section id="userSection" class="section hidden">
            <div class="max-w-7xl mx-auto px-4 py-16">
                <!-- Header Section -->
                <div class="glass-effect rounded-3xl shadow-2xl p-8 mb-8 text-white">
                    <div class="flex flex-col md:flex-row justify-between items-center">
                        <div class="flex items-center space-x-6 space-x-reverse mb-4 md:mb-0">
                            <div class="w-20 h-20 bg-gradient-to-br from-cyan-400 to-purple-500 rounded-full flex items-center justify-center text-3xl">
                                <i class="fas fa-user-graduate"></i>
                            </div>
                            <div id="userHeaderInfo">
                                <!-- User header info will be populated by JavaScript -->
                            </div>
                        </div>
                        <button onclick="logout()" class="btn-danger text-white px-6 py-3 rounded-xl font-medium">
                            <i class="fas fa-sign-out-alt mr-2"></i>خروج
                        </button>
                    </div>
                </div>

                <!-- Stats Cards -->
                <div class="grid md:grid-cols-3 gap-6 mb-8">
                    <div class="glass-effect rounded-2xl p-6 text-white text-center card-hover">
                        <div class="text-4xl mb-3 text-green-400">
                            <i class="fas fa-check-circle"></i>
                        </div>
                        <div class="text-2xl font-bold mb-1" id="activeCourses">0</div>
                        <div class="text-gray-300">دوره‌های فعال</div>
                    </div>

                    <div class="glass-effect rounded-2xl p-6 text-white text-center card-hover">
                        <div class="text-4xl mb-3 text-yellow-400">
                            <i class="fas fa-clock"></i>
                        </div>
                        <div class="text-2xl font-bold mb-1" id="pendingCourses">0</div>
                        <div class="text-gray-300">در انتظار تایید</div>
                    </div>

                    <div class="glass-effect rounded-2xl p-6 text-white text-center card-hover">
                        <div class="text-4xl mb-3 text-blue-400">
                            <i class="fas fa-graduation-cap"></i>
                        </div>
                        <div class="text-2xl font-bold mb-1" id="totalCourses">0</div>
                        <div class="text-gray-300">کل دوره‌ها</div>
                    </div>
                </div>

                <!-- User Info Card -->
                <div class="glass-effect rounded-2xl shadow-xl p-8 mb-8 text-white">
                    <h3 class="text-2xl font-bold mb-6 flex items-center">
                        <i class="fas fa-user-circle mr-3 text-cyan-400"></i>
                        اطلاعات کاربری
                    </h3>
                    <div id="userDetailedInfo" class="grid md:grid-cols-2 gap-6">
                        <!-- Detailed user info will be populated by JavaScript -->
                    </div>
                </div>

                <!-- Courses Section -->
                <div class="glass-effect rounded-2xl shadow-xl p-8 text-white">
                    <h3 class="text-2xl font-bold mb-6 flex items-center">
                        <i class="fas fa-play-circle mr-3 text-purple-400"></i>
                        دوره‌های من
                    </h3>
                    <div id="userCourses" class="grid md:grid-cols-1 lg:grid-cols-2 gap-6">
                        <!-- User courses will be populated by JavaScript -->
                    </div>
                </div>
            </div>
        </section>
    </main>
    <!-- /.content -->
    @push('scripts')
        <script type="module">
            $.ajaxSetup({
                headers :{
                    'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
                }
            });
            $(document).on('click','.delete-action',function (e){
                e.preventDefault();

                let id = $(this).attr('id');
                let url = $(this).attr('href');
                Swal.fire({
                    title : 'حذف',
                    text : 'آیا مطمئن هستید؟',
                    icon: 'warning',
                    cancelButtonText  :'لغو',
                    confirmButtonText: 'حذف',
                    confirmButtonColor:'red',
                    cancelButtonColor :'blue',
                    showCancelButton:true
                }).then((result) => {
                    if(result.isConfirmed){
                        $.ajax({
                            url : url,
                            method : 'DELETE',
                            success : function(response) {
                                Swal.fire({
                                    text : response.data.message,
                                    showConfirmButton:false,
                                    color:'#fff',
                                    background: '#28a745',
                                    icon:'success',
                                    toast:true,
                                    timer:1000
                                });
                                $(`tr[data='${id}']`).remove();
                            },
                            error: function(response){

                            }
                        });
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
