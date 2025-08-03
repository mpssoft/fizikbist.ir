<header class="flex justify-between items-center px-4 py-3 bg-slate-100 dark:bg-slate-800 shadow-md sticky top-0 z-30">
    <!-- Toggle Button (Mobile) -->
    <div class="md:hidden">
        <button @click="sidebarOpen = !sidebarOpen; toggleButton = true" class="text-white text-2xl focus:outline-none">☰</button>

    </div>

    <div class="hidden sm:block text-sm md:text-lg font-bold truncate">👋 {{ Auth::user()->name }} عزیز؛ خوش اومدی</div>

    <div class="flex items-center space-x-3 space-x-reverse">
        <div><i class="fas fa-bell text-lg ml-3"></i></div>
        <div><i class="fas fa-lock text-lg ml-3"></i></div>

        <div><!-- Theme Toggle -->
            <button @click="dark = !dark" class="w-10 h-10 bg-slate-200 dark:bg-slate-700 p-2 rounded-full ml-1">
                <i x-show="!dark" class="fas fa-moon"></i>
                <i x-show="dark" class="fas fa-sun"></i>
            </button></div>

        <!-- Dropdown -->
        <div class="relative" x-data="{ open: false }">
            <button @click="open = !open" class="focus:outline-none ">
                <img src="/images/user-avatar-man.jpg" class="w-10 h-10 rounded-full border-2 border-gray-100 " alt="avatar">
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

                <a href="#" class="block text-center text-red-400 hover:underline">خروج از حساب کاربری</a>
            </div>
        </div>
    </div>
</header>
