
<aside style="top:0px"
    class="fixed  md:relative md:w-[300px] z-50 md:z-40 overflow-auto bottom-0 right-0  bg-gradient-to-br from-white via-slate-50 to-slate-100 dark:from-slate-800 dark:via-slate-700 dark:to-slate-600 shadow-[-8px_0_24px_rgba(0,0,0,0.15)] dark:shadow-[-8px_0_24px_rgba(0,0,0,0.4)]  transform transition-all duration-300 ease-in-out md:translate-x-0 translate-x-full"
    :class="sidebarOpen ? 'translate-x-0' : 'translate-x-full md:translate-x-0'"
    @click.away=" !toggleButton ? sidebarOpen = false : toggleButton = false"
>

    <div class=" md:hidden items-center p-8 justify-between shadow-[0_4px_12px_rgba(0,0,0,0.15)] dark:shadow-[0_4px_12px_rgba(0,0,0,0.4)]">
        <div class="text-2xl font-bold bg-gradient-to-r from-pink-500 via-purple-500 to-blue-500 bg-clip-text text-transparent drop-shadow-sm">
            <a href="/" class="flex items-center gap-2 hover:scale-105 transition-transform duration-200">
                <i class="fas fa-atom drop-shadow-sm"></i>
                فیزیک بیست
            </a>
        </div>
    </div>

    <!-- Navigation Section -->
    <nav class="flex flex-col gap-2 px-4 text-sm md:text-base ">
        <!-- Header Section -->

        <!-- صفحه اصلی -->
        <a href="{{route('admin.home')}}" class="flex items-center gap-3 px-5 py-3 rounded-xl hover:bg-gradient-to-r hover:from-pink-50 hover:to-purple-50 dark:hover:from-pink-900/20 dark:hover:to-purple-900/20 hover:-translate-x-1 transition-all duration-300 group">
            <i class="fas fa-home text-pink-500 group-hover:text-pink-600 transition-colors duration-200 w-5"></i>
            <span class="font-medium text-gray-700 dark:text-gray-200 group-hover:text-gray-900 dark:group-hover:text-white">صفحه اصلی</span>
        </a>

        <!-- پایه | مقطع | دسته -->
        <div class="treeview-item">
            <button onclick="toggleTreeview(this)" class="flex items-center justify-between w-full gap-3 px-5 py-3 rounded-xl hover:bg-gradient-to-r hover:from-pink-50 hover:to-purple-50 dark:hover:from-pink-900/20 dark:hover:to-purple-900/20 hover:-translate-x-1 transition-all duration-300 group">
                <div class="flex items-center gap-3">
                    <i class="fas fa-graduation-cap text-purple-500 group-hover:text-purple-600 transition-colors duration-200 w-5"></i>
                    <span class="font-medium text-gray-700 dark:text-gray-200 group-hover:text-gray-900 dark:group-hover:text-white">پایه | مقطع | دسته</span>
                </div>
                <i class="fas fa-chevron-down text-gray-400 transition-transform duration-300 treeview-arrow"></i>
            </button>
            <div class="treeview-content hidden overflow-hidden transition-all duration-300 ease-in-out">
                <div class="mr-8 mt-2 space-y-1">
                    <a href="{{route('admin.grades.index')}}" class="flex items-center gap-3 px-4 py-2 rounded-lg hover:bg-gray-100 dark:hover:bg-gray-700 transition-colors duration-200 group">
                        <i class="fas fa-list text-xs text-purple-300 w-3"></i>
                        <span class="text-gray-600 dark:text-gray-300 group-hover:text-purple-600 dark:group-hover:text-purple-400">مشاهده همه</span>
                    </a>
                    <a href="{{route('admin.grades.create')}}" class="flex items-center gap-3 px-4 py-2 rounded-lg hover:bg-gray-100 dark:hover:bg-gray-700 transition-colors duration-200 group">
                        <i class="fas fa-plus text-xs text-purple-300 w-3"></i>
                        <span class="text-gray-600 dark:text-gray-300 group-hover:text-purple-600 dark:group-hover:text-purple-400">ایجاد پایه جدید</span>
                    </a>
                </div>
            </div>
        </div>

        <!-- دوره‌ها -->
        <div class="treeview-item">
            <button onclick="toggleTreeview(this)" class="flex items-center justify-between w-full gap-3 px-5 py-3 rounded-xl hover:bg-gradient-to-r hover:from-pink-50 hover:to-purple-50 dark:hover:from-pink-900/20 dark:hover:to-purple-900/20 hover:-translate-x-1 transition-all duration-300 group">
                <div class="flex items-center gap-3">
                    <i class="fas fa-book-open text-blue-500 group-hover:text-blue-600 transition-colors duration-200 w-5"></i>
                    <span class="font-medium text-gray-700 dark:text-gray-200 group-hover:text-gray-900 dark:group-hover:text-white">دوره‌ها</span>
                </div>
                <i class="fas fa-chevron-down text-gray-400 transition-transform duration-300 treeview-arrow"></i>
            </button>
            <div class="treeview-content hidden overflow-hidden transition-all duration-300 ease-in-out">
                <div class="mr-8 mt-2 space-y-1">
                    <a href="{{route('admin.courses.index')}}" class="flex items-center gap-3 px-4 py-2 rounded-lg hover:bg-gray-100 dark:hover:bg-gray-700 transition-colors duration-200 group">
                        <i class="fas fa-list text-xs text-blue-300 w-3"></i>
                        <span class="text-gray-600 dark:text-gray-300 group-hover:text-blue-600 dark:group-hover:text-blue-400">مشاهده همه</span>
                    </a>
                    <a href="{{route('admin.courses.create')}}" class="flex items-center gap-3 px-4 py-2 rounded-lg hover:bg-gray-100 dark:hover:bg-gray-700 transition-colors duration-200 group">
                        <i class="fas fa-plus text-xs text-blue-300 w-3"></i>
                        <span class="text-gray-600 dark:text-gray-300 group-hover:text-blue-600 dark:group-hover:text-blue-400">ایجاد دوره جدید</span>
                    </a>
                </div>
            </div>
        </div>

        <!-- درس ها -->
        <div class="treeview-item">
            <button onclick="toggleTreeview(this)" class="flex items-center justify-between w-full gap-3 px-5 py-3 rounded-xl hover:bg-gradient-to-r hover:from-pink-50 hover:to-purple-50 dark:hover:from-pink-900/20 dark:hover:to-purple-900/20 hover:-translate-x-1 transition-all duration-300 group">
                <div class="flex items-center gap-3">
                    <i class="fas fa-chalkboard-teacher text-green-500 group-hover:text-green-600 transition-colors duration-200 w-5"></i>
                    <span class="font-medium text-gray-700 dark:text-gray-200 group-hover:text-gray-900 dark:group-hover:text-white">درس ها</span>
                </div>
                <i class="fas fa-chevron-down text-gray-400 transition-transform duration-300 treeview-arrow"></i>
            </button>
            <div class="treeview-content hidden overflow-hidden transition-all duration-300 ease-in-out">
                <div class="mr-8 mt-2 space-y-1">
                    <a href="{{route('admin.lessons.index')}}" class="flex items-center gap-3 px-4 py-2 rounded-lg hover:bg-gray-100 dark:hover:bg-gray-700 transition-colors duration-200 group">
                        <i class="fas fa-list text-xs text-green-300 w-3"></i>
                        <span class="text-gray-600 dark:text-gray-300 group-hover:text-green-600 dark:group-hover:text-green-400">مشاهده همه</span>
                    </a>
                    <a href="{{route('admin.lessons.create')}}" class="flex items-center gap-3 px-4 py-2 rounded-lg hover:bg-gray-100 dark:hover:bg-gray-700 transition-colors duration-200 group">
                        <i class="fas fa-plus text-xs text-green-300 w-3"></i>
                        <span class="text-gray-600 dark:text-gray-300 group-hover:text-green-600 dark:group-hover:text-green-400">ایجاد درس جدید</span>
                    </a>
                </div>
            </div>
        </div>
        <!-- درس نامه ها -->
        <div class="treeview-item">
            <button onclick="toggleTreeview(this)" class="flex items-center justify-between w-full gap-3 px-5 py-3 rounded-xl hover:bg-gradient-to-r hover:from-pink-50 hover:to-purple-50 dark:hover:from-pink-900/20 dark:hover:to-purple-900/20 hover:-translate-x-1 transition-all duration-300 group">
                <div class="flex items-center gap-3">
                    <i class="fas fa-file-archive text-pink-500 group-hover:text-pink-600 transition-colors duration-200 w-5"></i>
                    <span class="font-medium text-gray-700 dark:text-gray-200 group-hover:text-gray-900 dark:group-hover:text-white">درسنامه ها</span>
                </div>
                <i class="fas fa-chevron-down text-gray-400 transition-transform duration-300 treeview-arrow"></i>
            </button>
            <div class="treeview-content hidden overflow-hidden transition-all duration-300 ease-in-out">
                <div class="mr-8 mt-2 space-y-1">
                    <a href="{{route('admin.lessonplans.index')}}" class="flex items-center gap-3 px-4 py-2 rounded-lg hover:bg-gray-100 dark:hover:bg-gray-700 transition-colors duration-200 group">
                        <i class="fas fa-list text-xs text-green-300 w-3"></i>
                        <span class="text-gray-600 dark:text-gray-300 group-hover:text-green-600 dark:group-hover:text-green-400">مشاهده همه</span>
                    </a>

                </div>
            </div>
        </div>

        <!-- موشن گرافیک -->
        <div class="treeview-item">
            <button onclick="toggleTreeview(this)" class="flex items-center justify-between w-full gap-3 px-5 py-3 rounded-xl hover:bg-gradient-to-r hover:from-pink-50 hover:to-purple-50 dark:hover:from-pink-900/20 dark:hover:to-purple-900/20 hover:-translate-x-1 transition-all duration-300 group">
                <div class="flex items-center gap-3">
                    <i class="fas fa-video-camera text-red-600 group-hover:text-orange-600 transition-colors duration-200 w-5"></i>
                    <span class="font-medium text-gray-700 dark:text-gray-200 group-hover:text-gray-900 dark:group-hover:text-white">موشن گرافیک</span>
                </div>
                <i class="fas fa-chevron-down text-gray-400 transition-transform duration-300 treeview-arrow"></i>
            </button>
            <div class="treeview-content hidden overflow-hidden transition-all duration-300 ease-in-out">
                <div class="mr-8 mt-2 space-y-1">
                    <a href="{{route('admin.motions.index')}}" class="flex items-center gap-3 px-4 py-2 rounded-lg hover:bg-gray-100 dark:hover:bg-gray-700 transition-colors duration-200 group">
                        <i class="fas fa-list text-xs text-orange-300 w-3"></i>
                        <span class="text-gray-600 dark:text-gray-300 group-hover:text-orange-600 dark:group-hover:text-orange-400">مشاهده همه</span>
                    </a>
                    <a href="{{route('admin.motions.create')}}" class="flex items-center gap-3 px-4 py-2 rounded-lg hover:bg-gray-100 dark:hover:bg-gray-700 transition-colors duration-200 group">
                        <i class="fas fa-plus text-xs text-orange-300 w-3"></i>
                        <span class="text-gray-600 dark:text-gray-300 group-hover:text-orange-600 dark:group-hover:text-orange-400">افزودن موشن گرافیک جدید</span>
                    </a>
                </div>
            </div>
        </div>
        <!-- اسلایدرها -->
        <div class="treeview-item">
            <button onclick="toggleTreeview(this)" class="flex items-center justify-between w-full gap-3 px-5 py-3 rounded-xl hover:bg-gradient-to-r hover:from-pink-50 hover:to-purple-50 dark:hover:from-pink-900/20 dark:hover:to-purple-900/20 hover:-translate-x-1 transition-all duration-300 group">
                <div class="flex items-center gap-3">
                    <i class="fas fa-images text-orange-500 group-hover:text-orange-600 transition-colors duration-200 w-5"></i>
                    <span class="font-medium text-gray-700 dark:text-gray-200 group-hover:text-gray-900 dark:group-hover:text-white">اسلایدرها</span>
                </div>
                <i class="fas fa-chevron-down text-gray-400 transition-transform duration-300 treeview-arrow"></i>
            </button>
            <div class="treeview-content hidden overflow-hidden transition-all duration-300 ease-in-out">
                <div class="mr-8 mt-2 space-y-1">
                    <a href="{{route('admin.sliders.index')}}" class="flex items-center gap-3 px-4 py-2 rounded-lg hover:bg-gray-100 dark:hover:bg-gray-700 transition-colors duration-200 group">
                        <i class="fas fa-list text-xs text-orange-300 w-3"></i>
                        <span class="text-gray-600 dark:text-gray-300 group-hover:text-orange-600 dark:group-hover:text-orange-400">مشاهده همه</span>
                    </a>
                    <a href="{{route('admin.sliders.create')}}" class="flex items-center gap-3 px-4 py-2 rounded-lg hover:bg-gray-100 dark:hover:bg-gray-700 transition-colors duration-200 group">
                        <i class="fas fa-plus text-xs text-orange-300 w-3"></i>
                        <span class="text-gray-600 dark:text-gray-300 group-hover:text-orange-600 dark:group-hover:text-orange-400">ایجاد اسلایدر جدید</span>
                    </a>
                </div>
            </div>
        </div>
 <!-- اسپلش -->
        <div class="treeview-item">
            <button onclick="toggleTreeview(this)" class="flex items-center justify-between w-full gap-3 px-5 py-3 rounded-xl hover:bg-gradient-to-r hover:from-pink-50 hover:to-purple-50 dark:hover:from-pink-900/20 dark:hover:to-purple-900/20 hover:-translate-x-1 transition-all duration-300 group">
                <div class="flex items-center gap-3">
                    <i class="fas fa-images text-orange-500 group-hover:text-orange-600 transition-colors duration-200 w-5"></i>
                    <span class="font-medium text-gray-700 dark:text-gray-200 group-hover:text-gray-900 dark:group-hover:text-white">اسپلش اسکرین </span>
                </div>
                <i class="fas fa-chevron-down text-gray-400 transition-transform duration-300 treeview-arrow"></i>
            </button>
            <div class="treeview-content hidden overflow-hidden transition-all duration-300 ease-in-out">
                <div class="mr-8 mt-2 space-y-1">
                    <a href="{{route('admin.splashes.index')}}" class="flex items-center gap-3 px-4 py-2 rounded-lg hover:bg-gray-100 dark:hover:bg-gray-700 transition-colors duration-200 group">
                        <i class="fas fa-list text-xs text-orange-300 w-3"></i>
                        <span class="text-gray-600 dark:text-gray-300 group-hover:text-orange-600 dark:group-hover:text-orange-400">مشاهده همه</span>
                    </a>
                    <a href="{{route('admin.splashes.create')}}" class="flex items-center gap-3 px-4 py-2 rounded-lg hover:bg-gray-100 dark:hover:bg-gray-700 transition-colors duration-200 group">
                        <i class="fas fa-plus text-xs text-orange-300 w-3"></i>
                        <span class="text-gray-600 dark:text-gray-300 group-hover:text-orange-600 dark:group-hover:text-orange-400">ایجاد اسپلش جدید</span>
                    </a>
                </div>
            </div>
        </div>

        <!-- مدیریت فایل ها -->
        <div class="treeview-item">
            <button onclick="toggleTreeview(this)" class="flex items-center justify-between w-full gap-3 px-5 py-3 rounded-xl hover:bg-gradient-to-r hover:from-pink-50 hover:to-purple-50 dark:hover:from-pink-900/20 dark:hover:to-purple-900/20 hover:-translate-x-1 transition-all duration-300 group">
                <div class="flex items-center gap-3">
                    <i class="fas fa-file text-yellow-500  group-hover:text-yellow-600 transition-colors duration-200 w-5"></i>
                    <span class="font-medium text-gray-700 dark:text-gray-200 group-hover:text-gray-900 dark:group-hover:text-white">فایل ها</span>
                </div>
                <i class="fas fa-chevron-down text-gray-400 transition-transform duration-300 treeview-arrow"></i>
            </button>
            <div class="treeview-content hidden overflow-hidden transition-all duration-300 ease-in-out">
                <div class="mr-8 mt-2 space-y-1">
                    <a href="{{route('admin.files.index')}}" class="flex items-center gap-3 px-4 py-2 rounded-lg hover:bg-gray-100 dark:hover:bg-gray-700 transition-colors duration-200 group">
                        <i class="fas fa-list text-xs text-orange-300 w-3"></i>
                        <span class="text-gray-600 dark:text-gray-300 group-hover:text-orange-600 dark:group-hover:text-orange-400">مشاهده همه</span>
                    </a>
                    <a href="{{route('admin.files.create')}}" class="flex items-center gap-3 px-4 py-2 rounded-lg hover:bg-gray-100 dark:hover:bg-gray-700 transition-colors duration-200 group">
                        <i class="fas fa-file-download text-xs text-orange-300 w-3"></i>
                        <span class="text-gray-600 dark:text-gray-300 group-hover:text-orange-600 dark:group-hover:text-orange-400">ایجاد فایل جدید</span>
                    </a>
                </div>
            </div>
        </div>
        <!-- بلاگ ها -->
        <div class="treeview-item">
            <button onclick="toggleTreeview(this)" class="flex items-center justify-between w-full gap-3 px-5 py-3 rounded-xl hover:bg-gradient-to-r hover:from-pink-50 hover:to-purple-50 dark:hover:from-pink-900/20 dark:hover:to-purple-900/20 hover:-translate-x-1 transition-all duration-300 group">
                <div class="flex items-center gap-3">
                    <i class="fas fa-magic-wand-sparkles text-yellow-500 group-hover:text-yellow-600 transition-colors duration-200 w-5"></i>
                    <span class="font-medium text-gray-700 dark:text-gray-200 group-hover:text-gray-900 dark:group-hover:text-white">مقاله ها</span>
                </div>
                <i class="fas fa-chevron-down text-gray-400 transition-transform duration-300 treeview-arrow"></i>
            </button>
            <div class="treeview-content hidden overflow-hidden transition-all duration-300 ease-in-out">
                <div class="mr-8 mt-2 space-y-1">
                    <a href="{{route('admin.blogs.index')}}" class="flex items-center gap-3 px-4 py-2 rounded-lg hover:bg-gray-100 dark:hover:bg-gray-700 transition-colors duration-200 group">
                        <i class="fas fa-list text-xs text-orange-300 w-3"></i>
                        <span class="text-gray-600 dark:text-gray-300 group-hover:text-orange-600 dark:group-hover:text-orange-400">مشاهده همه</span>
                    </a>
                    <a href="{{route('admin.blogs.create')}}" class="flex items-center gap-3 px-4 py-2 rounded-lg hover:bg-gray-100 dark:hover:bg-gray-700 transition-colors duration-200 group">
                        <i class="fas fa-plus text-xs text-orange-300 w-3"></i>
                        <span class="text-gray-600 dark:text-gray-300 group-hover:text-orange-600 dark:group-hover:text-orange-400">ایجاد مقاله جدید</span>
                    </a>
                    <a href="{{route('admin.categories.index')}}" class="flex items-center gap-3 px-4 py-2 rounded-lg hover:bg-gray-100 dark:hover:bg-gray-700 transition-colors duration-200 group">
                        <i class="fas fa-plus text-xs text-orange-300 w-3"></i>
                        <span class="text-gray-600 dark:text-gray-300 group-hover:text-orange-600 dark:group-hover:text-orange-400">  مدیریت دسته ها</span>
                    </a>
                </div>
            </div>
        </div>
        <!-- تخفیف ها -->
        <div class="treeview-item">
            <button onclick="toggleTreeview(this)" class="flex items-center justify-between w-full gap-3 px-5 py-3 rounded-xl hover:bg-gradient-to-r hover:from-pink-50 hover:to-purple-50 dark:hover:from-pink-900/20 dark:hover:to-purple-900/20 hover:-translate-x-1 transition-all duration-300 group">
                <div class="flex items-center gap-3">
                    <i class="fas fa-percent text-red-500 group-hover:text-red-600 transition-colors duration-200 w-5"></i>
                    <span class="font-medium text-gray-700 dark:text-gray-200 group-hover:text-gray-900 dark:group-hover:text-white">تخفیف ها</span>
                </div>
                <i class="fas fa-chevron-down text-gray-400 transition-transform duration-300 treeview-arrow"></i>
            </button>
            <div class="treeview-content hidden overflow-hidden transition-all duration-300 ease-in-out">
                <div class="mr-8 mt-2 space-y-1">
                    <a href="{{route('shop.admin.discounts.index')}}" class="flex items-center gap-3 px-4 py-2 rounded-lg hover:bg-gray-100 dark:hover:bg-gray-700 transition-colors duration-200 group">
                        <i class="fas fa-list text-xs text-red-300 w-3"></i>
                        <span class="text-gray-600 dark:text-gray-300 group-hover:text-red-600 dark:group-hover:text-red-400">مشاهده همه</span>
                    </a>
                    <a href="{{route('shop.admin.discounts.create')}}" class="flex items-center gap-3 px-4 py-2 rounded-lg hover:bg-gray-100 dark:hover:bg-gray-700 transition-colors duration-200 group">
                        <i class="fas fa-plus text-xs text-red-300 w-3"></i>
                        <span class="text-gray-600 dark:text-gray-300 group-hover:text-red-600 dark:group-hover:text-red-400">ایجاد تخفیف جدید</span>
                    </a>
                </div>
            </div>
        </div>

        <!-- کاربران -->
        <div class="treeview-item">
            <button onclick="toggleTreeview(this)" class="flex items-center justify-between w-full gap-3 px-5 py-3 rounded-xl hover:bg-gradient-to-r hover:from-pink-50 hover:to-purple-50 dark:hover:from-pink-900/20 dark:hover:to-purple-900/20 hover:-translate-x-1 transition-all duration-300 group">
                <div class="flex items-center gap-3">
                    <i class="fas fa-users text-indigo-500 group-hover:text-indigo-600 transition-colors duration-200 w-5"></i>
                    <span class="font-medium text-gray-700 dark:text-gray-200 group-hover:text-gray-900 dark:group-hover:text-white">کاربران</span>
                </div>
                <i class="fas fa-chevron-down text-gray-400 transition-transform duration-300 treeview-arrow"></i>
            </button>
            <div class="treeview-content hidden overflow-hidden transition-all duration-300 ease-in-out">
                <div class="mr-8 mt-2 space-y-1">
                    <a href="{{route('admin.users.index')}}" class="flex items-center gap-3 px-4 py-2 rounded-lg hover:bg-gray-100 dark:hover:bg-gray-700 transition-colors duration-200 group">
                        <i class="fas fa-list text-xs text-indigo-300 w-3"></i>
                        <span class="text-gray-600 dark:text-gray-300 group-hover:text-indigo-600 dark:group-hover:text-indigo-400">مشاهده همه</span>
                    </a>
                   {{-- <a href="{{route('admin.users.create')}}" class="flex items-center gap-3 px-4 py-2 rounded-lg hover:bg-gray-100 dark:hover:bg-gray-700 transition-colors duration-200 group">
                        <i class="fas fa-plus text-xs text-indigo-300 w-3"></i>
                        <span class="text-gray-600 dark:text-gray-300 group-hover:text-indigo-600 dark:group-hover:text-indigo-400">ایجاد کاربر جدید</span>
                    </a>--}}
                    <a href="{{route('admin.groups.index')}}" class="flex items-center gap-3 px-4 py-2 rounded-lg hover:bg-gray-100 dark:hover:bg-gray-700 transition-colors duration-200 group">
                        <i class="fas fa-users text-xs text-indigo-300 w-3"></i>
                        <span class="text-gray-600 dark:text-gray-300 group-hover:text-emerald-600 dark:group-hover:text-emerald-400">گروه ها</span>
                    </a>
                    <a href="{{route('admin.groups.create')}}" class="flex items-center gap-3 px-4 py-2 rounded-lg hover:bg-gray-100 dark:hover:bg-gray-700 transition-colors duration-200 group">
                        <i class="fas fa-user-group text-xs text-indigo-300 w-3"></i>
                        <span class="text-gray-600 dark:text-gray-300 group-hover:text-emerald-600 dark:group-hover:text-emerald-400"> ایجاد گروه جدید</span>
                    </a>
                </div>
            </div>
        </div>

        <!-- پیغام‌ها -->
        <div class="treeview-item">
            <button onclick="toggleTreeview(this)" class="flex items-center justify-between w-full gap-3 px-5 py-3 rounded-xl hover:bg-gradient-to-r hover:from-pink-50 hover:to-purple-50 dark:hover:from-pink-900/20 dark:hover:to-purple-900/20 hover:-translate-x-1 transition-all duration-300 group">
                <div class="flex items-center gap-3">
                    <i class="fas fa-envelope text-teal-500 group-hover:text-teal-600 transition-colors duration-200 w-5"></i>
                    <span class="font-medium text-gray-700 dark:text-gray-200 group-hover:text-gray-900 dark:group-hover:text-white">پیغام‌ها</span>
                </div>
                <i class="fas fa-chevron-down text-gray-400 transition-transform duration-300 treeview-arrow"></i>
            </button>
            <div class="treeview-content hidden overflow-hidden transition-all duration-300 ease-in-out">
                <div class="mr-8 mt-2 space-y-1">
                    <a href="{{route('admin.messages.index')}}" class="flex items-center gap-3 px-4 py-2 rounded-lg hover:bg-gray-100 dark:hover:bg-gray-700 transition-colors duration-200 group">
                        <i class="fas fa-list text-xs text-teal-300 w-3"></i>
                        <span class="text-gray-600 dark:text-gray-300 group-hover:text-teal-600 dark:group-hover:text-teal-400">مشاهده همه</span>
                    </a>
                    <a href="{{route('admin.messages.create')}}" class="flex items-center gap-3 px-4 py-2 rounded-lg hover:bg-gray-100 dark:hover:bg-gray-700 transition-colors duration-200 group">
                        <i class="fas fa-plus text-xs text-teal-300 w-3"></i>
                        <span class="text-gray-600 dark:text-gray-300 group-hover:text-teal-600 dark:group-hover:text-teal-400">ایجاد پیغام جدید</span>
                    </a>
                </div>
            </div>
        </div>

        <!-- مدیریت لایسنس ها -->
        <div class="treeview-item">
            <button onclick="toggleTreeview(this)" class="flex items-center justify-between w-full gap-3 px-5 py-3 rounded-xl hover:bg-gradient-to-r hover:from-pink-50 hover:to-purple-50 dark:hover:from-pink-900/20 dark:hover:to-purple-900/20 hover:-translate-x-1 transition-all duration-300 group">
                <div class="flex items-center gap-3">
                    <i class="fas fa-key text-yellow-500 group-hover:text-yellow-600 transition-colors duration-200 w-5"></i>
                    <span class="font-medium text-gray-700 dark:text-gray-200 group-hover:text-gray-900 dark:group-hover:text-white">مدیریت لایسنس ها</span>
                </div>
                <i class="fas fa-chevron-down text-gray-400 transition-transform duration-300 treeview-arrow"></i>
            </button>
            <div class="treeview-content hidden overflow-hidden transition-all duration-300 ease-in-out">
                <div class="mr-8 mt-2 space-y-1">
                    <a href="{{route('admin.licenses.index')}}" class="flex items-center gap-3 px-4 py-2 rounded-lg hover:bg-gray-100 dark:hover:bg-gray-700 transition-colors duration-200 group">
                        <i class="fas fa-list text-xs text-yellow-300 w-3"></i>
                        <span class="text-gray-600 dark:text-gray-300 group-hover:text-yellow-600 dark:group-hover:text-yellow-400">مشاهده همه</span>
                    </a>
                    <a href="{{route('admin.licenses.create')}}" class="flex items-center gap-3 px-4 py-2 rounded-lg hover:bg-gray-100 dark:hover:bg-gray-700 transition-colors duration-200 group">
                        <i class="fas fa-plus text-xs text-yellow-300 w-3"></i>
                        <span class="text-gray-600 dark:text-gray-300 group-hover:text-yellow-600 dark:group-hover:text-yellow-400">ایجاد لایسنس جدید</span>
                    </a>
                </div>
            </div>
        </div>

        <!-- پرسش و پاسخ -->
        <div class="treeview-item">
            <button onclick="toggleTreeview(this)" class="flex items-center justify-between w-full gap-3 px-5 py-3 rounded-xl hover:bg-gradient-to-r hover:from-pink-50 hover:to-purple-50 dark:hover:from-pink-900/20 dark:hover:to-purple-900/20 hover:-translate-x-1 transition-all duration-300 group">
                <div class="flex items-center gap-3">
                    <i class="fas fa-question-circle text-cyan-500 group-hover:text-cyan-600 transition-colors duration-200 w-5"></i>
                    <span class="font-medium text-gray-700 dark:text-gray-200 group-hover:text-gray-900 dark:group-hover:text-white">پرسش و پاسخ</span>
                </div>
                <i class="fas fa-chevron-down text-gray-400 transition-transform duration-300 treeview-arrow"></i>
            </button>
            <div class="treeview-content hidden overflow-hidden transition-all duration-300 ease-in-out">
                <div class="mr-8 mt-2 space-y-1">
                    <a href="{{route('conversation.index')}}" class="flex items-center gap-3 px-4 py-2 rounded-lg hover:bg-gray-100 dark:hover:bg-gray-700 transition-colors duration-200 group">
                        <i class="fas fa-list text-xs text-cyan-300 w-3"></i>
                        <span class="text-gray-600 dark:text-gray-300 group-hover:text-cyan-600 dark:group-hover:text-cyan-400">مشاهده همه</span>
                    </a>

                </div>
            </div>
        </div>


        <!-- ارسال SMS -->
        <div class="treeview-item">
            <button onclick="toggleTreeview(this)" class="flex items-center justify-between w-full gap-3 px-5 py-3 rounded-xl hover:bg-gradient-to-r hover:from-pink-50 hover:to-purple-50 dark:hover:from-pink-900/20 dark:hover:to-purple-900/20 hover:-translate-x-1 transition-all duration-300 group">
                <div class="flex items-center gap-3">
                    <i class="fas fa-sms text-emerald-500 group-hover:text-emerald-600 transition-colors duration-200 w-5"></i>
                    <span class="font-medium text-gray-700 dark:text-gray-200 group-hover:text-gray-900 dark:group-hover:text-white">ارسال SMS</span>
                </div>
                <i class="fas fa-chevron-down text-gray-400 transition-transform duration-300 treeview-arrow"></i>
            </button>
            <div class="treeview-content hidden overflow-hidden transition-all duration-300 ease-in-out">
                <div class="mr-8 mt-2 space-y-1">
                    <a href="{{route('admin.sms_queues.index')}}" class="flex items-center gap-3 px-4 py-2 rounded-lg hover:bg-gray-100 dark:hover:bg-gray-700 transition-colors duration-200 group">
                        <i class="fas fa-list text-xs text-emerald-300 w-3"></i>
                        <span class="text-gray-600 dark:text-gray-300 group-hover:text-emerald-600 dark:group-hover:text-emerald-400">مشاهده صف ها</span>
                    </a>
                    <a href="{{route('admin.sms_queues.create')}}" class="flex items-center gap-3 px-4 py-2 rounded-lg hover:bg-gray-100 dark:hover:bg-gray-700 transition-colors duration-200 group">
                        <i class="fas fa-plus text-xs text-emerald-300 w-3"></i>
                        <span class="text-gray-600 dark:text-gray-300 group-hover:text-emerald-600 dark:group-hover:text-emerald-400">ایجاد صف جدید</span>
                    </a>
                    <a href="{{route('admin.message_templates.index')}}" class="flex items-center gap-3 px-4 py-2 rounded-lg hover:bg-gray-100 dark:hover:bg-gray-700 transition-colors duration-200 group">
                        <i class="fas fa-file-alt text-xs text-emerald-300 w-3"></i>
                        <span class="text-gray-600 dark:text-gray-300 group-hover:text-emerald-600 dark:group-hover:text-emerald-400">الگو های پیام</span>
                    </a>
                    <a href="{{route('admin.message_templates.create')}}" class="flex items-center gap-3 px-4 py-2 rounded-lg hover:bg-gray-100 dark:hover:bg-gray-700 transition-colors duration-200 group">
                        <i class="fas fa-file-alt text-xs text-emerald-300 w-3"></i>
                        <span class="text-gray-600 dark:text-gray-300 group-hover:text-emerald-600 dark:group-hover:text-emerald-400">ایجاد الگو</span>
                    </a>

                </div>
            </div>
        </div>

    </nav>


</aside>

<script>
    function toggleTreeview(button) {
        const content = button.nextElementSibling;
        const arrow = button.querySelector('.treeview-arrow');

        if (content.classList.contains('hidden')) {
            // Open
            content.classList.remove('hidden');
            setTimeout(() => {
                content.style.maxHeight = content.scrollHeight + 'px';
            }, 10);
            arrow.style.transform = 'rotate(180deg)';
        } else {
            // Close
            content.style.maxHeight = '0px';
            arrow.style.transform = 'rotate(0deg)';
            setTimeout(() => {
                content.classList.add('hidden');
            }, 300);
        }
    }

    // Close all treeviews initially
    document.addEventListener('DOMContentLoaded', function() {
        const contents = document.querySelectorAll('.treeview-content');
        contents.forEach(content => {
            content.style.maxHeight = '0px';
        });
    });
</script>
