<nav class=" dark:bg-slate-900  shadow-lg sticky top-0 z-50">
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
                                        <a href="{{route('all.courses')}}" class="flex items-start space-x-2 space-x-reverse hover:bg-slate-700 p-3 rounded-lg transition">
                                            <div class="text-cyan-400 text-xl">
                                                <i class="fas fa-graduation-cap"></i>
                                            </div>
                                            <div>
                                                <p class="font-bold">دوره‌های آموزشی</p>
                                                <p class="text-xs text-gray-300 mt-1">لیست دوره‌های آموزشی ویدیویی لایت</p>
                                            </div>
                                        </a>
                                        <a href="{{route('user.home')}}" class="flex items-start space-x-2 space-x-reverse hover:bg-slate-700 p-3 rounded-lg transition">
                                            <div class="text-green-400 text-xl">
                                                <i class="fas fa-chart-line"></i>
                                            </div>
                                            <div>
                                                <p class="font-bold">پیشرفت من</p>
                                                <p class="text-xs text-gray-300 mt-1">مسیر پیشرفت آموزشی شما</p>
                                            </div>
                                        </a>
                                        <a href="{{route('free.lessons')}}" class="flex items-start space-x-2 space-x-reverse hover:bg-slate-700 p-3 rounded-lg transition">
                                            <div class="text-pink-400 text-xl">
                                                <i class="fas fa-gift"></i>
                                            </div>
                                            <div>
                                                <p class="font-bold">درس های رایگان</p>
                                                <p class="text-xs text-gray-300 mt-1">برای شروع یادگیری رایگان ببینید</p>
                                            </div>
                                        </a>
                                       {{-- <a href="#" class="flex items-start space-x-2 space-x-reverse hover:bg-slate-700 p-3 rounded-lg transition">
                                            <div class="text-yellow-400 text-xl">
                                                <i class="fas fa-certificate"></i>
                                            </div>
                                            <div>
                                                <p class="font-bold">آزمون پایان دوره</p>
                                                <p class="text-xs text-gray-300 mt-1">برگزاری آزمون های دوره</p>
                                            </div>
                                        </a>--}}
                                    </div>
                                   {{-- <hr class="border-slate-600">
                                    <div>
                                        <h4 class="text-sm font-semibold mb-2">محبوب‌ترین آموزش‌ها</h4>
                                        <div class="flex flex-wrap gap-2 text-sm">
                                            <span class="bg-slate-700 px-3 py-1 rounded-full">آموزش جاوا اسکریپت</span>
                                            <span class="bg-slate-700 px-3 py-1 rounded-full">آموزش لاراول</span>
                                            <span class="bg-slate-700 px-3 py-1 rounded-full">آموزش وردپرس</span>
                                            <span class="bg-slate-700 px-3 py-1 rounded-full">آموزش React</span>
                                        </div>
                                    </div>--}}
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

                            <a href="{{route('faq')}}" class="block px-4 h-16 pt-6 py-2 hover:bg-slate-700">سوالات متداول</a>
                            <a href="{{route('about')}}" class="block px-4 h-16 pt-6 py-2 hover:bg-slate-700">درباره ما </a>
                            <a href="{{route('contact')}}" class="block px-4 h-16 pt-6 py-2 hover:bg-slate-700">ارتباط با پشتیبانی</a>
                        </div>
                    </div>
                </div>


            </div>
            <div class="flex items-center gap-8">
            <a href="/cart" type="button" aria-label="Open cart"
               class=" flex float-left items-center justify-center rounded-full bg-white/80 dark:bg-neutral-800/80 text-neutral-700 dark:text-neutral-200 hover:bg-white dark:hover:bg-neutral-700 hover:text-neutral-900 dark:hover:text-white shadow-sm ring-1 ring-neutral-200/70 dark:ring-neutral-700/60 transition-colors duration-200 focus:outline-none focus-visible:ring-2 focus-visible:ring-blue-500 w-10 h-10">
                <!-- Cart icon -->
                <svg class="w-5 h-5" viewBox="0 0 24 24" fill="none" aria-hidden="true">
                    <path d="M3 3h2l2.2 10.4a2 2 0 0 0 2 1.6h7.7a2 2 0 0 0 2-1.6L21 7H6" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/>
                    <circle cx="10" cy="20" r="1.6" fill="currentColor"/>
                    <circle cx="17" cy="20" r="1.6" fill="currentColor"/>
                </svg>
                <span class="pointer-events-none absolute inset-0 rounded-full bg-neutral-900/0 hover:bg-neutral-900/5 dark:bg-white/0 dark:hover:bg-white/5 transition-colors"></span>
            </a>
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
                        <a href="#" onclick="openLightbox()"
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
    </div>

    <!-- Beautiful Mobile Menu -->
    <div id="mobileMenu" class="mobile-menu fixed top-0 right-0 h-full w-80 bg-white/95 dark:bg-gray-900/95 backdrop-blur-xl shadow-2xl z-50 md:hidden border-l border-gray-200 dark:border-gray-700">

        <!-- Header Section -->
        <div class="bg-gradient-to-br from-purple-600 via-blue-600 to-indigo-700 p-6 relative overflow-hidden">
            <div class="absolute inset-0 bg-black/10"></div>
            <div class="relative z-10 ">

                <button onclick="toggleMobileMenu()" class=" float-left z-10 text-white/90 hover:text-white hover:bg-white/20 p-2 rounded-full transition-all duration-200">
                    <i class="fas fa-times text-xl"></i>
                </button>
                <div class="clear-both">
                    <div class="flex items-center space-x-3 space-x-reverse">
                        <div class="w-12 h-12 bg-white/20 rounded-full flex items-center justify-center">
                            <i class="fas fa-graduation-cap text-white text-xl"></i>
                        </div>
                        <div>
                            <h2 class="text-white font-bold text-lg">آکادمی فیزیک بیست</h2>
                            <p class="text-white/80 text-sm">یادگیری بدون محدودیت</p>
                        </div>
                    </div>
                </div>

            </div>
        </div>

        <!-- Menu Content -->
        <div class="p-3  overflow-y-auto h-full pb-32">

            <!-- Home -->
            <a href="/"  class="flex items-center space-x-4 space-x-reverse p-4 rounded-xl hover:bg-gradient-to-r hover:from-purple-50 hover:to-blue-50 dark:hover:from-purple-900/20 dark:hover:to-blue-900/20 text-gray-700 dark:text-gray-700 group transition-all duration-200 hover:transform hover:-translate-x-1">
                <div class="w-10 h-10 bg-gradient-to-br from-purple-500 to-blue-500 rounded-lg flex items-center justify-center group-hover:scale-110 transition-transform duration-200">
                    <i class="fas fa-home text-white text-sm"></i>
                </div>
                <span class="font-medium text-white">خانه</span>
            </a>

            <!-- Courses Section -->
            <div class="space-y-2">
                <a href="{{ route('all.courses') }}"  class="flex items-center space-x-4 space-x-reverse  rounded-xl hover:bg-gradient-to-r hover:from-purple-50 hover:to-blue-50 dark:hover:from-purple-900/20 dark:hover:to-blue-900/20 text-gray-700 dark:text-gray-700 group transition-all duration-200 hover:transform hover:-translate-x-1">
                <div class="flex items-center space-x-4 space-x-reverse p-4 text-gray-800 dark:text-gray-100">
                    <div class="w-10 h-10 bg-gradient-to-br from-emerald-500 to-teal-500 rounded-lg flex items-center justify-center">
                        <i class="fas fa-book text-white text-sm"></i>
                    </div>
                    <span class="font-semibold ">همه دوره‌ها</span>
                </div>
                </a>
                <div class="mr-6 space-y-1">
                    <a href="#" onclick="showCourses('grade10'); toggleMobileMenu()" class="flex items-center space-x-3 space-x-reverse p-3 rounded-lg hover:bg-gray-100 dark:hover:bg-gray-800 text-gray-600 dark:text-gray-300 group transition-all duration-200 hover:transform hover:-translate-x-1">
                        <div class="w-8 h-8 bg-gradient-to-br from-orange-400 to-red-400 rounded-lg flex items-center justify-center group-hover:scale-105 transition-transform duration-200">
                            <i class="fas fa-chalkboard-teacher text-white text-xs"></i>
                        </div>
                        <span class="font-medium">پایه دهم</span>
                    </a>

                    <a href="#" onclick="showCourses('grade11'); toggleMobileMenu()" class="flex items-center space-x-3 space-x-reverse p-3 rounded-lg hover:bg-gray-100 dark:hover:bg-gray-800 text-gray-600 dark:text-gray-300 group transition-all duration-200 hover:transform hover:-translate-x-1">
                        <div class="w-8 h-8 bg-gradient-to-br from-blue-400 to-indigo-400 rounded-lg flex items-center justify-center group-hover:scale-105 transition-transform duration-200">
                            <i class="fas fa-user-graduate text-white text-xs"></i>
                        </div>
                        <span class="font-medium">پایه یازدهم</span>
                    </a>

                    <a href="#" onclick="showCourses('grade12'); toggleMobileMenu()" class="flex items-center space-x-3 space-x-reverse p-3 rounded-lg hover:bg-gray-100 dark:hover:bg-gray-800 text-gray-600 dark:text-gray-300 group transition-all duration-200 hover:transform hover:-translate-x-1">
                        <div class="w-8 h-8 bg-gradient-to-br from-purple-400 to-pink-400 rounded-lg flex items-center justify-center group-hover:scale-105 transition-transform duration-200">
                            <i class="fas fa-graduation-cap text-white text-xs"></i>
                        </div>
                        <span class="font-medium">پایه دوازدهم</span>
                    </a>

                    <a href="#" onclick="showCourses('konkur'); toggleMobileMenu()" class="flex items-center space-x-3 space-x-reverse p-3 rounded-lg hover:bg-gray-100 dark:hover:bg-gray-800 text-gray-600 dark:text-gray-300 group transition-all duration-200 hover:transform hover:-translate-x-1">
                        <div class="w-8 h-8 bg-gradient-to-br from-green-400 to-emerald-400 rounded-lg flex items-center justify-center group-hover:scale-105 transition-transform duration-200">
                            <i class="fas fa-university text-white text-xs"></i>
                        </div>
                        <span class="font-medium">کنکور</span>

                    </a>
                </div>
            </div>

            @if(auth()->check())
                <div id="mobileUserPanelLink" class="pt-4 border-t border-gray-200 dark:border-gray-700">
                    <a href="{{auth()->user()->role=='admin'? route('admin.home'):route('user.home')}}" onclick="showUserDashboard(); toggleMobileMenu()" class="flex items-center space-x-4 space-x-reverse p-4 rounded-xl hover:bg-gradient-to-r hover:from-indigo-50 hover:to-purple-50 dark:hover:from-indigo-900/20 dark:hover:to-purple-900/20 text-gray-700 dark:text-gray-200 group transition-all duration-200 hover:transform hover:-translate-x-1">
                        <div class="w-10 h-10 bg-gradient-to-br from-indigo-500 to-purple-500 rounded-lg flex items-center justify-center group-hover:scale-110 transition-transform duration-200">
                            <i class="fas fa-user-cog text-white text-sm"></i>
                        </div>
                        <span class="font-medium">پنل کاربری</span>
                    </a>
                </div>
            @else
                <div class="pt-4 border-t border-gray-200 dark:border-gray-700">
                    <button onclick="openLightbox()"
                            class="w-full bg-gradient-to-r from-purple-600 via-blue-600 to-indigo-600 hover:from-purple-700 hover:via-blue-700 hover:to-indigo-700 text-white py-4 px-6 rounded-xl font-semibold shadow-lg hover:shadow-xl transform hover:scale-[1.02] transition-all duration-200 flex items-center justify-center space-x-3 space-x-reverse">
                        <i class="fas fa-sign-in-alt"></i>
                        <span>ورود / ثبت نام</span>
                    </button>
                </div>
            @endif
        </div>


    </div>

</nav>
@push('scripts')
    <script>
    function toggleMobileMenu() {
    const menu = document.getElementById('mobileMenu');
    menu.classList.toggle('active');
    }
    </script>
@endpush
