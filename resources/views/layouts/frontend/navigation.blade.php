<nav class="bg-white shadow-lg sticky top-0 z-50">
    <div class="max-w-7xl mx-auto px-4">
        <div class="flex justify-between items-center h-16">
            <div class="flex items-center space-x-4 space-x-reverse">
                <div
                    class="text-2xl font-bold bg-gradient-to-r from-pink-500 via-purple-500 to-blue-500 bg-clip-text text-transparent">
                    <a href="{{ env("APP_URL") }}"> فیزیک بیست </a>
                </div>
            </div>

            <!-- Desktop Menu -->
            <div class="hidden md:flex items-center space-x-6 space-x-reverse">
                <a href="#" onclick="showSection('home')" class="text-gray-700 hover:text-cyan-400 transition">خانه</a>

                <!-- Courses Dropdown -->
                <div class="relative group">
                    <button class="text-gray-700 hover:text-cyan-400 transition flex items-center">
                        دوره‌ها
                        <i class="fas fa-chevron-down mr-1 text-xs"></i>
                    </button>
                    <div
                        class="absolute left-0 mt-2 w-48 glass-effect rounded-md shadow-lg opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-300">
                        <a href="#" onclick="showCourses('grade10')"
                           class="block px-4 py-2 text-white hover:bg-cyan-500/20">پایه دهم</a>
                        <a href="#" onclick="showCourses('grade11')"
                           class="block px-4 py-2 text-white hover:bg-cyan-500/20">پایه یازدهم</a>
                        <a href="#" onclick="showCourses('grade12')"
                           class="block px-4 py-2 text-white hover:bg-cyan-500/20">پایه دوازدهم</a>
                        <a href="#" onclick="showCourses('konkur')"
                           class="block px-4 py-2 text-white hover:bg-cyan-500/20">کنکور</a>
                    </div>
                </div>

                <div id="userPanelLink" class="hidden">
                    <a href="#" onclick="showUserDashboard()" class="text-gray-700 hover:text-cyan-400 transition">پنل
                        کاربری</a>
                </div>
                @if(auth()->check())
                    <div class="relative" x-data="{ open: false }">
                        <button @click="open = !open" class="focus:outline-none ">
                            <img src="your-avatar.jpg" class="w-10 h-10 rounded-full border-2 border-gray-100" alt="avatar">

                        </button>
                        <div
                            x-show="open"
                            @click.away="open = false"
                            x-transition
                            class="absolute left-0 mt-2 w-64 max-w-[90vw] bg-slate-800 text-white rounded-xl shadow-lg z-50 p-4 space-y-3"
                        >
                            <div class="flex items-center space-x-3 space-x-reverse">
                                <img src="your-avatar.jpg" class="w-12 h-12 rounded-full border-2 border-green-400" alt="avatar">
                                <div>
                                    <p class="font-bold">  {{ auth()->user()->name }}</p>
                                    <a href="{{ route('user.home') }}" class="text-sm text-blue-400 hover:underline">مشاهده پنل کاربری</a>
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
                                <a href="#" class="flex items-center space-x-2 space-x-reverse block px-4 py-2 rounded hover:bg-slate-200 dark:hover:bg-slate-700">
                                    <span>🎥</span><span>دوره ها</span>
                                </a>
                                <a href="#" class="flex items-center space-x-2 space-x-reverse block px-4 py-2 rounded hover:bg-slate-200 dark:hover:bg-slate-700">
                                    <span>💳</span><span>مالی و اشتراک</span>
                                </a>
                                <a href="#" class="flex items-center space-x-2 space-x-reverse block px-4 py-2 rounded hover:bg-slate-200 dark:hover:bg-slate-700">
                                    <span>❓</span><span>پرسش‌ها</span>
                                </a>
                                <a href="#" class="flex items-center space-x-2 space-x-reverse block px-4 py-2 rounded hover:bg-slate-200 dark:hover:bg-slate-700">
                                    <span>📌</span><span>ماموریت‌ها</span>
                                    <span class="bg-yellow-400 text-black rounded-full w-5 h-5 text-xs flex items-center justify-center">۴</span>
                                </a>
                            </nav>

                            <hr class="border-slate-600">

                            <a href="#" class="block text-center text-red-400 hover:underline">خروج از حساب کاربری</a>
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
