
<!-- Like, Views, and Share Section -->
<div class="flex  items-center justify-between mt-3 mb-4 px-4
            bg-gradient-to-r from-blue-50 to-purple-50 dark:from-slate-800 dark:to-slate-700
            rounded-xl border border-blue-100 dark:border-slate-600 gap-3">


    <div class="flex items-center gap-6 text-sm">

        <!-- Like -->
        <div class="relative inline-block">
            <button id="like-btn"  onclick="toggleLike('{{strtolower(class_basename($model))}}',{{$model->id}})"
                    class="flex items-center gap-1 text-gray-700 dark:text-slate-300">
                <i id="like-icon" class="far fa-heart text-lg {{$model->isLikedByUser(auth()->id())? 'fas text-red-500':''}}"></i>
                <span id="like-count" class="font-medium">{{$model->likes()->count()}}</span>
            </button>
            <!-- Tooltip -->
            <div id="login-tooltip"
                 class="hidden absolute top-full mt-3
            bg-gradient-to-r from-pink-500 to-red-500 text-white
            text-xs font-medium rounded-lg px-4 py-2 shadow-lg
            animate-fade-in w-[max-content]" >

                <!-- Arrow -->
                <div class="absolute -top-2 left-1/2 -translate-x-1/2 w-0 h-0
                border-l-6 border-r-6 border-b-6 border-transparent
                border-b-pink-500"></div>

                لطفاً برای لایک کردن وارد شوید
            </div>

            <!-- Tailwind animation helper -->


        </div>
        <!-- Views -->
        <div class="flex items-center gap-1 text-gray-700 dark:text-slate-300">
            <i class="fa-solid fa-eye text-lg"></i>
            <span id="view-count" class="font-medium">{{number_format($model->view)}}</span>
        </div>
    </div>

    <!-- Right: Share -->
    <!-- Desktop: Inline icons -->
    <div class="hidden sm:flex items-center gap-2 py-2">
        <button onclick="shareQuick('twitter')" class=" w-8 h-8 pt-1 bg-white dark:bg-slate-800 hover:bg-blue-50 dark:hover:bg-slate-700 border border-gray-200 dark:border-slate-600 rounded-full shadow-sm">
            <i class="fab fa-twitter text-blue-500"></i>
        </button>
        <button onclick="shareQuick('facebook')" class=" w-8 h-8 pt-1 bg-white dark:bg-slate-800 hover:bg-blue-50 dark:hover:bg-slate-700 border border-gray-200 dark:border-slate-600 rounded-full shadow-sm">
            <i class="fab fa-facebook text-blue-600"></i>
        </button>
        <button onclick="shareQuick('linkedin')" class=" w-8 h-8 pt-1 bg-white dark:bg-slate-800 hover:bg-blue-50 dark:hover:bg-slate-700 border border-gray-200 dark:border-slate-600 rounded-full shadow-sm">
            <i class="fab fa-linkedin text-blue-700"></i>
        </button>
        <button onclick="shareQuick('whatsapp')" class=" w-8 h-8 pt-1 bg-white dark:bg-slate-800 hover:bg-green-50 dark:hover:bg-slate-700 border border-gray-200 dark:border-slate-600 rounded-full shadow-sm">
            <i class="fab fa-whatsapp text-green-600"></i>
        </button>
        <button onclick="shareQuick('telegram')" class=" w-8 h-8 pt-1 bg-white dark:bg-slate-800 hover:bg-blue-50 dark:hover:bg-slate-700 border border-gray-200 dark:border-slate-600 rounded-full shadow-sm">
            <i class="fab fa-telegram text-sky-500"></i>
        </button>
        <button onclick="copyLink()" class=" w-8 h-8 pt-1 bg-white dark:bg-slate-800 hover:bg-gray-100 dark:hover:bg-slate-700 border border-gray-200 dark:border-slate-600 rounded-full shadow-sm">
            <i class="fa-solid fa-link text-gray-600"></i>
        </button>
    </div>

    <!-- Mobile: Dropdown -->
    <div class="sm:hidden relative py-2" dir="ltr">
        <button onclick="toggleShareMenu()" class="flex items-center gap-2 px-4 pt-1 bg-white dark:bg-slate-800 border border-gray-200 dark:border-slate-600 rounded-full shadow-sm">
            <i class="fa-solid fa-share-nodes text-gray-600 dark:text-slate-400"></i>
            <span class="text-sm font-medium text-gray-700 dark:text-slate-300">اشتراک‌گذاری</span>
        </button>
        <div id="share-menu" class="hidden absolute right-0 mt-2 w-40 bg-white dark:bg-slate-800 border border-gray-200 dark:border-slate-600 rounded-lg shadow-lg">
            <button onclick="shareQuick('twitter')" class="flex items-center gap-2 px-4 py-2 hover:bg-blue-50 dark:hover:bg-slate-700 w-full">
                <i class="fab fa-twitter text-blue-500"></i> Twitter
            </button>
            <button onclick="shareQuick('facebook')" class="flex items-center gap-2 px-4 py-2 hover:bg-blue-50 dark:hover:bg-slate-700 w-full">
                <i class="fab fa-facebook text-blue-600"></i> Facebook
            </button>
            <button onclick="shareQuick('linkedin')" class="flex items-center gap-2 px-4 py-2 hover:bg-blue-50 dark:hover:bg-slate-700 w-full">
                <i class="fab fa-linkedin text-blue-700"></i> LinkedIn
            </button>
            <button onclick="shareQuick('whatsapp')" class="flex items-center gap-2 px-4 py-2 hover:bg-green-50 dark:hover:bg-slate-700 w-full">
                <i class="fab fa-whatsapp text-green-600"></i> WhatsApp
            </button>
            <button onclick="shareQuick('telegram')" class="flex items-center gap-2 px-4 py-2 hover:bg-blue-50 dark:hover:bg-slate-700 w-full">
                <i class="fab fa-telegram text-sky-500"></i> Telegram
            </button>
            <button onclick="copyLink()" class="flex items-center gap-2 px-4 py-2 hover:bg-gray-100 dark:hover:bg-slate-700 w-full">
                <i class="fa-solid fa-link text-gray-600"></i> Copy Link
            </button>
        </div>
    </div>
</div>

