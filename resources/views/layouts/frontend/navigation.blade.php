<nav class="bg-white shadow-lg sticky top-0 z-50">
    <div class="max-w-7xl mx-auto px-4">
        <div class="flex justify-between items-center h-16">
            <div class="flex items-center space-x-4 space-x-reverse">
                <div class="text-2xl font-bold bg-gradient-to-r from-pink-500 via-purple-500 to-blue-500 bg-clip-text text-transparent">
                    <a href="{{ env("APP_URL") }}" > فیزیک بیست </a>
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
                    <div class="absolute left-0 mt-2 w-48 glass-effect rounded-md shadow-lg opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-300">
                        <a href="#" onclick="showCourses('grade10')" class="block px-4 py-2 text-white hover:bg-cyan-500/20">پایه دهم</a>
                        <a href="#" onclick="showCourses('grade11')" class="block px-4 py-2 text-white hover:bg-cyan-500/20">پایه یازدهم</a>
                        <a href="#" onclick="showCourses('grade12')" class="block px-4 py-2 text-white hover:bg-cyan-500/20">پایه دوازدهم</a>
                        <a href="#" onclick="showCourses('konkur')" class="block px-4 py-2 text-white hover:bg-cyan-500/20">کنکور</a>
                    </div>
                </div>

                <div id="userPanelLink" class="hidden">
                    <a href="#" onclick="showUserDashboard()" class="text-gray-700 hover:text-cyan-400 transition">پنل کاربری</a>
                </div>
                @if(!auth()->check())
                    <div class="relative group">
                        <button class="text-gray-700 hover:text-cyan-400 transition flex items-center">
                            Username
                            <i ><img src="/images/1176.png" alt="" class="user-profile-pic"> </i>
                        </button>
                        <div class="absolute left-0 mt-2 w-48 glass-effect rounded-md shadow-lg opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-300">
                            <a href="{{ route('user-panel.') }}"  class="block px-4 py-2 text-white hover:bg-cyan-500/20">دوره های من</a>
                            <a href="#" onclick="showCourses('grade11')" class="block px-4 py-2 text-white hover:bg-cyan-500/20">مالی و اشتراک</a>
                            <a href="#" onclick="showCourses('grade12')" class="block px-4 py-2 text-white hover:bg-cyan-500/20">پرسش ها</a>
                            <a href="#" onclick="showCourses('konkur')" class="block px-4 py-2 text-white hover:bg-cyan-500/20">خروج از حساب</a>
                        </div>
                    </div>
                @else
                    <div id="authButtons">
                        <button onclick="showLogin()" class="btn-primary text-white px-6 py-2 rounded-lg font-medium">
                            ورود / ثبت نام
                        </button>
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
                <a href="#" onclick="showSection('home'); toggleMobileMenu()" class="block py-3 text-gray-700">خانه</a>
                <div class="py-3">
                    <div class="text-gray-700 font-medium mb-2">دوره‌ها</div>
                    <a href="#" onclick="showCourses('grade10'); toggleMobileMenu()" class="block py-2 pr-4 text-gray-600">پایه دهم</a>
                    <a href="#" onclick="showCourses('grade11'); toggleMobileMenu()" class="block py-2 pr-4 text-gray-600">پایه یازدهم</a>
                    <a href="#" onclick="showCourses('grade12'); toggleMobileMenu()" class="block py-2 pr-4 text-gray-600">پایه دوازدهم</a>
                    <a href="#" onclick="showCourses('konkur'); toggleMobileMenu()" class="block py-2 pr-4 text-gray-600">کنکور</a>
                </div>
                <div id="mobileUserPanelLink" class="hidden">
                    <a href="#" onclick="showUserDashboard(); toggleMobileMenu()" class="block py-3 text-gray-700">پنل کاربری</a>
                </div>



                    <button onclick="showLogin(); toggleMobileMenu()" class="w-full bg-purple-600 text-white py-2 rounded-lg mt-4">
                    ورود / ثبت نام
                </button>

            </div>
        </div>
    </div>
</nav>
