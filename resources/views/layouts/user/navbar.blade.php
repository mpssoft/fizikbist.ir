<!-- Beautiful Header -->
<header class="flex justify-between items-center px-6 py-4 bg-gradient-to-l from-white via-slate-50 to-slate-100 dark:from-slate-800 dark:via-slate-700 dark:to-slate-600 shadow-[0_4px_12px_rgba(0,0,0,0.15)] dark:shadow-[0_4px_12px_rgba(0,0,0,0.4)] sticky top-0 z-30 backdrop-blur-sm">
    <!-- Toggle Button (Mobile) -->
    <div class="md:hidden">
        <button @click="sidebarOpen = !sidebarOpen; toggleButton = true" class="w-10 h-10 bg-gradient-to-r from-pink-500 to-purple-500 text-white rounded-xl hover:from-pink-600 hover:to-purple-600 transition-all duration-200 flex items-center justify-center shadow-lg hover:shadow-xl hover:scale-105">
            <i class="fas fa-bars text-sm"></i>
        </button>
    </div>

    <div class="hidden sm:block text-sm md:text-lg font-bold truncate bg-gradient-to-r from-pink-600 via-purple-600 to-blue-600 bg-clip-text text-transparent drop-shadow-sm">
        <span class="text-2xl">👋</span> محمد عزیز؛ خوش اومدی
    </div>

    <div class="flex items-center gap-3">
        <!-- Notification Bell -->
        <button class="w-10 h-10 bg-gradient-to-r from-orange-100 to-orange-200 dark:from-orange-900/30 dark:to-orange-800/30 hover:from-orange-200 hover:to-orange-300 dark:hover:from-orange-800/40 dark:hover:to-orange-700/40 rounded-xl flex items-center justify-center transition-all duration-200 hover:scale-105 shadow-sm hover:shadow-md group">
            <i class="fas fa-bell text-orange-500 group-hover:text-orange-600 transition-colors duration-200"></i>
        </button>

        <!-- Lock Icon -->
        <button class="w-10 h-10 bg-gradient-to-r from-green-100 to-green-200 dark:from-green-900/30 dark:to-green-800/30 hover:from-green-200 hover:to-green-300 dark:hover:from-green-800/40 dark:hover:to-green-700/40 rounded-xl flex items-center justify-center transition-all duration-200 hover:scale-105 shadow-sm hover:shadow-md group">
            <i class="fas fa-lock text-green-500 group-hover:text-green-600 transition-colors duration-200"></i>
        </button>

        <!-- Theme Toggle -->
        <button @click="dark = !dark" class="w-10 h-10 bg-gradient-to-r from-blue-100 to-purple-200 dark:from-blue-900/30 dark:to-purple-800/30 hover:from-blue-200 hover:to-purple-300 dark:hover:from-blue-800/40 dark:hover:to-purple-700/40 rounded-xl flex items-center justify-center transition-all duration-200 hover:scale-105 shadow-sm hover:shadow-md group">
            <i x-show="!dark" class="fas fa-moon text-blue-500 group-hover:text-blue-600 transition-colors duration-200"></i>
            <i x-show="dark" class="fas fa-sun text-yellow-500 group-hover:text-yellow-600 transition-colors duration-200"></i>
        </button>
        <div class="relative" x-data="{ open: false }">
            <button @click="open = !open" class="focus:outline-none group">
                <div class="w-10 h-10 rounded-full bg-gradient-to-r from-pink-400 to-purple-500 p-0.5 hover:from-pink-500 hover:to-purple-600 transition-all duration-200 hover:scale-105 shadow-lg hover:shadow-xl">
                    <img src="/images/user-avatar-man.jpg" class="w-full h-full rounded-full border-2 border-white dark:border-slate-700"
                         alt="avatar">
                </div>
            </button>
            <div
                x-show="open"
                @click.away="open = false"
                x-transition:enter="transition ease-out duration-200"
                x-transition:enter-start="opacity-0 scale-95"
                x-transition:enter-end="opacity-100 scale-100"
                x-transition:leave="transition ease-in duration-150"
                x-transition:leave-start="opacity-100 scale-100"
                x-transition:leave-end="opacity-0 scale-95"
                class="absolute left-0 mt-3 w-72 max-w-[90vw] bg-gradient-to-br from-white via-slate-50 to-slate-100 dark:from-slate-800 dark:via-slate-700 dark:to-slate-600 text-gray-800 dark:text-white rounded-2xl shadow-[0_8px_32px_rgba(0,0,0,0.2)] dark:shadow-[0_8px_32px_rgba(0,0,0,0.5)] z-50 p-5 space-y-4 backdrop-blur-sm border border-white/20 dark:border-slate-600/20"
            >
                <!-- User Info Section -->
                <div class="flex items-center gap-4">
                    <div class="w-14 h-14 rounded-full bg-gradient-to-r from-pink-400 to-purple-500 p-0.5">
                        <img src="/images/user-avatar-man.jpg" class="w-full h-full rounded-full border-2 border-white dark:border-slate-700"
                             alt="avatar">
                    </div>
                    <div>
                        <p class="font-bold text-lg bg-gradient-to-r from-pink-600 to-purple-600 bg-clip-text text-transparent">محمد احمدی</p>
                        <a href="#" class="text-sm text-blue-500 hover:text-blue-600 dark:text-blue-400 dark:hover:text-blue-300 hover:underline transition-colors duration-200">مشاهده پنل کاربری</a>
                    </div>
                </div>

                <!-- Stats Section -->
                <div class="bg-gradient-to-r from-blue-50 to-purple-50 dark:from-blue-900/20 dark:to-purple-900/20 rounded-xl p-4 space-y-2">
                    <div class="flex justify-between items-center">
                        <span class="text-sm font-medium">کیف پول</span>
                        <div class="w-3 h-3 rounded-full bg-gradient-to-r from-blue-400 to-blue-500 shadow-sm"></div>
                    </div>
                    <div class="flex justify-between items-center">
                        <span class="text-sm font-medium">تجربه کاربری</span>
                        <div class="w-3 h-3 rounded-full bg-gradient-to-r from-green-400 to-green-500 shadow-sm"></div>
                    </div>
                    <div class="text-green-500 font-bold text-lg">۲۰,۶۸۸ تجربه</div>
                </div>

                <!-- Divider -->
                <div class="h-px bg-gradient-to-r from-transparent via-gray-300 dark:via-gray-600 to-transparent"></div>

                <!-- Navigation Menu -->
                <nav class="space-y-1">
                    <a href="#"
                       class="flex items-center gap-3 px-4 py-3 rounded-xl hover:bg-gradient-to-r hover:from-purple-50 hover:to-pink-50 dark:hover:from-purple-900/20 dark:hover:to-pink-900/20 transition-all duration-200 group hover:-translate-x-1">
                        <i class="fas fa-video text-purple-500 group-hover:text-purple-600 transition-colors duration-200 w-4"></i>
                        <span class="font-medium">دوره ها</span>
                    </a>
                    <a href="#"
                       class="flex items-center gap-3 px-4 py-3 rounded-xl hover:bg-gradient-to-r hover:from-blue-50 hover:to-cyan-50 dark:hover:from-blue-900/20 dark:hover:to-cyan-900/20 transition-all duration-200 group hover:-translate-x-1">
                        <i class="fas fa-credit-card text-blue-500 group-hover:text-blue-600 transition-colors duration-200 w-4"></i>
                        <span class="font-medium">مالی و اشتراک</span>
                    </a>
                    <a href="#"
                       class="flex items-center gap-3 px-4 py-3 rounded-xl hover:bg-gradient-to-r hover:from-green-50 hover:to-emerald-50 dark:hover:from-green-900/20 dark:hover:to-emerald-900/20 transition-all duration-200 group hover:-translate-x-1">
                        <i class="fas fa-question-circle text-green-500 group-hover:text-green-600 transition-colors duration-200 w-4"></i>
                        <span class="font-medium">پرسش‌ها</span>
                    </a>
                    <a href="#"
                       class="flex items-center justify-between px-4 py-3 rounded-xl hover:bg-gradient-to-r hover:from-yellow-50 hover:to-orange-50 dark:hover:from-yellow-900/20 dark:hover:to-orange-900/20 transition-all duration-200 group hover:-translate-x-1">
                        <div class="flex items-center gap-3">
                            <i class="fas fa-thumbtack text-yellow-500 group-hover:text-yellow-600 transition-colors duration-200 rotate-45 w-4"></i>
                            <span class="font-medium">ماموریت‌ها</span>
                        </div>
                        <span class="bg-gradient-to-r from-yellow-400 to-orange-400 text-white rounded-full w-6 h-6 text-xs flex items-center justify-center font-bold shadow-sm">۴</span>
                    </a>
                </nav>

                <!-- Divider -->
                <div class="h-px bg-gradient-to-r from-transparent via-gray-300 dark:via-gray-600 to-transparent"></div>

                <!-- Logout Section -->
                <form action="{{route('logout')}}" method="post" id="logout-form">@csrf</form>
                <button onclick="event.preventDefault();document.getElementById('logout-form').submit()"
                        class="w-full text-center bg-gradient-to-r from-red-50 to-pink-50 dark:from-red-900/20 dark:to-pink-900/20 hover:from-red-100 hover:to-pink-100 dark:hover:from-red-900/30 dark:hover:to-pink-900/30 text-red-500 hover:text-red-600 dark:text-red-400 dark:hover:text-red-300 py-3 rounded-xl transition-all duration-200 font-medium hover:scale-[0.98]">
                    <i class="fas fa-sign-out-alt ml-2"></i>
                    خروج از حساب کاربری
                </button>
            </div>
        </div>
    </div>
</header>

