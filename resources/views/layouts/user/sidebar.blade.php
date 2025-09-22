<aside
    class="fixed top-0 bottom-0 right-0 w-72 bg-gradient-to-br from-white via-slate-50 to-slate-100 dark:from-slate-800 dark:via-slate-700 dark:to-slate-600 shadow-[-8px_0_24px_rgba(0,0,0,0.15)] dark:shadow-[-8px_0_24px_rgba(0,0,0,0.4)] z-40 transform transition-all duration-300 ease-in-out md:relative md:translate-x-0 -translate-x-full"
    :class="sidebarOpen ? 'translate-x-0' : 'translate-x-full'"
    @click.away=" !toggleButton ? sidebarOpen = false : toggleButton = false"
>
    <!-- Header Section -->
    <div class="flex justify-between items-center p-6 shadow-[0_2px_8px_rgba(0,0,0,0.1)] dark:shadow-[0_2px_8px_rgba(0,0,0,0.3)] md:justify-center">
        <div class="text-2xl font-bold bg-gradient-to-r from-pink-500 via-purple-500 to-blue-500 bg-clip-text text-transparent drop-shadow-sm">
            <a href="/" class="flex items-center gap-2 hover:scale-105 transition-transform duration-200">
                <i class="fas fa-atom drop-shadow-sm"></i>
                فیزیک بیست
            </a>
        </div>
    </div>

    <!-- Navigation Section -->
    <nav class="flex flex-col gap-2 px-4 text-sm md:text-base mt-6">
        <a href="{{route('user.home')}}" class="flex items-center gap-3 px-5 py-3 rounded-xl hover:bg-gradient-to-r hover:from-pink-50 hover:to-purple-50 dark:hover:from-pink-900/20 dark:hover:to-purple-900/20 hover:-translate-x-1 transition-all duration-300 group">
            <i class="fas fa-home text-pink-500 group-hover:text-pink-600 transition-colors duration-200 w-5"></i>
            <span class="font-medium text-gray-700 dark:text-gray-200 group-hover:text-gray-900 dark:group-hover:text-white">صفحه اصلی</span>
        </a>

        <a href="{{route('user.courses.index')}}" class="flex items-center gap-3 px-5 py-3 rounded-xl hover:bg-gradient-to-r hover:from-pink-50 hover:to-purple-50 dark:hover:from-pink-900/20 dark:hover:to-purple-900/20 hover:-translate-x-1 transition-all duration-300 group">
            <i class="fas fa-graduation-cap text-purple-500 group-hover:text-purple-600 transition-colors duration-200 w-5"></i>
            <span class="font-medium text-gray-700 dark:text-gray-200 group-hover:text-gray-900 dark:group-hover:text-white">دوره‌ها</span>
        </a>
        <a href="{{route('user.lessonplans.index')}}" class="flex items-center gap-3 px-5 py-3 rounded-xl hover:bg-gradient-to-r hover:from-pink-50 hover:to-purple-50 dark:hover:from-pink-900/20 dark:hover:to-purple-900/20 hover:-translate-x-1 transition-all duration-300 group">
            <i class="fas fa-chalkboard-user text-green-500 group-hover:text-green-600 transition-colors duration-200 w-5"></i>
            <span class="font-medium text-gray-700 dark:text-gray-200 group-hover:text-gray-900 dark:group-hover:text-white">درسنامه های من</span>
        </a>



        <a href="{{route('user.courses.bought')}}" class="flex items-center gap-3 px-5 py-3 rounded-xl hover:bg-gradient-to-r hover:from-pink-50 hover:to-purple-50 dark:hover:from-pink-900/20 dark:hover:to-purple-900/20 hover:-translate-x-1 transition-all duration-300 group">
            <i class="fas fa-wallet text-yellow-500 group-hover:text-yellow-600 transition-colors duration-200 w-5"></i>
            <span class="font-medium text-gray-700 dark:text-gray-200 group-hover:text-gray-900 dark:group-hover:text-white"> لایسنس ها</span>
        </a>
<a href="{{route('user.files.index')}}" class="flex items-center gap-3 px-5 py-3 rounded-xl hover:bg-gradient-to-r hover:from-pink-50 hover:to-purple-50 dark:hover:from-pink-900/20 dark:hover:to-purple-900/20 hover:-translate-x-1 transition-all duration-300 group">
            <i class="fas fa-file-download text-yellow-500 group-hover:text-yellow-600 transition-colors duration-200 w-5"></i>
            <span class="font-medium text-gray-700 dark:text-gray-200 group-hover:text-gray-900 dark:group-hover:text-white"> فایل ها</span>
        </a>


        <a href="{{route('user.messages.index')}}" class="flex items-center gap-3 px-5 py-3 rounded-xl hover:bg-gradient-to-r hover:from-pink-50 hover:to-purple-50 dark:hover:from-pink-900/20 dark:hover:to-purple-900/20 hover:-translate-x-1 transition-all duration-300 group">
            <i class="fas fa-envelope text-teal-500 group-hover:text-teal-600 transition-colors duration-200 w-5"></i>
            <span class="font-medium text-gray-700 dark:text-gray-200 group-hover:text-gray-900 dark:group-hover:text-white"> پیام ها</span>
        </a>
        <a href="{{route('conversation.index')}}" class="flex items-center gap-3 px-5 py-3 rounded-xl hover:bg-gradient-to-r hover:from-pink-50 hover:to-purple-50 dark:hover:from-pink-900/20 dark:hover:to-purple-900/20 hover:-translate-x-1 transition-all duration-300 group">
            <i class="fas fa-question-circle text-teal-500 group-hover:text-teal-600 transition-colors duration-200 w-5"></i>
            <span class="font-medium text-gray-700 dark:text-gray-200 group-hover:text-gray-900 dark:group-hover:text-white"> پرسش و پاسخ</span>
        </a>
        <a href="{{route('user.profile.edit')}}" class="flex items-center gap-3 px-5 py-3 rounded-xl hover:bg-gradient-to-r hover:from-pink-50 hover:to-purple-50 dark:hover:from-pink-900/20 dark:hover:to-purple-900/20 hover:-translate-x-1 transition-all duration-300 group">
            <i class="fas fa-user-edit text-orange-600 group-hover:text-teal-600 transition-colors duration-200 w-5"></i>
            <span class="font-medium text-gray-700 dark:text-gray-200 group-hover:text-gray-900 dark:group-hover:text-white"> ویرایش پروفایل</span>
        </a>

    </nav>

    <!-- Footer Section -->
    <div class="absolute bottom-0 left-0 right-0 p-4 bg-gradient-to-t from-gray-50 to-transparent dark:from-slate-800 dark:to-transparent">
        <div class="text-center text-xs text-gray-500 dark:text-gray-400">
            <p>نسخه 2.0.1</p>
        </div>
    </div>
</aside>
