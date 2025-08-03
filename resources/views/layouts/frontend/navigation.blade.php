<nav class="bg-white shadow-lg sticky top-0 z-50">
    <div class="max-w-7xl mx-auto px-4">
        <div class="flex justify-between items-center h-16">
            <div class="flex items-center space-x-4 space-x-reverse">
                <div
                    class="text-2xl font-bold bg-gradient-to-r from-pink-500 via-purple-500 to-blue-500 bg-clip-text text-transparent">
                    <a href="{{ env("APP_URL") }}"> فیزیک بیست </a>
                </div>
{{--                <a href="#" onclick="showSection('home')" class="text-gray-700 hover:text-cyan-400 transition">خانه</a>--}}

                <!-- Courses Dropdown -->
                <div class="hidden md:flex flex gap-6 items-center block px-6  py-4 " x-data="{ openMenu: null }">

                    <!-- دوره‌های آموزشی -->
                    <div class="relative">
                        <button @click="openMenu = openMenu === 'courses' ? null : 'courses'" class="flex items-center gap-1">
                            دوره‌های آموزشی <i class="fas fa-chevron-down text-xs mt-0.5"></i>
                        </button>
                        <div
                            x-show="openMenu === 'courses'"
                            @click.away="openMenu = null"
                            x-transition
                            class="absolute right-0 mt-6 w-[600px] bg-slate-800 text-white rounded-xl shadow-xl z-50 p-6"
                        >
                            <div class="flex flex-row-reverse gap-6">
                                <!-- آموزش blocks -->
                                <div class="w-4/5 space-y-4">
                                    <div class="grid grid-cols-2 gap-4 text-sm">
                                        <a href="#" class="flex items-start space-x-2 space-x-reverse hover:bg-slate-700 p-3 rounded-lg transition">
                                            <div class="text-cyan-400 text-xl">
                                                <i class="fas fa-graduation-cap"></i>
                                            </div>
                                            <div>
                                                <p class="font-bold">دوره‌های آموزشی</p>
                                                <p class="text-xs text-gray-300 mt-1">لیست دوره‌های آموزشی ویدیویی لایت</p>
                                            </div>
                                        </a>
                                        <a href="#" class="flex items-start space-x-2 space-x-reverse hover:bg-slate-700 p-3 rounded-lg transition">
                                            <div class="text-green-400 text-xl">
                                                <i class="fas fa-chart-line"></i>
                                            </div>
                                            <div>
                                                <p class="font-bold">پیشرفت من</p>
                                                <p class="text-xs text-gray-300 mt-1">مسیر پیشرفت آموزشی شما</p>
                                            </div>
                                        </a>
                                        <a href="#" class="flex items-start space-x-2 space-x-reverse hover:bg-slate-700 p-3 rounded-lg transition">
                                            <div class="text-pink-400 text-xl">
                                                <i class="fas fa-gift"></i>
                                            </div>
                                            <div>
                                                <p class="font-bold">دوره‌های رایگان</p>
                                                <p class="text-xs text-gray-300 mt-1">برای شروع یادگیری رایگان ببینید</p>
                                            </div>
                                        </a>
                                        <a href="#" class="flex items-start space-x-2 space-x-reverse hover:bg-slate-700 p-3 rounded-lg transition">
                                            <div class="text-yellow-400 text-xl">
                                                <i class="fas fa-certificate"></i>
                                            </div>
                                            <div>
                                                <p class="font-bold">آزمون پایان دوره</p>
                                                <p class="text-xs text-gray-300 mt-1">برگزاری آزمون های دوره</p>
                                            </div>
                                        </a>
                                    </div>
                                    <hr class="border-slate-600">
                                    <div>
                                        <h4 class="text-sm font-semibold mb-2">محبوب‌ترین آموزش‌ها</h4>
                                        <div class="flex flex-wrap gap-2 text-sm">
                                            <span class="bg-slate-700 px-3 py-1 rounded-full">آموزش جاوا اسکریپت</span>
                                            <span class="bg-slate-700 px-3 py-1 rounded-full">آموزش لاراول</span>
                                            <span class="bg-slate-700 px-3 py-1 rounded-full">آموزش وردپرس</span>
                                            <span class="bg-slate-700 px-3 py-1 rounded-full">آموزش React</span>
                                        </div>
                                    </div>
                                </div>

                                <!-- پایه‌ها -->
                                <div class="text-right min-w-[180px] whitespace-nowrap border-l border-slate-600 pr-4 space-y-2 text-sm text-center">
                                    <a href="#" class="block px-3 py-2 rounded hover:bg-slate-700">پایه دهم</a>
                                    <a href="#" class="block px-3 py-2 rounded hover:bg-slate-700">پایه یازدهم</a>
                                    <a href="#" class="block px-3 py-2 rounded hover:bg-slate-700">پایه دوازدهم</a>
                                    <a href="#" class="block px-3 py-2 rounded hover:bg-slate-700">کنکور</a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- پرسش و پاسخ‌ها -->
                    <a href="#" class="hover:text-cyan-400">پرسش و پاسخ‌ها</a>

                    <!-- مقالات -->
                    <a href="#" class="hover:text-cyan-400">مقالات</a>



                    <!-- لینک‌های مفید -->
                    <div class="relative">
                        <button @click="openMenu = openMenu === 'links' ? null : 'links'" class="flex items-center gap-1">
                            لینک‌های مفید <i class="fas fa-chevron-down text-xs mt-0.5"></i>
                        </button>
                        <div
                            x-show="openMenu === 'links'"
                            @click.away="openMenu = null"
                            x-transition
                            class="absolute right-0 p-4 mt-6 w-62 whitespace-nowrap w bg-slate-800 text-white rounded-lg shadow-lg z-50 py-2"
                        >

                            <a href="#" class="block px-4 h-16 pt-6 py-2 hover:bg-slate-700">سوالات متداول</a>
                            <a href="#" class="block px-4 h-16 pt-6 py-2 hover:bg-slate-700">درباره ما </a>
                            <a href="#" class="block px-4 h-16 pt-6 py-2 hover:bg-slate-700">ارتباط با پشتیبانی</a>
                        </div>
                    </div>
                </div>


            </div>

            <!-- Desktop Menu -->
            <div class="hidden md:flex items-center space-x-6 space-x-reverse">
            @if(auth()->check())
                    <div class="relative" x-data="{ open: false }">
                        <button @click="open = !open" class="focus:outline-none ">
                            <img src="/images/user-avatar-man.jpg" class="w-12 h-12 rounded-full border-2 border-gray-100 mt-2" alt="avatar">
{{--                               <i class="fas fa-user w-10 h-10" ></i>--}}
                        </button>
                        <div
                            x-show="open"
                            @click.away="open = false"
                            x-transition
                            class="absolute left-0 mt-2 w-64 max-w-[90vw] bg-slate-800 text-white rounded-xl shadow-lg z-50 p-4 space-y-3"
                        >
                            <div class="flex items-center space-x-3 space-x-reverse">
                                <img src="/images/user-avatar-man.jpg" class="w-12 h-12 rounded-full border-2 border-green-400" alt="avatar">
                                <div>
                                    <p class="font-bold">  {{ auth()->user()->name }}</p>
                                    <a href="{{ auth()->user()->role == 'user'? route('user.home'):route('admin.home') }}" class="text-sm text-blue-400 hover:underline">مشاهده پنل کاربری</a>
                                </div>
                            </div>

                            <div class="text-sm mt-2">
                                <div class="flex justify-between items-center">
                                    <span>کیف پول</span>
                                    <span class="w-3 h-3 rounded-full bg-blue-500"></span>
                                </div>
                                <div class="flex justify-between items-center">
                                    <span>تجربه کاربری</span>
                                    <span class="w-3 h-3 rounded-full bg-green-500"></span>
                                </div>
                                <div class="text-green-400 mt-1">۲۰,۶۸۸ تجربه</div>
                            </div>

                            <hr class="border-slate-600">

                            <nav class="text-sm space-y-2">
                                <a href="#" class="flex items-center space-x-2 space-x-reverse px-4 py-2 rounded hover:bg-slate-200 dark:hover:bg-slate-700">
                                    <i class="fas fa-video text-base"></i><span>دوره ها</span>
                                </a>
                                <a href="#" class="flex items-center space-x-2 space-x-reverse px-4 py-2 rounded hover:bg-slate-200 dark:hover:bg-slate-700">
                                    <i class="fas fa-credit-card text-base"></i><span>مالی و اشتراک</span>
                                </a>
                                <a href="#" class="flex items-center space-x-2 space-x-reverse px-4 py-2 rounded hover:bg-slate-200 dark:hover:bg-slate-700">
                                    <i class="fas fa-question-circle text-base"></i><span>پرسش‌ها</span>
                                </a>
                                <a href="#" class="flex items-center justify-between px-4 py-2 rounded hover:bg-slate-200 dark:hover:bg-slate-700">
                                    <div class="flex items-center space-x-2 space-x-reverse">
                                        <i class="fas fa-thumbtack text-base rotate-45"></i><span>ماموریت‌ها</span>
                                    </div>
                                    <span class="bg-yellow-400 text-black rounded-full w-5 h-5 text-xs flex items-center justify-center">۴</span>
                                </a>
                            </nav>


                            <hr class="border-slate-600">
                            <form action="{{route('logout')}}" method="post" id="logout-form">@csrf</form>
                            <a href="#" onclick="event.preventDefault();document.getElementById('logout-form').submit()"  class="block text-center text-red-400 hover:underline">خروج از حساب کاربری</a>
                        </div>
                    </div>
                @else
                    <div id="authButtons">
                        <a href="#" onclick="showLogin()"
                           class="btn-primary text-white px-6 py-2 rounded-lg font-medium">
                            ورود / ثبت نام
                        </a>
                    </div>
                @endif

            </div>

            <!-- Mobile Menu Button -->
            <button class="md:hidden" onclick="toggleMobileMenu()">
                <i class="fas fa-bars text-xl"></i>
            </button>
        </div>
    </div>

    <!-- Mobile Menu -->
    <div id="mobileMenu" class="mobile-menu fixed top-0 right-0 h-full w-64 bg-white shadow-lg z-50 md:hidden">
        <div class="p-4">
            <button onclick="toggleMobileMenu()" class="float-left mb-4">
                <i class="fas fa-times text-xl"></i>
            </button>
            <div class="clear-both">
                <a href="#" onclick="showSection('home'); toggleMobileMenu()" class="block hover:bg-gray-100 py-3 text-gray-700">
                    <i class="fas fa-home mr-4 ml-2 "></i> خانه
                </a>
                <div class="py-3">
                    <div class="text-gray-700 font-medium mb-2">
                        <i class="fas fa-book mr-4 ml-2"></i> دوره‌ها
                    </div>
                    <a href="#" onclick="showCourses('grade10'); toggleMobileMenu()" class="block hover:bg-gray-100 py-2 pr-4 text-gray-600">
                        <i class="fas fa-chalkboard-teacher mr-4 ml-2"></i> پایه دهم
                    </a>
                    <a href="#" onclick="showCourses('grade11'); toggleMobileMenu()" class="block hover:bg-gray-100 py-2 pr-4 text-gray-600">
                        <i class="fas fa-user-graduate mr-4 ml-2"></i> پایه یازدهم
                    </a>
                    <a href="#" onclick="showCourses('grade12'); toggleMobileMenu()" class="block hover:bg-gray-100 py-2 pr-4 text-gray-600">
                        <i class="fas fa-graduation-cap mr-4 ml-2"></i> پایه دوازدهم
                    </a>
                    <a href="#" onclick="showCourses('konkur'); toggleMobileMenu()" class="block hover:bg-gray-100 py-2 pr-4 text-gray-600">
                        <i class="fas fa-university mr-4 ml-2"></i> کنکور
                    </a>
                </div>

                @if(auth()->check())
                    <div id="mobileUserPanelLink">
                        <a href="{{route('user.home')}}" onclick="showUserDashboard(); toggleMobileMenu()" class="block hover:bg-gray-100 py-3 text-gray-700">
                            <i class="fas fa-user-cog mr-4 ml-2"></i> پنل کاربری
                        </a>
                    </div>
                @else
                    <button onclick="showLogin(); toggleMobileMenu()"
                            class="w-full bg-purple-600 text-white py-2 rounded-lg mt-4">
                        <i class="fas fa-sign-in-alt mr-4 ml-2"></i> ورود / ثبت نام
                    </button>
                @endif
            </div>
        </div>


    </div>
</nav>
