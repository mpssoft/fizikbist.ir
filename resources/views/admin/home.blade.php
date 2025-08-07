@extends('layouts.admin.master')

@section('content')
    <!-- Main Content -->
    <div class="pt-5">
        <!-- Beautiful Stats Cards -->
        <section class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 p-6">
            <!-- Score Card -->
            <div class="group p-6 bg-gradient-to-br from-white via-slate-50 to-slate-100 dark:from-slate-800 dark:via-slate-700 dark:to-slate-600 rounded-2xl shadow-[0_8px_24px_rgba(0,0,0,0.1)] dark:shadow-[0_8px_24px_rgba(0,0,0,0.3)] hover:shadow-[0_12px_32px_rgba(0,0,0,0.15)] dark:hover:shadow-[0_12px_32px_rgba(0,0,0,0.4)] transition-all duration-300 hover:-translate-y-1 border border-white/20 dark:border-slate-600/20">
                <div class="flex items-center gap-4">
                    <div class="w-12 h-12 bg-gradient-to-r from-yellow-100 to-orange-200 dark:from-yellow-900/30 dark:to-orange-800/30 rounded-xl flex items-center justify-center group-hover:scale-110 transition-transform duration-200">
                        <i class="fas fa-star text-yellow-500 text-xl"></i>
                    </div>
                    <div>
                        <p class="text-2xl font-bold bg-gradient-to-r from-yellow-600 to-orange-600 bg-clip-text text-transparent">۰</p>
                        <p class="text-sm text-gray-600 dark:text-gray-300 font-medium">امتیاز</p>
                    </div>
                </div>
            </div>

            <!-- Learning Courses Card -->
            <div class="group p-6 bg-gradient-to-br from-white via-slate-50 to-slate-100 dark:from-slate-800 dark:via-slate-700 dark:to-slate-600 rounded-2xl shadow-[0_8px_24px_rgba(0,0,0,0.1)] dark:shadow-[0_8px_24px_rgba(0,0,0,0.3)] hover:shadow-[0_12px_32px_rgba(0,0,0,0.15)] dark:hover:shadow-[0_12px_32px_rgba(0,0,0,0.4)] transition-all duration-300 hover:-translate-y-1 border border-white/20 dark:border-slate-600/20">
                <div class="flex items-center gap-4">
                    <div class="w-12 h-12 bg-gradient-to-r from-blue-100 to-purple-200 dark:from-blue-900/30 dark:to-purple-800/30 rounded-xl flex items-center justify-center group-hover:scale-110 transition-transform duration-200">
                        <i class="fas fa-book-open text-blue-500 text-xl"></i>
                    </div>
                    <div>
                        <p class="text-2xl font-bold bg-gradient-to-r from-blue-600 to-purple-600 bg-clip-text text-transparent">۸</p>
                        <p class="text-sm text-gray-600 dark:text-gray-300 font-medium">دوره در حال یادگیری</p>
                    </div>
                </div>
            </div>

            <!-- Completed Courses Card -->
            <div class="group p-6 bg-gradient-to-br from-white via-slate-50 to-slate-100 dark:from-slate-800 dark:via-slate-700 dark:to-slate-600 rounded-2xl shadow-[0_8px_24px_rgba(0,0,0,0.1)] dark:shadow-[0_8px_24px_rgba(0,0,0,0.3)] hover:shadow-[0_12px_32px_rgba(0,0,0,0.15)] dark:hover:shadow-[0_12px_32px_rgba(0,0,0,0.4)] transition-all duration-300 hover:-translate-y-1 border border-white/20 dark:border-slate-600/20">
                <div class="flex items-center gap-4">
                    <div class="w-12 h-12 bg-gradient-to-r from-green-100 to-emerald-200 dark:from-green-900/30 dark:to-emerald-800/30 rounded-xl flex items-center justify-center group-hover:scale-110 transition-transform duration-200">
                        <i class="fas fa-graduation-cap text-green-500 text-xl"></i>
                    </div>
                    <div>
                        <p class="text-2xl font-bold bg-gradient-to-r from-green-600 to-emerald-600 bg-clip-text text-transparent">۰</p>
                        <p class="text-sm text-gray-600 dark:text-gray-300 font-medium">دوره کامل شده</p>
                    </div>
                </div>
            </div>

            <!-- Total Time Card -->
            <div class="group p-6 bg-gradient-to-br from-white via-slate-50 to-slate-100 dark:from-slate-800 dark:via-slate-700 dark:to-slate-600 rounded-2xl shadow-[0_8px_24px_rgba(0,0,0,0.1)] dark:shadow-[0_8px_24px_rgba(0,0,0,0.3)] hover:shadow-[0_12px_32px_rgba(0,0,0,0.15)] dark:hover:shadow-[0_12px_32px_rgba(0,0,0,0.4)] transition-all duration-300 hover:-translate-y-1 border border-white/20 dark:border-slate-600/20">
                <div class="flex items-center gap-4">
                    <div class="w-12 h-12 bg-gradient-to-r from-pink-100 to-rose-200 dark:from-pink-900/30 dark:to-rose-800/30 rounded-xl flex items-center justify-center group-hover:scale-110 transition-transform duration-200">
                        <i class="fas fa-clock text-pink-500 text-xl"></i>
                    </div>
                    <div>
                        <p class="text-lg font-bold bg-gradient-to-r from-pink-600 to-rose-600 bg-clip-text text-transparent">۲۷:۳۹:۵۰</p>
                        <p class="text-sm text-gray-600 dark:text-gray-300 font-medium">مجموع کل</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- Beautiful Filter Tabs -->
        <section class="px-6">
            <div class="flex flex-wrap gap-3 mb-6">
                <button @click="activeTab = 'current'"
                        :class="activeTab === 'current' ? 'bg-gradient-to-r from-pink-500 to-purple-500 text-white shadow-lg' : 'bg-gradient-to-r from-white to-slate-50 dark:from-slate-800 dark:to-slate-700 text-gray-700 dark:text-gray-200 hover:from-pink-50 hover:to-purple-50 dark:hover:from-pink-900/20 dark:hover:to-purple-900/20'"
                        class="px-6 py-3 rounded-xl font-medium transition-all duration-200 hover:scale-105 shadow-md hover:shadow-lg border border-white/20 dark:border-slate-600/20">
                    <i class="fas fa-play-circle ml-2"></i>
                    دوره جاری
                </button>
                <button @click="activeTab = 'purchased'"
                        :class="activeTab === 'purchased' ? 'bg-gradient-to-r from-pink-500 to-purple-500 text-white shadow-lg' : 'bg-gradient-to-r from-white to-slate-50 dark:from-slate-800 dark:to-slate-700 text-gray-700 dark:text-gray-200 hover:from-blue-50 hover:to-cyan-50 dark:hover:from-blue-900/20 dark:hover:to-cyan-900/20'"
                        class="px-6 py-3 rounded-xl font-medium transition-all duration-200 hover:scale-105 shadow-md hover:shadow-lg border border-white/20 dark:border-slate-600/20">
                    <i class="fas fa-shopping-cart ml-2"></i>
                    خریداری شده
                </button>
                <button @click="activeTab = 'completed'"
                        :class="activeTab === 'completed' ? 'bg-gradient-to-r from-pink-500 to-purple-500 text-white shadow-lg' : 'bg-gradient-to-r from-white to-slate-50 dark:from-slate-800 dark:to-slate-700 text-gray-700 dark:text-gray-200 hover:from-green-50 hover:to-emerald-50 dark:hover:from-green-900/20 dark:hover:to-emerald-900/20'"
                        class="px-6 py-3 rounded-xl font-medium transition-all duration-200 hover:scale-105 shadow-md hover:shadow-lg border border-white/20 dark:border-slate-600/20">
                    <i class="fas fa-check-circle ml-2"></i>
                    گذرانده شده
                </button>
                <button @click="activeTab = 'inactive'"
                        :class="activeTab === 'inactive' ? 'bg-gradient-to-r from-pink-500 to-purple-500 text-white shadow-lg' : 'bg-gradient-to-r from-white to-slate-50 dark:from-slate-800 dark:to-slate-700 text-gray-700 dark:text-gray-200 hover:from-gray-50 hover:to-slate-50 dark:hover:from-gray-900/20 dark:hover:to-slate-900/20'"
                        class="px-6 py-3 rounded-xl font-medium transition-all duration-200 hover:scale-105 shadow-md hover:shadow-lg border border-white/20 dark:border-slate-600/20">
                    <i class="fas fa-pause-circle ml-2"></i>
                    غیرفعال
                </button>
            </div>
        </section>

        <!-- Beautiful Course Cards -->
        <section class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 px-6 pb-8">
            <!-- Course Card 1 -->
            <div class="group bg-gradient-to-br from-white via-slate-50 to-slate-100 dark:from-slate-800 dark:via-slate-700 dark:to-slate-600 rounded-2xl shadow-[0_8px_24px_rgba(0,0,0,0.1)] dark:shadow-[0_8px_24px_rgba(0,0,0,0.3)] hover:shadow-[0_12px_32px_rgba(0,0,0,0.15)] dark:hover:shadow-[0_12px_32px_rgba(0,0,0,0.4)] transition-all duration-300 hover:-translate-y-2 border border-white/20 dark:border-slate-600/20 overflow-hidden">
                <div class="relative">
                    <div class="w-full h-48 bg-gradient-to-br from-blue-400 via-purple-500 to-pink-500 flex items-center justify-center relative overflow-hidden">
                        <div class="absolute inset-0 bg-gradient-to-br from-blue-600/20 to-purple-600/20"></div>
                        <i class="fas fa-search text-white text-4xl relative z-10 group-hover:scale-110 transition-transform duration-300"></i>
                        <div class="absolute top-3 right-3 bg-white/20 backdrop-blur-sm rounded-full px-3 py-1">
                            <span class="text-white text-xs font-medium">جدید</span>
                        </div>
                    </div>
                    <div class="absolute bottom-0 left-0 right-0 h-1 bg-gradient-to-r from-blue-500 to-purple-500"></div>
                </div>
                <div class="p-6">
                    <h3 class="font-bold text-lg text-gray-800 dark:text-white mb-2 group-hover:text-purple-600 dark:group-hover:text-purple-400 transition-colors duration-200">آشنایی با پکیج scout</h3>
                    <p class="text-sm text-gray-600 dark:text-gray-300 mb-4">یادگیری جستجوی پیشرفته در Laravel</p>
                    <div class="flex items-center justify-between">
                        <div class="flex items-center gap-2">
                            <div class="w-8 h-1 bg-gradient-to-r from-blue-500 to-purple-500 rounded-full"></div>
                            <span class="text-xs text-gray-500 dark:text-gray-400">۲۰٪</span>
                        </div>
                        <button class="bg-gradient-to-r from-blue-500 to-purple-500 text-white px-4 py-2 rounded-lg text-sm font-medium hover:from-blue-600 hover:to-purple-600 transition-all duration-200 hover:scale-105">
                            ادامه
                        </button>
                    </div>
                </div>
            </div>

            <!-- Course Card 2 -->
            <div class="group bg-gradient-to-br from-white via-slate-50 to-slate-100 dark:from-slate-800 dark:via-slate-700 dark:to-slate-600 rounded-2xl shadow-[0_8px_24px_rgba(0,0,0,0.1)] dark:shadow-[0_8px_24px_rgba(0,0,0,0.3)] hover:shadow-[0_12px_32px_rgba(0,0,0,0.15)] dark:hover:shadow-[0_12px_32px_rgba(0,0,0,0.4)] transition-all duration-300 hover:-translate-y-2 border border-white/20 dark:border-slate-600/20 overflow-hidden">
                <div class="relative">
                    <div class="w-full h-48 bg-gradient-to-br from-green-400 via-teal-500 to-blue-500 flex items-center justify-center relative overflow-hidden">
                        <div class="absolute inset-0 bg-gradient-to-br from-green-600/20 to-blue-600/20"></div>
                        <i class="fas fa-bolt text-white text-4xl relative z-10 group-hover:scale-110 transition-transform duration-300"></i>
                        <div class="absolute top-3 right-3 bg-white/20 backdrop-blur-sm rounded-full px-3 py-1">
                            <span class="text-white text-xs font-medium">محبوب</span>
                        </div>
                    </div>
                    <div class="absolute bottom-0 left-0 right-0 h-1 bg-gradient-to-r from-green-500 to-blue-500"></div>
                </div>
                <div class="p-6">
                    <h3 class="font-bold text-lg text-gray-800 dark:text-white mb-2 group-hover:text-green-600 dark:group-hover:text-green-400 transition-colors duration-200">آموزش Livewire</h3>
                    <p class="text-sm text-gray-600 dark:text-gray-300 mb-4">ساخت رابط کاربری تعاملی با Laravel</p>
                    <div class="flex items-center justify-between">
                        <div class="flex items-center gap-2">
                            <div class="w-8 h-1 bg-gradient-to-r from-green-500 to-blue-500 rounded-full"></div>
                            <span class="text-xs text-gray-500 dark:text-gray-400">۶۵٪</span>
                        </div>
                        <button class="bg-gradient-to-r from-green-500 to-blue-500 text-white px-4 py-2 rounded-lg text-sm font-medium hover:from-green-600 hover:to-blue-600 transition-all duration-200 hover:scale-105">
                            ادامه
                        </button>
                    </div>
                </div>
            </div>

            <!-- Course Card 3 -->
            <div class="group bg-gradient-to-br from-white via-slate-50 to-slate-100 dark:from-slate-800 dark:via-slate-700 dark:to-slate-600 rounded-2xl shadow-[0_8px_24px_rgba(0,0,0,0.1)] dark:shadow-[0_8px_24px_rgba(0,0,0,0.3)] hover:shadow-[0_12px_32px_rgba(0,0,0,0.15)] dark:hover:shadow-[0_12px_32px_rgba(0,0,0,0.4)] transition-all duration-300 hover:-translate-y-2 border border-white/20 dark:border-slate-600/20 overflow-hidden">
                <div class="relative">
                    <div class="w-full h-48 bg-gradient-to-br from-orange-400 via-red-500 to-pink-500 flex items-center justify-center relative overflow-hidden">
                        <div class="absolute inset-0 bg-gradient-to-br from-orange-600/20 to-pink-600/20"></div>
                        <i class="fas fa-code text-white text-4xl relative z-10 group-hover:scale-110 transition-transform duration-300"></i>
                        <div class="absolute top-3 right-3 bg-white/20 backdrop-blur-sm rounded-full px-3 py-1">
                            <span class="text-white text-xs font-medium">پیشرفته</span>
                        </div>
                    </div>
                    <div class="absolute bottom-0 left-0 right-0 h-1 bg-gradient-to-r from-orange-500 to-pink-500"></div>
                </div>
                <div class="p-6">
                    <h3 class="font-bold text-lg text-gray-800 dark:text-white mb-2 group-hover:text-orange-600 dark:group-hover:text-orange-400 transition-colors duration-200">ساخت API با GraphQL</h3>
                    <p class="text-sm text-gray-600 dark:text-gray-300 mb-4">طراحی API های مدرن و قدرتمند</p>
                    <div class="flex items-center justify-between">
                        <div class="flex items-center gap-2">
                            <div class="w-8 h-1 bg-gradient-to-r from-orange-500 to-pink-500 rounded-full"></div>
                            <span class="text-xs text-gray-500 dark:text-gray-400">۱۰٪</span>
                        </div>
                        <button class="bg-gradient-to-r from-orange-500 to-pink-500 text-white px-4 py-2 rounded-lg text-sm font-medium hover:from-orange-600 hover:to-pink-600 transition-all duration-200 hover:scale-105">
                            ادامه
                        </button>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
