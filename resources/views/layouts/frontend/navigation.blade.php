<nav class="     shadow-lg sticky top-0 z-50 bg-gray-600 dark:bg-slate-900 text-gray-900 dark:!text-white ">
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
                        <button @mouseenter="openMenu = openMenu === 'courses' ? null : 'courses'" class="flex items-center gap-1">
                            دوره‌های آموزشی <i class="fas fa-chevron-down text-xs mt-0.5"></i>
                        </button>
                        <div
                            x-show="openMenu === 'courses'"
                            @click.away="openMenu = null"
                            @mouseleave="openMenu = null"
                            x-transition
                            class="absolute right-0 mt-6 w-[600px] bg-slate-800 rounded-xl shadow-xl z-50 p-6"
                        >
                            <div class="flex flex-row-reverse ">
                                <!-- آموزش blocks -->
                                <div class="w-4/5 space-y-4 ">
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
                                        <a href="{{route('files')}}" class="flex items-start space-x-2 space-x-reverse hover:bg-slate-700 p-3 rounded-lg transition">
                                            <div class="text-green-400 text-xl">
                                                <i class="fas fa-file-archive"></i>
                                            </div>
                                            <div>
                                                <p class="font-bold"> دانلود ها</p>
                                                <p class="text-xs text-gray-300 mt-1">فایل ها و جزوات آموزشی </p>
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
                                        <a href="{{route('lesson-plan')}}" class="flex items-start space-x-2 space-x-reverse hover:bg-slate-700 p-3 rounded-lg transition">
                                            <div class="text-yellow-400 text-xl">
                                                <i class="fas fa-file-alt"></i>
                                            </div>
                                            <div>
                                                <p class="font-bold"> درخواست درسنامه</p>
                                                <p class="text-xs text-gray-300 mt-1">ایجاد درس بر اساس نیاز شما</p>
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
                                <div class="text-right min-w-[180px] whitespace-nowrap border-l border-slate-600 ml-2 pl-2 space-y-2 text-sm ">
                                    @foreach(\App\Models\Grade::all() as $grade)

                                        <a href="{{route('gradeCourses',['gradeName'=>$grade->name])}}" class="flex items-center gap-2  px-3 py-2 rounded hover:bg-slate-700 ">

                                            <i class="fas fa-cubes text-xl text-cyan-300/90 group-hover:text-cyan-200"></i>
                                            {{ $grade->name }}
                                        </a>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- پرسش و پاسخ‌ها -->
                    <a href="{{route('conversation.index')}}" class=" hover:text-cyan-400  ">پرسش و پاسخ‌ها</a>



                    <!-- لینک‌های مفید -->
                    <div class="relative">
                        <button @mouseenter="openMenu = openMenu === 'links' ? null : 'links'" class="flex items-center gap-1">
                            لینک‌های مفید <i class="fas fa-chevron-down text-xs mt-0.5"></i>
                        </button>
                        <div
                            x-show="openMenu === 'links'"
                            @click.away="openMenu = null"
                            @mouseleave="openMenu = null"
                            x-transition
                            class="absolute right-0 p-4 mt-6 w-62 whitespace-nowrap w bg-slate-800 text-white rounded-lg shadow-lg z-50 py-2"
                        >

                            <a href="{{route('faq')}}" class="block px-4 h-16 pt-6 py-2 hover:bg-slate-700">سوالات متداول</a>
                            <a href="{{route('termsOfService')}}" class="block px-4 h-16 pt-6 py-2 hover:bg-slate-700"> شرایط و ضوابط استفاده</a>
                            <a href="{{route('about')}}" class="block px-4 h-16 pt-6 py-2 hover:bg-slate-700">درباره ما </a>
                            <a href="{{route('contact')}}" class="block px-4 h-16 pt-6 py-2 hover:bg-slate-700">ارتباط با پشتیبانی</a>
                        </div>
                    </div>
                </div>


            </div>
            <div class="flex items-center gap-8 " >
                <div class="relative">

                    <a href="/cart" type="button" aria-label="Open cart" @mouseenter="cart = true; open = false" class="relative w-10 h-10 rounded-xl flex items-center justify-center transition-all duration-200 hover:scale-105 shadow-sm bg-black hover:shadow-md group text-black dark:!text-white">
                        <!-- Cart icon -->
                        <img src="/images/cart-image-s.jpg" class="w-7">
                        <!-- Item count circle -->
                        <span id="itemsCount" class="absolute -top-1 -right-1 bg-red-500 text-white text-xs font-bold rounded-full w-5 h-5 flex items-center justify-center"></span>
                    </a>

                    <div
                        x-show="cart"
                        @click.away="cart = false"
                        @mouseleave="cart = false"
                        x-transition:enter="transition ease-out duration-200"
                        x-transition:enter-start="opacity-0 scale-95"
                        x-transition:enter-end="opacity-100 scale-100"
                        x-transition:leave="transition ease-in duration-150"
                        x-transition:leave-start="opacity-100 scale-100"
                        x-transition:leave-end="opacity-0 scale-95"
                        class="absolute left-0 mt-3 w-72 max-w-[90vw] bg-gradient-to-br from-white via-slate-50 to-slate-100 dark:from-slate-800 dark:via-slate-700 dark:to-slate-600 text-gray-800 dark:text-white rounded-2xl shadow-[0_8px_32px_rgba(0,0,0,0.2)] dark:shadow-[0_8px_32px_rgba(0,0,0,0.5)] z-50 p-3 space-y-2 with-blur border border-white/20 dark:border-slate-600/20"
                        id="cartItems"
                    >


                    </div>

                </div>

                <!-- Desktop Menu -->
                <div class="hidden md:flex items-center space-x-6 space-x-reverse ">
                    @if(auth()->check())
                        <div class="relative" >
                            <button @mouseenter="open = !open ; cart = false" class="flex items-center focus:outline-none group mt-2">
                                <span class="text-xs text-gray-200 ml-3">{{auth()->user()->name}}</span>
                                <div class="w-10 h-10 rounded-full bg-gradient-to-r from-pink-400 to-purple-500 p-0.5 hover:from-pink-500 hover:to-purple-600 transition-all duration-200 hover:scale-105 shadow-lg hover:shadow-xl">
                                    <img src="{{auth()->user()->image ? Storage::disk('users')->url( 'thumbs/'.auth()->user()->image) : '/images/user-avatar-man.jpg'}}" class="w-full h-full rounded-full border-2 border-white dark:border-slate-700"
                                         alt="avatar">
                                </div>

                            </button>
                            <div
                                x-show="open"
                                @click.away="open = false"
                                @mouseleave="open = false"
                                x-transition:enter="transition ease-out duration-200"
                                x-transition:enter-start="opacity-0 scale-95"
                                x-transition:enter-end="opacity-100 scale-100"
                                x-transition:leave="transition ease-in duration-150"
                                x-transition:leave-start="opacity-100 scale-100"
                                x-transition:leave-end="opacity-0 scale-95"
                                class="absolute left-0 mt-3 w-72 max-w-[90vw] bg-gradient-to-br from-white via-slate-50 to-slate-100 dark:from-slate-800 dark:via-slate-700 dark:to-slate-600 text-gray-800 dark:text-white rounded-2xl shadow-[0_8px_32px_rgba(0,0,0,0.2)] dark:shadow-[0_8px_32px_rgba(0,0,0,0.5)] z-50 p-5 space-y-4 with-blur border border-white/20 dark:border-slate-600/20"
                            >
                                <!-- User Info Section -->
                                <div class="flex items-center gap-4">
                                    <div class="w-14 h-14 rounded-full bg-gradient-to-r  from-pink-400 to-purple-500 p-0.5">
                                        <img src="{{auth()->user()->image ? Storage::disk('users')->url( 'thumbs/'.auth()->user()->image) : '/images/user-avatar-man.jpg'}}" class="w-full h-full rounded-full border-2 border-white dark:border-slate-700"
                                             alt="avatar">
                                    </div>
                                    <div>
                                        <p class="font-bold text-lg bg-gradient-to-r from-pink-600 to-purple-600 bg-clip-text text-transparent">{{auth()->user()->name}} </p>
                                        <a href="/{{auth()->user()->role}}" class="text-sm text-blue-500 hover:text-blue-600 dark:text-blue-400 dark:hover:text-blue-300 hover:underline transition-colors duration-200">مشاهده پنل کاربری</a>
                                    </div>
                                </div>

                                {{--     <!-- Stats Section -->
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
                     --}}
                                <!-- Divider -->
                                <div class="h-px bg-gradient-to-r from-transparent via-gray-300 dark:via-gray-600 to-transparent"></div>

                                @if(auth()->user()->role =='user')
                                    <!-- Navigation Menu -->
                                    <nav class="space-y-1">
                                        <a href="{{route('user.courses.index')}}"
                                           class="flex items-center gap-3 px-4 py-3 rounded-xl hover:bg-gradient-to-r hover:from-purple-50 hover:to-pink-50 dark:hover:from-purple-900/20 dark:hover:to-pink-900/20 transition-all duration-200 group hover:-translate-x-1">
                                            <i class="fas fa-video text-purple-500 group-hover:text-purple-600 transition-colors duration-200 w-4"></i>
                                            <span class="font-medium">دوره ها</span>
                                        </a>
                                        <a href="{{route('user.messages.index')}}"
                                           class="flex items-center gap-3 px-4 py-3 rounded-xl hover:bg-gradient-to-r hover:from-blue-50 hover:to-cyan-50 dark:hover:from-blue-900/20 dark:hover:to-cyan-900/20 transition-all duration-200 group hover:-translate-x-1">
                                            <i class="fas fa-paper-plane text-blue-500 group-hover:text-blue-600 transition-colors duration-200 w-4"></i>
                                            <span class="font-medium">پیام ها</span>
                                        </a>
                                        <a href="{{route('user.courses.bought')}}"
                                           class="flex items-center gap-3 px-4 py-3 rounded-xl hover:bg-gradient-to-r hover:from-green-50 hover:to-emerald-50 dark:hover:from-green-900/20 dark:hover:to-emerald-900/20 transition-all duration-200 group hover:-translate-x-1">
                                            <i class="fas fa-credit-card-alt text-green-500 group-hover:text-green-600 transition-colors duration-200 w-4"></i>
                                            <span class="font-medium">خرید ها</span>
                                        </a>
                                        <a href="{{route('user.profile.edit')}}"
                                           class="flex items-center justify-between px-4 py-3 rounded-xl hover:bg-gradient-to-r hover:from-yellow-50 hover:to-orange-50 dark:hover:from-yellow-900/20 dark:hover:to-orange-900/20 transition-all duration-200 group hover:-translate-x-1">
                                            <div class="flex items-center gap-3">
                                                <i class="fas fa-user-edit text-yellow-500 group-hover:text-yellow-600 transition-colors duration-200 rotate-45 w-4"></i>
                                                <span class="font-medium">ویرایش پروفایل</span>
                                            </div>
                                            {{--<span class="bg-gradient-to-r from-yellow-400 to-orange-400 text-white rounded-full w-6 h-6 text-xs flex items-center justify-center font-bold shadow-sm">۴</span>--}}
                                        </a>
                                    </nav>

                                @else
                                    <!-- Navigation Menu -->
                                    <nav class="space-y-1">
                                        <a href="{{route('admin.courses.index')}}"
                                           class="flex items-center gap-3 px-4 py-3 rounded-xl hover:bg-gradient-to-r hover:from-purple-50 hover:to-pink-50 dark:hover:from-purple-900/20 dark:hover:to-pink-900/20 transition-all duration-200 group hover:-translate-x-1">
                                            <i class="fas fa-video text-purple-500 group-hover:text-purple-600 transition-colors duration-200 w-4"></i>
                                            <span class="font-medium">دوره ها</span>
                                        </a>
                                        <a href="{{route('admin.messages.index')}}"
                                           class="flex items-center gap-3 px-4 py-3 rounded-xl hover:bg-gradient-to-r hover:from-blue-50 hover:to-cyan-50 dark:hover:from-blue-900/20 dark:hover:to-cyan-900/20 transition-all duration-200 group hover:-translate-x-1">
                                            <i class="fas fa-paper-plane text-blue-500 group-hover:text-blue-600 transition-colors duration-200 w-4"></i>
                                            <span class="font-medium">پیام ها</span>
                                        </a>
                                        <a href="{{route('admin.licenses.index')}}"
                                           class="flex items-center gap-3 px-4 py-3 rounded-xl hover:bg-gradient-to-r hover:from-green-50 hover:to-emerald-50 dark:hover:from-green-900/20 dark:hover:to-emerald-900/20 transition-all duration-200 group hover:-translate-x-1">
                                            <i class="fas fa-credit-card-alt text-green-500 group-hover:text-green-600 transition-colors duration-200 w-4"></i>
                                            <span class="font-medium"> مدیریت لایسنس ها</span>
                                        </a>
                                        <a href="{{route('admin.profile.edit')}}"
                                           class="flex items-center justify-between px-4 py-3 rounded-xl hover:bg-gradient-to-r hover:from-yellow-50 hover:to-orange-50 dark:hover:from-yellow-900/20 dark:hover:to-orange-900/20 transition-all duration-200 group hover:-translate-x-1">
                                            <div class="flex items-center gap-3">
                                                <i class="fas fa-user-edit text-yellow-500 group-hover:text-yellow-600 transition-colors duration-200 rotate-45 w-4"></i>
                                                <span class="font-medium">ویرایش پروفایل</span>
                                            </div>
                                            {{--<span class="bg-gradient-to-r from-yellow-400 to-orange-400 text-white rounded-full w-6 h-6 text-xs flex items-center justify-center font-bold shadow-sm">۴</span>--}}
                                        </a>
                                    </nav>

                                @endif
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
    <div id="mobileMenu" class="mobile-menu fixed top-0 right-0 h-full w-80 bg-white/95 dark:bg-gray-900/95 with-blur shadow-2xl z-50 md:hidden border-l border-gray-200 dark:border-gray-700">

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
                    @foreach(\App\Models\Grade::all() as $grade)
                        <a href="{{ route('gradeCourses',['gradeName'=>$grade->name]) }}"  class="flex items-center space-x-3 space-x-reverse p-3 rounded-lg hover:bg-gray-100 dark:hover:bg-gray-800 text-gray-600 dark:text-gray-300 group transition-all duration-200 hover:transform hover:-translate-x-1">
                            <div class="w-8 h-8 bg-gradient-to-br from-orange-400 to-red-400 rounded-lg flex items-center justify-center group-hover:scale-105 transition-transform duration-200">
                                <i class="fas fa-chalkboard-teacher text-white text-xs"></i>
                            </div>
                            <span class="font-medium">{{$grade->name}}</span>
                        </a>
                    @endforeach
                </div>
            </div>
            <a href="{{ route('files') }}"  class="flex items-center space-x-4 space-x-reverse  rounded-xl hover:bg-gradient-to-r hover:from-purple-50 hover:to-blue-50 dark:hover:from-purple-900/20 dark:hover:to-blue-900/20 text-gray-700 dark:text-gray-700 group transition-all duration-200 hover:transform hover:-translate-x-1">
                <div class="flex items-center space-x-4 space-x-reverse p-4 text-gray-800 dark:text-gray-100">
                    <div class="w-10 h-10 bg-gradient-to-br from-emerald-500 to-teal-500 rounded-lg flex items-center justify-center">
                        <i class="fas fa-file-archive text-white text-sm"></i>
                    </div>
                    <span class="font-semibold "> فایل و جزوه آموزشی </span>
                </div>
            </a>


        @if(auth()->check())
                <div id="mobileUserPanelLink" class="pt-4 border-t border-gray-200 dark:border-gray-700">
                    <a href="{{auth()->user()->role=='admin'? route('admin.home'):route('user.home')}}" onclick="showUserDashboard(); toggleMobileMenu()" class="flex items-center space-x-4 space-x-reverse p-4 rounded-xl hover:bg-gradient-to-r hover:from-indigo-50 hover:to-purple-50 dark:hover:from-indigo-900/20 dark:hover:to-purple-900/20 text-gray-700 dark:text-gray-200 group transition-all duration-200 hover:transform hover:-translate-x-1">
                        <div class="w-10 h-10 bg-gradient-to-br from-indigo-500 to-purple-500 rounded-lg flex items-center justify-center group-hover:scale-110 transition-transform duration-200">
                            <i class="fas fa-user-cog text-white text-sm"></i>
                        </div>
                        <span class="font-medium dark:text-white">پنل کاربری</span>
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
