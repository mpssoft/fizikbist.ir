<aside
    class="fixed top-0 bottom-0 right-0 w-64 bg-white dark:bg-slate-800 shadow-lg z-40 transform transition-transform duration-300 md:relative md:translate-x-0 -translate-x-full"
    :class="sidebarOpen ? 'translate-x-0' : 'translate-x-full'"
    @click.away=" !toggleButton ? sidebarOpen = false : toggleButton = false"
>

    <div class="flex justify-between items-center p-4 border-gray-400 border-b  md:justify-center">
        <div
            class="text-2xl font-bold bg-gradient-to-r from-pink-500 via-purple-500 to-blue-500 bg-clip-text text-transparent">
            <a href="{{ env("APP_URL") }}"> فیزیک بیست </a>
        </div>
    </div>
    <nav class="flex flex-col gap-3 px-4 text-sm md:text-base mt-4">
        <a href="#" class="flex items-center gap-2 px-4 py-2 rounded hover:bg-slate-200 dark:hover:bg-slate-700">
            <i class="fas fa-home"></i> صفحه اصلی
        </a>
        <a href="{{ route('user.courses') }}" class="flex items-center gap-2 px-4 py-2 rounded hover:bg-slate-200 dark:hover:bg-slate-700">
            <i class="fas fa-graduation-cap"></i> دوره‌ها
        </a>
        <a href="#" class="flex items-center gap-2 px-4 py-2 rounded hover:bg-slate-200 dark:hover:bg-slate-700">
            <i class="fas fa-question-circle"></i> پرسش‌ها
        </a>
        <a href="#" class="flex items-center gap-2 px-4 py-2 rounded hover:bg-slate-200 dark:hover:bg-slate-700">
            <i class="fas fa-wallet"></i> مالی
        </a>
        <a href="#" class="flex items-center gap-2 px-4 py-2 rounded hover:bg-slate-200 dark:hover:bg-slate-700">
            <i class="fas fa-heart"></i> دنبال‌شده‌ها
        </a>
        <a href="#" class="flex items-center gap-2 px-4 py-2 rounded hover:bg-slate-200 dark:hover:bg-slate-700">
            <i class="fas fa-comments"></i> نظرات
        </a>
        <a href="#" class="flex items-center gap-2 px-4 py-2 rounded hover:bg-slate-200 dark:hover:bg-slate-700">
            <i class="fas fa-envelope"></i> پیغام‌ها
        </a>
        <a href="#" class="flex items-center gap-2 px-4 py-2 rounded hover:bg-slate-200 dark:hover:bg-slate-700">
            <i class="fas fa-bell"></i> اعلانات
        </a>
    </nav>

</aside>
